<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/styleIndx.css">
</head>
<body>
    <header>
        <div class="imgTitle">
            <img src="../img/logo.jpg" alt="" height="100px" width="250px" class="logo">
        </div>
        <div class="title">
<?php
         include('conexion.php');
         
         $correo = $_POST['correo'];
         $contra = $_POST['password'];
              
         
        
      $sql =  "SELECT id_cliente,cte_nom,cte_ap,cte_dir,cte_dir_num,cte_int_num,cte_cp,cte_cd,cte_pa,cte_num,cte_cor,cte_pass
      FROM clientes  WHERE cte_cor LIKE '$correo' AND cte_pass LIKE '$contra' ";
 
      $busqueda = mysqli_query($conn,$sql);
      $busqueda2 = $busqueda -> fetch_assoc();
      ?>
      <h1> Bienvenido <?php echo $busqueda2 ['cte_nom']; ?></h1>
      </div>  
  </header>
  <main>
  <?php
     if($busqueda2['cte_cor'] == $correo && $busqueda2['cte_pass'] == $contra ){
    $sql2 = "SELECT m.id_cliente,m.id_equip,m.equipo,m.marca,m.modelo,f.id_equip,f.id_falla,f.fall_comun,f.otra
    FROM mod_eqp m 
    INNER JOIN fallas f ON f.id_equip LIKE m.id_equip
    WHERE m.id_cliente IN(SELECT id_cliente FROM clientes WHERE id_cliente LIKE '$busqueda2[id_cliente]')";
    session_start();
    $_SESSION['id'] = $busqueda2['id_cliente']; 
     
    $busqueda3 = mysqli_query($conn,$sql2);
     
       ?>
        
      
         

            <table border="1">
            <thead>
            
             <th>
               <p>equipo</p>  
             </th>
             <th>
               <p>marca</p>  
             </th>
             <th>
               <p>modelo</p>  
             </th>
             <th>
               <p>falla</p>  
             </th>
             <th>
               <p>informacion adicional</p>  
             </th>
             <tbody>
          
            
              <tr> 
         
           
             <?php
           while($busqueda4 = $busqueda3 -> fetch_assoc()){
              ?> 
             <td> <p> <?php echo $busqueda4 ['equipo']; ?> </p> </td>
             <td> <p> <?php echo $busqueda4 ['marca']; ?> </p> </td> 
             <td> <p> <?php echo $busqueda4 ['modelo']; ?> </p> </td> 
             <td> <p> <?php echo $busqueda4 ['fall_comun']; ?> </p> </td>
             <td> <p> <?php echo $busqueda4 ['otra']; ?> </p> </td>
            </tr> 
            <?php
             } 
             ?>
            
           </tbody>

           <tfoot>
           </tfoot>  
           <br>

       <form action="./nuevoEquipo.php" method="POST">
       <button type="submit">
         Nuevo Equipo
       </button>
       </form>

<?php
           }else{
  ?>        
         <p>contraseña y/o correo incorrecto</p>
    <?php     
        }             
           mysqli_close($conn);
           ?>
    </main>
    <footer>

    </footer>
</body>
</html>