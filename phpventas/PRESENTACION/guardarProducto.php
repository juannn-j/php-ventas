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
   </div>
   <div id="res"></div>
</body>
</html>
<script>
    $('#cbxFam').change(function(){
        idfam=$('#cbxFam').val();
        param={'idfam':idfam};
        $.ajax({
            url:'respuestaCategorias1.php',
            data:param,
            type:'get',
            success:function(res){
                $('#res').html(res);
            }
        });
    });
</script>
<?php
require_once "../LOGICA/LProducto.php";
if ($_POST) {
    $prod = new Producto();
    $prod->setNombre($_POST["txtNom"]);
    $prod->setStock($_POST["txtSto"]);
    $prod->setMonto($_POST["txtNom"]);
    $prod->setIdFamilia($_POST["cbxFam"]);
    $prod->setIdCategoria($_POST["cbxCat"]);
    $log = new LProducto();
    $log->guardar($prod);
    // header(header: 'Location: cargarcategorias.php');
}

?>
