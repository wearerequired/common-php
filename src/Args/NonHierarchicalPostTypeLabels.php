<?php
/**
 * NonHierarchicalPostTypeLabels class.
 *
 * @since 0.3.0
 */

namespace Required\Common\Args;

use Args;

/**
 * Arguments for the `labels` argument of `register_post_type()` function in WordPress.
 *
 * @since 0.3.0
 *
 * @link https://developer.wordpress.org/reference/functions/get_post_type_labels/
 */
class NonHierarchicalPostTypeLabels extends Args\Shared\Base {

	/**
	 * General name for the post type, usually plural.
	 *
	 * Default `_x( 'Posts', 'post type general name' )`.
	 */
	public string $name;

	/**
	 * Name for one object of this post type.
	 *
	 * Default `_x( 'Post', 'post type singular name' )`.
	 */
	public string $singular_name;

	/**
	 * Label for the menu name.
	 *
	 * Default is value of `$name`.
	 */
	public string $menu_name;

	/**
	 * Short label for adding a new item.
	 *
	 * When internationalizing this string, please use a {@link https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#disambiguation-by-context gettext context}.
	 *
	 * Default `_x( 'Add New', 'post' )`.
	 */
	public string $add_new;

	/**
	 * Label for adding a new singular item.
	 *
	 * Default `__( 'Add New Post' )`.
	 */
	public string $add_new_item;

	/**
	 * Label for editing a singular item.
	 *
	 * Default `__( 'Edit Post' )`.
	 */
	public string $edit_item;

	/**
	 * Label for the new item page title.
	 *
	 * Default `__( 'New Post' )`.
	 */
	public string $new_item;

	/**
	 * Label for viewing a singular item.
	 *
	 * Default `__( 'View Post' )`.
	 */
	public string $view_item;

	/**
	 * Label for viewing post type archives.
	 *
	 * Default `__( 'View Posts' )`.
	 */
	public string $view_items;

	/**
	 * Label for searching plural items.
	 *
	 * Default `__( 'Search Posts' )`.
	 */
	public string $search_items;

	/**
	 * Label used when no items are found.
	 *
	 * Default `__( 'No posts found.' )`.
	 */
	public string $not_found;

	/**
	 * Label used when no items are in the Trash.
	 *
	 * Default `__( 'No posts found in Trash.' )`.
	 */
	public string $not_found_in_trash;

	/**
	 * Label to signify all items in a submenu link.
	 *
	 * Default `__( 'All Posts' )`.
	 */
	public string $all_items;

	/**
	 * Label for archives in nav menus.
	 *
	 * Default `__( 'Post Archives' )`.
	 */
	public string $archives;

	/**
	 * Label for the attributes meta box.
	 *
	 * Default `__( 'Post Attributes' )`.
	 */
	public string $attributes;

	/**
	 * Label for the media frame button.
	 *
	 * Default `__( 'Insert into post' )`.
	 */
	public string $insert_into_item;

	/**
	 * Label for the media frame filter.
	 *
	 * Default `__( 'Uploaded to this post' )`.
	 */
	public string $uploaded_to_this_item;

	/**
	 * Label for the featured image meta box title.
	 *
	 * Default `_x( 'Featured image', 'post' )`.
	 */
	public string $featured_image;

	/**
	 * Label for setting the featured image.
	 *
	 * Default `_x( 'Set featured image', 'post' )`.
	 */
	public string $set_featured_image;

	/**
	 * Label for removing the featured image.
	 *
	 * Default `_x( 'Remove featured image', 'post' )`.
	 */
	public string $remove_featured_image;

	/**
	 * Label in the media frame for using a featured image.
	 *
	 * Default `_x( 'Use as featured image', 'post' )`.
	 */
	public string $use_featured_image;

	/**
	 * Label for the table views hidden heading.
	 *
	 * Default `__( 'Filter posts list' )`.
	 */
	public string $filter_items_list;

	/**
	 * Label for the date filter in list tables.
	 *
	 * Default `__( 'Filter by date' )`.
	 */
	public string $filter_by_date;

	/**
	 * Label for the table pagination hidden heading.
	 *
	 * Default `__( 'Posts list navigation' )`.
	 */
	public string $items_list_navigation;

	/**
	 * Label for the table hidden heading.
	 *
	 * Default `__( 'Posts list' )`.
	 */
	public string $items_list;

	/**
	 * Label used when an item is published.
	 *
	 * Default `__( 'Post published.' )`.
	 */
	public string $item_published;

	/**
	 * Label used when an item is published with private visibility.
	 *
	 * Default `__( 'Post published privately.' )`.
	 */
	public string $item_published_privately;

	/**
	 * Label used when an item is switched to a draft.
	 *
	 * Default `__( 'Post reverted to draft.' )`.
	 */
	public string $item_reverted_to_draft;

	/**
	 * Label used when an item is scheduled for publishing.
	 *
	 * Default `__( 'Post scheduled.' )`.
	 */
	public string $item_scheduled;

	/**
	 * Label used when an item is updated.
	 *
	 * Default `__( 'Post updated.' )`.
	 */
	public string $item_updated;

	/**
	 * Used in the block editor. Title for a navigation link block variation.
	 *
	 * Default `_x( 'Post Link', 'navigation link block title' )`.
	 */
	public string $item_link;

	/**
	 * Used in the block editor. Description for a navigation link block variation.
	 *
	 * Default `_x( 'A link to a post.', 'navigation link block description' )`.
	 */
	public string $item_link_description;
}
