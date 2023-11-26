<?php
include 'include/header.php';
require 'require/conexion.php'; 
require 'require/funciones.php';
?>
<?php
       
    $primerNombre="";    
    $segundoNombre= "";    
    $primerApellido= "";    
    $segundoApellido= "";    
    $edad= "";    
    $genero= "";    
    $email= "";   
    $telefono= "";
    $errores= "";
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
    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_valor'] == 'actualizar'){
        
        $id = $_POST['id'];        
        if(!is_numeric($id)){
            $errores[]= "El ID debe ser numérico.";            
        }
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
        $sentencia = $conexion->prepare('UPDATE clientes SET primerNombre = ?, segundoNombre = ?, primerApellido = ?, segundoApellido = ?,
        edad = ?, genero = ?, email = ?, telefono = ?  WHERE id = ?') ;
        $sentencia->bindParam(1, $primerNombre);
        $sentencia->bindParam(2, $segundoNombre);
        $sentencia->bindParam(3, $primerApellido);
        $sentencia->bindParam(4, $segundoApellido);
        $sentencia->bindParam(5, $edad);
        $sentencia->bindParam(6, $genero);
        $sentencia->bindParam(7, $email);
        $sentencia->bindParam(8, $telefono);
        $sentencia->bindParam(9, $id);
        $sentencia->execute();
       
    }
    catch(PDOException $e){
        echo "Error: ". $e;
    }
    }
       
 ?>

<section class="main">
    <h2>Formulario de Consulta de Cliente</h2>          
          <div class="form">
              <form action= "actualizar.php" method="POST"><!--formulario para agregar clientes-->
                <input type="hidden" name="form_valor" value="consulta">
                <div class="form-group">
                    <label class="form-etiqueta" for="id">ID Cliente:</label>
                    <input class="form-input" type="number" id="id" name="id" min="0" required>
                </div>          
               <input class="boton" type="submit" value="Consultar">
               <button class="boton"><a href="http://localhost/feedback4MiguelBriceno/actualizar.php">Refrescar</a></button>               
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
<main class="main">
        <h2>Formulario de Actualizacion de Cliente</h2>          
          <div class="form">
             <form action= "actualizar.php" method="POST"><!--formulario para agregar clientes-->
                <input type="hidden" name="form_valor" value="actualizar">
                <div class="form-group">
                    <label class="form-etiqueta" for="id">ID:</label>
                    <input class="form-input" type="number" id="id" name="id" value="<?php echo $id ?>" min= 0 readonly required>
                </div>
                <div class="form-group">
                    <label class="form-etiqueta" for="nombre">Primer Nombre:</label>
                    <input class="form-input" type="text" id="nombre" name="primerNombre" value="<?php echo $primerNombre ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-etiqueta" for="nombre">Segundo Nombre:</label>
                    <input class="form-input" type="text" id="nombre" name="segundoNombre"  value="<?php echo $segundoNombre ?>" >
                </div>         
                <div class="form-group">
                    <label class="form-etiqueta" for="apellido">Primer Apellido:</label>
                    <input class="form-input" type="text" id="apellido" name="primerApellido"  value="<?php echo $primerApellido ?>"  required>
                </div>
                <div class="form-group">
                    <label class="form-etiqueta" for="apellido">Segundo Apellido:</label>
                    <input class="form-input" type="text" id="apellido" name="segundoApellido" value="<?php echo $segundoApellido ?>">
                </div>             
                <div class="form-group">
                    <label class="form-etiqueta" for="edad">Edad:</label>
                    <input class="form-input" type="number" id="edad" name="edad" min="0" value="<?php echo $edad ?>" required>
                </div>            
                <div class="form-group">
                    <label class="form-etiqueta" for="genero">Género:</label>
                    <select class="form-input" id="genero" name="genero" value="<?php echo $genero ?>" required>
                      <option value="masculino">Masculino</option>
                      <option value="femenino">Femenino</option>
                      <option value="otro">Otro</option>
                    </select><br><br>
                </div>           
                <div class="form-group">
                    <label class="form-etiqueta" for="email">Email:</label>
                    <input class="form-input" type="email" id="email" name="email" value="<?php echo $email ?>" required>
                </div>             
                <div class="form-group">
                    <label class="form-etiqueta" for="telefono">Teléfono:</label>
                    <input class="form-input" type="tel" id="telefono" name="telefono" value="<?php echo $telefono ?>" required>
                </div>             
                <input class="boton" type="submit" value="Actualizar">
                <button class="boton"><a href="http://localhost/feedback4MiguelBriceno/actualizar.php">Refrescar</a></button>
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
</main>










<?php include 'include/footer.php';?>
   
