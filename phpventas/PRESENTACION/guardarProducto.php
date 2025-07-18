<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once "../LOGICA/LProducto.php";
require_once "../ENTIDADES/Producto.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $log = new LProducto();
    $prod = new Producto();
    $prod->setNombre($_POST["txtNom"]);
    $prod->setStock($_POST["txtSto"]);
    $prod->setMonto($_POST["txtMon"]);
    $prod->setIdFamilia($_POST["cbxFam"]);
    $prod->setIdCategoria($_POST["cbxCat"]);
    $log->guardar($prod);
    // header(header: 'Location: cargarcategorias.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
   <div>
       <h1> Guardar Productos </h1>
       <hr>
        <?php
        require_once "../LOGICA/LFamilia.php";
        require_once "../LOGICA/LCategoria.php";
        ?>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Nombre">
            <input type="text" name="txtSto" placeHolder="Stock">
            <input type="text" name="txtMon" placeHolder="Monto">
            <select name="cbxFam" id="cbxFam">
                <option>Seleccione Familia</option>
                <?php
                $logFamilia = new LFamilia();
                $familias = $logFamilia->cargar();
                foreach ($familias as $fam) { ?>
                    <option value="<?= $fam->getIdFamilia() ?>"><?= $fam->getNombre() ?></option>
                    <?php }
                ?>
            </select>
            <select name="cbxCat" id="cbxCat">
                <option>Seleccione categoria</option>
                <?php
                $logCategoria = new LCategoria();
                $categorias = $logCategoria->cargar();
                foreach ($categorias as $cat) { ?>
                <option value="<?= $cat->getIdCategoria() ?>"><?= $cat->getNombre() ?></option>
                <?php }
                ?>
            </select>
                <input type="submit" value="Guardar">
        </form>
        <button>cargar</button>
   </div>
   <div id="res"></div>
</body>
</html>
<script>
$("button").click(function(){
  $.ajax({
    url: "cargarProducto.php",
    success: function(res){
      $("#res").html(res);
  }});
});
</script>
