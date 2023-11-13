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
    //$sql="iNSERT INTO products (product_name,price,id_category,image) values ('sevenUp',900,4,'lala','img/lala')";
    //$stmt=$pdo->prepare($sql);
    //$stmt->execute();
    //header('location:welcome.php');

?>


<?php 
session_start();
if ($_SESSION ['logueado'])
{
 include_once 'upload_image.php';
 $product=$_POST['producto'];
 $price = $_POST['precio'];
 $category = $_POST['categoria'];
 echo $product;
 echo $price;
 echo $category;
 
 include_once("config_products.php");
 //include_once("db.php");
 //$pdo = new Db();
 $path_img=$directorio.$nombre_img;
 $sql="insert into products (product_name,price,id_category,image) values
 (:product,:price,:category,:path_img)";
 $stmt = $pdo->prepare($sql);
 $stmt->bindValue(':product', $product);
 $stmt->bindValue(':price', $price);
 $stmt->bindValue(':category', $category);
 $stmt->bindValue(':path_img', $path_img);
 if ( $stmt->execute()) {
 ?>
 <script>
 alert("Producto Ingresado!");
 window.location = "welcome.php";
 </script>
 <?php
 }
}
 ?>