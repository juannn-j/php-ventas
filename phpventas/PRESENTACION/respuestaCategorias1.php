<?php
require_once "../LOGICA/LCategoria.php";
$idfam = $_GET["idfam"];
$log = new LCategoria();
$categorias = $log->cargarPorFamilia($idfam);
$respuesta = "";
foreach ($categorias as $cat) {
    $respuesta .= "<option>" . $cat->getNombre() . "</option>";
}
echo $respuesta;
?>
