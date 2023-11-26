<?php include('../layout/header.php');
?>

<?php
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
?>
<h1>PERFIL DE <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado'; ?></h1>











<?php include('../layout/footer.php'); ?>