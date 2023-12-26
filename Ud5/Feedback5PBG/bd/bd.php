<?php
$host = 'localhost:3308'; // Puede ser 'localhost' si la base de datos está en el mismo servidor || 127.0.0.1:3308
$dbname = 'feedback5';
$username = 'root';
$password = '';


// Intentar establecer la conexión
try {
    // Crear una instancia de la clase PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar el modo de error de PDO para que lance excepciones en lugar de emitir advertencias
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<p class="success">BD Conectada</p>';
} catch (PDOException $e) {
    // Manejo de errores en caso de que la conexión falle
    // echo "Error de conexión: " . $e->getMessage();
    echo '<p class="error">Error de conexión</p>';
}


//Registrar cuenta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    registrarUsuario($conexion, $nombre, $email, $contraseña);
}

//Login usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    loginUsuario($conexion, $email, $contraseña);
}

//Logout
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_start();
    $_SESSION = array();


    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();

    header('Location: index.php');
    exit;  
}


function registrarUsuario($conexion, $nombre, $email, $contraseña)
{
    if (empty($nombre) || empty($email) || empty($contraseña)) {
        header('Location: registro.php?errorform=true');
        exit;
    } else {
        try {
            $query = "INSERT INTO usuarios (nombre , email , contraseña) VALUES (:nombre , :email , :contrasena)";
            $statement = $conexion->prepare($query);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':contrasena', $contraseña, PDO::PARAM_STR);
            $statement->execute();
            header('Location: registro.php?success=true');
        } catch (PDOException $e) {
            header('Location: registro.php?errordb=true');
        }
    }
}





function loginUsuario($conexion, $email, $contraseña)
{
    
    if (empty($email) || empty($contraseña)) {
        header('Location: login.php?errorform=true');
        exit;
    } else {
        try {
            $query = "SELECT * FROM usuarios WHERE email = :email AND contraseña = :contrasena";
            $statement = $conexion->prepare($query);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':contrasena', $contraseña, PDO::PARAM_STR);
            $statement->execute();
            $usuario = $statement->fetch(PDO::FETCH_ASSOC);
            

            if ($usuario) {
                // Usuario autenticado, establecer la sesión
                session_start();
                $_SESSION['usuario'] = $usuario['nombre'];

                header('Location: index.php?success=true');
                exit;
            } else {
                // Credenciales inválidas, mostrar mensaje de error
                header('Location: login.php?errorcred=true');
                exit;
            }
        } catch (PDOException $e) {
            header('Location: login.php?errordb=true');
            exit;
        }
    }
}
