<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 01</title>
</head>
<body>
    <p>
    <?php
        /* obtengo el metodo de envio del formulario, para determinar que variables tengo que usar ($_POST O $_GET) */
        $metodo =  $_SERVER['REQUEST_METHOD'];
       /* if ($metodo == 'GET'){
            $nombre = $_GET['nombre'];
            $ano = $_GET['ano'];
        } else {
            $nombre = $_POST['nombre'];
            $ano = $_POST['ano'];
        } */
        /* $_REQUEST vale para $_GET  $_POST */
        $nombre = $_REQUEST['nombre'];
        $ano = $_REQUEST['ano'];
        echo "<h1>Metodo : $metodo</h1>";
        echo "Hola $nombre naciste en el año $ano"; 
        echo "<p> Tu teclado es " . $_SERVER["HTTP_ACCEPT_LANGUAGE"] . "</p>";
        /* var de servidor */
        echo '<h1>---- $_SERVER -----</H1>';
        foreach ($_SERVER as $key => $valor){
            echo '<p>$_SERVER["' . $key . '"]='. $valor. '</p>';
        }
        echo '<h1>---- $_REQUEST -----</H1>';
        foreach ($_REQUEST as $key => $valor){
            echo '<p>$_REQUEST["' . $key . '"]='. $valor. '</p>';
        }
        echo '<h1>---- $_COOKIE -----</H1>';
        foreach ($_COOKIE as $key => $valor){
            echo '<p>$_COOKIE["' . $key . '"]='. $valor. '</p>';
        }
        echo '<h1>---- $_POST -----</H1>';
        foreach ($_POST as $key => $valor){
            echo '<p>$_POST["' . $key . '"]='. $valor. '</p>';
        }
        echo '<h1>---- $_GET -----</H1>';
        foreach ($_GET as $key => $valor){
            echo '<p>$_GET["' . $key . '"]='. $valor. '</p>';
        }
        echo '<h1>---- $_SESSION -----</H1>';
        foreach ($_SESSION as $key => $valor){
            echo '<p>$_SESSION["' . $key . '"]='. $valor. '</p>';
        }

        


     


    ?>
    </p>
    <!-- <form name="form1" action="01-formulario_enviado.php">
        Nombre <input type="text" name="nombre" id="nombre" /><br>
        Año Nacimiento <input type="text" name="ano" id="ano" /><br>
        <input type="submit" name="submit" value="enviar">
    </form> -->
    
</body>
</html>