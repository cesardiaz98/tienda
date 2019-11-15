<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Paginas responsive-->
        <meta name="author" content="Cesar Diaz">
        <meta name="keywords" content="HTML, XHTML">
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <title>Productos</title>
        <style>
            
        </style>
    </head>
    <body>
    <header>
        <div>
            <a href="index.html" id="logo">
                <img src="imagenes/logo.png" alt="Logotipo tienda" />
            </a>
        </div>
        <div id="formulario">
            <form action="acceso.php" method="post">
                <label>Usuario:</label><input type="text" name="usuario" id="usuario" required="required">
                <label>Contraseña:</label><input type="password" id="contrasena" required="required">
                <input type="submit" value="Entrar">
            </form>
        </div>

    </header>
    <nav>
        <a href="tienda.php" id="inicio">Inicio</a>
        <a href="productos.php" id="productos">Productos</a>
        <a href="nosotros.html" id="nosotros">Acerca de nosotros</a>
    </nav>
    <main>
        <h1>Productos</h1>
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
