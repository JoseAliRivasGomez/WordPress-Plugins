

(function($) {
    $('#quizbook ul li .respuesta').on('click', function() {
        $(this).siblings().removeClass('seleccionada');
        $(this).siblings().removeAttr('seleccionada', false);
        $(this).addClass('seleccionada');
        $(this).attr('seleccionada', true);
    });

    $('#quizbook_enviar').on('submit', function(e) {
        e.preventDefault();
     
        var preguntas = jQuery('#quizbook ul li');
     
        var respuestas = [];
     
        $.each(preguntas, function(key, value) {
            var id_preguntas = $(value).attr('data-pregunta');
     
            var resultado = jQuery('[data-pregunta='+id_preguntas+'] [seleccionada]').prop('id');
     
            respuestas.push(resultado);
     
        });
     
        var datos = {
            action: 'quizbook_resultados',
            respuesta: respuestas
        }

        $.ajax({
            url: admin_url.ajax_url,
            type: 'post',
            data: datos
        }).done(function(respuesta) {
            var clase;
            if(respuesta.total > 60) {
                clase = 'aprobado';
            } else {
                clase = 'noaprobado'
            }
            $('#quizbook_resultado').append("Total: "+ respuesta.total).addClass(clase);
            $('#quizbook_btn_submit').remove();
        });

    });

 })(jQuery);