<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 01</title>
    <style>
        .error {
            border : 1px solid red;
            color : red;
        }
    </style>
</head>
<body>
    <h1>Formulario Enviado</h1>
    <?php
    // inicializacion
        function recogerVar($data) {
            $data = trim($data); 
            $data = addslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    if ($_POST){
        $mostrarFormulario=false;
        $nombre = recogerVar($_REQUEST['nombre']);
        $anyo = $_REQUEST['anyo'];   
        $mostrarFormulario =false;
        $errorNombre = '';
        $textoError = '';
        if (empty($nombre) ||  strlen($nombre)<4){
            $formularioCorrecto=false;
            $mostrarFormulario=true;
            $textoError .= 'Nombre vacio';
            $errorNombre= 'error';
        }


    } else {
       $nombre = $anyo = $errorNombre = $textoError = '';
       $formularioCorrecto=true;
       $mostrarFormulario = true;

    }
        
        
        // resultado
        if ($mostrarFormulario == false){
            echo '<p>Ok</p>';
        } else {
            if (!$formularioCorrecto){
            echo "<p class='error'>$textoError</p>";
            }
            ?>
                <form name="form1" action="" method="POST">
         Nombre <input type="text" class="<?php echo $errorNombre;?>" name="nombre" id="nombre" value="<?php echo $nombre;?>"/><br>
            Año Nacimiento <input type="text" name="anyo" id="anyo" /><br>
        <input type="submit" name="submit" value="enviar">
            </form>
        <?php } ?>

    


 
    
</body>
</html>