<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 01</title>
</head>
<body>
    <form name="form1" action="01-formulario_enviado.php" method="get">
        Nombre <input type="text" name="nombre" id="nombre" /><br>
        Año Nacimiento <input type="text" name="ano" id="ano" /><br>
        <input type="submit" name="submit" value="enviar">
    </form>
    <a href="01-formulario_enviado.php?nombre=minombre&ano=212121">envia</a>
    
</body>
</html>