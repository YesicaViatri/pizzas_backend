<?php
session_start();
if ($_SESSION['logueado']) {
//include_once("config_products.php");
//include_once("db.php");
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
//$pdo = new DB();
$id = $_POST['id'];
$name = $_POST['nombre'];
$price = $_POST['precio'];
$category = $_POST['categoria'];
$id = $_POST['id'];
$sql = "update products set product_name='$name', price='$price',
 id_category='$category' where id_product=" . $id;
$stmt = $pdo->prepare($sql);
$stmt->execute();
header('Location:welcome.php');
}
