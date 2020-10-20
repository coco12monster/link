
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIndx.css">
    <title>Registro de equipo</title>
</head>
<body>
    <header>

        <div class="imgTitle">
            <img src="../img/logo.jpg" alt="" height="100px" width="250px" class="logo">
        </div>
        
        <div class="title">
            <h1>Registro de equipo</h1>
        </div>    
    </header>

    <main>
        <div>
    <?php
 include('conexion.php');
 $nombre = $_POST['cte_nom'];
 $apellido = $_POST['cte_ap'];
 $correo = $_POST['cte_cor'];
 $numero = $_POST['cte_num'];
 $resultado  = mysqli_query($conn, "SELECT cte_nom,cte_ap,cte_cor FROM clientes WHERE cte_nom LIKE '%$nombre%' AND cte_ap LIKE '%$apellido%' OR  cte_cor LIKE '%$correo%' OR cte_num LIKE '%$numero%'");
 
 if(mysqli_num_rows($resultado)>0)
 {
 ?>   
    <p>los datos ya se an ingresado intente inciando sesion</p>
    <a href="./registroDatos.php">ya estoy registrado</a>


 <?php
  mysqli_close($conn);
}else{
    $sql = "INSERT INTO clientes (id_cliente,cte_nom,cte_ap,cte_dir,cte_dir_num,cte_int_num,cte_cp,cte_cd,cte_pa,cte_num,cte_cor,cte_pass,cte_rfc,uso_rfc) VALUES ( NULL,'$_POST[cte_nom]','$_POST[cte_ap]' ,  '$_POST[cte_dir]', '$_POST[cte_dir_num]', '$_POST[cte_int_num]', '$_POST[cte_cp]', '$_POST[cte_cd]','$_POST[cte_pa]','$_POST[cte_num]','$_POST[cte_cor]','$_POST[cte_pass]','$_POST[cte_rfc]','$_POST[uso_rfc]')";
  
 if(mysqli_query($conn,$sql)){
     echo " </br>datos agregados";
 }else{
     echo "error en base o en codigo : ". $sql .  '</br>' . mysqli_error($conn);
 } 

    $id = mysqli_query($conn, "SELECT id_cliente FROM clientes WHERE cte_nom like '$_POST[cte_nom]' and cte_ap like '$_POST[cte_ap]'");
    $reg = $id -> fetch_assoc();
    
   
    

    if(!isset($_SESSION)){
      session_start();  
      $_SESSION['id'] = $reg['id_cliente']; 
    }else{
        session_destroy();
        session_start();
       
        $_SESSION['id'] = $id['id_cliente'];
       
    }
    
     
    
       
      
    mysqli_close($conn);
 ?>
 </div>
        <form action="./registroFallas.php" method="POST">
            <select name="tipo" id="tipo">
                <option value="desktop">Computadora de escritorio</option>
                <option value="laptop">Laptop</option>
                <option value="tablet">Tablet</option>
                <option value="celular">Celular</option>
                <option value="consola">Consola</option>
            </select>
    
            </br>
            </br>
            
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca">
            
            </br>
            </br>

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo">
            
            </br>
            </br>

            <button type="submit">ENVIAR</button>
 </form>
 <?php   
     
}

?>
    </main>

    <footer>

    </footer>
</body>
</html>