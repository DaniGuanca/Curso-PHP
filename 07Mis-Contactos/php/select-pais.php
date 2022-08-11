<?php
    //Incluyo el conexion.php para que se conecte a la bd y voy a usar la variable $conexion que cree ahi
    //EL SELECT EMAIL YA LO INCLUYO NO PUEDE HACER DOS INCLUDE DE UN MISMO ARCHIVO
    if(!$registro_contacto["pais"]){
        //Significa que esta en alta
        include("conexion.php");
    }

    //Creo la consulta
    $consulta = "SELECT * from pais ORDER BY pais";

    //Ejecuto la consulta
    $ejecutar_consulta = $conexion->query($consulta);

    //Muestro los datos, en un option porque esto va a estar incluido dentro de un combo select
    while($registro = $ejecutar_consulta->fetch_assoc()){
        $nombre_pais = $registro["pais"];
        echo "<option value='$nombre_pais'";

        //Esto es para que quede seleccionado el pais en la pantalla cambio, es similar a lo que hice en select-email
        if($nombre_pais == $registro_contacto["pais"])
            echo " selected";

        echo ">$nombre_pais</option>";
    }

?>