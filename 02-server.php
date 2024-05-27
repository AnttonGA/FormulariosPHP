<?php


/* foreach recorre arrays asociativos */
foreach ($_SERVER as $key => $valor){
        echo '<p>$_SERVER["' . $key . '"]='. $valor. '</p>';
}
echo '<hr>';
echo 'user-agent <br>';

echo $user = $_SERVER['HTTP_USER_AGENT'];
echo '<hr>';
echo '<br>Navegador <br>';
if (str_contains($user,'Edg')){
        echo 'Edge';
} elseif (str_contains($user,'Firefox')){
        echo 'Firefox';
} elseif (str_contains($user,'Chrome')){
        echo 'Chrome';
} else {
        echo 'Navegador desconocido';
}
echo '<hr>';
echo '<br>Sisitema Operativo <br>';
if (str_contains($user,'Windows')){
        echo 'Windows ';
} elseif (str_contains($user,'Linux')){
        echo 'Linux';
} elseif (str_contains($user,'Mac')){
        echo 'Chrome';
} elseif (str_contains($user,'Android')){
        echo 'Android';
} elseif (str_contains($user,'IPhone')){
        echo 'IPhone';
} elseif(str_contains($user,'Ipad')){
        echo 'IPad';
} else {
        echo 'Navegador desconocido';
}
echo '<hr>';
echo '<br>Lenguaje<br>';
echo $lang = $_SERVER["HTTP_ACCEPT_LANGUAGE"] . '<br>';
echo $primerLang = substr($lang,0,2);
// explode 
echo '<hr>explode';
$langs = explode(';',$lang);
print_r($langs);
echo '<br>Primer lang :  ' . $langs[0] .'<br>';
$lang1 = explode(',',$langs[0]);
print_r($lang1);
echo '<hr>';
echo '<br>get_browser<br>';
$navegador = get_browser(null,true);
print_r($navegador);
echo '<hr>';
$alumnos['Neike']= '172.17.11.155';
$alumnos['Gaizka']= '172.17.11.157';
$alumnos['Humberto']= '172.17.11.159';
$alumnos['Egoitz']= '172.17.11.160';
$alumnos['Silvia']= '172.17.11.166';
$alumnos['Norlan']= '172.17.11.168';
$alumnos['Antton']= '172.17.11.154';
$alumnos['Alberto']= '172.17.15.10';
$ip_remota = $_SERVER['REMOTE_ADDR'];
echo "IP Remota : $ip_remota" . '<br>';
foreach($alumnos as $key => $valor){
        if ($valor == $ip_remota) { 
                echo "Kaixo " . $key .'<br>'; 
                break;
        }
}
if (in_array($ip_remota, $alumnos)){
        echo "estas en alumnos";
}

$redlocal = '172.17.';

if (substr($ip_remota,0,7)==$redlocal) {
        echo '<br>Estas en la red local';
}
if (substr($ip_remota,0,9)=='172.17.15') {
        echo '<br>Estas en la red profesores';
}
echo '<hr>';
if (substr($ip_remota,0,9)=='172.17.15') {
        echo '<br>Estas en la red profesores';
} elseif (substr($ip_remota,0,7)==$redlocal) {
        echo '<br>Estas en la red local';
} else {
        echo '<br>Hola Internauta';
}




?>