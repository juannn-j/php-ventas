<?php
require_once "../LOGICA/LProveedor.php";
require_once "../ENTIDADES/Proveedor.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $log = new LProveedor();
    $pro = new Proveedor();
    $pro->setNombre($_POST["txtNom"]);
    $pro->setRuc($_POST["txtRuc"]);
    $log->guardar($pro);
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
    <h1>Modulo Guardar Proveedores</h1>
    <hr>
    <form action="" method="post">
        <input type="text" name="txtNom" id="txtNom" >
        <input type="text" name="txtRuc" id="txtRuc" >
        <input type="submit" value="Guardar">
    </form>
    <hr>
    <button><a href="./cargarProveedor.php">Cargar Proveedores</a></button>
</div>


</body>
</html>
