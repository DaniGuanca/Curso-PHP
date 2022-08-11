<?php 
    //Conexion y acceso a bd
    include("conexion.php");

    //Consulta
    $consulta = "SELECT email FROM contactos ORDER BY email";

    //Ejecuto la consulta
    $ejecutar_consulta = $conexion->query($consulta);

    //Recorro el arreglo de resultados y pinto las opciones del select
    while($registro = $ejecutar_consulta->fetch_assoc()){

        //ESTOY PARTIENDO EL ECHO EN DOS, Y UNA VALIDACION EN EL MEDIO PARA QUE SI CUANDO EL USUARIO
        //ELIGE UN VALOR DEL COMBO QUEDE SELECCIONADO AL MOMENTO QUE SE HAGA EL WINDOW.LOCATION DEL JS
        //DE cambios-contaco.php

        echo "<option value='".$registro["email"]."'";

        //Esta validacion es para cuando en la pantalla cambio elija un mail quede seleccionado
        if($_GET["contacto_slc"] == $registro["email"]){
            echo "selected";
        }
           
        echo ">".$registro["email"]."</option>";
    }

    //Desconecto
    //LO COMENTO PORQUE EL SELECT PAIS LO VA A USAR DE NUEVO Y COMO LA CERRE NO FUNCIONA
    //$conexion->close();
?>