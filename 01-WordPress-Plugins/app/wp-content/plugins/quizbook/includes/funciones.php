<?php

function quizbook_filtrar_preguntas($llave) {
    return strpos($llave, 'qb_');
}