<?php
/*
 * Theme KAYREL THEME funciones y definiciones
 *
 * Configurar el tema y proporciona algunas funciones auxiliares , que se utilizan en el
 * Tema como etiquetas de plantillas personalizadas . Otros están unidos a la acción y el filtro
 * Ganchos en WordPress para cambiar la funcionalidad básica .
 *
 * Cuando se utiliza un tema niño puede anular ciertas funciones (aquellos envueltos
 * En un function_exists ( ) llamada) definiéndolos por primera vez en su tema del niño
 * Archivo functions.php . archivo functions.php del tema de los niños está incluido antes
 * Archivo del tema de los padres , por lo que se utilizarían las funciones de temas niño.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

/*
 * Opciones del tema
 */

$options = get_option("theme_settings");


/*
 * Definiendo Constantes
 */
require('functions/constants.php');

/* ---------------------------------------------------
 * LIMPIANDO CODIGO INNECESARIO
 *---------------------------------------------------*/

if( stream_resolve_include_path('functions/code/clean-code.php') )
	include('functions/code/clean-code.php');


/* ---------------------------------------------------
 * CONFIGURACIÓN EN EL TEMA
 *---------------------------------------------------*/

/*--------------------------------------------
 * Registrar Menús
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/register/register-menu.php') )
  include('functions/register/register-menu.php');
