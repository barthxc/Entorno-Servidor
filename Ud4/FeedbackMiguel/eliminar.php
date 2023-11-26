<?php
    //conexión a base de datos
    require 'require/conexion.php';
    require 'include/header.php';
?>
<?php 
    $id="";
    $exito = false;
    global $errores;
    $errores = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_valor'] == 'eliminar'){
        $id=$_POST['id'];
        if(!is_numeric($id)){
            $errores[]= "El ID debe ser numérico.";            
        }
        $sentencia = $conexion->prepare('SELECT * FROM clientes WHERE id = ?');
        $sentencia->bindParam(1, $id);
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
        if($resultado){
        $sentencia = $conexion->prepare('DELETE FROM clientes WHERE id = ?');
        $sentencia->bindParam(1, $_POST['id']);
        $exito=$sentencia->execute();
        }else{
            $errores[]= 'EL cliente número de ID: '.$id.' no se encuentra.';
           
           
        }
    }
 ?>

<section class="main">
    <h2>Formulario para Eliminar Cliente</h2>          
          <div class="form">
              <form action= "eliminar.php" method="POST"><!--formulario para agregar clientes-->
                <input type="hidden" name="form_valor" value="eliminar">
                <div class="form-group">
                    <label class="form-etiqueta" for="id">ID Cliente:</label>
                    <input class="form-input" type="number" id="id" name="id" min="0" required>
                </div>
               
               <input class="boton" type="submit" value="Eliminar">
               <button class="boton"><a href="http://localhost/feedback4MiguelBriceno/eliminar.php">Refrescar</a></button>             
              </form>   
          </div>
          <div>
            <?php
                if($exito){ echo '<h4>EL cliente número de ID: '.$id.' se ha eliminado con exito.</h4>';}
                 
                
            ?>
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