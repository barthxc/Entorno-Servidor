<?php
    
    require 'require/conexion.php';
    require 'require/funciones.php';
    global $errores;
    $errores = [];
    if(($_SERVER['REQUEST_METHOD'] === 'POST') && ($_POST['form_valor'] == 'registro')){
            $primerNombre = $_POST['primerNombre'];
            $segundoNombre = $_POST['segundoNombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $edad = $_POST['edad'];
            $genero = $_POST['genero'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
             //validar los campos
             validarStringNovacio($primerNombre, $errores, 'Primer Nombre');
             validarStringVacio($segundoNombre, $errores, 'Segundo Nombre');
             validarStringNovacio($primerApellido, $errores, 'Primer Apellido');        
             validarStringVacio($segundoApellido, $errores, 'Segundo Apellido');
             validarEdad($edad, $errores, 'Edad');
             validarGenero($genero, $errores, 'Género');
             validar_email($email, $errores, 'Email');
             validarTelefono($telefono, $errores, 'Teléfono');
             try{
                 $sentencia = $conexion->prepare("INSERT INTO clientes(primerNombre,
                 segundoNombre, primerApellido, segundoApellido, edad, genero, email, telefono) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                 $sentencia->bindParam(1, $primerNombre);
                 $sentencia->bindParam(2, $segundoNombre);
                 $sentencia->bindParam(3, $primerApellido);
                 $sentencia->bindParam(4, $segundoApellido);
                 $sentencia->bindParam(5, $edad);
                 $sentencia->bindParam(6, $genero);
                 $sentencia->bindParam(7, $email);
                 $sentencia->bindParam(8, $telefono);
                 $sentencia->execute();
                

             }
             catch(PDOException $e){
                 echo "Error: ". $e;
             }
 
         }    
 
 ?>
 <?php
    include 'include/header.php';
 ?>
<main class="main">
    <h2>Formulario de Registro de Cliente</h2>          
          <div class="form">
              <form action= "registrar.php" method="POST"><!--formulario para agregar clientes-->
                <input type="hidden" name="form_valor" value="registro">
                <div class="form-group">
                    <label class="form-etiqueta" for="nombre">Primer Nombre:</label>
                    <input class="form-input" type="text" id="nombre" name="primerNombre" required>
                </div>
                <div class="form-group">
                    <label class="form-etiqueta" for="nombre">Segundo Nombre:</label>
                    <input class="form-input" type="text" id="nombre" name="segundoNombre">
                </div>         
                <div class="form-group">
                    <label class="form-etiqueta" for="apellido">Primer Apellido:</label>
                    <input class="form-input" type="text" id="apellido" name="primerApellido" required>
                </div>
                <div class="form-group">
                    <label class="form-etiqueta" for="apellido">Segundo Apellido:</label>
                    <input class="form-input" type="text" id="apellido" name="segundoApellido">
                </div>             
                <div class="form-group">
                    <label class="form-etiqueta" for="edad">Edad:</label>
                    <input class="form-input" type="number" id="edad" name="edad" min="0" required>
                </div>            
                <div class="form-group">
                    <label class="form-etiqueta" for="genero">Género:</label>
                    <select class="form-input" id="genero" name="genero" required>
                      <option value="masculino">Masculino</option>
                      <option value="femenino">Femenino</option>
                      <option value="otro">Otro</option>
                    </select><br><br>
                </div>           
                <div class="form-group">
                    <label class="form-etiqueta" for="email">Email:</label>
                    <input class="form-input" type="email" id="email" name="email" required>
                </div>             
                <div class="form-group">
                    <label class="form-etiqueta" for="telefono">Teléfono:</label>
                    <input class="form-input" type="tel" id="telefono" name="telefono" required>
                </div>             
                <input class="boton" type="submit" value="Registrar">
              </form>            
              <div class="errores">
                    <?php
                    if (count($errores)>0) {
                        foreach ($errores as $error) {
                            echo $error."<br>";
                        }   
                    }
                          
                    ?>
              </div>
          </div><!--finaliza clase form-->
      </main><!--finaliza clase main-->
<?php
    include 'include/footer.php';
?>