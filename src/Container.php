<?php
/**
 * Container class.
 *
 * @since 1.0.0
 */

namespace Required\Common;

use Required\Common\Contracts\Registrable;

/**
 * Class used to create a container for registrable objects which can
 * be bootstrapped at once.
 *
 * @since 1.0.0
 */
class Container {

	/**
	 * Holds registrable objects.
	 *
	 * @since 1.0.0
	 *
	 * @var Registrable[]
	 */
	private $values = [];

	/**
	 * Whether this container is $bootstrapped.
	 *
	 * @since 1.0.0
	 *
	 * @var bool
	 */
	private $bootstrapped = false;

	/**
	 * Adds a new registrable object to the container.
	 *
	 * @since 1.0.0
	 *
	 * @param string                                 $name     Name of the registrable object.
	 * @param \Required\Common\Contracts\Registrable $callable Registrable object.
	 */
	public function add( $name, Registrable $callable ) {
		$this->values[ $name ] = $callable;
	}

	/**
	 * Registers all registrable object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True on success, false if already bootstrapped.
	 */
	public function bootstrap() {
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
