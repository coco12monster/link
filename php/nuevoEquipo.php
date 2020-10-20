<?php session_start(); ?>
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

    </main>

    <footer>

    </footer>
</body>
</html>