<?php
require_once "../DATOS/DB.php";
require_once "../INTERFACES/ICategoria.php";
class LCategoria implements ICategoria
{
    public function guardar(Categoria $categoria)
    {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "insert into categoria (nombre, idfamilia) values (:nom, :idf)";
        $ps = $cn->prepare($sql);
        $ps->bindParam(":nom", $categoria->getNombre());
        $ps->bindParam(":idf", $categoria->getIdFamilia());
        $ps->execute();
    }
    public function cargar()
    {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "select * from categoria";
        $ps = $cn->prepare($sql);
        $ps->execute();
        $categorias = [];
        $filas = $ps->fetchAll();
        foreach ($filas as $f) {
            $cat = new Categoria();
            $cat->setIdCategoria($f[0]);
            $cat->setNombre($f[1]);
            $cat->setIdFamilia($f[2]);
            array_push($categorias, $cat);
        }
        return $categorias;
    }

    public function cargarPorFamilia($idfam)
    {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "select * from categoria where idfamilia=:idfam";
        $ps = $cn->prepare($sql);
        $ps->bindParam(":idfam", $idfam);
        $ps->execute();
        $categorias = [];
        $filas = $ps->fetchAll();
        foreach ($filas as $f) {
            $cat = new Categoria();
            $cat->setIdCategoria($f[0]);
            $cat->setNombre($f[1]);
            $cat->setIdFamilia($f[2]);
            array_push($categorias, $cat);
        }
        return $categorias;
    }
}
?>
