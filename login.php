<?php

    if (!empty($usuario) && !empty($password)){
                $http="Location: tienda.php";
                header($http);
                exit;
     }
    //Comprobamos el usuario
    $usuario="";
    if (isset($_GET['usuario'])){
        $usuario= strip_tags(trim($_GET['usuario']));
    }

    //Comprobamos la contraseña
    $password="";
    if (isset($_GET['password'])){
            $password=strip_tags(trim($_GET['password']));
    }
    //Mensaje en caso de error
    $mensaje="";
    if (isset($_GET['mensaje'])){
            $mensaje=strip_tags(trim($_GET['mensaje']));
    }

//Borrar antes de iniciar sesión
setcookie('usuario',$usuario, time()-3600);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Paginas responsive-->
    <meta name="author" content="Cesar Diaz">
    <meta name="keywords" content="HTML, XHTML">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <title>Tienda</title>
    
</head>

<body>
    <header>
        <div>
            <a href="login.php" id="logo">
                <img src="imagenes/logo.png" alt="Logotipo tienda" />
            </a>
        </div>
    </header>
    <main>
        <div id="formulario">
            <form action="tienda.php" method="post">
                <h1>Inicio sesión</h1>
                <label>Usuario:</label><input type="text" name="usuario" id="usuario">
                <label>Contraseña:</label><input type="password" name="password" id="contrasena">
                <input type="submit" value="Entrar">
                <p><span class="error"><?="$mensaje"?></p></span>
            </form>
        </div>
    </main>
    
    
    <footer>
        <div>
            <address>
                <a href="https://www.instagram.com">Instagram
                    <img src="imagenes/instagram.png" alt="instagram" />
                </a><br>
                <a href="https://www.facebook.com">Facebook
                    <img src="imagenes/facebook.png" alt="facebook" />
                </a><br>
                <a href="https://twitter.com">Twitter
                    <img src="imagenes/twitter.jpg" alt="twitter" />
                </a><br>
            </address>
        </div>
        <div>
            <p>Calle Real nº1</p>
        </div>
        <div>
            <p>Proyecto realizado por:César Díaz Valtueña
        </div>
    </footer>

</body>

</html>