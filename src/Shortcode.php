<?php
/**
 * Shortcode class
 *
 * @since 0.1.0
 */

namespace Required\Common;

use Required\Common\Contracts\Registrable;

/**
 * Class used to implement shortcode.
 *
 * @since 0.1.0
 */
abstract class Shortcode implements Registrable {

	public const TAG = 'shortcode';

	/**
	 * Shortcode view object.
	 *
	 * @since 0.1.0
	 *
	 * @var \Required\Common\Contracts\ShortcodeView
	 */
	protected $view;

	/**
	 * Creates a shortcode object.
	 *
	 * @since 0.1.0
	 *
	 * @param \Required\Common\Contracts\ShortcodeView $view Shortcode View.
	 */
	public function __construct( $view ) {
		$this->view = $view;
	}

	/**
	 * Creates a shortcode object.
	 *
	 * @since 0.1.0
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
