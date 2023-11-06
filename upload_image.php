<?php
// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];

//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000))
{
    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagen"]["type"] == "image/gif")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png"))
    {
        // Ruta donde se guardarán las imágenes que subamos
        $directorio = 'images/';
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    }
    else
    {
        //si no cumple con el formato
        exit( "No se puede subir una imagen con ese formato ");
    }
}
else
{
    //si existe la variable pero se pasa del tamaño permitido
    if($nombre_img == !NULL) exit( "La imagen es demasiado grande ");
}

<?php 
session_start();
if ($_SESSION ['logueado'])
{
 include_once 'upload_image.php';
 $product=$_POST['producto'];
 $price = $_POST['precio'];
 $category = $_POST['categoria'];
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
 window.location="insert_products.php";
 </script>
 <?php
 }
 }