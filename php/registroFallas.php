<?php
session_start();
include('conexion.php'); 
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIndx.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="imgTitle">
            <img src="../img/logo.jpg" alt="" height="100px" width="250px" class="logo">
        </div>
        <div class="title">
            <h1>Registre la falla presentada</h1>
        </div>    
    </header>
    <main>
    <?php

$sql = " INSERT INTO mod_eqp (id_cliente,id_equip,equipo,marca,modelo) VALUES ('$_SESSION[id]',NULL,'$_POST[tipo]', '$_POST[marca]', '$_POST[modelo]')";
 
if(mysqli_query($conn,$sql)){
    echo 'datos agregados';
}else{
    echo "error en base o en codigo : ". $sql .  '</br>' . mysqli_error($conn);
}
     

session_destroy();

$id = mysqli_query($conn, "SELECT id_equip FROM mod_eqp WHERE equipo like '$_POST[tipo]' and marca like '$_POST[marca]' and modelo like '$_POST[modelo]'");
$re = $id -> fetch_assoc();
session_start();
$_SESSION['id'] = $re['id_equip'];

mysqli_close($conn);

?>
        <form action="./fallas.php" method="POST">
            <select name="falla_comun" id="falla_comun">
                <option value="no_enciende">No enciende</option>
                <option value="se_traba">Se traba</option>
                <option value="enciende_y_apag">Enciende y se apaga</option>
                <option value="no_da_img">No da imagen</option>
                <option value="lenta">Lenta</option>
            </select>
        
            </br>
            </br>
        
            <textarea name="fallas" id="otros" cols="20" rows="8" maxlength="255"></textarea>
            </br>
            </br>
            
            <button type="submit">
                Enviar
            </button>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>