<?php 
    require_once '../ENTIDADES/Cliente.php';
    interface ICLiente {
        public function guardar(Cliente $cliente);
        public function cargar();
    }
?>