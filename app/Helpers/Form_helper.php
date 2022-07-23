<?php
    //usamos Form_helper para mostrar los errores gestionados en Register/Login controller
    function mostrar_error($validation, $input_field) { //recibimos una instancia de validation y el nombre del campo del form a validar
        if ($validation->hasError($input_field)) { //usamos metodos de esa instancia de validation
            return $validation->getError($input_field);
        } else {
            return false;
        } 
    }

?>