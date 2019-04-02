<?php
/**
 * ShortcodeView class.
 *
 * @since 1.0.0
 */

namespace Required\Common\Contracts;

/**
 * Class used to implement shortcode view.
 *
 * @since 1.0.0
 */
interface ShortcodeView {

	/**
	 * Renders the shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $attributes    Attributes of the shortcode.
	 * @param null   $content       The content.
	 * @param string $shortcode_tag The shortcode tag.
	 *
	 * @return string HTML output of the shortcode.
	 */
	public function render( $attributes, $content, $shortcode_tag ): string;
}
