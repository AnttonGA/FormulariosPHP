<?php
    /****************************** */
    /*   INICIALIZACION             */
    /****************************** */
    function recogerVar($data) {
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nombre = recogerVar($_REQUEST['nombre']);
    $anyo = $_REQUEST['anyo'];   
    $formularioCorrecto=true;
    $textoError = '';
    // VALIDAR 
 
    if (empty($nombre))  
    {
        $textoError .= 'El nombre no puede estar vacio<br>';
        $formularioCorrecto=false;
    } 
    if (empty($anyo)) 
    {
        $textoError .= 'El año no puede estar vacio o debe ser un numero';
        $formularioCorrecto=false;

    }
    // RESULTADO
    if ($formularioCorrecto){
        echo "<H1>Hola $nombre </H1>";
        echo "<p>Año : $anyo </p>";
        echo '<p>Año : $anyo </p>';
    }else {
        echo "<h1>Error</h1>";
        echo "<p>$textoError</p>";
    }
     
    

?>