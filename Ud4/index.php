<?php
// Datos de conexión a la base de datos
$host = 'localhost:3308'; // Puede ser 'localhost' si la base de datos está en el mismo servidor || 127.0.0.1:3308
$dbname = 'bakeryvaqueros1.1';
$username = 'root';
$password = '';
$nuevoForm = false;
$actualizarForm = false;
$error = false;

// Intentar establecer la conexión
try {
    // Crear una instancia de la clase PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar el modo de error de PDO para que lance excepciones en lugar de emitir advertencias
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejo de errores en caso de que la conexión falle
    echo "Error de conexión: " . $e->getMessage();
}


//FUNCIONES

//Agregar producto:
function nuevoProducto($conexion, $nombreNuevo)
{
    try {
        $query = "INSERT INTO stock_producto (nombre_stock) VALUES (:nombreNuevo)";
        $statement = $conexion->prepare($query);

        $statement->bindParam(':nombreNuevo', $nombreNuevo, PDO::PARAM_STR);

        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error al agregar el producto: " . $e->getMessage();
        return false;
    }
}

// Función para eliminar por ID
function eliminarProducto($conexion, $idEliminar)
{
    try {
        $query = "DELETE FROM stock_producto WHERE id_stock = :idEliminar";
        $statement = $conexion->prepare($query);

        // Vincular el valor del parámetro a la sentencia
        $statement->bindParam(':idEliminar', $idEliminar, PDO::PARAM_INT);

        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error al eliminar el producto: " . $e->getMessage();
    }
}

function modificarProducto($conexion, $idActualizar, $nuevoNombre)
{
    try {
        $query = "UPDATE stock_producto SET nombre_stock = :nuevoNombre WHERE id_stock = :idActualizar";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':idActualizar', $idActualizar, PDO::PARAM_INT);
        $statement->bindParam(':nuevoNombre', $nuevoNombre, PDO::PARAM_STR);
        $statement->execute();
        echo"WOOOOOOO";
        return true;
    } catch (PDOException $e) {
        echo "Error al modificar el producto" . $e->getMessage();
    }
}


//Abrir form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['abrirForm'])) {
    $nuevoForm = true;
}
//Cerrar form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerrarForm'])) {
    $nuevoForm = false;
    $actualizarForm = false;
}
//Abrir form actualizar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['abrirFormActualizar'])) {
    $actualizarForm = true;
}

//Abrir error
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerrarForm'])) {
}

//Cerrar error
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerrarError'])) {
    $error = false;
}

//CRUD
//Añadir el dato
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregarProducto'])) {
    $nombreProducto = isset($_POST['producto']) ? $_POST['producto'] : '';

    if (!empty($nombreProducto)) {
        if (nuevoProducto($conexion, $nombreProducto)) {
            $nuevoForm = false;
        } else {
            $error = true;
        }
    }
}

//Modificar el dato
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modificarProducto'])) {
    $idActualizar = isset($_POST['id']) ? $_POST['id'] : '';
    $nuevoNombre = isset($_POST['nuevoNombre']) ? $_POST['nuevoNombre'] : '';
    if (!empty($idActualizar)) {
        modificarProducto($conexion, $idActualizar, $nuevoNombre);
    }
}

//Eliminar el dato
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
    $idEliminar = isset($_POST['id']) ? $_POST['id'] : '';

    if (!empty($idEliminar)) {
        eliminarProducto($conexion, $idEliminar);
    }
}










//CONSULTA:
$query = "SELECT id_stock, nombre_stock FROM stock_producto";
$statement = $conexion->prepare($query);
$statement->execute();
$resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP y PDO</title>
    <link rel="stylesheet" href="styles.css">


</head>

<body>
    <h2>Datos de la tabla</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Funciones</th>
        </tr>
        <?php foreach ($resultados as $fila) : ?>
            <tr>
                <td><?= $fila['id_stock'] ?></td>
                <td><?= $fila['nombre_stock'] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $fila['id_stock'] ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                        <button type="submit" name="abrirFormActualizar">Actualizar</button>
                    </form>
                </td>
            </tr>

            <?php if ($actualizarForm && $fila['id_stock'] == $_POST['id']) : ?>
        <div class="nuevoproducto">
            <form method="POST">
                <button type="submit" name="cerrarForm">
                    X
                </button>
                <p>Actualizar Producto</p>
                <label for="nombre">Nombre del Producto:</label>
                <input type="hidden" name="id" value="<?= $fila['id_stock'] ?>">
                <input type="text" name="nuevoNombre" value="<?= $fila['nombre_stock'] ?>">
                <button type="submit" name="modificarProducto">Actualizar</button>
            </form>
        </div>
    <?php endif; ?>



        <?php endforeach; ?>
    </table>

    <form method="POST">
        <button type="submit" name="abrirForm">
            Nuevo
        </button>
    </form>

    <?php if ($nuevoForm) : ?>
        <div class="nuevoproducto">
            <form method="POST">
                <button type="submit" name="cerrarForm">
                    X
                </button>
                <p>Nuevo producto</p>
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" name="producto">
                <button type="submit" name="agregarProducto">Agregar</button>
            </form>
        </div>
    <?php endif; ?>






    <?php if ($error) : ?>
        <div class="error">
            <form method="POST">
                <button type="submit" name="cerrarError">
                    X
                </button>
            </form>
            <p>Hubo un error </p>
        </div>
    <?php endif; ?>



<!--He probado varias veces y no se que tengo mal para actualizar el dato. 
Tengo un input escondido que recoge el dato del foreach que es el ID y también tengo otro input que recoge el dato del nuevo nombre.
He recogido la información en variables y las paso como parámetros a las funciones. Pero el dato no se actualiza.

Además de que se dificulta el poder crear interfaces de usuarios comodas. Dificulta tanto al usuario de la web como al programador al estar creando 
formularios de forma constante para enviar un simple mensaje al servidor para cambiar: una variable, un estado, un dato. He estado francamente perdido también a la hora de crear 
los bucles con la sintaxis de "python" ya que no me dejaba usar un echo "" como template string para renderizar todo.
-->
</body>

</html>