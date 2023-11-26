<?php
     function validarStringNovacio($valor, &$errores, $campo ){
        // quitamos espacios en blanco al principio y al final
        //verificamos que no este vacío
        $valor = trim($valor);
        //verificamos que no este vacío
        if(empty($valor)){
            $errores[] = "El campo {$campo} no debe estar vacío.";
        }
        //verificar que cumpla con los caracteres aceptados y tambien se valida que tenga 1 o mas caracteres
        elseif(!preg_match( '/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9 ]+$/', $valor )){
           
            $errores[] = "El campo {$campo} solo acepta letras y números.";
        }
    }
    function validarStringVacio($valor, &$errores, $campo ){
        // quitamos espacios en blanco al principio y al final
        //verificamos que no este vacío
       if(!empty($valor)){ $valor = trim($valor);
        //verificar que cumpla con los caracteres aceptados y tambien se valida que tenga 1 o mas caracteres
        if(!preg_match( '/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9 ]+$/', $valor )){
           
            $errores[] = "El campo {$campo} solo acepta letras y números.";
        }}
    }    
    function validarEdad($edad, &$errores, $campo) {
        if (!filter_var($edad, FILTER_VALIDATE_INT)) {
        $errores[] = "El campo $campo debe ser un número entero.";
         } else if ($edad < 0 || $edad > 120) {
        $errores[] = "El campo $campo debe estar entre 0 y 120.";
        }
    }
    function validarTelefono($valor, &$errores, $campo){
        // quitamos espacios en blanco al principio y al final el numero sera un string
        $valor = str_replace(" ", "", strval($valor));
        //verificamos que no este vacío
        if(empty($valor)){
            $errores[]="El campo de teléfono no debe estar vacio";
        }
        elseif(!preg_match('/^\+\d{11,}$/', $valor)){
            $errores[]="El campo {$campo} solo acepta letras y números";
        }
    }
    function validar_email($email, &$errores, $campo){
        if(!empty($email)){
            $resultado = filter_var($email, FILTER_VALIDATE_EMAIL);
            if($resultado){
                 list($user, $domain) = explode('@', $email);
                $resultado = checkdnsrr($domain, 'MX');
            }
             return $resultado;
            }else{
                $errores[] = "El campo {$campo} es obligatorio";                
            }
    }
    function validarGenero($genero, &$errores, $campo) {
        $opcionesValidas = array("masculino", "femenino", "otro");
        if (!in_array($genero, $opcionesValidas)) {
            $errores[] = "El campo $campo debe ser masculino, femenino u otro.";
        }
    }
    ?>