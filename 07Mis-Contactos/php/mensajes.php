<?php 
    //Esto va a imprimir mensajes si se completo la operacion o no
    if(isset($_GET["mensaje"])){

        $mensaje = $_GET["mensaje"];
        echo "<br/><span class='mensajes'>$mensaje</span><br/>";
    }
?>