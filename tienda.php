<?php    
    
    //Comprobación usuario

     $usuario="";
        if(isset($_POST['usuario'])){
            $usuario=strip_tags(trim($_POST['usuario']));
        } 
        //Comprobación contraseña
        $password="";
        if(isset($_POST['password'])){
            $password=strip_tags(trim($_POST['password']));
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
        $sql = "select usuario, password from usuarios where usuario=? and password=?";
        $consulta = mysqli_prepare($canal, $sql);
        if(!$consulta){
            echo "Ha ocurrido un error: ".mysqli_errno($canal)." ".mysqli_error($canal)."<br/>";
        }

        //Comprobar si existe el usuario y la contraseña de la base de datos, se la pasamos a la sentencia sql
        mysqli_stmt_bind_param($consulta, "ss", $usuario,$password);


        mysqli_stmt_execute($consulta);
        mysqli_stmt_bind_result($consulta, $usuario, $password);

        mysqli_stmt_store_result($consulta);

        //Comprueba el número de filas que la consulta ha encontrado
        $n=mysqli_stmt_num_rows($consulta);
        if ($n!=1){
            $http="Location: login.php?mensaje=".urlencode("Usuario o contraseña incorrecto");
            $http.="&usuario=$usuario";
            header($http);
            exit;
        } else if (empty($usuario) or empty($password)){
            $http="Location: login.php?mensaje=".urlencode("Alguno de los datos están vacíos");
            $http.="&usuario=pipas";
            header($http);
            exit;
        } 
        //Guarda el usuario 
        setcookie('usuario',$usuario);
        

    
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
        <div>
            <h2>Bienvenido: <?=$usuario?></h2>
            
            <a href="login.php">Cerrar sesión </a>
        </div>

    </header>
    <nav>
        <a href="tienda.php?usuario="<?=$usuario?> id="inicio">Inicio</a>
        <a href="productos.php" id="productos">Productos</a>
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
