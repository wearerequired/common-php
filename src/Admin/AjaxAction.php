<?php
/**
 * AjaxAction class.
 *
 * @since 0.1.0
 */

namespace Required\Common\Admin;

use Required\Common\Contracts\Registrable;

/**
 * Class used to register Ajax actions.
 *
 * @since 0.1.0
 */
abstract class AjaxAction implements Registrable {

	public const ACTION = 'ajax-action';

	/**
	 * Whether the Ajax action can be called unauthenticated.
	 *
	 * @var bool
	 */
	protected $allow_unauthenticated = false;

	/**
	 * Whether the Ajax action can be called unauthenticated.
	 *
	 * @since 0.1.0
	 *
	 * @param bool $allow Whether the Ajax action can be called unauthenticated.
	 */
	public function allow_unauthenticated( bool $allow ) {
		$this->allow_unauthenticated = $allow;
	}

	/**
	 * The callback of the action.
	 *
	 * @since 0.1.0
	 */
	abstract public function callback();

	/**
	 * Registers the action.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the action was registered successfully.
	 */
	public function register(): bool {
		if ( $this->allow_unauthenticated ) {
			add_action( 'wp_ajax_nopriv_' . static::ACTION, [ $this, 'callback' ] );
		}

		return add_action( 'wp_ajax_' . static::ACTION, [ $this, 'callback' ] );
	}
}
