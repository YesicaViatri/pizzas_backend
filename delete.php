<?php
session_start();
if ($_SESSION['logueado'])
{
    include_once('config_products.php');
    try{
        $pdo = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexion exitosa ";
        }
        catch(PDOException $e) {
            echo "Conexion fallida: " . $e->getMessage();
        }
        $idDel=$_GET["q"];
        $sql="delete from products where id_product=".$idDel;
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        header('location:welcome.php');
}