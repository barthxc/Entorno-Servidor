<?php include('../layout/header.php');?>


<h2>Inicia sesión</h2>
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
        <p class="success">Bienvenido!</p>
        <a class="success" href="../paginas/perfil.php">Visita tu perfil!</a>
    </div>
    ';
}

if (isset($_GET['errorcred']) && $_GET['errorcred'] === 'true') {
    echo '<p class="error">Credenciales incorrectas</p>';
}

?>
<div class="form-div">
    <form action="login.php" method="POST">
        <label for="">Email:</label>
        <input type="email" name="email" >
        <label for="">Contraseña:</label>
        <input type="password" name="contraseña" >
        <button type="submit" name="login">Acceder</button>
    </form>
</div>




<?php include('../layout/footer.php');?>

