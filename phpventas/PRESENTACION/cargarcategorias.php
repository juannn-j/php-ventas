<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Listado de Familias</h1>
        <hr>
        <a href="guardarcategoria.php">Crear Nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Id Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../LOGICA/LCategoria.php";
                $log = new LCategoria();
                $categorias = $log->cargar();
                foreach ($categorias as $cat) { ?>
                <tr>
                    <td><?= $cat->getIdCategoria() ?></td>
                    <td><?= $cat->getNombre() ?></td>
                    <td><?= $cat->getIdFamilia() ?></td>
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
