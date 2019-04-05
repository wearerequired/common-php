<?php
/**
 * Taxonomy class
 *
 * @since 1.0.0
 */

namespace Required\Common;

use Required\Common\Contracts\Registrable;

/**
 * Class used to implement custom taxonomies.
 *
 * @since 1.0.0
 */
abstract class Taxonomy implements Registrable {

	/**
	 * Object types the taxonomy is associated with.
	 *
	 * @since 1.0.0
	 * @var array
	 */
	protected $object_types;

	/**
	 * Creates a taxonomy object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the taxonomy was registered successfully.
	 */
	public function register(): bool {
		if ( ! taxonomy_exists( static::NAME ) ) {
			$taxonomy = register_taxonomy(
				static::NAME,
				$this->get_object_types(),
				$this->get_args()
			);
			return ! is_wp_error( $taxonomy );
		}

		return true;
	}

	/**
	 * Sets object types the taxonomy is associated with.
	 *
	 * @since 1.0.0
	 *
	 * @param array|string $object_type Object type or array of object types with which the taxonomy should be associated.
	 */
	public function set_object_types( $object_type ) {
		$this->object_types = (array) $object_type;
	}

	/**
	 * Gets object types the taxonomy is associated with.
	 *
	 * @since 1.0.0
	 *
	 * @return array Object types the taxonomy is associated with.
	 */
	public function get_object_types() {
		return $this->object_types;
	}

	/**
	 * Gets taxonomy arguments for this taxonomy object.
	 *
	 * @since 1.0.0
	 *
	 * @return array Taxonomy arguments.
	 */
	abstract protected function get_args();
}
