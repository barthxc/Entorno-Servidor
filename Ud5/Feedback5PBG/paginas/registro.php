<?php include('../layout/header.php');?>

<h2>Registro</h2>
<?php

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

if (isset($_GET['errordb']) && $_GET['errordb'] === 'true') {
    echo '<p class="error">Hubo un error al procesar la solicitud.</p>';
}

if (isset($_GET['errorform']) && $_GET['errorform'] === 'true') {
    echo '<p class="error">Hay campos vacios</p>';
}

if (isset($_GET['success']) && $_GET['success'] === 'true') {
    echo '
    <div class="alerta">
        <p class="success">Cuanta creada exitosamente!</p>
        <a class="success" href="../paginas/login.php">Iniciar sesión</a>
    </div>
    ';
}

?>
<div class="form-div">
    <form action="registro.php" method="POST">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" >
        <label for="">Email:</label>
        <input type="email" name="email" >
        <label for="">Contraseña:</label>
        <input type="password" name="contraseña" >
        <button type="submit" name="registro">Crear cuenta</button>
    </form>
</div>





<?php include('../layout/footer.php');?>

