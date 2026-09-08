<?php
/***********************************************************
* setup theme_customizer
***********************************************************/
function wcct_customize_register( $wp_customize ) {


	/* Logo Image
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[logo]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'control_logo',
		array(
			'label'			=> __( 'Logo image', 'welcart_basic_beldad' ),
			'section'		=> 'title_tagline',
			'settings'		=> 'basic_type_options[logo]',
			'priority'		=> 2,
			'description'	=> __( 'If the logo image has not been registered, see the site title.', 'welcart_basic_beldad' ),
		)
	) );

	/* SNS button
	------------------------------------------------------*/
	/* facebook */
	$wp_customize->add_setting( 'basic_type_options[facebook_id]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_facebook_id', array(
		'label'				=> __( 'Display facebook', 'welcart_basic_beldad' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[facebook_id]',
		'type'				=> 'text',
		'priority'			=> 131,
		'description'		=> __( 'Enter the your page name.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[facebook_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_facebook_button', array(
		'label'				=> __( 'Show facebook', 'welcart_basic_beldad' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[facebook_button]',
		'type'				=> 'checkbox',
		'priority'			=> 132,
	) );
	/* Twitter */
	$wp_customize->add_setting( 'basic_type_options[twitter_id]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_twitter_id', array(
		'label'				=> __( 'Display twitter', 'welcart_basic_beldad' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[twitter_id]',
		'type'				=> 'text',
		'priority'			=> 133,
		'description'		=> __( 'Enter the user name.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[twitter_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_twitter_button', array(
		'label'				=> __( 'Show twitter', 'welcart_basic_beldad' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[twitter_button]',
		'type'				=> 'checkbox',
		'priority'			=> 134,
	) );
	/* Instagram */
	$wp_customize->add_setting( 'basic_type_options[instagram_id]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_instagram_id', array(
		'label'				=> __( 'Display instagram', 'welcart_basic_beldad' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[instagram_id]',
		'type'				=> 'text',
		'priority'			=> 135,
		'description'		=> __( 'Enter the user name.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[instagram_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_instagram_button', array(
		'label'				=> __( 'Show instagram', 'welcart_basic_beldad' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[instagram_button]',
		'type'				=> 'checkbox',
		'priority'			=> 136,
	) );


	/* Custom Color
	------------------------------------------------------*/

	/* ———————— Common ———————— */

	/* -- Main color -- */
	$wp_customize->add_setting( 'main_color', array(
		'default'			=> '#111',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_color',
		array(
			'label'			=> __( 'Main color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'main_color',
		)
	) );
	/* -- Sub color -- */
	$wp_customize->add_setting( 'sub_color', array(
		'default'			=> '#c00',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_color',
		array(
			'label'			=> __( 'Sub color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_color',
		)
	) );
	/* -- Text color -- */
	$wp_customize->add_setting( 'text_color', array(
		'default'			=> '#111',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'text_color',
		)
	) );
	/* -- Link color -- */
	$wp_customize->add_setting( 'link_color', array(
		'default'			=> '#333',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'link_color',
		array(
			'label'			=> __( 'Link color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'link_color',
		)
	) );
	/* -- Border color -- */
	$wp_customize->add_setting( 'border_color', array(
		'default'			=> '#c1c1c4',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'border_color',
		array(
			'label'			=> __( 'Border color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'border_color',
		)
	) );

	/* ———————— Table ———————— */
	$wp_customize->add_setting( 'main_th_bg', array(
		'default'			=> '#dfdfdf',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_th_bg',
		array(
			'label'			=> __( 'heading bg', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'main_th_bg',
		)
	) );
	$wp_customize->add_setting( 'main_th_text', array(
		'default'			=> '#111',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_th_text',
		array(
			'label'			=> __( 'heading color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'main_th_text',
		)
	) );
	$wp_customize->add_setting( 'main_table_border', array(
		'default'			=> '#dfdfdf',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_table_border',
		array(
			'label'			=> __( 'Border color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'main_table_border',
		)
	) );


	/* ———————— Footer Top ———————— */

	$wp_customize->add_setting( 'foot_top_bg', array(
		'default'			=> '#eaeaeb',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_top_bg',
		array(
			'label'			=> __( 'Background color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_top_bg',
		)
	) );

	$wp_customize->add_setting( 'foot_top_text', array(
		'default'			=> '#000',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_top_text',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_top_text',
		)
	) );

	$wp_customize->add_setting( 'foot_top_link', array(
		'default'			=> '#000',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_top_link',
		array(
			'label'			=> __( 'Link color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_top_link',
		)
	) );

	$wp_customize->add_setting( 'foot_top_border', array(
		'default'			=> '#bbbbbc',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_top_border',
		array(
			'label'			=> __( 'Border color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_top_border',
		)
	) );

	/* ———————— Footer Top Table ———————— */

	$wp_customize->add_setting( 'foot_th_bg', array(
		'default'			=> '#dfdfdf',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_th_bg',
		array(
			'label'			=> __( 'heading bg', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_th_bg',
		)
	) );
	$wp_customize->add_setting( 'foot_th_text', array(
		'default'			=> '#111',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_th_text',
		array(
			'label'			=> __( 'heading color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_th_text',
		)
	) );
	$wp_customize->add_setting( 'foot_table_border', array(
		'default'			=> '#dfdfdf',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_table_border',
		array(
			'label'			=> __( 'Border color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_table_border',
		)
	) );

	/* ———————— Footer Bottom ———————— */

	$wp_customize->add_setting( 'foot_bottom_bg', array(
		'default'			=> '#171717',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_bottom_bg',
		array(
			'label'			=> __( 'Background color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_bottom_bg',
		)
	) );

	$wp_customize->add_setting( 'foot_bottom_text', array(
		'default'			=> '#ccc',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'foot_bottom_text',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'foot_bottom_text',
		)
	) );


	/* ———————— Products ———————— */

	$wp_customize->add_setting( 'cart_button_bg', array(
		'default'			=> '#000',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'cart_button_bg',
		array(
			'label'			=> __( 'Background color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'cart_button_bg',
		)
	) );

	$wp_customize->add_setting( 'cart_button_text', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'cart_button_text',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'cart_button_text',
		)
	) );

	$wp_customize->add_setting( 'price_color', array(
		'default'			=> '#000',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'price_color',
		array(
			'label'			=> __( 'Price color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'price_color',
		)
	) );

	/* -- tag -- */
	$wp_customize->add_setting( 'opt_new', array(
		'default'			=> '#c00',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_new',
		array(
			'label'			=> __( 'New tag color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_new',
		)
	) );
	$wp_customize->add_setting( 'opt_reco', array(
		'default'			=> '#4eb6a5',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_reco',
		array(
			'label'			=> __( 'Recommend tag color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_reco',
		)
	) );
	$wp_customize->add_setting( 'opt_stock', array(
		'default'			=> '#4e9fb6',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_stock',
		array(
			'label'			=> __( 'Stock tag color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_stock',
		)
	) );
	$wp_customize->add_setting( 'opt_sale', array(
		'default'			=> '#a64eb6',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_sale',
		array(
			'label'			=> __( 'Sale tag color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_sale',
		)
	) );

	$wp_customize->add_setting( 'campaign_text', array(
		'default'			=> '#c00',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'campaign_text',
		array(
			'label'			=> __( 'Campaign color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'campaign_text',
		)
	) );

	$wp_customize->add_setting( 'soldout_bg', array(
		'default'			=> '#000',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'soldout_bg',
		array(
			'label'			=> __( 'Background color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'soldout_bg',
		)
	) );
	$wp_customize->add_setting( 'soldout_text', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'soldout_text',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'soldout_text',
		)
	) );


	/* ———————— Icon,Tag,Button ———————— */

	/* -- Main Button -- */

	/* -- Bg -- */
	$wp_customize->add_setting( 'main_button_bg', array(
		'default'			=> '#000',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_button_bg',
		array(
			'label'			=> __( 'Background color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'main_button_bg',
		)
	) );
	/* -- Text -- */
	$wp_customize->add_setting( 'main_button_text', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_button_text',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'main_button_text',
		)
	) );

	/* -- Sub Button1 -- */

	/* -- Color -- */
	$wp_customize->add_setting( 'sub_button1_color', array(
		'default'			=> '#000',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_button1_color',
		array(
			'label'			=> __( 'Button color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_button1_color',
		)
	) );
	/* -- Bg -- */
	$wp_customize->add_setting( 'sub_button1_bg', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_button1_bg',
		array(
			'label'			=> __( 'Background color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_button1_bg',
		)
	) );

	/* -- Sub Button2 -- */

	/* -- Bg -- */
	$wp_customize->add_setting( 'sub_button2_bg', array(
		'default'			=> '#ddd',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_button2_bg',
		array(
			'label'			=> __( 'Background color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_button2_bg',
		)
	) );
	/* -- Text -- */
	$wp_customize->add_setting( 'sub_button2_text', array(
		'default'			=> '#333',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_button2_text',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_button2_text',
		)
	) );

	/* -- Nav Icon -- */
	$wp_customize->add_setting( 'nav_icon', array(
		'default'			=> '#555',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'nav_icon',
		array(
			'label'			=> __( 'Navigation color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'nav_icon',
		)
	) );

	$wp_customize->add_setting( 'holiday_color', array(
		'default'			=> '#fff0d1',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'holiday_color',
		array(
			'label'			=> __( 'Holiday color', 'welcart_basic_beldad' ),
			'section'		=> 'colors',
			'settings'		=> 'holiday_color',
		)
	) );


	/* Page Loading
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[page_loading]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_page_loading', array(
		'label'				=> __( 'Use the page loading function', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[page_loading]',
		'type'				=> 'checkbox',
	) );
	
	/* Fixed Header
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[fixed_header]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_fixed_header', array(
		'label'				=> __( 'Fixed display of header', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[fixed_header]',
		'type'				=> 'checkbox',
	) );
	
	
	/* Top Page
	------------------------------------------------------*/

	$wp_customize->add_setting( 'basic_type_options[display_top_sidebar]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_top_sidebar', array(
		'label'				=> __( 'display of sidebar', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_top_sidebar]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_front_page',
		'description'		=> __( 'The widget installed on Sidebar1 will be displayed', 'welcart_basic_beldad' ),
	) );
	
	$wp_customize->add_setting( 'basic_type_options[display_h_item_slide]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_h_item_slide', array(
		'label'				=> __( 'Slideshow' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_h_item_slide]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_front_page',
		'priority'			=>  122,
	) );

	/* --------- item widget --------- */

	$wp_customize->add_setting( 'basic_type_options[display_widget_slide]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_widget_slide', array(
		'label'				=> __( 'Slideshow' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_widget_slide]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_front_page',
		'priority'			=>  123,
	) );


	/* Position of Sidebar
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[sidebar]', array(
		'default'			=> 'left-set',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_sidebar', array(
		'label'				=> __( 'Sidebar position', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[sidebar]',
		'type'				=> 'radio',
		'choices'			=> array(
								'right-set' => __( 'Right sidebar', 'welcart_basic_beldad' ),
								'left-set'  => __( 'Left sidebar', 'welcart_basic_beldad' ),
							),
		'active_callback'	=> 'callback_is_twocolumn',
		'description'		=> __( 'Please select the position where you want to display.', 'welcart_basic_beldad' ),
	) );

	/* Display items
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_soldout]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_soldout', array(
		'label'				=> __( 'Display the Soldout', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_soldout]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemlist',
		'priority'			=> 150,
	) );
	$wp_customize->add_setting( 'basic_type_options[display_inquiry]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_inquiry', array(
		'label'				=> __( 'Display the inquiry text', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_inquiry]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_display_inquiry',
		'priority'			=> 151,
	) );
	$wp_customize->add_setting( 'basic_type_options[display_inquiry_text]', array(
		'default'			=> __( 'Contacting this item', 'welcart_basic_beldad' ),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_display_inquiry_text', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_inquiry_text]',
		'type'				=> 'text',
		'active_callback'	=> 'callback_display_inquiry',
		'priority'			=> 152,
		'description'		=> __( 'Enter the message you want to display.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[display_produt_tag]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_produt_tag', array(
		'label'				=> __( 'Display the produt tag', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_produt_tag]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemlist',
		'priority'			=> 153,
	) );


	/* Home Information
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_info]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_info', array(
		'label'				=> __( 'Display information' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_info]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'is_front_page',
		'priority'			=>  154,
	) );
	$wp_customize->add_setting( 'basic_type_options[info_cat]', array(
		'default'			=> wcct_get_info_default(),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'info_cat', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[info_cat]',
		'type'   			=> 'select',
		'choices' 			=> wcct_get_info_categories(),
		'active_callback'	=> 'callback_display_info',
		'priority'			=> 155,
		'description'		=> __( 'Please select a category to be displayed.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[info_num]', array(
		'default'    => 1,
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'info_num', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[info_num]',
		'type'				=> 'number',
		'input_attrs'		=> array( 'min' => '1' ),
		'active_callback'	=> 'callback_display_info',
		'priority'			=> 156,
		'description'		=> __( 'Please select a display number.', 'welcart_basic_beldad' ),
	));


	/* Home Topics
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_topics]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_topics', array(
		'label'				=> __( 'Display topics' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_topics]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'is_front_page',
		'priority'			=>  160,
	) );
	$wp_customize->add_setting( 'basic_type_options[topics_cat]', array(
		'default'			=> wcct_get_info_default(),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );	
	$wp_customize->add_control( 'topics_cat', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[topics_cat]',
		'type'   			=> 'select',
		'choices' 			=> wcct_get_info_categories(),
		'active_callback'	=> 'callback_display_topics',
		'priority'			=> 161,
		'description'		=> __( 'Please select a category to be displayed.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[topics_num]', array(
		'default'    => 5,
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'topics_num', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[topics_num]',
		'type'				=> 'number',
		'input_attrs'		=> array( 'min' => '1' ),
		'active_callback'	=> 'callback_display_topics',
		'priority'			=> 162,
		'description'		=> __( 'Please select a display number.', 'welcart_basic_beldad' ),
	));


	/* Home Product Category
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_cat]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_cat', array(
		'label'				=> __( 'Display product categories' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_cat]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'is_front_page',
		'priority'			=>  170,
	) );
	$wp_customize->add_setting( 'basic_type_options[display_cat_title]', array(
		'default'			=> 'Category',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'display_cat_title', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_cat_title]',
		'type'				=> 'text',
		'active_callback'	=> 'callback_display_cat',
		'priority'			=> 171,
		'description'		=> __( 'Please enter title', 'welcart_basic_beldad' ),
	) );


	$wp_customize->add_setting( 'basic_type_options[display_cat_slide]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_cat_slide', array(
		'label'				=> __( 'Slideshow' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_cat_slide]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_display_cat',
		'priority'			=>  172,
	) );


	/* Home Pickup
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_pickup]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_pickup', array(
		'label'				=> __( 'Display pickup' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_pickup]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'is_front_page',
		'priority'			=>  180,
	) );
	$wp_customize->add_setting( 'basic_type_options[pickup_cat]', array(
		'default'			=> wcct_get_info_default(),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );	
	$wp_customize->add_control( 'pickup_cat', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[pickup_cat]',
		'type'   			=> 'select',
		'choices' 			=> wcct_get_info_categories(),
		'active_callback'	=> 'callback_display_pickup',
		'priority'			=> 181,
		'description'		=> __( 'Please select a category to be displayed.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[pickup_num]', array(
		'default'    => 3,
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'pickup_num', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[pickup_num]',
		'type'				=> 'number',
		'input_attrs'		=> array( 'min' => '1' ),
		'active_callback'	=> 'callback_display_pickup',
		'priority'			=> 182,
		'description'		=> __( 'Please select a display number.', 'welcart_basic_beldad' ),
	));
	$wp_customize->add_setting( 'basic_type_options[display_pickup_slide]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_pickup_slide', array(
		'label'				=> __( 'Slideshow' , 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_pickup_slide]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_display_pickup',
		'priority'			=>  183,
	) );


	/* Name change of the cart button
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[cart_button]', array(
		'default'			=> __( 'Add to Shopping Cart', 'usces' ),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_cart_button', array(
		'label'				=> __( 'The cart button', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[cart_button]',
		'type'				=> 'text',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 190,
	) );

	/* Display Zaiko Status
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_zaiko_text]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_zaiko_text', array(
		'label'				=> __( 'Display inventory status', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_zaiko_text]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 191,
	) );


	/* Sold Out Text
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_soldout_text]', array(
		'default'			=> __( 'At present we cannot deal with this product.', 'welcart_basic' ),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_display_soldout_text', array(
		'label'				=> __( 'Display when sold out', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_soldout_text]',
		'type'				=> 'text',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 192,
		'description'		=> __( 'Please set the text.', 'welcart_basic_beldad' ),
	) );
	
	/* Display the inquiry button
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[inquiry_link_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_inquiry_link_button', array(
		'label'				=> __( 'Display the inquiry button', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[inquiry_link_button]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 193,
	) );
	$wp_customize->add_setting( 'basic_type_options[inquiry_link]', array(
		'default'			=> 0,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_inquiry_link', array(
		'label'				=> __( 'The inquiry button', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[inquiry_link]',
		'type'				=> 'dropdown-pages',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 194,
		'description'		=> __( 'Please select the destination of the inquiry destination.', 'welcart_basic_beldad' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[inquiry_text]', array(
		'default'			=> __( 'Inquiries about this product', 'welcart_basic_beldad' ),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_inquiry_text', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[inquiry_text]',
		'type'				=> 'text',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 195,
		'description'		=> __( 'Please set the text.', 'welcart_basic_beldad' ),
	) );


	/* Displays the reviews
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[review]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_review', array(
		'label'				=> __( 'Show product reviews', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[review]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 200,
	) );


	/* The continue shopping button
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[continue_shopping_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_continue_shopping_button', array(
		'label'				=> __( 'Change the destination link', 'welcart_basic_beldad' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[continue_shopping_button]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_cartpage',
		'priority'			=> 210,
	) );
	$wp_customize->add_setting( 'basic_type_options[continue_shopping_url]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url',
	) );
	$wp_customize->add_control( 'control_continue_shopping_url', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[continue_shopping_url]',
		'type'				=> 'url',
		'active_callback'	=> 'callback_continue_shopping',
		'priority'			=> 211,
		'description'		=> __( 'Destination URL', 'welcart_basic_beldad' ),
	) );


	/* Sanitize
	------------------------------------------------------*/
	function wcct_sanitize_checkbox( $input ) {
		if ( $input == true ) {
			return true;
		} else {
			return false;
		}
	}


	/* Callback
	------------------------------------------------------*/
	function callback_is_twocolumn() {
		return !is_front_page() && !is_home() && !welcart_basic_is_cart_page() && !welcart_basic_is_member_page() && !( is_single() && usces_is_item() );
	}
	function callback_display_info( $control ) {
		if( !is_front_page() && !is_home() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[display_info]' )->value() )
			return true;
	}
	function callback_display_topics( $control ) {
		if( !is_front_page() && !is_home() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[display_topics]' )->value() )
			return true;
	}
	function callback_display_cat( $control ) {
		if( !is_front_page() && !is_home() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[display_cat]' )->value() )
			return true;
	}
	function callback_is_cartpage() {
		return welcart_basic_is_cart_page();
	}
	function callback_display_pickup( $control ) {
		if( !is_front_page() && !is_home() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[display_pickup]' )->value() )
			return true;
	}
	function callback_is_itemlist() {
		return is_front_page() || is_home() || is_archive() || is_search();
	}
	function callback_is_itemsingle() {
		return is_single() && usces_is_item();
	}
	function callback_display_inquiry( $control ) {
		if( !is_front_page() && !is_home() && !is_archive() && !is_search() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[display_soldout]' )->value() )
			return true;
	}
	function callback_continue_shopping( $control ) {
		if( !welcart_basic_is_cart_page() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[continue_shopping_button]' )->value() )
			return true;
	}

}
add_action( 'customize_register', 'wcct_customize_register' );


/* Customizer CSS
------------------------------------------------------*/
function wcct_customize_css() {
	if( 'customize.php' == basename( $_SERVER['PHP_SELF'] ) ) {
		?>
<style type="text/css">
#customize-control-main_color:before {
	content: "<?php _e( 'Entire site', 'welcart_basic_beldad' ); ?>";
}
#customize-control-main_th_bg:before {
	content: "<?php _e( 'Table', 'welcart_basic_beldad' ); ?>";
}
#customize-control-main_table_border:after {
	content: "<?php _e( 'Footer', 'welcart_basic_beldad' ); ?>";
}
#customize-control-foot_top_bg:before {
	content: "<?php _e( 'Top', 'welcart_basic_beldad' ); ?>";
}
#customize-control-foot_top_border:after {
	content: "<?php _e( 'Table', 'welcart_basic_beldad' ); ?>";
}
#customize-control-foot_bottom_bg:before {
	content: "<?php _e( 'Bottom', 'welcart_basic_beldad' ); ?>";
}
#customize-control-foot_bottom_text:after {
	content: "<?php _e( 'Item', 'welcart_basic_beldad' ); ?>";
}
#customize-control-cart_button_bg:before {
	content: "<?php _e( 'Cart button', 'welcart_basic_beldad' ); ?>";
}
#customize-control-opt_new:before {
	content: "<?php _e( 'Product Tag', 'welcart_basic_beldad' ); ?>";
}
#customize-control-opt_sale:after {
	content: "<?php _e( 'Item List', 'welcart_basic_beldad' ); ?>";
}
#customize-control-soldout_bg:before {
	content: "<?php _e( 'Sold out Display', 'welcart_basic_beldad' ); ?>";
}
#customize-control-soldout_text:after {
	content: "<?php _e( 'Other', 'welcart_basic_beldad' ); ?>";
}
#customize-control-main_button_bg:before {
	content: "<?php _e( 'Main Button', 'welcart_basic_beldad' ); ?>";
}
#customize-control-sub_button1_color:before {
	content: "<?php _e( 'Sub Button1', 'welcart_basic_beldad' ); ?>";
}
#customize-control-sub_button2_bg:before {
	content: "<?php _e( 'Sub Button2', 'welcart_basic_beldad' ); ?>";
}	
	
#customize-control-h_itemcat:before {
	content: "<?php _e( 'Top Page Item List', 'welcart_basic_beldad' ); ?>";
}
#customize-control-control_display_widget_slide:before {
	content: "<?php _e( 'Item Widget', 'welcart_basic_beldad' ); ?>";
}
#customize-control-control_display_soldout:before {
	content: "<?php _e( 'Item', 'welcart_basic_beldad' ); ?>";	
}
#customize-control-control_display_info:before {
	content: "<?php _e( 'Information', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_display_topics:before {
	content: "<?php _e( 'Topics', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_display_cat:before {
	content: "<?php _e( 'Product Categories', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_display_pickup:before {
	content: "<?php _e( 'Pickup', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_page_loading:before {
	content: "<?php _e( 'Entire site', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_fixed_header:before {
	content: "<?php _e( 'Header', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_display_top_sidebar:before {
	content: "<?php _e( 'TopPage', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_sidebar:before {
	content: "<?php _e( 'Sidebar', 'welcart_basic_beldad' ); ?>";		
}
#customize-control-control_cart_button:before {
	content: "<?php _e( 'Item detail', 'welcart_basic_beldad' ); ?>";
}
#customize-control-control_continue_shopping_button:before {
	content: "<?php _e( 'Cart', 'welcart_basic_beldad' ); ?>";		
}

</style>
		<?php
	}
}
add_action( 'admin_print_styles' , 'wcct_customize_css' );

/***********************************************************
* Display theme option
***********************************************************/
function wcct_get_options( $key = '' ) {
	if( empty( $key ) )
		return;

	$options = get_option( 'basic_type_options' );

	if( !is_admin() ) {
		if( !isset( $options['logo'] ) ) $options['logo'] = '';
		if( !isset( $options['facebook_id'] ) ) $options['facebook_id'] = '';
		if( !isset( $options['facebook_button'] ) ) $options['facebook_button'] = false;
		if( !isset( $options['twitter_id'] ) ) $options['twitter_id'] = '';
		if( !isset( $options['twitter_button'] ) ) $options['twitter_button'] = false;
		if( !isset( $options['instagram_id'] ) ) $options['instagram_id'] = '';
		if( !isset( $options['instagram_button'] ) ) $options['instagram_button'] = false;

		if( !isset( $options['page_loading'] ) ) $options['page_loading'] = true;
		if( !isset( $options['fixed_header'] ) ) $options['fixed_header'] = false;
		if( !isset( $options['display_top_sidebar'] ) ) $options['display_top_sidebar'] = false;
		if( !isset( $options['sidebar'] ) ) $options['sidebar'] = 'left-set';

		if( !isset( $options['display_h_item_slide'] ) ) $options['display_h_item_slide'] = false;

		if( !isset( $options['display_info'] ) ) $options['display_info'] = false;
		if( !isset( $options['info_cat'] ) ) $options['info_cat'] = wcct_get_info_default();
		if( !isset( $options['info_num'] ) ) $options['info_num'] = 1;
		if( !isset( $options['display_topics'] ) ) $options['display_topics'] = false;
		if( !isset( $options['topics_cat'] ) ) $options['topics_cat'] = wcct_get_info_default();
		if( !isset( $options['topics_num'] ) ) $options['topics_num'] = 5;
		if( !isset( $options['display_cat'] ) ) $options['display_cat'] = false;
		if( !isset( $options['display_cat_title'] ) ) $options['display_cat_title'] = 'Category';
		if( !isset( $options['display_cat_slide'] ) ) $options['display_cat_slide'] = false;
		if( !isset( $options['display_pickup'] ) ) $options['display_pickup'] = false;
		if( !isset( $options['pickup_cat'] ) ) $options['pickup_cat'] = wcct_get_info_default();
		if( !isset( $options['pickup_num'] ) ) $options['pickup_num'] = 3;
		if( !isset( $options['display_pickup_slide'] ) ) $options['display_pickup_slide'] = false;

		if( !isset( $options['display_soldout'] ) ) $options['display_soldout'] = true;
		if( !isset( $options['display_inquiry'] ) ) $options['display_inquiry'] = true;
		if( !isset( $options['display_inquiry_text'] ) ) $options['display_inquiry_text'] = __( 'Contacting this item' , 'welcart_basic_beldad' );
		if( !isset( $options['display_produt_tag'] ) ) $options['display_produt_tag'] = true;
		
		if( !isset( $options['cart_button'] ) ) $options['cart_button'] = __( 'Add to Shopping Cart', 'usces' );		
		if( !isset( $options['display_zaiko_text'] ) ) $options['display_zaiko_text'] = false;
		if( !isset( $options['display_soldout_text'] ) ) $options['display_soldout_text'] = __( '只今お取扱い出来ません' , 'welcart_basic_beldad' );
		if( !isset( $options['inquiry_text'] ) ) $options['inquiry_text'] = __( 'この商品に関するお問い合わせ' , 'welcart_basic_beldad' );
		if( !isset( $options['review'] ) ) $options['review'] = false;

		if( !isset( $options['continue_shopping_button'] ) ) $options['continue_shopping_button'] = false;
		if( !isset( $options['continue_shopping_url'] ) ) $options['continue_shopping_url'] = '';

	}

	if( empty( $options[$key] ) )
		return;

	return $options[$key];
}
function wcct_options( $key = '' ) {
	echo wcct_get_options( $key );
}

/***********************************************************
* Information Select & Default
***********************************************************/
function wcct_get_info_categories() {
	$target_arg		= array(
						'exclude_tree'	=>	usces_get_cat_id( 'item' ),
					);
	$target_terms	= get_terms( 'category', $target_arg );
	$info_terms		= array();

	foreach( $target_terms as $term ) {
		$info_terms[ $term->slug ] = $term->name;
	}

	return $info_terms;
}
function wcct_get_info_default() {
	$info_terms = wcct_get_info_categories();
	reset( $info_terms );
	return key( $info_terms );
}

/***********************************************************
* RGB Color
***********************************************************/
function wcct_rgb($hex) {
	$hex = str_replace("#", "", $hex);
	
	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);

	return $rgb;
}


/***********************************************************
* Custom Color
***********************************************************/

function wcct_customizer_footer_styles() {


	/* Common ------------------------------------------------------*/

	$main_color				= get_theme_mod( 'main_color', '#111' );
	$main_color_rgba		= 'rgba( ' . implode( ", ", wcct_rgb( $main_color ) ) . ', .6 )';

	$sub_color				= get_theme_mod( 'sub_color', '#c00' );

	$text_color				= get_theme_mod( 'text_color', '#111' );
	$text_color_rgba		= 'rgba( ' . implode( ", ", wcct_rgb( $text_color ) ) . ', .7 )';

	$link_color				= get_theme_mod( 'link_color', '#333' );
	$link_color_rgba		= 'rgba( ' . implode( ", ", wcct_rgb( $link_color ) ) . ', .6 )';

	$border_color			= get_theme_mod( 'border_color', '#c1c1c4' );
	$border_color_rgba		= 'rgba( ' . implode( ", ", wcct_rgb( $border_color ) ) . ', .4 )';
	$border_color_rgba2		= 'rgba( ' . implode( ", ", wcct_rgb( $border_color ) ) . ', .2 )';

	$main_table_border		= get_theme_mod( 'main_table_border', '#dfdfdf' );
	$main_th_bg				= get_theme_mod( 'main_th_bg', '#dfdfdf' );
	$main_th_text			= get_theme_mod( 'main_th_text', '#111' );
	$holiday_color			= get_theme_mod( 'holiday_color', '#fff0d1' );



	/* Header ------------------------------------------------------*/

	/* Footer ------------------------------------------------------*/


	/* -------- Top -------- */

	$foot_top_bg			= get_theme_mod( 'foot_top_bg', '#eaeaeb' );
	$foot_top_text			= get_theme_mod( 'foot_top_text', '#000' );
	$foot_top_link			= get_theme_mod( 'foot_top_link', '#000' );
	$foot_top_border		= get_theme_mod( 'foot_top_border', '#bbbbbc' );
	$foot_table_border		= get_theme_mod( 'foot_table_border', '#dfdfdf' );
	$foot_th_bg				= get_theme_mod( 'foot_th_bg', '#dfdfdf' );
	$foot_th_text			= get_theme_mod( 'foot_th_text', '#111' );


	/* -------- Bottom -------- */

	$foot_bottom_bg			= get_theme_mod( 'foot_bottom_bg', '#171717' );
	$foot_bottom_text		= get_theme_mod( 'foot_bottom_text', '#ccc' );
	$foot_bottom_rgba		= 'rgba( ' . implode( ", ", wcct_rgb( $foot_bottom_text ) ) . ', .6 )';


	/* Products ------------------------------------------------------*/

	$cart_button_bg			= get_theme_mod( 'cart_button_bg', '#000' );
	$cart_button_rgba		= 'rgba( ' . implode( ", ", wcct_rgb( $cart_button_bg ) ) . ', .6 )';
	$cart_button_text		= get_theme_mod( 'cart_button_text', '#fff' );
	$price_color			= get_theme_mod( 'price_color', '#000' );

	$opt_new				= get_theme_mod( 'opt_new', '#c00' );
	$opt_reco				= get_theme_mod( 'opt_reco', '#4eb6a5' );
	$opt_stock				= get_theme_mod( 'opt_stock', '#4e9fb6' );	
	$opt_sale				= get_theme_mod( 'opt_sale', '#a64eb6' );

	$campaign_text			= get_theme_mod( 'campaign_text', '#c00' );

	$soldout_bg				= get_theme_mod( 'soldout_bg', '#000' );
	$soldout_bg_rgba		= 'rgba( ' . implode( ", ", wcct_rgb( $soldout_bg ) ) . ', .4 )';
	$soldout_text			= get_theme_mod( 'soldout_text', '#fff' );


	/* Icon,Tag,Button ------------------------------------------------------*/


	/* -------- Button -------- */

	/* -- Main Button -- */
	$main_button_bg				= get_theme_mod( 'main_button_bg', '#000' );
	$main_button_rgba			= 'rgba( ' . implode( ", ", wcct_rgb( $main_button_bg ) ) . ', .6 )';
	$main_button_text			= get_theme_mod( 'main_button_text', '#fff' );

	/* -- Sub Button1 -- */
	$sub_button1_color			= get_theme_mod( 'sub_button1_color', '#000' );
	$sub_button1_bg				= get_theme_mod( 'sub_button1_bg', '#fff' );

	/* -- Sub Button2 -- */
	$sub_button2_bg				= get_theme_mod( 'sub_button2_bg', '#ddd' );
	$sub_button2_rgba			= 'rgba( ' . implode( ", ", wcct_rgb( $sub_button2_bg ) ) . ', .6 )';
	$sub_button2_text			= get_theme_mod( 'sub_button2_text', '#333' );


	/* -------- Icon -------- */

	$nav_icon					= get_theme_mod( 'nav_icon', '#555' );
	$nav_icon_rgba				= 'rgba( ' . implode( ", ", wcct_rgb( $nav_icon ) ) . ', .6 )';


?>
<style type="text/css">


	/* =Common
	-------------------------------------------------------------- */


	/* -------- Text Color -------- */

	/* -- Color -- */
	body {
		color: <?php echo $text_color; ?>;
	}
	.pickup-area .excerpt,
	.layout-list .list .excerpt {
		color: <?php echo $text_color; ?>;
	}
	#site-navigation ul.sub-menu a:before {
		background-color: <?php echo $text_color; ?>;
	}


	/* -------- Link Color -------- */

	a,
	#memberinfo #history_head td.retail a {
		color: <?php echo $link_color; ?>;
	}
	a:hover,
	#memberinfo #history_head td.retail a  {
		color: <?php echo $link_color_rgba; ?>;
	}


	/* -------- Border Color -------- */

	textarea,
	select,
	input[type="text"],
	input[type="password"],
	input[type="email"],
	input[type="tel"],
	input[type="search"],
	input[type="url"],
	#dlseller_terms .dlseller_terms,
	#cart_table td.quantity input,
	.widget_welcart_login input.loginmail,
	.widget_welcart_login input.loginpass,
	#site-navigation li,
	#site-navigation ul li:first-child,
	.sub-navigation,
	.sub-navigation li a,
	#searchform .s-box,
	.layout-list .list,
	.info-list .list,
	#secondary section,
	.page-header,
	.entry-header,
	.entry-meta span.date,
	.entry-meta span,
	.pagination-wrap.top,
	.widget_welcart_category li .children,
	.widget_categories .children,
	.widget_nav_menu .sub-menu,
	.usces_recent_entries ul,
	.widget_welcart_page ul,
	.widget_pages ul,
	.widget_archive ul,
	.widget_welcart_post ul,
	.widget_meta ul,
	.widget_recent_entries ul,
	.widget_recent_comments ul,
	.pagination-wrap.top ul.page-numbers,
	.item-header,
	.item-info .skuform,
	.date .item-info .skuform,
	.item-info #wc_regular,
	#wc_reviews,
	.wc_reviewlist li,
	.wc_reviewlist .children li,
	.wc_reviewlist .children:before,
	.item-info .item-sku th,
	.item-info .item-sku td,
	.item-info .item-sku tbody tr th,
	.item-info .item-sku th:last-child,
	.item-info .item-sku td:last-child,
	#point_table td input[type="text"],
	#secondary .widget_wcex_olwidget td,
	.widget_wcex_olwidget td {
		border-color: <?php echo $border_color; ?>;
	}
	.widget_welcart_category li li a:before,
	.widget_categories li li a:before,
	.widget_nav_menu li li a:before,
	.usces_recent_entries li a:before,
	.widget_welcart_page li a:before,
	.widget_pages li a:before,
	.widget_archive li a:before,
	.widget_welcart_post li a:before,
	.widget_meta li a:before,
	.widget_recent_entries li a:before,
	.widget_recent_comments li a:before,
	div.cart_navi li:after,
	#cart_table tfoot tr,
	#info-confirm #cart_table tfoot tr:first-child {
		background-color: <?php echo $border_color; ?>;
	}
	.review-author:before {
		background-color: <?php echo $border_color; ?>;
	}
	.sub-navigation li a,
	div.cart_navi ul:before,
	#wc_reviews-title {
		background-color: <?php echo $border_color_rgba; ?>;
	}
	#searchform,
	#show,
	.widget_welcart_calendar td.businesstoday,
	.welcart_blog_calendar td#today,
	.widget_calendar td#today {
		background-color: <?php echo $border_color_rgba2; ?>;
	}


	/* -------- Main Color -------- */

	/* -- Bg -- */
	.h-column .iconbtn,
	.flex-control-paging li a.flex-active,
	#toTop a,
	.section-head,
	.single-related h2,
	.assistance_item h3,
	.flex-control-paging li a:hover,
	div.cart_navi li.current:after,
	#info-confirm #cart_table tfoot tr:last-child {
		background-color: <?php echo $main_color; ?>;
	}
	.h-column .iconbtn:hover,
	#toTop a:hover {
		background-color: <?php echo $main_color_rgba; ?>;
	}

	#info-confirm .confiem_notice,
	#customer-info h5 {
		color: <?php echo $main_color; ?>;
		border-color: <?php echo $main_color; ?>;
	}

	/* -- Color -- */
	h1.site-title a,
	div.site-title a {
		color: <?php echo $main_color; ?>;
	}
	#loader {
		color: <?php echo $main_color_rgba; ?>;
	}

	/* -- Border -- */
	header .bottom,
	#secondary,
	#secondary h3,
	.common-guide-widget h2,
	.assistance_item h3 {
		border-color: <?php echo $main_color; ?>;
	}

	/* -------- Sub Color -------- */

	/* -- Bg -- */
	.info-area .info-cat,
	.incart .total-quant {
		background-color: <?php echo $sub_color; ?>;
	}
	.item-info #wc_regular .wcr_tlt {
		border-color: <?php echo $sub_color; ?>;
	}
	/* -- Color + Border -- */
	.item-info .field_frequency {
		color: <?php echo $sub_color; ?>;
		border-color: <?php echo $sub_color; ?>;
	}


	/* -------- Table Color -------- */

	.widget_calendar th,
	.welcart_blog_calendar th,
	.widget_welcart_calendar th,
	#confirm_table th,
	#confirm_table tr.ttl td,
	#point_table td.c-point,
	#point_table td.u-point,
	#cart #coupon_table tr:first-child td:first-child,
	#memberinfo #history_head th,
	#memberinfo .retail th,
	.widgetcart th.item,
	.widgetcart th.quant,
	.widgetcart th.price,
	.widgetcart th.trush,
	.item-info .item_custom_field th,
	#wc_regular table th,
	#itempage table.dlseller th,
	.entry-content th,
	.item-description th,
	.skuform .itemGpExp dt {
		background-color: <?php echo $main_th_bg; ?>;
		color: <?php echo $main_th_text; ?>;
	}
	.widget_calendar th,
	.widget_calendar td,
	.welcart_blog_calendar th,
	.welcart_blog_calendar td,
	.widget_welcart_calendar th,
	.widget_welcart_calendar td,
	#cart_table tbody tr,
	#cart_table tfoot tr,
	.customer_form tr,
	#delivery_flag tr:first-child,
	#point_table td,
	#cart #coupon_table td,
	#confirm_table th,
	#confirm_table td,
	#memberinfo .user-block th,
	#memberinfo .user-block td,
	#wc_member_msa table,
	#wc_member_msa table th,
	#wc_member_msa table td,
	#memberinfo .retail tr,
	#memberinfo #history_head tr,
	#wc_autodelivery_history #memberinfo table,
	#wc_autodelivery_history #memberinfo table th,
	#wc_autodelivery_history #memberinfo table td,
	.widgetcart td.widgetcart_item,
	.widgetcart td.widgetcart_quant,
	.widgetcart td.widgetcart_price,
	.widgetcart td.widgetcart_trush,
	.item-info .item_custom_field th,
	.item-info .item_custom_field td,
	#wc_regular table th,
	#wc_regular table td,
	#itempage table.dlseller th,
	#itempage table.dlseller td,
	.entry-content th,
	.entry-content td,
	.item-description th,
	.item-description td,
	.skuform .itemGpExp {
		border-color: <?php echo $main_table_border; ?>;
	}
	.widget_calendar td a,
	.widget_welcart_calendar .businessday,
	.f-widgetArea .widget_welcart_calendar .businessday {
		background-color: <?php echo $holiday_color; ?>;
	}
	.widget_calendar td#prev a,
	.widget_calendar td#next a {
		background: none;
	}


	/* =Footer
	-------------------------------------------------------------- */

	/* -------- Top -------- */

	/* -- bg + text -- */
	footer {
		background-color: <?php echo $foot_top_bg; ?>;
		color: <?php echo $foot_top_text; ?>;
	}
	/* -- link -- */
	footer a {
		color: <?php echo $foot_top_link; ?>;
	}
	/* -- border -- */
	.f-subnav li,
	.f-subnav li:first-child,
	.f-widgetArea,
	.f-widgetArea .widget,
	.f-subnav {
		border-color: <?php echo $foot_top_border; ?>;
	}

	.f-widgetArea .widget_calendar th,
	.f-widgetArea .welcart_blog_calendar th,
	.f-widgetArea .widget_welcart_calendar th {
		background-color: <?php echo $foot_th_bg; ?>;
		color: <?php echo $foot_th_text; ?>;
	}
	.f-widgetArea .widget_calendar th, 
	.f-widgetArea .widget_calendar td, 
	.f-widgetArea .welcart_blog_calendar th, 
	.f-widgetArea .welcart_blog_calendar td, 
	.f-widgetArea .widget_welcart_calendar th, 
	.f-widgetArea .widget_welcart_calendar td {
		border-color: <?php echo $foot_table_border; ?>;
	}



	/* -------- Bottom -------- */
	
	footer .bottom {
		background-color: <?php echo $foot_bottom_bg; ?>;
	}
	footer .bottom,
	footer .bottom a {
		color: <?php echo $foot_bottom_text; ?>;
	}
	footer .bottom a:hover {
		color: <?php echo $foot_bottom_rgba; ?>;
	}
	.sns {
		border-left-color: <?php echo $foot_bottom_text; ?>;
	}


	/* =Products
	-------------------------------------------------------------- */

	/* -- button -- */
	.skuform .skubutton {
		background-color: <?php echo $cart_button_bg; ?>;
		color: <?php echo $cart_button_text; ?>;
	}
	.skuform .skubutton:hover {
		background-color: <?php echo $cart_button_rgba; ?>;
	}

	/* -------- Opt Tag -------- */
	.opt-tag li.new {
		color: <?php echo $opt_new; ?>;
		border-color: <?php echo $opt_new; ?>;
	}
	.opt-tag li.recommend {
		color: <?php echo $opt_reco; ?>;
		border-color: <?php echo $opt_reco; ?>;
	}
	.opt-tag li.sale {
		color: <?php echo $opt_sale; ?>;
		border-color: <?php echo $opt_sale; ?>;
	}
	.opt-tag li.stock {
		color: <?php echo $opt_stock; ?>;
		border-color: <?php echo $opt_stock; ?>;
	}
	.opt-tag li.free-shipping {
		color: #fff;
		border-color: #c00;
		background: #c00;
	}


	/* --------- Campaign Text --------- */

	.product-list .campaign_message,
	.widget .campaign_message,
	#itempage .campaign_message {
		color: <?php echo $campaign_text; ?>;
		border-color: <?php echo $campaign_text; ?>;
	}


	/* --------- Bg --------- */
	
	/* -- Sold Out -- */
	.product-list .itemsoldout,
	.assistance_item .itemsoldout,
	.home-widget .widget_welcart_featured .itemsoldout,
	.home-widget .widget_basic_item_list .itemsoldout,
	.home-widget .widget_welcart_bestseller .itemsoldout {
		background-color: <?php echo $soldout_bg_rgba; ?>;
	}


	/* --------- Color ---------- */

	/* -- Sold Out -- */
	.product-list .itemsoldout .text,
	.assistance_item .itemsoldout .text,
	.home-widget .widget_welcart_featured .itemsoldout .text,
	.home-widget .widget_basic_item_list .itemsoldout .text,
	.home-widget .widget_welcart_bestseller .itemsoldout .text {
		color: <?php echo $soldout_text; ?>;
	}

	/* -- Price -- */
	em,
	.product-list .price,
	#secondary .widget_basic_item_list .itemprice,
	#secondary .widget_welcart_bestseller .itemprice,
	#secondary .widget_welcart_featured .itemprice,
	.widget_basic_item_list .itemprice,
	.widget_welcart_bestseller .itemprice,
	.widget_welcart_featured .itemprice,
	.skuform .field_price,
	.skuform .itemGpExp .price,
	.assistance_item .itemprice,
	#cart_table .discount_price,
	#cart_table .point_price,
	#cart_table tfoot th.amount {
		color: <?php echo $price_color; ?>;
	}



	/* =Nav,Icon,Button,Table
	-------------------------------------------------------------- */


	/* -------- Button -------- */

	/* -- Main Button -- */

	.widget_welcart_login input#member_loginw,
	.widget_welcart_login input#member_login,
	.widget_welcart_search #searchsubmit,
	.widgetcart #wdgctToCheckout a,
	#wc_reviews .reviews_btn a,
	.send input.to_customerinfo_button,
	.send input.to_memberlogin_button,
	.send input.to_deliveryinfo_button,
	.send input.to_confirm_button,
	.send input#purchase_button,
	#wc_customer .send input.to_reganddeliveryinfo_button,
	#wc_login .loginbox #member_login,
	#wc_member .loginbox #member_login,
	#wc_login .loginbox .new-entry #nav a,
	#wc_member .loginbox .new-entry #nav a,
	.member-page .send input,
	#wc_lostmemberpassword #member_login,
	#wc_changepassword #member_login,
	.entry-content input[type="submit"],
	.item-description input[type="submit"] {
		background-color: <?php echo $main_button_bg; ?>;
		color: <?php echo $main_button_text; ?>;
	}
	.widget_welcart_login input#member_loginw:hover,
	.widget_welcart_login input#member_login:hover,
	.widget_welcart_search #searchsubmit:hover,
	.widgetcart #wdgctToCheckout a:hover,
	#wc_reviews .reviews_btn a:hover,
	.send input.to_customerinfo_button:hover,
	.send input.to_memberlogin_button:hover,
	.send input.to_deliveryinfo_button:hover,
	.send input.to_confirm_button:hover,
	.send input#purchase_button:hover,
	#wc_customer .send input.to_reganddeliveryinfo_button:hover,
	#wc_login .loginbox #member_login:hover,
	#wc_member .loginbox #member_login:hover,
	#wc_login .loginbox .new-entry #nav a:hover,
	#wc_member .loginbox .new-entry #nav a:hover,
	.member-page .send input:hover,
	#wc_lostmemberpassword #member_login:hover,
	#wc_changepassword #member_login:hover,
	.entry-content input[type="submit"]:hover,
	.item-description input[type="submit"]:hover {
		background-color: <?php echo $main_button_rgba; ?>;
	}

	/* -- Sub Button1 -- */
	ul.page-numbers li a,
	.widgetcart #wdgctToCart a,
	.item-info .contact-item a,
	#wc_cart #cart .upbutton input,
	#cart .action input.delButton,
	.customer_form input#search_zipcode,
	.msa_field_block #search_zipcode,
	.membership li a,
	#wc_lostmemberpassword #nav a,
	#point_table td input.use_point_button,
	#cart #coupon_table td .use_coupon_button {
		background-color: <?php echo $sub_button1_bg; ?>;
		color: <?php echo $sub_button1_color; ?>;
		border-color: <?php echo $sub_button1_color; ?>;
	}
	ul.page-numbers li a:hover,
	ul.page-numbers li span,
	.widgetcart #wdgctToCart a:hover,
	.item-info .contact-item a:hover,
	#wc_cart #cart .upbutton input:hover,
	#cart .action input.delButton:hover,
	.customer_form input#search_zipcode:hover,
	.msa_field_block #search_zipcode:hover,
	.membership li a:hover,
	#wc_lostmemberpassword #nav a:hover,
	#point_table td input.use_point_button:hover,
	#cart #coupon_table td .use_coupon_button:hover {
		background-color: <?php echo $sub_button1_color; ?>;
		color: <?php echo $sub_button1_bg; ?>;
	}
	ul.page-numbers li span.page-numbers.dots {
		color: <?php echo $sub_button1_color; ?>;
	}

	/* -- Sub Button2 -- */
	input[type="button"],
	input[type="submit"],
	input[type="reset"],
	.widget_welcart_search div a,
	#wc_newcompletion #memberpages p a,
	#wc_lostcompletion #memberpages p a,
	#wc_changepasscompletion #memberpages p a,
	#wc_newcompletion .send a,
	#wc_lostcompletion .send input,
	#wc_lostcompletion .send a,
	#wc_changepasscompletion .send a,
	#wc_ordercompletion .send a,
	.member_submenu a,
	#wc_autodelivery_history #memberpages .send input,
	.member-page #memberinfo .send input.top,
	.member-page #memberinfo .send input.deletemember {
		background-color: <?php echo $sub_button2_rgba; ?>;
		color: <?php echo $sub_button2_text; ?>;
	}
	input[type="button"]:hover,
	input[type="submit"]:hover,
	input[type="reset"]:hover,
	.widget_welcart_search div a:hover,
	#wc_newcompletion #memberpages p a:hover,
	#wc_lostcompletion #memberpages p a:hover,
	#wc_changepasscompletion #memberpages p a:hover,
	#wc_newcompletion .send a:hover,
	#wc_lostcompletion .send input:hover,
	#wc_lostcompletion .send a:hover,
	#wc_changepasscompletion .send a:hover,
	#wc_ordercompletion .send a:hover,
	.member_submenu a:hover,
	#wc_autodelivery_history #memberpages .send input:hover,
	.member-page #memberinfo .send input.top:hover,
	.member-page #memberinfo .send input.deletemember:hover {
		background-color: <?php echo $sub_button2_bg; ?>;
	}


	/* -------- Nav Icon -------- */

	/* -- Color -- */
	#searchform .searchsubmit,
	.slick-prev:hover:before,
	.slick-next:hover:before,
	.flex-direction-nav a:hover
	.flex-direction-nav a:hover:before {
		color: <?php echo $nav_icon; ?>;
	}
	#searchform .searchsubmit:hover,
	.slick-prev:before,
	.slick-next:before,
	.flex-direction-nav a,
	.flex-direction-nav a:before {
		color: <?php echo $nav_icon_rgba; ?>;
	}

	/* -- #show -- */
	#show .layout li.grid,
	#show .layout li.list {
		background-color: <?php echo $nav_icon_rgba; ?>;
	}
	#show .layout li.grid:hover,
	#show .layout li.list:hover,
	#show .layout li.current {
		background-color: <?php echo $sub_button1_color; ?>;
	}


	/* -- Bg -- */
	.flex-control-paging li a {
		background-color: <?php echo $nav_icon_rgba; ?>;
	}



	/* =Other
	-------------------------------------------------------------- */

	.entry-content h2 {
		background-color: <?php echo $border_color_rgba2; ?>;
		border-color: <?php echo $main_color; ?>;
	}
	.item-description h2 {
		border-color: <?php echo $main_color; ?>;
	}
	.entry-content h4,
	.item-description h4 {
		background-color: <?php echo $border_color_rgba2; ?>;
	}

	.item-info .itemsoldout {
		background-color: <?php echo $sub_button2_rgba; ?>;
		color: <?php echo $text_color; ?>;
	}

	#wgct_alert.update_box,
	#wgct_alert.completion_box {
		color: <?php echo $text_color; ?>;
		background-color: #fff;
		box-shadow: 2px 2px 3px 3px rgba(204,204,204,.4);
	}


	/**
	 * 16.2 Tablet Small 740px
	 */
	@media screen and (min-width: 46.25em) {


		/* -------- Border Color -------- */

		.customer_form th,
		.customer_form td,
		#memberinfo .customer_form th,
		#memberinfo .customer_form td {
			border-color: <?php echo $border_color; ?>;
		}


	}


	/**
	 * 16.3 Tablet Large 880px
	 */
	@media screen and (min-width: 55em) {


		/* -------- Border Color -------- */

		.common-parts {
			background-color: <?php echo $border_color_rgba2; ?>;
		}
		#searchform {
			background: none;
		}


	}


	/**
	 * 16.4 Desktop Small 1000px
	 */
	@media screen and (min-width: 62.5em) {


		/* -------- Text Color -------- */

		#site-navigation li a {
			color: <?php echo $text_color; ?>;
		}

		/* -------- Main Color -------- */

		/* -- Bg -- */
		.section-head {
			background: none;
		}
		#site-navigation li.current-menu-parent a,
		#site-navigation li.current_page_item a,
		#site-navigation li.current-menu-item a,
		#site-navigation li a:before {
			background-color: <?php echo $main_color; ?>;
		}
		#site-navigation li.current-menu-parent a {
			color: #fff;
		}

		#site-navigation ul.sub-menu {
			background-color: <?php echo $main_color_rgba; ?>;
		}

		/* -- Title -- */
		.section-head,
		.page-header,
		#secondary h3 {
			color: <?php echo $main_color; ?>;
			border-color: <?php echo $main_color; ?>;
		}

		/* -------- Other -------- */

		.sub-navigation li a {
			background: none;
		}


	}


</style>
<?php
}
add_action( 'wp_footer', 'wcct_customizer_footer_styles' );

