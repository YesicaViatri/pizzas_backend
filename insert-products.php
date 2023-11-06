<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/form.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">INGRESO DE PRODUCTOS</h3>
        </div>
        <div class="col-md-12">
            <form class="form-group" accept-charset="utf-8"
                action="save_products.php" enctype="multipart/form-data"
                method="post">
                <div class="form-group">
                    <br> <label class="control-label" for="producto">PRODUCTO</label> 
                    <input id="producto" name="producto" placeholder="PRODUCTO"
                        class="form-control" required="" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="precio">PRECIO</label> <input
                        id="precio" name="precio" placeholder="PRECIO"
                        class="form-control" required="" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="categoria">CATEGORIA DEL PRODUCTO</label>
                    <select id="categoria" name="categoria" class="form-control">
                    <!-- Las categorias seran cargadas de la db -->
                    <?php
                    include_once ('config_products.php');
                    try{
                        $pdo = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
                        // set the PDO error mode to exception
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //echo "Conexion exitosa ";
                        }
                        catch(PDOException $e) {
                            echo "Conexion fallida: " . $e->getMessage();
                        }
                        $sql="select id_category,category_name from categories order by category_name";
                        $stmt=$pdo->prepare($sql);
                        $stmt->execute();
                        $data=$stmt->fetchAll();
                        foreach($data as $row)
                        {
                        ?>
                            <option values="<?php echo $row['id_category']?>"><?php echo $row['category_name']?> 
                            </option>
                        <?php  }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="file">Seleccione la imagen a subir</label> 
                    <input type="file" id="imagen" class="form-control" name="imagen" size="30"/>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Añadir Producto" />
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>