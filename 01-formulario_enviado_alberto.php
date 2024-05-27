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
      
    
    
    
    echo $nombre = $_REQUEST['nombre'];
    echo $anyo = $_REQUEST['anyo'];
    // VALIDAR 
    /* if (empty($nombre))  
    {
        echo 'El nombre no puede estar vacio';
    } 
  
    if (empty($anyo)){

            echo 'El año no puede estar vacio';

    } else {
        // RESULTADO
            echo "<H1>Hola $nombre </H1>";
            echo "<p>Año : $anyo </p>";
            echo '<p>Año : $anyo </p>';
    }
    
     */

?>