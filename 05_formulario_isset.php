<?php
function recogerVar($data) {
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        form {
            position: absolute;
        }
        .error {
            color: red;
        }
    </style>

</head>
<body>
 <?php
$nombreError = '';
$mailError = '';
$anoError ='';
$genderError ='';
$websiteError ='';
$conoError ='';

$nombre = '';
$mail='';
$ano='';
$gender='';
$website='';
$conocimientos='';
$conoTotal='';
$comment='';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    /* foreach $_POST */
/*     foreach ($_POST as $key => $valor)
    {
         //si valor es array es un check definido como tal conocimiento[] 
        if (is_array($valor)){
            echo "key = $key " ;
            echo print_r($valor);
        } else {
            // todos los input salvo los que tengan []
            echo "<p>$key = $valor</p>";
        }
    }
    echo '<hr>';
    print_r ($_POST['conocimientos']);
    echo '<hr>';
    echo $_POST['conocimientos'][0];
    echo '<hr>';
    foreach ($_POST['conocimientos'] as $key => $valor){
        echo "<p>$key = $valor</p>";
    }
    echo '<hr>';
    echo '<p>Conocimientos</p>'; */
    /* recoger */
    // RECOGIDA VALORES CHECKBOX NAME=”conocimientos[]”
        if (isset($_POST['conocimientos'])){
            if (is_array($_POST['conocimientos'])){
                $conocimientos = $_POST['conocimientos'];
            } else {
                $conocimientos = [];
            } 
            }else {
                $conocimientos = [];
            }
            print_r ($conocimientos);

            echo '<hr>';
    
    
    /* recoger variables del formulario */
    $verformulario = 'NO';
    
    //..
    /* validar variables */

    // Nombre
    if (empty($_POST['nombre'])) {
        $nombreError = "El nombre es obligatorio.";
        $verformulario='SI';
    } else {
        $nombre = recogerVar($_POST['nombre']);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
        $nombreError = "Solo permite letras y espacios en blanco...";
        $verformulario='SI';
        }
    }

    // Año
    if (empty($_POST['ano'])) {
        $anoError = "El año es obligatorio.";
        $verformulario='SI';
    } else {
        $ano = recogerVar($_POST['ano']);
    }

    //Sexo
    if (empty($_POST["gender"])) {
        $genderError = "El género es obligatorio.";
        $verformulario='SI';
    } else {
        $gender = recogerVar($_POST["gender"]);
      }    

    // ESTO NO FUNCIONA --------------------------------------------------------

    /* if (empty($_POST['genderM']) || !empty($_POST['genderH']) ) {
        $genderError = "El sexo es obligatorio";
        $verformulario='SI';
    } elseif (!empty($_POST['genderM']) || empty($_POST['genderH']) ) {
        $genderError = "El sexo es obligatorio";
        $verformulario='SI';
    } */

    // Mail
    if (empty($_POST['mail'])) {
        $mailError = "El mail es obligatorio.";
        $verformulario='SI';
    }
    else {
        $mail = recogerVar($_POST['mail']);
        if (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $mailError="Formato de Email inválido.";
        $verformulario='SI';
        }
    }
    
    // WebSite
    if (empty($_POST["website"])) {
        $website = "";        
    } else {
        $website = recogerVar($_POST['website']);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
            $websiteError = "Formato de URL invalido.";
            $verformulario='SI';
        }
    }

    // Conocimientos

    if (empty($_POST["conocimientos"]) || !isset($_POST["conocimientos"])) {
        $conoError = "Los conocimientos són obligatorios.";
        $verformulario='SI';
    } else {
        $conoArray=[];
        
    }

    // Observaciones
    if (empty($_POST["comment"])) {
        $comment = "";
      } else {
        $comment = recogerVar($_POST["comment"]);
      }

    //……
    } else { // vengo por metodo GET
    /* inicializar variables formulario */
    $nombre = '';
    $mail='';
    $ano='';
    $gender='';
    $website='';
    $conocimientos=[];
    $comment='';
    $verformulario='SI';
    
}

