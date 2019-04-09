<?php
/**
 * TermMetaAdminUI class
 *
 * @since 1.0.0
 *
 * @package Required\Common
 */

namespace Required\Common;

use Required\Common\Contracts\Registrable;
use WP_Term;

/**
 * Class used to implement term meta.
 *
 * @since 1.0.0
 */
abstract class TermMetaAdminUI implements Registrable {

	/**
	 * The taxonomy.
	 *
	 * @var \Required\Common\Taxonomy
	 */
	protected $taxonomy;

	/**
	 * The term meta.
	 *
	 * @var \Required\Common\TermMeta
	 */
	protected $term_meta;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param \Required\Common\Taxonomy $taxonomy  The taxonomy.
	 * @param \Required\Common\TermMeta $term_meta The term meta.
	 */
	public function __construct( Taxonomy $taxonomy, TermMeta $term_meta ) {
		$this->taxonomy  = $taxonomy;
		$this->term_meta = $term_meta;
	}

	/**
	 * Registers the object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the action was registered successfully.
	 */
	public function register(): bool {
		$taxonomy = $this->taxonomy::NAME;

		// Actions.
		add_action( "created_{$taxonomy}", [ $this, 'add' ] );
		add_action( "edited_{$taxonomy}", [ $this, 'update' ] );

		// Add/edit fields.
		add_action( "{$taxonomy}_add_form_fields", [ $this, 'render_add_field' ] );
		add_action( "{$taxonomy}_edit_form_fields", [ $this, 'render_edit_field' ] );

		// List table.
		add_filter( "manage_edit-{$taxonomy}_columns", [ $this, 'add_column' ] );
		add_filter( "manage_edit-{$taxonomy}_sortable_columns", [ $this, 'add_sortable_column' ] );
		add_action( "manage_edit-{$taxonomy}_custom_column", [ $this, 'render_column' ] );

		return true;
	}

	/**
	 * Saves a new term meta.
	 *
	 * @since 1.0.0
	 *
	 * @param int $term_id Term ID.
	 */
	abstract public function add( int $term_id );

	/**
	 * Updates an existing term meta.
	 *
	 * @since 1.0.0
	 *
	 * @param int $term_id Term ID.
	 */
	abstract public function update( int $term_id );

	/**
	 * Renders field when adding a new term.
	 *
	 * @since 1.0.0
	 *
	 */
	abstract public function render_add_field();

	/**
	 * Renders field when editing a term.
	 *
	 * @since 1.0.0
	 *
	 * @param \WP_Term $term Current term object.
	 */
	abstract public function render_edit_field( WP_Term $term );

	/**
	 * Adds the term meta to the list of list table columns.
	 *
	 * @since 1.0.0
	 *
	 * @param array $columns An array of columns.
	 * @return array An array of columns.
	 */
	public function add_column( array $columns ): array {
		return $columns;
	}

	/**
	 * Adds the term meta to the list of sortable list table columns.
	 *
	 * @since 1.0.0
	 *
	 * @param array $sortable_columns An array of sortable columns.
	 * @return array An array of sortable columns.
	 */
	public function add_sortable_column( array $sortable_columns ): array {
		return $sortable_columns;
	}

	/**
	 * Renders a list table column for the term meta.
	 *
	 * @since 1.0.0
	 *
	 * @param string $column_name Name of the column.
	 * @param int    $term_id     Term ID.
	 */
	public function render_column( string $column_name, int $term_id ) {}
}
