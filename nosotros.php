<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Paginas responsive-->
        <meta name="author" content="Cesar Diaz">
        <meta name="keywords" content="HTML, XHTML">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <title>Tienda</title>
    </head>
    <body>
    <header>
        <div>
            <a href="tienda.php" id="logo">
                <img src="imagenes/logo.png" alt="Logotipo tienda" />
            </a>
        </div>
        <div>
            <h2>Bienvenido: <?=$_COOKIE['usuario']?></h2>
            
            <a href="login.php">Cerrar sesión </a>
        </div>

    </header>
    <nav>
        <a href="tienda.php?" id="inicio">Inicio</a>
        <a href="productos.php" id="productos">Productos</a>
        <a href="nosotros.php" id="nosotros">Acerca de nosotros</a>
    </nav>
        <main>
            <section class="seccion" id="izquierda">
            <article>
                <h2>Samsung</h2>
                <a href="productos.php"><img src="imagenes/samsung.jpg"></a>
            </article>
        </section>
        <section class="seccion" id="centro">
            <h2>Conócenos</h2>
            <article>
                <p>Somos una empresa de ventas de móviles con mucha experiencia en el sector. </p>
                <p>En esta página podrás encontrar móviles con los precios más baratos del mercado</p>
                <p>¿Te vas a quedar sin tu movil tope de gama?</p>
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
