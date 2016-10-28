<?php
/*
 * File : Archivo Partial Main Nav
 * Accion : Incluir menu principal
 */ 

wp_nav_menu(
	array(
	'menu_class'     => 'main-menu',
	'theme_location' => 'main-menu',
	'link_before' => '',
	'link_after' => '',
));