<?php

/**
 * Sample functions for filtering the APW_Utils class methods
 *
 * @package Advanced_Posts_Widget
 * @subpackage Testing
 *
 * @since 1.0
 */


// No direct access
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Adds a form field via the "apw_form_after_fields_general" filter
 *
 * @see APW_Fields::load_fieldset()
 * 
 * @param array  $instance Current widget settings.
 * @param object $widget   Widget Object.
 */
function _apw_form_after_fields_general( $instance, $widget )
{
	$_text = 'This is sample text to add at the end of the General Settings section.';
	
	printf( '<p class="description">%s</p>',
		sprintf( __( '%s' ), $_text )
	);
}
add_filter( 'apw_form_after_fields_general', '_apw_form_after_fields_general', 0, 3 );


/**
 * Filters the sample excerpt text in the widget form
 *
 * @see APW_Utils::sample_excerpt()
 *
 * @since 0.1.0
 * 
 * @return string $text The excerpt.
 */
function _apw_sample_excerpt( $text )
{
	$text = 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.';
	
	return $text;
}
add_filter( 'apw_sample_excerpt', '_apw_sample_excerpt' );


/**
 * Filters the arguments used to get  the post types for the widget
 * 
 * @see APW_Utils::get_apw_post_types()
 * 
 * @since 0.1.0
 *
 * @return array $args The query arguments
 */
function _apw_get_post_type_args( $args )
{
	// exclude built-in post types, show only custom post types
	$args['_builtin'] = false;
	
	return $args;

}
add_filter( 'apw_get_post_type_args', '_apw_get_post_type_args' );


/**
 * Filters the post types allowed to be selected in the widget
 * 
 * @see APW_Utils::get_apw_post_types()
 * 
 * @since 0.1.0
 *
 * @return array $types The allowed post types.
 */
function _apw_allowed_post_types( $types )
{
	unset( $types['attachment'] );
	return $types;
}
add_filter( 'apw_allowed_post_types', '_apw_allowed_post_types' );


/**
 * Filters the taxonomies allowed to be selected in the widget
 * 
 * @see APW_Utils::get_apw_taxonomies()
 * 
 * @since 0.1.0
 *
 * @return array $taxes The allowed taxonomies.
 */
function _apw_allowed_taxonomies( $taxes )
{
	unset( $taxes['post_tag'] );
	return $taxes;
}
add_filter( 'apw_allowed_taxonomies', '_apw_allowed_taxonomies' );


/**
 * Filters the image sizes allowed to be selected in the widget
 * 
 * @see APW_Utils::get_apw_image_sizes()
 * 
 * @since 0.1.0
 *
 * @return array $sizes The allowed image sizes.
 */
function _apw_allowed_image_sizes( $sizes )
{
	unset( $sizes['medium'] );
	return $sizes;
}
add_filter( 'apw_allowed_image_sizes', '_apw_allowed_image_sizes' );


/**
 * Filters the CSS classes added to the post thumbnail displayed by the widget
 * 
 * @see APW_Utils::get_apw_post_thumbnail()
 * 
 * @since 0.1.0
 *
 * @return array $classes The CSS classes.
 */
function _apw_post_thumb_class( $classes )
{
	$classes[] = 'apw-thumbnail-img';
	return $classes;
}
add_filter( 'apw_post_thumb_class', '_apw_post_thumb_class' );


/**
 * Filters the thumbnail HTML 
 * 
 * @see APW_Utils::get_apw_post_thumbnail()
 * 
 * @since 0.1.0
 *
 * @return string $html The HTML output of the post thumbnail.
 */
function _apw_post_thumbnail_html( $html )
{
	return '';
}
add_filter( 'apw_post_thumbnail_html', '_apw_post_thumbnail_html' );


/**
 * Filters the post date displayed by the widget
 * 
 * @see APW_Utils::get_apw_post_date()
 * @see WordPress get_the_date()
 * 
 * @since 0.1.0
 *
 * @return string $time The publish date of the post.
 */
function _get_apw_post_date( $time )
{
	return '';
}
add_filter( 'get_apw_post_date', '_get_apw_post_date' );


/**
 * Filters the ID for the post
 * 
 * @see APW_Utils::get_apw_post_id()
 * 
 * @since 0.1.0
 *
 * @return string $id The ID of the post, unique to the widget instance.
 */
function _get_apw_post_id( $id )
{
	$id = str_replace('advanced-posts-widget', 'custom-namespace', $id );
	return $id;
}
add_filter( 'apw_post_id', '_get_apw_post_id' );


/**
 * Filters the CSS classes added to the post item displayed by the widget
 * 
 * @see APW_Utils::get_apw_post_class()
 * 
 * @since 0.1.0
 *
 * @return array $classes The CSS classes.
 */
function _get_apw_post_class( $classes )
{
	$classes[] = 'custom-class';
	return $classes;
}
add_filter( 'apw_post_class', '_get_apw_post_class' );


/**
 * Filters the message displayed when a post is password-protected
 * 
 * @see APW_Utils::get_apw_post_excerpt()
 * 
 * @since 0.1.0
 *
 * @return string $text The message.
 */
function _apw_protected_post_notice( $text )
{
	$text = $text . ' ' . __( 'Please sign in.' );
	return $text;
}
add_filter( 'apw_protected_post_notice', '_apw_protected_post_notice' );


/**
 * Filters the excerpt displayed when a post is password-protected
 * 
 * @see APW_Utils::get_apw_post_excerpt()
 * 
 * @since 0.1.0
 *
 * @return string $text The message.
 */
function _apw_post_excerpt( $text )
{
	return $text;
}
add_filter( 'apw_post_excerpt', '_apw_post_excerpt' );


/**
 * Filters the excerpt length
 * 
 * @see APW_Utils::get_apw_post_excerpt()
 * 
 * @since 0.1.0
 *
 * @return int $length The length of the excerpt.
 */
function _apw_post_excerpt_length( $length )
{
	$length = 10;
	return $length;
}
add_filter( 'apw_post_excerpt_length', '_apw_post_excerpt_length' );


/**
 * Filters the readmore text for excerpts
 * 
 * @see APW_Utils::get_apw_post_excerpt()
 * 
 * @since 0.1.0
 *
 * @return string $text The message.
 */
function _apw_post_excerpt_more( $text )
{
	$text = ' &raquo;';
	return $text;
}
add_filter( 'apw_post_excerpt_more', '_apw_post_excerpt_more' );







