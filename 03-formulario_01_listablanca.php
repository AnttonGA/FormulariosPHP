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
    $nombre = $localidad = $ano = $email ='';
    $nombreError = $localidadError = $anoError = $emailError = '';
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        //echo '<p>Vienes del formulario</p>';
        print_r ($_POST);
        echo '<hr>';
        /* recorremos los campos del formulario */
        //foreach ($_POST as $key => $valor) {
        //    echo $_POST[$key]  . "  key : $key valor : $valor <br>";        
        //}
        /* recoger uno a uno */
        //echo '<hr>';
        $nombre = $_POST['nombre'];
        $ano = $_POST['ano'];
        $localidad = $_POST['localidad'];
        $email = $_POST['email'];

        /* validacion */
        echo "nombre = $nombre <br>";
        if (empty($nombre)) {
            //echo '<p>No ha introducido nombre</p>';
            $nombreError = "No ha introducido nombre";
        } elseif (strlen($nombre) < 4 ) {
            //echo '<p>El nombre es muy corto, menos de 4 caracteres</p>';
            $nombreError = 'El nombre es muy corto, menos de 4 caracteres';
        }

        if (empty($ano)) {
            $anoError = "No ha introducido año";
        } elseif (date("Y") - $ano > 120 ) {
            $anoError = "No puede ser mayor de 120 años";
        } elseif (date("Y") - $ano < 18 ) {
            $anoError = "No puede ser menor de edad";
        }

        $localidadesAceptadas = ["Barcelona","Mataro","L'Hospitalet"];
        
        function validarLocalidad($localidad, Array $localidadesAceptadas) {
            for ($i = 0; $i<sizeof($localidadesAceptadas);$i++) {
                if ($localidad == $localidadesAceptadas[$i]) {
                    return null;
                }
            }
            return 'La localidad no está incluída en las localidades aceptadas';
        }

        $localidadError = validarLocalidad($localidad, $localidadesAceptadas);
        
        /*
        while (($localidadError != '') && (sizeof($localidadesAceptadas) = )) {
            

        }
        for ($i = 0; $i<sizeof($localidadesAceptadas);$i++) {
            if ($localidad != $localidadesAceptadas[$i]) {
                $localidadError
            }
        }
        */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "$email is not a valid email address";
        }

        /*
        Edad : mayor de 18 años y menos de 120
        localidad : una lista blanca. array $localidades = ["Barcelona","Mataro","L'Hospitalet"];
        añadir un nuevo campo de formulario email y validarlo.
        */
    }
   
    ?>
    <hr><hr>
        <form name="form1" action="" method="POST">
            Nombre <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"/> *  <?php echo $nombreError; ?><br>         
            Año Nacimiento <input type="text" name="ano" id="ano" value="<?php echo $ano; ?>"/>* <?php echo $anoError; ?><br>
            Localidad <input type="text" name="localidad" id="localidad" value="<?php echo $localidad; ?>"/>* <?php echo $localidadError; ?><br>
            E-mail <input type="email" name="email" id="email" value="<?php echo $email; ?>"/>* <?php echo $emailError; ?><br>
            <input type="color"><br>
            <input type="date">
            <input type="email">
            <input type="submit" name="submit" value="enviar">
        </form>
    <?PHP 
    ?>
    
</body>
</html>