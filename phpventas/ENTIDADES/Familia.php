<?php 
    class Familia{
        private $idfamilia;
        private $nombre;
        private $descripcion;

        // ENCAPSULACION
        // variables a nivel de clase
        public function getIdfamilia(){
            return $this->idfamilia;
        }

        // campo local
        public function setIdfamilia($idfamilia){
            $this->idfamilia = $idfamilia;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
    }
?>