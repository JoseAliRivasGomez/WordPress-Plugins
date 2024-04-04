<?php
/*
Plugin Name:  Quiz Book
Plugin URI:
Description:  Plugin para añadir Quizes o Cuestionarios con opción múltiple
Version:      1.0
Author:       Juan Pablo De la torre
Author URI:
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  quizbook
*/

require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
register_activation_hook(__FILE__, 'quizbook_rewrite_flush');   

require_once plugin_dir_path(__FILE__) . 'includes/metaboxes.php';

require_once plugin_dir_path(__FILE__) . 'includes/roles.php';
register_activation_hook( __FILE__, 'quizbook_crear_role' );
register_deactivation_hook( __FILE__, 'quizbook_remover_role' );
register_activation_hook( __FILE__, 'quizbook_agregar_capabilities' );
register_deactivation_hook( __FILE__, 'quizbook_remover_capabilities' );

require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

require_once plugin_dir_path(__FILE__) . 'includes/funciones.php';

require_once plugin_dir_path(__FILE__) . 'includes/scripts.php';

require_once plugin_dir_path(__FILE__) . 'includes/resultados.php';