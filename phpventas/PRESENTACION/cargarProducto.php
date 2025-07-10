<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Productos</title>
</head>
<body>
    <div>
        <h1>Módulo de Productos</h1>
        <hr>
        <a href="./guardarProducto.php">Crear Nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>STOCK</th>
                    <th>MONTO</th>
                    <th>ID FAMILIA</th>
                    <th>ID CATEGORIA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../LOGICA/LProducto.php";
                $log = new LProducto();
                foreach ($log->cargar() as $producto) { ?>
                <tr>
                    <td><?= $producto->getIdProducto() ?></td>
                    <td><?= $producto->getNombre() ?></td>
                    <td><?= $producto->getStock() ?></td>
                    <td><?= $producto->getMonto() ?></td>
                    <td><?= $producto->getIdFamilia() ?></td>
                    <td><?= $producto->getIdCategoria() ?></td>
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <div id="res"></div>
</body>
</html>
