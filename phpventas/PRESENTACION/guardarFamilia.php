<?php
require_once "../LOGICA/LFamilia.php";
require_once "../ENTIDADES/Familia.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $log = new LFamilia();
    $fam = new Familia();
    $fam->setNombre($_POST["txtNom"]);
    $fam->setDescripcion($_POST["txtDes"]);
    $log->guardar($fam);
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
    <h1>Modulo Guardar Familias</h1>
    <hr>
    <form action="" method="post">
        <input type="text" name="txtNom" id="txtNom" placeholder="Nombre">
        <input type="text" name="txtDes" id="txtDes" placeholder="Descripción">
        <input type="submit" value="Guardar">
    </form>
    <hr>
    <button><a href="./cargarFamilia.php">Cargar Familias</a></button>
</div>


</body>
</html>
