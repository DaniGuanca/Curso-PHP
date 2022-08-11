<?php
    //Operaciones basicas insertar,eliminar,consultar y modificar datos

    //Pasos para conectarse, 1 conectarse al servidor, 2 seleccionar la bd, 3 hacer consultas, 4 ejecutar consultas
    //5 guardar resultados o mostrar, 6 cerrar conexion

    $conexion = mysqli_connect("localhost","root","") or die ("No se pudo conectar a la BD");
    echo "Conectado al servidor de BD MySQL<br />";


    mysqli_select_db($conexion, "mis_contactos") or die("No se pudo seleccionar la BD");
    echo "BD seleccionada: <b>mis_contactos</b><br />";

    echo "<h1>Las 4 operaciones basicas a una BD</h1>";

    //************************** INSERT ********************************/

    echo "<h2>INSERCCION DE DATOS</h2>";
    //INSERT INTO tabla(campo1,campo2,campo3...) VALUES (valor1,valor2,valor3...)

    $consulta = "INSERT INTO contactos(email,nombre,sexo,nacimiento,telefono,pais,imagen)
    VALUES('dany12rp13@gmail.com','Dani','M','1993-02-11','155073622','Argentina','algo.jpg')";

    $ejecutar_consulta = mysqli_query($conexion,$consulta);
    echo "Se han insertado los datos :)";

    //************************** DELETE ********************************/

    echo "<h2>ELIMINACION DE DATOS</h2>";
    // DELETE FROM nombre_tabla WHERE campo = valor

    $consulta = "DELETE FROM contactos WHERE email='dany12rp13@gmail.com'";
    $ejecutar_consulta = mysqli_query($conexion,$consulta);
    echo "Datos eliminados";


    //************************** UPDATE ********************************/

    echo "<h2>MODIFICACION DE DATOS</h2>";
    // UPDATE tabla SET campo1 = valor1, campo2 = valor2, campo3 = valor3 WHERE campo = valor

    $consulta = "UPDATE contactos SET nombre = 'Daniel', imagen = 'otro.jpg' WHERE email = 'dany12rp@gmail.com'";
    $ejecutar_consulta = mysqli_query($conexion,$consulta);
    echo "Datos modificados";




    //************************** SELECT ********************************/
    echo "<h2>CONSULTA DE DATOS</h2>";
    // SELECT * FROM nombre_tabla WHERE campo = valor

    $consulta = "SELECT * FROM contactos";
    $ejecutar_consulta = mysqli_query($conexion,$consulta);
    echo "<h3>Consulta que trae todos los registros de la tabla</h3>";

    while($registro = mysqli_fetch_array($ejecutar_consulta)){
        echo $registro["email"]."---";
        echo $registro["nombre"]."---";
        echo $registro["sexo"]."---";
        echo $registro["nacimiento"]."---";
        echo $registro["telefono"]."---";
        echo $registro["pais"]."---";
        echo $registro["imagen"];
        echo "<br/>";
    }



    $consulta = "SELECT * FROM contactos WHERE nombre = 'Chango'";
    $ejecutar_consulta = mysqli_query($conexion,$consulta);
    echo "<h3>Consulta que trae todos los registros de la tabla donde el nombre sea Chango</h3>";

    while($registro = mysqli_fetch_array($ejecutar_consulta)){
        echo $registro["email"]."---";
        echo $registro["nombre"]."---";
        echo $registro["sexo"]."---";
        echo $registro["nacimiento"]."---";
        echo $registro["telefono"]."---";
        echo $registro["pais"]."---";
        echo $registro["imagen"];
        echo "<br/>";
    }



    $consulta = "SELECT * FROM contactos WHERE nombre = 'PIBE' AND email = 'un mail";
    $ejecutar_consulta = mysqli_query($conexion,$consulta);
    echo "<h3>Consulta que trae todos los registros de la tabla donde el nombre sea PIBE y email sea un mail (osea ninguno)</h3>";

    while($registro = mysqli_fetch_array($ejecutar_consulta)){
        echo $registro["email"]."---";
        echo $registro["nombre"]."---";
        echo $registro["sexo"]."---";
        echo $registro["nacimiento"]."---";
        echo $registro["telefono"]."---";
        echo $registro["pais"]."---";
        echo $registro["imagen"];
        echo "<br/>";
    }


    //CIERO CONEXION
    mysqli_close($conexion);
    echo "<h4>Conexion Cerrada</h4>";

?>