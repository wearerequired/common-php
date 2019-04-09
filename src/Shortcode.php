<?php
/**
 * Shortcode class
 *
 * @since 1.0.0
 */

namespace Required\Common;

use Required\Common\Contracts\Registrable;
use Required\Common\Contracts\ShortcodeView;

/**
 * Class used to implement shortcode.
 *
 * @since 1.0.0
 */
abstract class Shortcode implements Registrable {

	/**
	 * Shortcode view object.
	 *
	 * @since 1.0.0
	 *
	 * @var ShortcodeView
	 */
	protected $view;

	/**
	 * Creates a shortcode object.
	 *
	 * @since 1.0.0
	 *
	 * @param ShortcodeView $view Shortcode View.
	 */
	public function __construct( $view ) {
		$this->view = $view;
	}

	/**
	 * Creates a shortcode object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether shortcode was registered successfully.
	 */
	public function register(): bool {
		add_shortcode(
			static::TAG,
			[ $this->view, 'render' ]
		);
		return shortcode_exists( static::TAG );
	}
}