if ($verformulario=='SI'){
?>
<form method="post" action="" >  
        <fieldset style="background-color:aquamarine;">
            <legend><h2 style="background-color:grey;color:black;border:1px solid black;margin:5px;padding:5px">Contacto</h2></legend>            
            <p><span class="error">* Campo requerido</span></p>
            Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"><span class="error">*<?php echo $nombreError; ?></span>
            <br><br>
            Año de nacimiento: 
            <select name="ano">
                <?php 
                echo $anoactual = date("Y");
                $limi = $anoactual - 120;
                $lims = $anoactual - 18;
                for ($i=$limi ;$i <= $lims; $i++)
                {
                    $seleccionado ='';
                    if ($i==$ano) {$seleccionado='selected';}
                    echo "<option value='$i' $seleccionado >$i</option>" ;
                }
                ?>
            </select>
            <span class="error">* <?php echo $anoError;?></span>
            <br><br>
            Sexo:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Mujer") echo "checked";?> value="Mujer">Mujer
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Hombre") echo "checked";?> value="Hombre">Hombre
            <span class="error">* <?php echo $genderError;?></span>
            <br><br>
            E-mail: <input type="text" name="mail" value="<?php echo $mail;?>">
            <span class="error">* <?php echo $mailError;?></span>
            <br><br>
            Website: <input type="text" name="website">
            <span class="error"><?php echo $websiteError;?></span>
            <br><br>
            Conocimientos:
            <input type="checkbox" name="conocimientos[]" value="HTML" <?php if (in_array('HTML',$conocimientos)) {echo 'checked';}?>>HTML
            <input type="checkbox" name="conocimientos[]" value="CSS" <?php if (in_array('CSS',$conocimientos)) {echo 'checked';}?>>CSS
            <input type="checkbox" name="conocimientos[]" value="JavaScript" <?php if (in_array('JavaScript',$conocimientos)) {echo 'checked';}?>>JavaScript
            <input type="checkbox" name="conocimientos[]" value="PHP" <?php if (in_array('PHP',$conocimientos)) {echo 'checked';}?>>PHP
            <span class="error">* <br><?php echo $conoError;?></span>
            <br><br>
            Observaciones: <textarea name="comment" rows="5" cols="40"></textarea>
            <br><br>
            
            <input type="submit" name="submit" value="Enviar">  
        </fieldset>
    </form>
<?php 
} else {

    echo $nombre," ", $ano," ", $gender," ",$mail,"<br>" ;

    if ($gender=="Hombre") {
        echo "<p>Estimado :</p>";
    } else {
        echo "<p>Estimada :</p>";
    }
    
      /* ALGORITMO DE OBTENCION DE TARBAJO (DISEÑADOR Y/O PROGRMADOR)  */
      $dis = $pro = $disT = 'N';
      if (empty($conocimientos ))
      {
        echo '<p>LO sentimos no reune las caracteristicas mínima</p>';
      } else {
        if (in_array('PHP',$conocimientos)) { $pro = 'S';}

        if (in_array('HTML',$conocimientos) OR in_array('CSS',$conocimientos) OR  in_array('JavaScript',$conocimientos)) { $dis = 'S';}
        if (in_array('HTML',$conocimientos) && in_array('CSS',$conocimientos) &&  in_array('JavaScript',$conocimientos)) { $disT = 'S';}
        $mensaje = '';
        if ($dis=='N' && $pro=='N') {$mensaje = 'Te recomiendo empezar con html';}
        if (($dis=='S'&& $disT='N' ) && $pro=='N') {$mensaje = 'Diseñador';}
        if ($dis=='N' && $pro=='S') {$mensaje = 'Programador';}
        if ($dis=='S' && $disT='N' && $pro=='S') {$mensaje = 'Diseñador y Programador';}
        if ( $disT=='S'  && $pro=='N') {$mensaje = 'Senior Diseñador ';}
        if ( $disT=='S'  && $pro=='S') {$mensaje = 'FullStack';}

        






        echo "<p>Tomamos nota de su solicitud de trabajo para $mensaje </p>";
        echo "<p>Enviaremos las novedades al correo $mail  que nos ha suministrado.</p>";
        echo "<p>Saludos,</p>";
        echo "<p>Dpto atención cliente</p>";
  
     }

}
?>



</body>
</html>