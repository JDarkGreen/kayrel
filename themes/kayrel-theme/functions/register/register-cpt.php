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
	 * Array de Custom Post Types
	 */
	$arr_cpt = array();

	/*Slider Home*/
	$arr_cpt['theme-slider-home'] = array(
		'plural_name' => 'Sliders Home',
		'name'        => 'Slider Home',
		'description' => '',
		'menu_icon'   => 'dashicons-images-alt',
	);

	/*Productos*/
	$arr_cpt['theme-products'] = array(
		'plural_name' => 'Productos',
		'name'        => 'Producto',
		'description' => 'Productos en el tema',
		'menu_icon'   => 'dashicons-cart',
	);

	/*Marcas*/
	$arr_cpt['theme-branding'] = array(
		'plural_name' => 'Marcas',
		'name'        => 'Marca',
		'description' => 'Marcas en el tema',
		'menu_icon'   => 'dashicons-groups',
	);

	/*
	 * Hacer Loop de Custom Post Types
	 */
	foreach( $arr_cpt as $cptype => $value ) :

		//Nombre
		$plural_name = $value['plural_name'];
		$name        = $value['name'];

		//Descripción
		$description = $value['description'];

		//Menu Icon / Path
		$menu_icon   = $value['menu_icon'];

		//Args 
		${'label_'.$cptype} = array(
			'name'               => __( $plural_name , LANG ),
			'singular_name'      => __( $name, LANG ),
			'add_new'            => __( 'Agregar ' . $name , LANG ),
			'add_new_item'       => __( 'Agregar nuevo ' . $name , LANG ),
			'new_item'           => __( 'Nuevo ' . $name , LANG ),
			'edit_item'          => __( 'Editar ' . $name ,  LANG ),
			'view_item'          => __( 'Ver ' . $name , LANG ),
			'all_items'          => __( 'Todos los ' . $name , LANG ),
			'search_items'       => __( 'Buscar ' . $name , LANG ),
			'parent_item_colon'  => __( $name . ' padre:', LANG ),
			'not_found'          => __( $name . ' no encontrado.', LANG ),
			'not_found_in_trash' => __( $name . ' no encontrado en la Papelera.', LANG ),
			'not_found_in_trash' => __( $name . ' no encontrado en la Papelera.', LANG )
		);

		${'args_'.$cptype} = array(
			'labels'             => ${'label_'.$cptype},
	        'description'        => __( $description , LANG ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'has_archive'        => true,
			'hierarchical'       => false,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'menu_icon'          => $menu_icon
		);
		
		//Registrar Custom Post Type
		register_post_type( $cptype , ${'args_'.$cptype} );
	
	endforeach;

}

endif;