<?php
/**
 * Taxonomy class
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common;

use Required\Common\Args\Taxonomy as TaxonomyArgs;
use Required\Common\Contracts\Registrable;
use Required\Common\Contracts\Taxonomy as TaxonomyInterface;

/**
 * Class used to implement custom taxonomies.
 *
 * @since 0.1.0
 */
abstract class Taxonomy implements Registrable, TaxonomyInterface {

	public const string NAME = 'category';

	/** @var array<string> */
	protected array $object_types = [];

	/**
	 * Creates a taxonomy object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the taxonomy was registered successfully.
	 */
	public function register(): bool {
		$name = static::NAME;

		if ( ! taxonomy_exists( $name ) ) {
			/**
			 * WordPress stubs currently treat this as an array shape. `johnbillion/args`
			 * returns a plain `array<string, mixed>`, so we assert the expected shape here.
			 *
			 * @phpstan-var array{
			 *   labels?: string[],
			 *   description?: string,
			 *   public?: bool,
			 *   publicly_queryable?: bool,
			 *   hierarchical?: bool,
			 *   show_ui?: bool,
			 *   show_in_menu?: bool,
			 *   show_in_nav_menus?: bool,
			 *   show_in_rest?: bool,
			 *   rest_base?: string,
			 *   rest_namespace?: string,
			 *   rest_controller_class?: string,
			 *   show_tagcloud?: bool,
			 *   show_in_quick_edit?: bool,
			 *   show_admin_column?: bool,
			 *   meta_box_cb?: bool|callable,
			 *   meta_box_sanitize_cb?: callable,
			 *   capabilities?: array{manage_terms?: string, edit_terms?: string, delete_terms?: string, assign_terms?: string},
			 *   rewrite?: bool|array{slug?: string, with_front?: bool, hierarchical?: bool, ep_mask?: int},
			 *   query_var?: string|bool,
			 *   update_count_callback?: callable,
			 *   default_term?: string|array{name?: string, slug?: string, description?: string},
			 *   sort?: bool,
			 *   args?: array<string, mixed>,
			 *   _builtin?: bool,
			 * } $args
			 */
			$args = $this->get_args()->toArray();

			$taxonomy = register_taxonomy(
				$name,
				$this->get_object_types(),
				$args
			);
			return ! is_wp_error( $taxonomy );
		}

		return true;
	}

	/**
	 * Sets object types the taxonomy is associated with.
	 *
	 * @since 0.1.0
	 *
	 * @param string[]|string $object_type Object type or array of object types with which the taxonomy should be associated.
	 */
	public function set_object_types( array|string $object_type ): void {
		$this->object_types = array_map( 'strval', (array) $object_type );
	}

	/**
	 * Gets object types the taxonomy is associated with.
	 *
	 * @since 0.1.0
	 *
	 * @return string[] Object types the taxonomy is associated with.
	 */
	public function get_object_types(): array {
		return $this->object_types;
	}

	/**
	 * Gets taxonomy arguments for this taxonomy object.
	 *
	 * @since 0.1.0
	 *
	 * @return \Required\Common\Args\Taxonomy Taxonomy arguments.
	 */
	abstract protected function get_args(): TaxonomyArgs;
}
