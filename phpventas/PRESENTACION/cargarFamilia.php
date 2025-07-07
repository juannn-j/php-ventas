<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Familias</title>
</head>
<body>
    <div>
        <h1>Módulo de Familias</h1>
        <hr>
        <a href="./guardarFamilia.php">Crear Nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../LOGICA/LFamilia.php';
                $log = new LFamilia();
                foreach ($log->cargar() as $familia) {
                ?>
                <tr>
                    <td><?=$familia->getIdFamilia()?></td>
                    <td><?=$familia->getNombre()?></td>
                    <td><?=$familia->getDescripcion()?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
