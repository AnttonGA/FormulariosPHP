<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
    
// define variables y establece valores vacios !!! 
$nameError = $emailError = $genderError = $websiteError = "";
$name = $email = $gender = $comment = $website = "";
 $idiomas = [];
    
//if ($_SERVER["REQUEST_METHOD"] == "POST") {


 if ($_POST) { 
     
  if (empty($_POST["name"])) {
    $nameError = "Name es requerido";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailError = "Email es requerido";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderError = "Gender es requerido";
  } else {
    $gender = test_input($_POST["gender"]);
  }
/*   foreach ($_POST as $key => $valor){
    if (is_array($valor))
    {
        print_r($valor);
    }
    echo $valor;
  } */
 if (is_array($_POST['idiomas'])){
  $idiomas = $_POST['idiomas'];
  print_r($idiomas);
 } else {
    $idiomas = [];
 }
  
}

function test_input($data) {
    // Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
  $data = trim($data); 
   //  Quita las barras de un string con comillas escapadas \' 
  $data = stripslashes($data);
    // Convierte caracteres especiales en entidades HTML
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Ejemplo de validación de formulario PHP</h2>

<p><span class="error">* campo requerido</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameError;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailError;?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteError;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderError;?></span>
  <br><br>
  Gender:
  <input type="checkbox" name="idiomas[]" value="eu" <?php if (in_array('eu',$idiomas,)) {echo 'checked';} ?> >Euskera
  <input type="checkbox" name="idiomas[]" value="es" <?php if (in_array('es',$idiomas,)) {echo 'checked';} ?>>Castellano
  <input type="checkbox" name="idiomas[]" value="en" <?php if (in_array('en',$idiomas,)) {echo 'checked';} ?>>Ingles
    <br>


  <input type="submit" name="submit" value="Submit">  
</form>


<h2>DATOS DEL FORMULARIO</h2>

<?php

echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>