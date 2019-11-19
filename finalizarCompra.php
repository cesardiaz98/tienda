<?php
    //Seguridad
    include "../../seguridad/tema03/datosBDTienda.php";

    //Vamos a conectarnos a la base de datos
    $canal = @mysqli_connect(IP,USUARIO,CLAVE,BD);
    if (!$canal){
        echo "Ha ocurrido un error: ".mysqli_connect_errno()." ".mysqli_connect_error()."<br />";
        exit;
    }
    mysqli_set_charset($canal, "utf8");
        
        
      ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
