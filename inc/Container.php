<?php
/**
 * Container class.
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common;

use Required\Common\Contracts\Registrable;

/**
 * Class used to create a container for registrable objects which can
 * be bootstrapped at once.
 *
 * @since 0.1.0
 */
class Container {

	/**
	 * Holds registrable objects.
	 *
	 * @since 0.1.0
	 *
	 * @var array<string,\Required\Common\Contracts\Registrable>
	 */
	private array $values = [];

	/**
	 * Whether this container is $bootstrapped.
	 *
	 * @since 0.1.0
	 *
	 * @var bool
	 */
	private bool $bootstrapped = false;

	/**
	 * Adds a new registrable object to the container.
	 *
	 * @since 0.1.0
	 *
	 * @param string                                 $name        Name of the registrable object.
	 * @param \Required\Common\Contracts\Registrable $registrable Registrable object.
	 */
	public function add( string $name, Registrable $registrable ): void {
		$this->values[ $name ] = $registrable;
	}

	/**
	 * Registers all registrable object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool True on success, false if already bootstrapped.
	 */
	public function bootstrap(): bool {
		if ( $this->bootstrapped ) {
			return false;
		}

		foreach ( $this->values as $item ) {
			$item->register();
		}

		$this->bootstrapped = true;

		return true;
	}
}
