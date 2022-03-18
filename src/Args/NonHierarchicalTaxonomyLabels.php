<?php
/**
 * NonHierarchicalTaxonomyLabels class.
 *
 * @since 0.3.0
 */

namespace Required\Common\Args;

use Args;

/**
 * Arguments for the `labels` argument of `register_taxonomy()` function in WordPress.
 *
 * @since 0.3.0
 *
 * @link https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
 */
class NonHierarchicalTaxonomyLabels extends Args\Shared\Base {

	/**
	 * General name for the taxonomy, usually plural.
	 *
	 * Default `_x( 'Tags', 'taxonomy general name' )`.
	 */
	public string $name;

	/**
	 * Name for one object of this post type.
	 *
	 * Default `_x( 'Tag', 'taxonomy singular name' )`.
	 */
	public string $singular_name;

	/**
	 * Label for the menu name.
	 *
	 * Default is value of `$name`.
	 */
	public string $menu_name;

	/**
	 * Label for searching plural items.
	 *
	 * Default `__( 'Search Tags' )`.
	 */
	public string $search_items;

	/**
	 * Label to signify all items in a submenu link.
	 *
	 * Default `__( 'All Tags' )`.
	 */
	public string $all_items;

	/**
	 * Description for the Name field on Edit Tags screen.
	 *
	 * Default `__( 'The name is how it appears on your site.' )`.
	 */
	public string $name_field_description;

	/**
	 * Description for the Slug field on Edit Tags screen.
	 *
	 * Default `__( 'The &#8220;slug&#8221; is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.' )`.
	 */
	public string $slug_field_description;

	/**
	 * Description for the Description field on Edit Tags screen.
	 *
	 * Default `__( 'The description is not prominent by default; however, some themes may show it.' )`.
	 */
	public string $desc_field_description;

	/**
	 * Label for editing a singular item.
	 *
	 * Default `__( 'Edit Tag' )`.
	 */
	public string $edit_item;

	/**
	 * Label for viewing a singular item.
	 *
	 * Default `__( 'View Tag' )`.
	 */
	public string $view_item;

	/**
	 * Label for updating a singular item.
	 *
	 * Default `__( 'Update Tag' )`.
	 */
	public string $update_item;

	/**
	 * Label for adding a new singular item.
	 *
	 * Default `__( 'Add New Tag' )`.
	 */
	public string $add_new_item;

	/**
	 * Label for adding a new name of a singular item.
	 *
	 * Default `__( 'New Tag Name' )`.
	 */
	public string $new_item_name;

	/**
	 * Label used in the meta box for adding terms to an object.
	 *
	 * Default `__( 'Separate tags with commas' )`.
	 */
	public string $separate_items_with_commas;

	/**
	 * Label used in the meta box when JavaScript is disabled.
	 *
	 * Default `__( 'Add or remove tags' )`.
	 */
	public string $add_or_remove_items;

	/**
	 * Label used in the meta box for adding terms to an object.
	 *
	 * Default `__( 'Choose from the most used tags' )`.
	 */
	public string $choose_from_most_used;

	/**
	 * Label used when no items are found.
	 *
	 * Default `__( 'No tags found.' )`.
	 */
	public string $not_found;

	/**
	 * Label used in the posts and media list tables when no items
	 * are assigned to an object.
	 *
	 * Default `__( 'No tags' )`.
	 */
	public string $no_terms;

	/**
	 * Label for the table pagination hidden heading.
	 *
	 * Default `__( 'Tags list navigation' )`.
	 */
	public string $items_list_navigation;

	/**
	 * Label for the table hidden heading.
	 *
	 * Default `__( 'Tags list' )`.
	 */
	public string $items_list;

	/**
	 * Label for tab heading when selecting from the most used terms.
	 *
	 * Default `_x( 'Most Used', 'tags' )`.
	 */
	public string $most_used;

	/**
	 * Label displayed after a term has been updated.
	 *
	 * Default `__( '&larr; Go to Tags' )`.
	 */
	public string $back_to_items;

	/**
	 * Used in the block editor. Title for a navigation link block variation.
	 *
	 * Default `_x( 'Tag Link', 'navigation link block title' )`.
	 */
	public string $item_link;

	/**
	 * Used in the block editor. Description for a navigation link block variation.
	 *
	 * Default `_x( 'A link to a category.', 'navigation link block description' )`.
	 */
	public string $item_link_description;
}
