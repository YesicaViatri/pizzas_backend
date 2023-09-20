<?php
include_once("config_login.php");

try{
$pdo = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Conexion exitosa ";
}
catch(PDOException $e) {
    echo "Conexion fallida: " . $e->getMessage();
}

$usr=$_POST['username'];
$pass=$_POST['password'];
$hashed_pass=hash('sha256',$pass);
//Check if username exists
$sql="SELECT * FROM users WHERE (username=:usr or email=:usr) and (password=:hashed_pass) and (active='si')";
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':usr',$usr);
$stmt->bindValue(':hashed_pass',$hashed_pass);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row == 0) {
  ?>
  <div class="alert alert-danger">
    <a href="login.html" class="close" data-dismiss="alert">×</a>
    <div class="text-center">
      <h5><strong>¡Error!</strong> Login Invalido.</h5>
    </div>
  </div>
  <?php
  } else {
    session_start();
    $_SESSION['username']=$usr;
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $_SESSION["time"]=date('H:i:s');
    $_SESSION['logueado']=true;
    header("location:welcome.php");
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   </body>
</html>
