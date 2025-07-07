
<?php
    require_once '../DATOS/DB.php';
    require_once '../INTERFACES/IFamilia.php';
    
    class LFamilia implements IFamilia{
        public function guardar(Familia $familia) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'insert into familia (nombre, descripcion) values (:nom, :des)';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $familia->getNombre());
            $ps->bindParam(':des', $familia->getDescripcion());
            $ps->execute();
        }
        public function modificar(Familia $familia) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'update familia set nombre=:nom, descripcion=:des where idfamilia=:id' ;
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $familia->getNombre());
            $ps->bindParam(':des', $familia->getDescripcion());
            $ps->bindParam(':id', $familia->getIdfamilia());
            $ps->execute();
        }
        public function borrar(Familia $familia) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'delete from familia where idfamilia=:id';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':id', $familia->getIdfamilia());
            $ps->execute();
        }
        public function cargarPorId($idFam) {}
        public function cargar() {
            $db = new DB(); //usamos la coneccion
            $cn = $db->conectar(); // declaramos el objeto
            $sql = 'select * from familia' ; // declaramos la consulta
            $ps = $cn->prepare($sql); // precompilamos la consulta
            $ps->execute(); // ejecucion de la consulta
            $filas = $ps->fetchAll(); // pdo, obenter todas las filas de la consulta
            $familias=array(); // declaramos un array vacio
            foreach($filas as $f){ 
                $fam=new Familia(); 
                $fam->setIdfamilia($f[0]);
                $fam->setNombre($f[1]);
                $fam->setDescripcion($f[2]);
                array_push($familias, $fam);
            }           
            return $familias; // retornamos todas las familias
        }
    }
?>