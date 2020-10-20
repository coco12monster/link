<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
$sql = " INSERT INTO clientes (cte_nom,cte_dir,cte_dir_num,cte_int_num,cte_cp,cte_cd,cte_pa,cte_num,cte_cor,cte_rfc,uso_rfc) VALUES ( '$_POST[cte_nom]', '$_POST[cte_dir]', '$_POST[cte_dir_num]', '$_POST[cte_int_num]', '$_POST[cte_cp]', '$_POST[cte_cd]','$_POST[cte_pa]','$_POST[cte_num]','$_POST[cte_cor]','$_POST[cte_rfc]','$_POST[uso_rfc]')";
 
if(mysqli_query($conn,$sql)){
    echo " </br>datos agregados";
}else{
    echo "error en base o en codigo : ". $sql .  '</br>' . mysqli_error($conn);
}
mysqli_close($conn);


?>
    </br>
    </br>
        <a href="http://localhost/Link/index.html">volver</a>
        <a href="http://localhost/link/registroComp.html">continuar</a>
    </body>
</html>
