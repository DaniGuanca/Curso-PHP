<?php
/* $_GET y $_POST son VARIABLES GLOBALES de php que se crea cuando se mandan datos por metodo get o por metodo post
y son arreglos que contiene todos los datos enviados */
 if (isset($_GET["enviar_btn"])){
    echo "Los datos los enviaste por metodo GET, los datos son:
     <br/><br/>El nombre es: ".$_GET["nombre_txt"]."<br/>
     El password es: ".$_GET["password_txt"];
 } else if ($_POST["enviar_btn"]){
    echo "Los datos los enviaste por metodo POST, los datos son: 
    <br/><br/>El nombre es: ".$_POST["nombre_txt"]."<br/>
    El password es: ".$_POST["password_txt"];
 }
?>