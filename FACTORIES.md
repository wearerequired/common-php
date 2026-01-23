# Factories statt Instanzen (API-Vorschlag)

Dieses Dokument beschreibt eine optionale, **lazy** Registration-API für diese Library: Statt alle `Registrable`-Objekte sofort zu instanziieren, werden sie als **Factory** (Closure) hinterlegt und erst beim `bootstrap()` (oder beim ersten Zugriff) gebaut.

> Hinweis: Das ist eine Dokumentation/Design-Notiz. Die API ist (noch) nicht Bestandteil der veröffentlichten Version, solange sie nicht implementiert wurde.

## Motivation

In realen WordPress-Codebasen sieht man häufig Registrations wie in der README: Viele `new …()` in einer Bootstrap-Funktion.

Probleme dabei:

- **Eager instantiation**: Teure Konstruktoren laufen auch dann, wenn der zugehörige Codepfad nie benutzt wird (z.B. Admin-only auf Frontend Requests).
- **Schwierigere Performance-Optimierung**: Lazy Loading und Kontext-Gating (admin/rest/cli) muss man händisch außerhalb des Containers umsetzen.
- **Wiring/Abhängigkeiten**: Sobald ein `Registrable` Abhängigkeiten hat, wächst Boilerplate im Bootstrap-Code.

Das „Factories statt Instanzen“-Pattern löst das, ohne einen vollständigen DI-Container einzuführen.

## Ziele

- Minimal-invasiv: bestehende Nutzung bleibt möglich.
- Kein hard dependency auf DI-Frameworks.
- Lazy Instantiation per Factory.
- Optional: einfache „Resolver“-Semantik (Factory wird nur einmal ausgeführt, Ergebnis gecached).

## Vorgeschlagene Container-API

### Begriffe

- **Entry-ID**: Ein eindeutiger Schlüssel im Container (z.B. `PostType::NAME`, `PostMeta::KEY`).
- **Registrable**: Objekt mit `register(): bool` (aus `Required\Common\Contracts\Registrable`).
- **Factory**: `callable(): Registrable` (typischerweise `fn() => new …()`), die ein `Registrable` erzeugt.

### Methoden

#### `add(string $id, Registrable $registrable): void`

- Behält das aktuelle Verhalten bei.
- Speichert eine bereits instanziierte Implementierung.

#### `addFactory(string $id, callable $factory): void`

- Signatur-Idee:

```php
/** @param callable(): \Required\Common\Contracts\Registrable $factory */
public function addFactory(string $id, callable $factory): void;
```

- Speichert eine Factory, ohne das Objekt sofort zu bauen.

#### `get(string $id): ?Registrable` (optional, aber praktisch)

- Liefert die Instanz zurück.
- Wenn der Eintrag als Factory hinterlegt ist:
  - Factory wird genau einmal ausgeführt.
  - Ergebnis wird im Container gecached.

#### `bootstrap(): void`

- Löst alle Entries auf (Instanzen + Factories).
- Ruft für jede Instanz `register()` auf.
- Idealerweise idempotent (ein Container bootstrapped nur einmal).

## Semantik (Details)

- **Caching**: Factories werden beim ersten Resolve zu einer Instanz „materialisiert“.
- **Fehlerfälle**:
  - Duplicate IDs: entweder überschreiben (aktuelles Verhalten?) oder Exception/Fehler.
  - Factory gibt kein `Registrable` zurück: Exception/Fehler.
  - Factory wirft Exception: Exception nach außen oder als `false`-Register-Ergebnis behandeln (Design-Entscheid).

## Beispiele

### 1) Post Types (lazy)

Vorher:

```php
$post_types = new Container();
$post_types->add( Profession::NAME, new Profession() );
$post_types->bootstrap();
```

Mit Factory:

```php
$post_types = new Container();
$post_types->addFactory( Profession::NAME, static fn () => new Profession() );
$post_types->bootstrap();
```

### 2) Post Meta (viele Entries, lazy)

```php
$post_meta = new Container();

$post_meta->addFactory( PostMeta\ImportID::KEY, static fn () => new PostMeta\ImportID() );
$post_meta->addFactory( PostMeta\ImportTimestamp::KEY, static fn () => new PostMeta\ImportTimestamp() );

$post_meta->bootstrap();
```

### 3) Abhängigkeiten über Closures „injizieren“ (Minimal-DI)

```php
$client = new ApiClient( /* … */ );
$logger = new Logger( /* … */ );

$registrables = new Container();
$registrables->addFactory(
    SomeIntegration::ID,
    static fn () => new SomeIntegration($client, $logger)
);

$registrables->bootstrap();
```

Vorteil: Keine externe DI-Abhängigkeit; trotzdem „injection“ über Scope.

### 4) Kontext-Gating (Pattern)

Dieses Pattern ist bewusst „WordPress-nah“ und lässt sich bereits ohne Container-Erweiterung nutzen:

```php
add_action(
    'admin_init',
    static function () {
        $admin = new Container();
        $admin->addFactory( AdminOnlyThing::ID, static fn () => new AdminOnlyThing() );
        $admin->bootstrap();
    }
);
```

Optionaler Ausbau (wenn gewünscht):

- `bootstrap(callable $filter)` oder `bootstrapOnly(array $ids)`
- „Tags“/„Groups“ pro Entry (z.B. `->tag('admin')`)

## Migration von Instanzen → Factories

- **Mechanisch**:
  - `add($id, new X())` → `addFactory($id, fn() => new X())`
- **Wann lohnt es sich besonders?**
  - Wenn Konstruktoren IO machen (HTTP/DB), Konfiguration lesen, große Arrays bauen.
  - Wenn ein Registrable nur in bestimmten Contexts benötigt wird.

## Abgrenzung zu einem vollwertigen DI-Container

Diese API ist absichtlich „klein“:

- Kein Autowiring.
- Kein Reflection-basiertes Resolution-System.
- Kein Lifecycle-Management jenseits von „factory → instance“.

Wenn ein Projekt später mehr braucht, kann man weiterhin einen DI-Container im Projekt nutzen und Factories in diesen Container delegieren.
