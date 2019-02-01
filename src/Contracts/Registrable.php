<?php
/**
 * Registrable class.
 *
 * @since 1.0.0
 */

namespace Required\Common\Contracts;

/**
 * Class used to implement registrable.
 *
 * @since 1.0.0
 */
interface Registrable {

	/**
	 * Registers the object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the action was registered successfully.
	 */
	public function register();
}
