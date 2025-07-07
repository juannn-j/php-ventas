<?php
class Proveedor
{
    private $idProveedor;
    private $nombre;
    private $ruc;

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getRuc()
    {
        return $this->ruc;
    }

    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }
}
?>
