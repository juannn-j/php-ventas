<?php
require_once "../ENTIDADES/Proveedor.php";
interface IProveedor
{
    public function guardar(Proveedor $proveedor);
    public function cargar();
}
?>
