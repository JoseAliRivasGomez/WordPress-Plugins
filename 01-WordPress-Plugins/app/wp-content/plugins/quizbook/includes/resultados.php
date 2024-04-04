<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function quizbook_resultados() {

    if(isset( $_POST['data'] ) ) {
        $respuestas = wp_unslash( $_POST['data'] );
        array();
    }
   
    $resultado = 0;
   
    foreach($respuestas as $respuesta) {
        $pregunta = explode(':', $respuesta);
   
        /*
         * $pregunta[0] = post_id
         * $pregunta[1] = respuesta usuario
         */
        $correcta = get_post_meta($pregunta[0], 'quizbook_correcta');
   
        /*
         * $letra_correcta[0] = qb_correcta
         * $letra_correcta[1] = Respuesta número correcto del backend
         */
        $letra_correcta = explode(':', $correcta[0]);
   
        if($letra_correcta[1] === $pregunta[1]) {
            $resultado += 10;
        }
    }
    $total_examen = array(
            'total' => $resultado,
    );
   
   header("Content-type: application/json");
   echo json_encode($total_examen) ;
   die();

}
 add_action('wp_ajax_nopriv_quizbook_resultados', 'quizbook_resultados');
 add_action('wp_ajax_quizbook_resultados', 'quizbook_resultados');