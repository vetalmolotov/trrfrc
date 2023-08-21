<?php
/**
 * Default theme options.
 *
 * @package WP Clean Blog
 */

if ( ! function_exists( 'clean_blog_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function clean_blog_get_default_theme_options() {

	$defaults = array();

	//General Section
	$defaults['your_latest_posts_title']			= esc_html__('Blog','wp-clean-blog');
	$defaults['excerpt_length']						= 15;
	$defaults['layout_options_blog']				= 'no-sidebar';
	$defaults['layout_options_archive']				= 'no-sidebar';
	$defaults['layout_options_page']				= 'no-sidebar';	
	$defaults['layout_options_single']				= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']					= esc_html__( '© Copyright 2023 WP Clean Blog by Crathod | All Rights Reserved.', 'wp-clean-blog' );

	// Pass through filter.
	$defaults = apply_filters( 'clean_blog_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'clean_blog_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function clean_blog_get_option( $key ) {

		$default_options = clean_blog_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;