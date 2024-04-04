<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

// [quizbook_examen preguntas="" orden="" id=""]
function quizbook_examen_shortcode( $atts ) {
    $post_id =  (int) $atts['id'];
    
    $preguntas = get_post_meta($post_id, 'quizbook_examen', true );
    
    $preguntas_id = maybe_unserialize($preguntas);
    
    $args = array(
        'post_type' => 'quizes',
        'post__in' => $preguntas_id,
        'posts_per_page' => $atts['preguntas'],
        'orderby' =>  $atts['orden']
    );
    $quizbook = new WP_Query($args); ?>
    <form name="quizbook_enviar" id="quizbook_enviar">
        <div id="quizbook" class="quizbook">
            <ul>
            <?php while($quizbook->have_posts()): $quizbook->the_post(); ?>
                <li data-pregunta="<?php echo get_the_ID(); ?>">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    
                    <?php $opciones = get_post_meta(get_the_ID()  ); 

                            foreach($opciones as $key => $opcion):
                                $resultado = quizbook_filtrar_preguntas($key);
                                unset($resultado['qb_correcta']);
                                $numero = explode('_', $key);
                                
                                if($resultado === 0) { ?>
                                    <div id="<?php echo get_the_ID() . ":" . $numero[2]; ?>" class=" respuesta ">
                                            <?php echo $opcion[0]; ?>
                                    </div>
                                <?php } 
                            endforeach;
                    ?>
                    
                    
                </li>

            <?php endwhile; ?>
            </ul>
        </div> <!--#quizbook-->
        
        <input type="submit" value="Enviar" id="quizbook_btn_submit">
        
        <div id="quizbook_resultado"></div>
    </form><!--form-->
    <?php wp_reset_postdata();
    
}
add_shortcode( 'quizbook_examen', 'quizbook_examen_shortcode' );

