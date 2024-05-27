<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivo</title>
    <style>
        
        #container{
            width: 80%;
            margin: 0px auto;
            display: block;
            font-family: helvetica;
            padding-top: 60px;
        }
    
    </style>
</head>
<body>


<div id="container">
    
    <h1>Subir Archivo</h1>
 <?php  if ($_POST) {
    
    // solo archivos jpge
    if ( $_FILES['fichero_usuario']['type'] == 'image/jpeg'){

            
            


            $dir_subida = $_SERVER['DOCUMENT_ROOT'] . '/php/02-FORMULARIOS/upload/';

            $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
            
            echo '<pre>';
            if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
                echo "El fichero es válido y se subió con éxito.\n";
            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }
            
            echo 'Más información de depuración:';
            print_r($_FILES);
            echo '<hr>';
            echo '<p> Tipo : ' . $_FILES['fichero_usuario']['type'] . '</p>';
            
            print "</pre>";
    } else {
            echo '<p> Tipo incorrecto '. $_FILES['fichero_usuario']['type'] . ' </p>';
    }


  } else { ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <b>Enviar un nuevo archivo: </b>
        <br>
        <input name="fichero[]" type="file">
        <br>
        <br>
        <input name="fichero[]" type="file">
        <br>
        <input type="submit" value="Enviar">
    </form>
<?php } ?>
   


</div>

</body>
</html>