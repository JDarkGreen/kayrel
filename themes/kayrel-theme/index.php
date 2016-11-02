<?php
/*
 * Plantilla Padre Superior , mostrada como primera 
 * opción
 */

/*
 * Obtener Header
 */
get_header(); 

/*
 * Extraer Opciones del Tema
 */
$options = get_option( 'theme_settings' ); 

/*
 * Importar Template de Slider Home
 */
if(stream_resolve_include_path('partials/home/slider-home.php'))
	include('partials/home/slider-home.php');

/*
 * Importar Template de Miscelaneo
 */
if(stream_resolve_include_path('partials/home/miscelaneo.php'))
	include('partials/home/miscelaneo.php');

/*
 * Importar Template de Destacados Productos
 */
if(stream_resolve_include_path('partials/home/product-features.php'))
	include('partials/home/product-features.php');



?>


<?php 
/*
 * Obtener Footer
 */
get_footer();
