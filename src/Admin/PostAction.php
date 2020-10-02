<?php
/**
 * PostAction class.
 *
 * @since 1.0.0
 */

namespace Required\Common\Admin;

use Required\Common\Contracts\Registrable;

/**
 * Class used to register post/get actions.
 *
 * @since 1.0.0
 */
abstract class PostAction implements Registrable {

	public const ACTION = 'heartbeat';

	/**
	 * The callback of the action.
	 *
	 * @since 1.0.0
	 */
	abstract public function callback();

	/**
	 * Registers the action.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the action was registered successfully.
	 */
	public function register(): bool {
		return add_action( 'admin_post_' . static::ACTION, [ $this, 'callback' ] );
	}

	/**
	 * Returns URL of the action endpoint.
	 *
	 * @since 1.0.0
	 *
	 * @return string URL to admin-post.php.
	 */
	public static function url() {
		return admin_url( 'admin-post.php?action=' . static::ACTION );
	}
}
