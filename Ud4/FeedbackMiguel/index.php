<?php 
   //conexión a base de datos
    require 'require/conexion.php';
    require 'include/header.php';
?>   
        <?php if($resultado) echo '<h4>¡Conexión Establecida!</h4>'; ?>
        <section class="listado"><!-- Sección de listar la base de datos read-->
        <h2>Listado de Clientes</h2>
        <div class='tabla'><!--lista de clientes-->           
      <!--     PHP    -->
<?php //consulta de la lista y listar
            try{ // manejo de errores
                    $sentencia = $conexion->prepare("SELECT * FROM clientes");
                    $sentencia->execute();
                    $listados = $sentencia->fetchAll(PDO::FETCH_ASSOC);                     
       
         foreach($listados as $listado):?>
            <table>
                <tr>
                <th>Id</th>
                <td><?php echo $listado['id'] ?></td>
                </tr>
                <tr>
                <th>P. Nombre</th>
                <td><?php echo $listado['primerNombre'] ?></td>
                </tr>
                <tr>
                <th>S. Nombre</th>
                <td><?php echo $listado['segundoNombre'] ?></td>
                </tr>
                <tr>
                <th>P. Apellido</th>
                <td><?php echo $listado['primerApellido'] ?></td>
                </tr>
                <tr>
                <th>S. Apellido</th>
                <td><?php echo $listado['segundoApellido'] ?></td>
                </tr>
                <tr>
                <th>Edad</th>
                <td><?php echo $listado['edad'] ?></td>
                </tr>
                <tr>
                <th>Genero</th>
                <td><?php echo $listado['genero'] ?></td>
                </tr>
                <tr>
                <th>Email</th>
                <td><?php echo $listado['email'] ?></td>
                </tr>
                <tr>
                <th>Telefono</th>
                <td><?php echo $listado['telefono'] ?></td>
                </tr>
                    </table>
    <?php endforeach; 
     }catch(PDOException $e){
        echo "Error en la conexion: ".$e->getMessage();
    }             ?>                      
        </div>          
      </section><!-- Final sección listar -->   
    </div>   
<?php
    include 'include/footer.php';
?>