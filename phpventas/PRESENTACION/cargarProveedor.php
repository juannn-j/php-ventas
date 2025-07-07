<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Proveedores</title>
</head>
<body>
    <div>
        <h1>Módulo de Proveedores</h1>
        <hr>
        <a href="./guardarProveedor.php">Crear Nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>RUC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../LOGICA/LProveedor.php";
                $log = new LProveedor();
                foreach ($log->cargar() as $proveedor) { ?>
                <tr>
                    <td><?= $proveedor->getIdProveedor() ?></td>
                    <td><?= $proveedor->getNombre() ?></td>
                    <td><?= $proveedor->getRuc() ?></td>
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
