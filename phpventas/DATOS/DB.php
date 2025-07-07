<?php
class DB
{
    public function conectar()
    {
        $url = "pgsql:host=pgsql;dbname=ventasweb1";
        $user = "postgres";
        $password = "1234";

        $cn = new PDO($url, $user, $password);
        return $cn;
    }
}
?>
