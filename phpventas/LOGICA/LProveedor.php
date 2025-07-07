<?php
require_once "../DATOS/DB.php";
require_once "../INTERFACES/IProveedor.php";

class LProveedor implements IProveedor
{
    public function guardar(Proveedor $proveedor)
    {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "insert into proveedor (nombre, ruc) values (:nom, :ruc)";
        $ps = $cn->prepare($sql);
        $ps->bindParam(":nom", $proveedor->getNombre());
        $ps->bindParam(":ruc", $proveedor->getRuc());
        $ps->execute();
    }

    public function cargar()
    {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "select * from proveedor";
        $ps = $cn->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();
        $proveedores = [];
        foreach ($filas as $p) {
            $pro = new Proveedor();
            $pro->setIdProveedor($p[0]);
            $pro->setNombre($p[1]);
            $pro->setRuc($p[2]);
            array_push($proveedores, $pro);
        }
        return $proveedores;
    }
}
?>
