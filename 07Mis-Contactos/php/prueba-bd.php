<?php
    /* PASOS PARA CONECTARSE A LA BASE DE DATOS CON PHP
    1) Conectarse al servidor de BD con my_sqli_connect que recibe 3 parametros:
        * Servidor
        * Usuario de la Base de datos
        * Contraseña del usuario */
    $conexion = mysqli_connect("localhost","root","") or die("No se pudo conectar la BD");
    echo "Estoy conectando a MySQL<br/>";

    //2) Seleccionar la BD a usar con mysqli_select_db("base de datos")
    mysqli_select_db($conexion, "mis_contactos") or die("No se pudo seleccionar la BD mis_contactos");
    echo "BD seleccionada: 'mis_contactos' <br/>";

    //3) Creo una consulta a la BD para probar

    $consulta = "SELECT * FROM pais";

    /* 4) Ejecutamos la consulta SQL con mysqli_query que recibe 2 parametros:
        * La consulta
        * La conexion a la BD */

    $ejecutar_consulta = mysqli_query($conexion,$consulta) or die("No se pudo ejecutar la consulta a la BD");
    echo "Se ejecuto la consulta <br />";

    /* 5) Mostrar el resultado de ejecutar la consulta, el resultado de las consultas se devuelven en un arreglo
        mediante un ciclo voy sacando cada registro con mysqli_fetch_array */
    while($registro = mysqli_fetch_array($ejecutar_consulta)){
        echo $registro["id_pais"]." - ".$registro["pais"]."<br/>";
    }

    //6) Por ultimo cerramos la conexion a la BD con mysqli_close(conexion);

        mysqli_close($conexion) or die("Ocurrio un error al cerrar la conexion");
        echo "Conexion cerrada <br/>";
?>