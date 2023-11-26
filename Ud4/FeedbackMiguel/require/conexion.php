<?php
    //conexión a base de datos
      //variables de conexión
      $usuario = "root";
      $contraseña ="";
      $dsn = "mysql:host=localhost:3308; dbname=feedback4";    
      try{ // manejo de errores
      $resultado = $conexion = new PDO($dsn,$usuario,$contraseña); // creada la conexion
      $conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //manejo de errores
      
      }catch(PDOException $e){
          echo "Error en la conexion: ".$e->getMessage();
      }
?>