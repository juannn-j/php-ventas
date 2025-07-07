<?php
require_once '../LOGICA/LCliente.php';
require_once '../ENTIDADES/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $log = new LCliente();
    $cli = new Cliente();
    $cli->setNombres($_POST['txtNom']);
    $cli->setApellidos($_POST['txtApl']);
    $cli->setDni($_POST['txtDni']);
    $log->guardar($cli);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <h1>Modulo Guardar clientes</h1>
    <hr>
    <form action="" method="post">
        <input type="text" name="txtNom" id="txtNom" >
        <input type="text" name="txtApl" id="txtApl" >
        <input type="text" name="txtDni" id="txtDni" >
        <input type="submit" value="Guardar">
    </form>
    <hr>
    <button><a href="./cargarCliente.php">Cargar Familias</a></button>
</div>


</body>
</html>