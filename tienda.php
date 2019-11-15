<?php
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


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Paginas responsive-->
    <meta name="author" content="Cesar Diaz">
    <meta name="keywords" content="HTML, XHTML">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Tienda</title>
    
</head>

<body>
    <header>
        <div>
            <a href="tienda.php" id="logo">
                <img src="imagenes/logo.png" alt="Logotipo tienda" />
            </a>
        </div>
        <p><span class="error"><?="$mensaje"?></p></span>
        <div id="formulario">
            <form action="acceso.php" method="post">
                <label>Usuario:</label><input type="text" name="usuario" value="<?=$usuario?>" id="usuario">
                <label>Contraseña:</label><input type="password" name="password" id="contrasena">
                <input type="submit" value="Entrar">
            </form>
        </div>

    </header>
    <nav>
        <a href="tienda.php" id="inicio">Inicio</a>
        <!--<a href="productos.php" id="productos">Productos</a>-->
        <a href="nosotros.html" id="nosotros">Acerca de nosotros</a>
    </nav>
    <main>
        <section class="seccion" id="izquierda">
            <article>
                <h2>Samsung</h2>
                <a href="productos.php"><img src="imagenes/samsung.jpg"></a>
            </article>
        </section>
        <section class="seccion" id="centro">
            <h2>Bienvenidos a la tienda</h2>
            <article>
                <p>Bienvenidos a la tienda TODOMOVILES. Aqui encontrarás todo tipo de dispositivos móviles a buen precio.</p>
            </article>
        </section>
        <section class="seccion" id="derecha">
            <article>
                <h2>iPhone</h2>
                <a href="productos.php"><img src="imagenes/iphone%2011.jpg"></a>
            </article>
        </section>
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
