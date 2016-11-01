<?php  
/*
 * Contiene los metabox que serán utilizados por sus respectivos 
 * tipos de post como post , páginas , etc.
 */


/*
 * Metabox de Orden
 */
if( stream_resolve_include_path('/../metabox/mb_order_posts.php') )
	include('/../metabox/mb_order_posts.php');


/******************************************************************/
/*- HOME */
/******************************************************************/

/**[ INCLUIR METABOX DE REVOLUTION EFFECT ]**/
if( stream_resolve_include_path('/../metabox/home/mb_revolution_slider.php') )
	include("/../metabox/home/mb_revolution_slider.php");
