<?php
class Db
{
protected $connection;
public function __construct()
{
    try{
        $this->connection = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
        // set the PDO error mode to exception
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexion exitosa ";
        }
        catch(PDOException $e) {
            echo "Conexion fallida: " . $e->getMessage();
        }
return $this->connection;
}
public function close()
{
    $this->connection=null;
}
public function run($sql,$args=NULL)
{
    $stmt=$this->connection->prepare($sql);
    $stmt->execute($args);
return $stmt;
}
}
?>