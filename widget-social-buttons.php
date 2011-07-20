<?php

/*-----------------------------------------------------------------------------------

 	Plugin Name: Social Buttons Widget
 	Plugin URI: https://github.com/tansey/social-buttons.git
 	Description: A widget that displays your social buttons
 	Version: 1.0
 	Author: Wesley Tansey
 	Author URI: http://wesleytansey.com
 
-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'social_buttons_widgets' );

// Register widget
function social_buttons_widgets() {
	register_widget( 'Social_Buttons_Widget' );
}

// Widget class
class Social_Buttons_Widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function Social_Buttons_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'social-buttons',
		'description' => 'A widget that displays your social buttons.'
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'social-buttons-widget'
	);

	/* Create the widget. */
	$this->WP_Widget( 'social-buttons-widget', 'Social Buttons Widget', $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$twitter = $instance['twitter'];
	$facebook = $instance['facebook'];
	$linkedin = $instance['linkedin'];


	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title && $title !== '' )
		echo $before_title . $title . $after_title;

	$basedir = get_bloginfo('stylesheet_directory');
	
	echo '<div style="padding:0 0 20px 0; margin-top:-20px;">';

	// Display Twitter button
	if( $twitter && $twitter !== '' )
		echo '<a href="' . $twitter . '" style="margin: 5px;" target="_blank"><img src="' . $basedir . '/images/twitter_32.png" width="32" height="32" alt="Twitter"/></a>';

	// Display Facebook button
	if( $facebook && $facebook !== '' )
		echo '<a href="' . $facebook . '" style="margin: 5px;" target="_blank"><img src="' . $basedir . '/images/facebook_32.png" width="32" height="32" alt="Facebook"/></a>';

	// Display LinkedIn button
	if( $linkedin && $linkedin !== '' )
		echo '<a href="' . $linkedin . '" style="margin: 5px;" target="_blank"><img src="' . $basedir . '/images/linkedin_32.png" width="32" height="32" alt="LinkedIn"/></a>';
	
	echo '</div>';

	// After widget (defined by theme functions file)
	echo $after_widget;
	
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML (important for text inputs)
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['twitter'] = strip_tags( $new_instance['twitter']);
	$instance['facebook'] = strip_tags( $new_instance['facebook']);
	$instance['linkedin'] = strip_tags( $new_instance['linkedin']);

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => '',
		'twitter' => '',
		'facebook' => '',
		'linkedin' => ''
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
	</p>

	<!-- Twitter Account: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Twitter:</label>
		<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" style="width:100%;" />
	</p>

	<!-- Facebook Account: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook:</label>
		<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" style="width:100%;" />
	</p>

	<!-- LinkedIn Account: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">LinkedIn:</label>
		<input id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" style="width:100%;" />
	</p>
		
	<?php
	}
}
?>