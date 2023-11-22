<?php
/**
 * trabaja con una base de datos 
 * usando PDO
 * 
 * @author YESICA VIATRI yesicaviatri@outlook.com
 * @link https://githb.com/yesicaviatri
 * @version 0.1
 * @copyright 2023
 * 
 */
class Db
{
protected $connection; 
/**
 * realizar una conexion a una base de datos
 * usando PDO
 * 
 * @return conexion
 * 
 */
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
/**
 * cierra una conexion
 * 
 * @return void
 */
public function close()
{
    $this->connection=null;
}
/**
 * ejecuta una query SQL
 * 
 * @param string $sql
 * @param string $args
 * @return object 
 * 
 */
public function run($sql,$args=NULL)
{
    $stmt=$this->connection->prepare($sql);
    $stmt->execute($args);
    return $stmt;
}
}
?>