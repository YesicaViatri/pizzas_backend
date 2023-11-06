<?php
include_once("config_products.php");
try{
    $pdo = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexion exitosa ";
    }
    catch(PDOException $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }
    $sql="iNSERT INTO products (product_name,price,id_category,image) values ('sevenUp',900,4,'lala')";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    header('location:welcome.php');

?>