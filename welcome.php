
<?php
session_start();
if ($_SESSION['logueado'])
{
echo "Bienvenido/a ".$_SESSION['username'];
echo "<br>";
echo "hora de conexion ".$_SESSION['time'];
echo "<br>";
echo "<br>";
$table = "<table class='table table_bordered table-striped'><thead class='thead-dark'><tr><th>Id</th><th>Producto</th><th>Categoria</th><th>Precio</th><th>Fecha de Alta</th><th>Eliminar</th><th>Actualizar</th></tr></thead>";
}
?>
<a href="insert-products.php" class='btn btn-primary'>Ingresar Productos</a>
<br>
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
    $sql="select p.id_product, p.product_name, p.start_date, p.price, c.category_name from products p inner join categories c on p.id_category=c.id_category";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    echo $table;
    echo "<tbody>";
    $data=$stmt->fetchAll();
    foreach($data as $row)
    {
    echo "<tr>";
    echo "<td>";
    echo $row['id_product'];
    echo "</td>";
  
    echo "<td>";
    echo $row['product_name'];
    echo "</td>";

    echo "<td>";
    echo $row['category_name'];
    echo "</td>";

    echo "<td>";
    echo $row['price'];
    echo "</td>";

  
    echo "<td>";
    echo $row['start_date'];
    echo "</td>";

    echo "<td>";
    ?>
    <a href="#" onclick="deleteProduct(<?php echo $row['id_product'] ?>)">Eliminar</a>
    <?php
    echo "</td>";

    echo "<td>";
    echo "<a href=''>Actualizar</a>";
    echo "</td>";
    
    echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script>
        function deleteProduct(cod)
        {
            bootbox.confirm('Desea usted eliminar el producto?' +cod, function(result){if (result){window.location="delete.php?q="+cod;}});
        }
        </script>
    <title>Document</title>
</head>
<body>
    <nav class="navtop">
        <div>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>