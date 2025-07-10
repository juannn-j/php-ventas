<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    require_once "../LOGICA/LCategoria.php";
    require_once "../LOGICA/LFamilia.php";
    ?>

    <div>
        <h1>Modulo de inserccion</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeholder="Nombre">
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
            <input type="submit" value="Guardar">
            <button><a href="./cargarcategorias.php">cargarcategorias</a></button>
        </form>

    </div>

</body>
</html>
<?php if ($_POST) {
    $cat = new Categoria();
    $cat->setNombre($_POST["txtNom"]);
    $cat->setIdFamilia($_POST["cbxFam"]);
    $log = new LCategoria();
    $log->guardar($cat);
    // header(header: 'Location: cargarcategorias.php');
}
?>
