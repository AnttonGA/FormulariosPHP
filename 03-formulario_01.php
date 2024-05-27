<?PHP 
function validarVar($valor)
{
    //$valor =  filter_var($valor, FILTER_SANITIZE_STRING);
    //$valor = addslashes($valor);
    $valor = addslashes(htmlspecialchars($valor));
    return $valor;
}
?>


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
    $nombre = $localidad = $anio = '';
    $nombreError = $localidadError = $anioError = '';
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
        $anio = $_POST['ano'];
        $localidad = $_POST['localidad'];


        /* validacion */
        echo "nombre = $nombre <br>";
        echo 'vali nombre ' . validarVar($nombre) . '<br>';

        if (empty($nombre)){
            echo '<p>No ha introducido nombre</p>';
            $nombreError = "No ha introducido nombre";
        } else {
            if (strlen($nombre)<4)
            {
                echo '<p>El nombre es muy corto, menos de 4 caracteres</p>';
                $nombreError = 'El nombre es muy corto, menos de 4 caracteres';
            }
        }

    }
   
    ?>
    <hr><hr>
        <form name="form1" action="" method="POST">
            Nombre <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"/> *  <?php echo $nombreError; ?>    <br>
            
            Año Nacimiento <input type="text" name="ano" id="ano" value="<?php echo $anio; ?>"/><?php echo $anioError; ?><br>
            Localidad <input type="text" name="localidad" id="localidad" value="<?php echo $localidad; ?>"/><?php echo $localidadError; ?><br>
            Conocimientos:
            <input type="checkbox" name="conocimientos[]" value="HTML" <?php if (in_array('HTML',$conocimientos)) {echo 'checked';}?>>HTML
            <input type="checkbox" name="conocimientos[]" value="CSS" <?php if (in_array('CSS',$conocimientos)) {echo 'checked';}?>>CSS
            <input type="checkbox" name="conocimientos[]" value="JavaScript" <?php if (in_array('JavaScript',$conocimientos)) {echo 'checked';}?>>JavaScript
            <input type="checkbox" name="conocimientos[]" value="PHP" <?php if (in_array('PHP',$conocimientos)) {echo 'checked';}?>>PHP
            <span class="error">* <br><?php echo $conoError;?></span>
            <br><br>
            Observaciones: <textarea name="comment" rows="5" cols="40"></textarea>
            <input type="submit" name="submit" value="enviar">
        </form>
    <?PHP 
    ?>
    
</body>
</html>