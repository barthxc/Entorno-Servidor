<?php
    //conexión a base de datos
    require 'require/conexion.php';
    include 'include/header.php';
?>
<?php 
    
    $id = "";    
    $primerNombre = '';    
    $segundoNombre = "";    
    $primerApellido = "";    
    $segundoApellido ="";    
    $edad = "";    
    $genero = "";    
    $email = "";   
    $telefono = "";
    global $errores;
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_valor'] == 'consulta'){
        $id=$_POST['id'];
        if(!is_numeric($id)){
            $errores[]= "El ID debe ser numérico.";
            
        }
        $sentencia = $conexion->prepare('SELECT * FROM clientes WHERE id = ?');
        $sentencia->bindParam(1, $id);
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
        $id = $resultado['id'];
        $primerNombre = $resultado['primerNombre'];
        $segundoNombre = $resultado['segundoNombre'];
        $primerApellido = $resultado['primerApellido'];
        $segundoApellido = $resultado['segundoApellido'];
        $edad = $resultado['edad'];
        $genero = $resultado['genero'];
        $email = $resultado['email'];
        $telefono = $resultado['telefono'];        
    }
 ?>

<section class="main">
    <h2>Formulario de Consulta de Cliente</h2>          
          <div class="form">
              <form action= "consultar.php" method="POST"><!--formulario para agregar clientes-->
                <input type="hidden" name="form_valor" value="consulta">
                <div class="form-group">
                    <label class="form-etiqueta" for="id">ID Cliente:</label>
                    <input class="form-input" type="number" id="id" name="id" min="0" required>
                </div>
                <div class="consulta">
                    <ul>
                        <li><span class="consulta-clave">ID:</span><?php echo'<p class="clave-valor">'.$id.'</p>' ?></li>
                        <li><span class="consulta-clave">Primer Nombre: </span><?php echo '<p class="clave-valor">'.$primerNombre.'</p>'; ?></li>
                        <li><span class="consulta-clave">Segundo Nombre: </span><?php echo '<p class="clave-valor">'.$segundoNombre.'</p>' ?></li>
                        <li><span class="consulta-clave">Primer Apellido: </span><?php echo '<p class="clave-valor">'.$primerApellido.'</p>'; ?></li>
                        <li><span class="consulta-clave">Segundo Apellido: </span><?php echo '<p class="clave-valor">'.$primerApellido.'</p>' ?></li>
                        <li><span class="consulta-clave">Edad: </span><?php echo '<p class="clave-valor">'.$edad.'</p>' ?></li>
                        <li><span class="consulta-clave">Género: </span><?php echo '<p class="clave-valor">'.$genero.'</p>' ?></li>
                        <li><span class="consulta-clave">Email: </span><?php echo '<p class="clave-valor">'.$email.'</p>' ?></li>
                        <li><span class="consulta-clave">Teléfono: </span><?php echo '<p class="clave-valor">'.$telefono.'</p>' ?></li>                      
                    </ul>
                </div>              
               <input class="boton" type="submit" value="Consultar">
               <button class="boton"><a href="http://localhost/feedback4MiguelBriceno/consultar.php">Refrescar</a></button>               
              </form>   
          </div>
          <div class="errores">
                <?php
                    if (count($errores)>0) {
                        foreach ($errores as $error) {
                            echo $error."<br>";
                        }   
                    }
                          
                ?>
         </div>
</section>
                </div>
<?php
    include 'include/footer.php';
?>