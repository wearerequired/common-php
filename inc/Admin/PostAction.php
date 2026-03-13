<?php
/**
 * PostAction class.
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common\Admin;

use Required\Common\Contracts\Registrable;

/**
 * Class used to register post/get actions.
 *
 * @since 0.1.0
 */
abstract class PostAction implements Registrable {

	public const string ACTION = 'post-action';

	/**
	 * The callback of the action.
	 *
	 * @since 0.1.0
	 */
	abstract public function callback(): void;

	/**
	 * Registers the action.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the action was registered successfully.
	 */
	public function register(): bool {
		return add_action( 'admin_post_' . static::ACTION, [ $this, 'callback' ] );
	}

	/**
	 * Returns URL of the action endpoint.
	 *
	 * @since 0.1.0
	 *
	 * @return string URL to admin-post.php.
	 */
	public static function url(): string {
		return admin_url( 'admin-post.php?action=' . static::ACTION );
	}
}
