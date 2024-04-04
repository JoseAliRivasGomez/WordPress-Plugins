<?php
/*
Plugin Name: Quizbook Examenes
Plugin URI: 
Description: Añade la posibilidad de crear examenes
Version: 1.0
Author: Juan Pablo De la torre Valdez
Author URI: 
Text Domain: quizbook
*/
   
function quizbook_examen_revisar() {
    if(!function_exists( 'quizbook_post_type' ) ) {
        deactivate_plugins(plugin_basename(__FILE__));
        
        add_action( 'admin_notices', 'quizbook_error_activar' );
    } 
}
add_action('admin_init', 'quizbook_examen_revisar');

function quizbook_error_activar() {
    $class = 'notice notice-error';
    $message = __( 'Un Error ocurrió! Necesitas Instalar el Plugin Quiz.', 'sample-text-domain' );

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}

/*
* Registrar Post Types
*/
require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
register_activation_hook(__FILE__, 'quizbook_examenes_rewrite_flush'); 

// en el root del plugin.
/*
 * Agrega Roles y Permisos a Quizbook Examen
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/roles.php';
register_activation_hook( __FILE__, 'quizbook_examenes_agregar_capabilities' );
register_deactivation_hook( __FILE__, 'quizbook_examenes_remover_capabilities' );

require_once plugin_dir_path(__FILE__) . 'includes/metaboxes.php';

require_once plugin_dir_path(__FILE__) . 'includes/scripts.php';

require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

require_once plugin_dir_path(__FILE__) . 'includes/columnas.php';