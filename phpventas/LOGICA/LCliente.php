<?php
    require_once '../DATOS/DB.php';
    require_once '../INTERFACES/ICLiente.php';
    
    class LCliente implements ICLiente{
        public function guardar(Cliente $cliente) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'insert into cliente (nombres, apellidos, dni) values (:nom, :aps, :dni)';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $cliente->getNombres());
            $ps->bindParam(':aps', $cliente->getApellidos());
            $ps->bindParam(':dni', $cliente->getDni());
            $ps->execute();
        }
        public function cargar() {
            $db = new DB();
            $cn = $db->conectar(); 
            $sql = 'select * from cliente' ; // declaramos la consulta
            $ps = $cn->prepare($sql); // precompilamos la consulta
            $ps->execute(); // ejecucion de la consulta
            $filas = $ps->fetchAll(); // pdo, obenter todas las filas de la consulta
            $clientes=array(); // declaramos un array vacio
            foreach($filas as $c){ 
                $cli=new Cliente(); 
                $cli->setIdCliente($c[0]);
                $cli->setNombres($c[1]);
                $cli->setApellidos($c[2]);
                $cli->setDni($c[3]);
                array_push($clientes, $cli);
            }           
            return $clientes; // retornamos todas las familias
        }
    }
?>
