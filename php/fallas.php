<?php 
session_start();

  ?>

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

include('conexion.php');
 
if(!$conn){
    echo "error al conectar" . mysqli_error();
}else{
    echo "<h1>coneccion correcta</h1>";
}
$sql = " INSERT INTO fallas (id_equip,fall_comun,otra) VALUES ('$_SESSION[id]','$_POST[falla_comun]','$_POST[fallas]')";

 
if(mysqli_query($conn,$sql)){
    echo " </br>datos agregados";
}else{
    echo "error en base o en codigo : ". $sql .  '</br>' . mysqli_error($conn);
}
mysqli_close($conn);


?>
    </main>
    <footer>

    </footer>
</body>
</html>