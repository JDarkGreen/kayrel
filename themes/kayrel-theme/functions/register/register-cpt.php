<?php  
/* 
 * Template muestra o contiene los 
 * custom post type del tema 
 */

add_action( 'init', 'register_custom_post_types' );

if( !function_exists('register_custom_post_types') ):

function register_custom_post_types()
{

	/*
     * Slider Home
	 */
	$labels_slider_home = array(
		'name'               => __( 'Sliders Home', LANG ),
		'singular_name'      => __( 'Slider Home', LANG ),
		'add_new'            => __( 'Agregar Slider Home', LANG ),
		'add_new_item'       => __( 'Agregar nuevo Slider Home', LANG ),
		'new_item'           => __( 'Nuevo Slider Home', LANG ),
		'edit_item'          => __( 'Editar Slider Home', LANG ),
		'view_item'          => __( 'Ver Slider Home', LANG ),
		'all_items'          => __( 'Todos los Slider Home', LANG ),
		'search_items'       => __( 'Buscar Slider Home', LANG ),
		'parent_item_colon'  => __( 'Slider Home padre:', LANG ),
		'not_found'          => __( 'Slider Home no encontrado.', LANG ),
		'not_found_in_trash' => __( 'Slider Home no encontrado en la Papelera.', LANG )
	);

	$args_slider_home = array(
		'labels'             => $labels_slider_home,
        'description'        => __( 'Description.', LANG ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'menu_icon'          => 'dashicons-images-alt'
	);

	register_post_type( 'theme-slider-home' , $args_slider_home );

}


endif;