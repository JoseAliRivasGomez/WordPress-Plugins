<?php


// Agregar una nueva columna
function views_column($defaults) {
    $defaults['shortcode'] = 'Shortcode';
    return $defaults;
}
add_filter('manage_examenes_posts_columns', 'views_column');

// Valor a Mostrar
function display_views($column_name) {
    if($column_name === 'shortcode') {
        $examen_id = get_the_ID();
                echo "[quizbook_examen preguntas='' orden='' id='$examen_id']";
    }
}
add_action('manage_examenes_posts_custom_column','display_views',5,2);
        
    