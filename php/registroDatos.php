<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIndx.css">
    <link rel="stylesheet" href="../css/datosExist.css">
    <title>Datos</title>
</head>
<body>
    <header>
        <div class="imgTitle">
            <img src="../img/logo.jpg" alt="" height="100px" width="250px" class="logo">
        </div>
        <div class="title">
            <h1>Cliente ya registrado</h1>
        </div>  
    </header>
    <main>
        <form action="./resultado.php" method="POST">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" class="correo">
            <br>
            <br>
            
            <label for="contraseña">Contraseña</label>
            <input type="password" name="password" id="password" class="password">
            <br>
            <br>
            <button type="submit">ENVIAR</button>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>