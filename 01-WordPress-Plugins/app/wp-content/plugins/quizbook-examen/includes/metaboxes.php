<?php
/*
    * 
    * Añade los Metaboxes para los Examenes.
    */
if ( ! defined( 'ABSPATH' ) ) exit; 

function quizbook_examen_agregar_metaboxes(){
    // Agrega el Metabox en el Post Type de Quizes
    
    add_meta_box( 'quizbook_examen_meta_box', 'Preguntas Examen', 'quizbook_examen_metaboxes', 'examenes', 'normal', 'high', null );
}
add_action( 'add_meta_boxes', 'quizbook_examen_agregar_metaboxes' );
    
function quizbook_examen_metaboxes($post) {
    wp_nonce_field(basename(__FILE__), 'quizbook_examen_nonce');
?>
<table class="form-table">
    <tr>
        <th class="row-title" colspan="2">
            <h2>Selecciona las respuestas que se incluyen en este examen</h2>
        </th>
    </tr>
    
    
    <tr>
        <th class="row-title">
            <label>Seleccione de la lista.</label>
        </th>
        <td>
                <?php
                $args = array(
                        'post_type' => 'quizes',
                        'posts_per_page' => -1,
                );
                $posts = get_posts($args);
                
                if($posts): 

                $seleccionadas = maybe_unserialize(   get_post_meta($post->ID, 'quizbook_examen', true  ) );   ?>
                <select data-placeholder="Elige las preguntas" class="chosen-select large-text" multiple tabindex="4" name="quizbook_examen[]">
                    <option value=""></option>
                    <?php foreach($posts as $post):
                        
                        if($seleccionadas){ ?>
                            <option <?php echo in_array($post->ID, $seleccionadas  ) ? 'selected' : ''; ?>  value="<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></option>
                        <?php } 
                    
                    endforeach; ?>
                </select>

            <?php else:
                echo "<p>Antes de Comenzar, añade preguntas en Quizes.</p>";
            endif; wp_reset_postdata()?>
        </td>
    </tr> 
</table>

<?php
}

function quizbook_examen_guardar_metaboxes($post_id, $post, $update) {
    if(!isset($_POST['quizbook_examen_nonce']) || !wp_verify_nonce( $_POST['quizbook_examen_nonce'], basename(__FILE__)  ) )
        return $post_id;
    
    if(!current_user_can('edit_post', $post_id))
        return $post_id;
    
    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
    
    
    $respuestas = '';
    $arreglo_respuestas = array();
    
    if(isset($_POST['quizbook_examen'])) {
        $respuestas =  $_POST['quizbook_examen'] ;
        
        foreach($respuestas as $respuesta):
            $arreglo_respuestas[] =  sanitize_text_field($respuesta);
        endforeach;
    }
    update_post_meta($post_id, 'quizbook_examen', maybe_serialize( $arreglo_respuestas ) );
}
    
add_action('save_post', 'quizbook_examen_guardar_metaboxes', 10, 3);