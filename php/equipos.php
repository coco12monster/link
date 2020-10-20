<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
    <?php

$user = "root";
$host = "localhost";
$database = "link";
$password = "";

 $conn = mysqli_connect ($host, $user , $password, $database);
 
if(!$conn){
    echo "error al conectar" . mysqli_error();
}else{
    echo "<h1>coneccion correcta</h1>";
}
$sql = " INSERT INTO mod_eqp (equipo,marca,modelo) VALUES ( '$_POST[tipo]', '$_POST[marca]', '$_POST[modelo]')";
 
if(mysqli_query($conn,$sql)){
    echo " </br>datos agregados";
}else{
    echo "error en base o en codigo : ". $sql .  '</br>' . mysqli_error($conn);
}
mysqli_close($conn);


?>

<a href="http://localhost/link/registroFallas.html">Continuar</a>
    </main>
    <footer>

    </footer> 
</body>
</html>