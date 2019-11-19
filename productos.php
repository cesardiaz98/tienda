<?php
    //Mensaje en caso de error
    $mensaje="";
    if (isset($_GET['mensaje'])){
            $mensaje=strip_tags(trim($_GET['mensaje']));
    }
    //Seguridad
    include "../../seguridad/tema03/datosBDTienda.php";

    //Vamos a conectarnos a la base de datos
    $canal = @mysqli_connect(IP,USUARIO,CLAVE,BD);
    if (!$canal){
        echo "Ha ocurrido un error: ".mysqli_connect_errno()." ".mysqli_connect_error()."<br />";
        exit;
    }
    mysqli_set_charset($canal, "utf8");
    
    $sql="select nombreProducto, imagen, descripcion, precio, cantidad, idProducto from productos";
    
    $consulta = mysqli_prepare($canal, $sql);
    if (!$consulta){
        echo "Ha ocurrido un error: ".mysqli_errno($canal)." ".mysqli_error($canal)."<br />";
        exit; 
    }
    
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $nombreProducto, $imagen, $descripcion, $precio, $cantidad, $idProducto);
    

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
        <title>Productos</title>
        <style>
            
        </style>
    </head>
    <body>
    <header>
        <div>
            <a href="tienda.php" id="logo">
                <img src="imagenes/logo.png" alt="Logotipo tienda" />
            </a>
        </div>
        <div>
            <h2>Bienvenido/a</h2>
            <a href="login.php">Cerrar sesión</a>
        </div>

    </header>
    <nav>
        <a href="tienda.php" id="inicio">Inicio</a>
        <a href="productos.php" id="productos">Productos</a>
        <a href="nosotros.html" id="nosotros">Acerca de nosotros</a>
    </nav>
    <main>
        <div>
            <h1>Productos</h1>
        </div>
        
        <article>
            <form action="pedido.php" method="post">
                <p><?=$mensaje?></p>
            <table border ="1">
                <tr>
                    <th>Nombre producto</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
                <?php
                    while (mysqli_stmt_fetch($consulta)){
                        echo "<tr>";
                        echo "<td>$nombreProducto</td><td><img src='".$imagen."'/><td>$descripcion</td><td>".$precio."€</td><td><input type='number' name='cantidad$idProducto' max='".$cantidad."' min=0/></td>";
                        echo "</tr>";
                        
                    }
                    mysqli_stmt_close($consulta);
                    unset($consulta);
                ?>
                
            </table>
                
                <input type="submit" value="Añadir al carrito" onclick="confirm ('¿Desea añadirlo al carrito?')">
            </form>
        </article>
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
