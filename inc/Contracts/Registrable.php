<?php
/**
 * Registrable class.
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common\Contracts;

/**
 * Class used to implement registrable.
 *
 * @since 0.1.0
 */
interface Registrable {

	/**
	 * Registers the object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the action was registered successfully.
	 */
	public function register(): bool;
}
