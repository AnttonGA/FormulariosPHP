<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 01</title>
</head>
<body>
    <?PHP
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        echo '<p>Vienes del formulario</p>';
        print_r ($_POST);
        echo '<hr>';
     
        /* recorremos los campos del formulario */
        foreach ($_POST as $key => $valor){
            echo $_POST[$key]  . "  key : $key valor : $valor <br>";        
        }
        /* recoger uno a uno */
        echo '<hr>';
        $nombre = $_POST['nombre'];
        echo "nombre = $nombre <br>";
        if (empty($nombre)){
            echo '<p>No ha introducido nombre</p>';
        }
        if (strlen($nombre)<4)
        {
            echo '<p>El nombre es muy corto, menos de 4 caracteres</p>';
        }





    }
    else 
    {
    ?>
        <form name="form1" action="" method="POST">
            Nombre <input type="text" name="nombre" id="nombre" /> * <br>
            Año Nacimiento <input type="text" name="ano" id="ano" /><br>
            Localidad <input type="text" name="localidad" id="localidad" /><br>
            <input type="submit" name="submit" value="enviar">
        </form>
    <?PHP 
    } ?>
    
</body>
</html>