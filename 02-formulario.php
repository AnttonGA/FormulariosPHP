<?php
// funcion para sanitizar los datos
// podria incluirse en el include funciones.php o config.php
function recogerVar($data) {
    $data = trim($data); // elimina espacios al principio y al final del dato
    $data = addslashes($data); // añade contrabarra \ a las comillas (evitar inyeccion)
    $data = htmlspecialchars($data); // transforma a entidades HTML los valores queinterpreta html ( < -> &lt;)
    return $data;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
$nombreError = '';
$mailError = $telefonoError= '';

if ($_SERVER['REQUEST_METHOD']=='POST'){
	/* recoger variables del formulario */
	$verformulario = 'NO';
	$nombre = recogerVar($_POST['nombre']); 
	$mail = recogerVar($_POST['mail']);
    $telefono  = recogerVar($_POST['telefono']);
	$ano = recogerVar($_POST['ano']);
	//..
	/* validar variables */
	if (!filter_var($mail,FILTER_VALIDATE_EMAIL))
	{$mailError="Email Incorrecto";$verformulario='SI';}
	
    
    //……
} else { // vengo por metodo GET
	/* inicializar variables formulario */
	$nombre = '';
	$mail='';
	$telefono= '';
	//$ano = 0;
    $verformulario='SI';
	
}

if ($verformulario=='SI'){
?>
    <form name="formcontacto" action="" method="POST">
		<p>
		<input name="nombre" id="nombre" type="text" value="<?php echo $nombre;?>" />
		<?php echo $nombreError; ?>
		</p>
		<p>
		<input name="mail" id="mail" type="email" value="<?php echo $mail;?>" />
		<?php echo $mailError; ?>
		</p>
		<p>
			Año nacimiento : 
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
		</p>
        <p>
		Telefono : <input name="telefono" id="telefono" type="tel" value="<?php echo $telefono;?>" />
		<?php echo $telefonoError; ?>
		</p>
				

		<p><input type="submit"  value="enviar" /></p>
	</form>
<?php } else { ?> 

	<p>Envio Ok </p>
	<?php } ?>




</body>
</html>