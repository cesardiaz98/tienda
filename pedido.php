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
    
    $sql="select precio, cantidad, idProducto, nombreProducto from productos";
    $consulta=mysqli_prepare($canal,$sql);
    if (!$consulta){
	echo "Ha ocurrido el error: ".mysqli_errno($canal)." ".mysqli_error($canal)."<br />";
	exit;
    }
    
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $precio, $stock, $idProducto, $nombreProducto);

    //Cookie para pasar el usuario
   $usuario = $_COOKIE['usuario'];
   ?>
<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Paginas responsive-->
        <meta name="author" content="Cesar Diaz">
        <meta name="keywords" content="HTML, XHTML">
        <link rel="stylesheet" type="text/css" href="pedido.css">
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
            <h2>Bienvenido/a: <?=$_COOKIE['usuario']?></h2>
            <a href="login.php">Cerrar sesión</a>
        </div>

    </header>
    <nav>
        <a href="tienda.php" id="inicio">Inicio</a>
        <a href="productos.php" id="productos">Productos</a>
        <a href="nosotros.php" id="nosotros">Acerca de nosotros</a>
    </nav>
    <main>
        <div>
            <h2>Ticket de compra:</h2>
        </div>
        <div>
        <table border ="1">
                <tr>
                    
                    <th>Nombre producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Precio productos</th>
                </tr>
        
        
        <?php
        
        $precioFinal = 0;
                    while (mysqli_stmt_fetch($consulta)){
                        $cantidadProducto = $_POST["cantidad$idProducto"]; 
                       if (isset($cantidadProducto) && $cantidadProducto>0){
                           echo "<tr>";
                           echo "<td>".$nombreProducto."</td><td>$cantidadProducto</td><td>$precio €</td><td>Precio total:".$precio*$cantidadProducto. "€</td>";
                           echo "</tr>";
                           $precioFinal += $precio*$cantidadProducto;
                           
                        //Canal para que no de error y podamos hacer otra consulta
                        $canal2 = @mysqli_connect(IP,USUARIO,CLAVE,BD); 
                        $insertar = "insert into compran (cantidadProducto, fecha, idProducto, idUsuario, precio_total) values ($cantidadProducto, CURRENT_DATE, $idProducto, '$usuario' , $precioFinal)";
                        $consulta2 = mysqli_prepare($canal2, $insertar);
                        mysqli_stmt_execute($consulta2);
                        
                        //Cantidad es la tabla de productos y es la tabla que vamos a modificar
                        $actualizar = "update productos set cantidad = $stock - $cantidadProducto where idProducto = $idProducto";
                        $consulta3 = mysqli_prepare($canal2, $actualizar);
                        mysqli_stmt_execute($consulta3);
                        
                        //Comprobamos que haya stock suficiente
                        if($stock<$cantidadProducto){
                            mysqli_rollback($canal2);
                            $http="Location: productos.php?mensaje=".urlencode("No hay stock suficiente");
                            header($http);
                            exit;
                        }
                        //Con esta comprobación , si hay un error, la consulta no se ejecuta y lo devuelve.
                        if(!mysqli_stmt_execute($consulta3)){
                            mysqli_rollback($canal2);
                            $http="Location: productos.php?mensaje=".urlencode("Error al descontar la cantidad");
                            header($http);
                            exit;
                        }
                    } 
                       
                      
                    }
                        //Cerramos todas las consultas realizadas
                        mysqli_stmt_close($consulta);
                        unset($consulta);
                        mysqli_stmt_close($consulta2);
                        unset($consulta2);
                        mysqli_stmt_close($consulta3);
                        unset($consulta3);
                        //Imprimimos el precio final
                       echo "<tr>";
                       echo "<td>Precio final:$precioFinal €</td>";
                       echo "</tr>";
                       
                       
                    
        ?>
        </table>         
        </div>
            <p>¡Gracias por su compra!</p>
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
