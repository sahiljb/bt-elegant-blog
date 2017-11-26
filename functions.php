<?php
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'wp_enqueue_scripts', 'bt_elegant_blog_enqueue_scripts' );

function bt_elegant_blog_enqueue_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), false, all );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), false, all );
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css', array(), false, all );
	wp_enqueue_script( 'jquery-3', get_template_directory_uri().'/js/jquery.js', array(), '3.2.1', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.min.js', array(), false, true );
}

add_action( 'tgmpa_register', 'bt_elegant_blog_register_required_plugins' );

function bt_elegant_blog_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
	);
	$config = array(
		'id'           => 'bt-elegant-blog',
		'default_path' => '',
		'menu'         => 'bt-elegant-blog-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);
	tgmpa( $plugins, $config );
}