<?php
//La funcion echo se usa para pintar por pantalla o como salida
echo("Hola Mundo");
//Tambien se puede hacer sin parentesis, porque es permisivo el lenguaje pete este
echo "Hola Mundo sin parentesis";
//echo puede detectar etiquetas html
echo "<br/>Hola cruel mundo <br/> estoy <h1>aprendiendo PHP</h1>";

//Las variables se declaran con $, no se usa var ni const
$nombre = "Dani";
$Nombre = "Antonio";

//En PHP para concatenar no se usa + como en otros lenguajes, se usa . (punto)
//&nbsp; es un espacio en blanco en html, tambien podia poner el espacio directamente
echo $nombre."&nbsp;".$Nombre;
echo "<br />";


$num1 = 5;
$num2 = 78;

$suma = $num1 + $num2;
echo $suma;
echo "<br />";

//Se puede meter variables dentro del ""
//Con la contra barra \ se puede escapar de caracteres especiales para mostrarlos por ""
echo "La variable \$suma tiene el valor de $suma";
echo "<br />";


//ESTRUCTURAS BASICAS

//IF
//Modulo se representa con %
$modulo = $num2 % 2;

if($modulo == 0){
    echo "El numero es par";
}else {
    echo "El numero es impar";
}

echo "<br />";
echo "<br />";

//FOR
for($i = 0; $i <= 10; $i++){
    echo $i."<br />";
}

?>