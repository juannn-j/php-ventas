<?php
require_once "../DATOS/DB.php";
require_once "../INTERFACES/IProducto.php";

class LProducto implements IProducto
{
    public function guardar(Producto $producto)
    {
        $db = new DB();
        $cn = $db->conectar();
        $sql =
            "insert into producto (nombre, stock, monto, idfamilia, idcategoria) values (:nom, :stc, :mnt, :idfa, :idct)";
        $ps = $cn->prepare($sql);
        $ps->bindParam(":nom", $producto->getNombre());
        $ps->bindParam(":stc", $producto->getStock());
        $ps->bindParam(":mnt", $producto->getMonto());
        $ps->bindParam(":idfa", $producto->getIdFamilia());
        $ps->bindParam(":idct", $producto->getIdCategoria());
        $ps->execute();
    }

    public function cargar()
    {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "select * from producto";
        $ps = $cn->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();
        $productos = [];
        foreach ($filas as $p) {
            $prod = new Producto();
            $prod->setIdProducto($p[0]);
            $prod->setNombre($p[1]);
            $prod->setStock($p[2]);
            $prod->setMonto($p[3]);
            $prod->setIdFamilia($p[4]);
            $prod->setIdCategoria($p[5]);
            array_push($productos, $prod);
        }
        return $productos;
    }
}
?>
