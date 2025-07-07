<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Clientes</title>
</head>
<body>
    <div>
        <h1>Módulo de Cliente</h1>
        <hr>
        <a href="./guardarCliente.php">Crear Nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>DNI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../LOGICA/LCliente.php';
                $log = new LCliente();
                foreach ($log->cargar() as $cliente) {
                ?>
                <tr>
                    <td><?=$cliente->getIdCliente()?></td>
                    <td><?=$cliente->getNombres()?></td>
                    <td><?=$cliente->getApellidos()?></td>
                    <td><?=$cliente->getDni()?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
