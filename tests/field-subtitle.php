<?php

/**
 * Sample functions for adding and saving a subtitle field to the APW Post Widget
 *
 * @package Advanced_Posts_Widget
 * @subpackage Testing
 *
 * @since 1.0
 */
 
 
/**
 * To add a new form field to the Advanced Posts Widget
 *
 * 1. Add to $instance via the apw_instance_defaults filter.
 * 2. Add the field to the widget form via the "apw_form_before_field_{$name}"
 *    or "apw_form_after_field_{$name}" filters.
 * 3. Hook into the update() method to save your field.
 * 4. Hook into the widget() method to display your field value.
 */


/**
 * Filter the default widget instance    
 *
 * @see APW_Utils::instance_defaults()
 * 
 * @param array $_defaults Current widget values.
 *
 * @return array $_defaults Filtered widget values.
 */
function _apw_instance_defaults( $_defaults )
{
	$_defaults['subtitle'] = __( 'Subtitle' );
	return $_defaults;
}
add_filter( 'apw_instance_defaults', '_apw_instance_defaults' );


/**
 * Sample form field added via "apw_form_before_field_{$name}" hook
 *
 * @see APW_Fields::load_fieldset()
 
 * @param array $instance Current widget settings.
 * @param object $widget Widget Object.
 */
function _apw_form_after_field_title( $instance, $widget )
{
	?>	
	<p>
		<label for="<?php echo $widget->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ); ?></label>
		<input class="widefat" id="<?php echo $widget->get_field_id( 'subtitle' ); ?>" name="<?php echo $widget->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $instance['subtitle'] ); ?>" />
	</p>
	<?php
}
add_action( 'apw_form_after_field_title' , '_apw_form_after_field_title', 0, 2 );


/**
 * Hook into the update() method to save custom field.
 *
 * @see APW_Widget::update()
 * 
 * @param array $instance The settings prior to saving.
 * @param array $new_instance New settings for this instance as input by the user via
 *                            APW_Widget::form().
 * @param array $old_instance Old settings for this instance.
 *
 * @return array $instance Updated settings to save.
 */
function _apw_update_instance( $instance, $new_instance, $old_instance )
{

	$instance['subtitle'] = sanitize_text_field( $new_instance['subtitle'] );

	return $instance;
}
add_filter( 'apw_update_instance', '_apw_update_instance', 0, 3);



/**
 * Output subtitle on the front end
 *
 * @param array $instance Current widget settings.
 */
function _apw_widget_title_after( $instance )
{

	if( empty( $instance['subtitle'] ) ) {
		return $instance;
	}

	$_text = $instance['subtitle'];
	
	printf( '<h4 class="widget-subtitle">%s</h4>',
		sprintf( __( '%s' ), $_text )
	);
}
add_action( 'apw_widget_title_after',  '_apw_widget_title_after' );