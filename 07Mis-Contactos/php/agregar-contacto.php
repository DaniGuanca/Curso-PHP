<?php
    //Hago el ALTA en la BD
    //En php las variables del formulario se cachean por el name, asigno esas variables del formulario en variables de PHP
    $email = $_POST["email_txt"];
    $nombre = $_POST["nombre_txt"];
    $sexo = $_POST["sexo_rdo"];
    $nacimiento = $_POST["nacimiento_txt"];
    $telefono = $_POST["telefono_txt"];
    $pais = $_POST["pais_slc"];
    //Si es M le pongo la imagen amigo y sino la imagen amiga
    $imagen_generica = ($sexo == "M")? "amigo.png" : "amiga.png";


    //Verificamos que no exista previamente el email del usuario en la base de datos
    //Conexion y seleccion de base de datos
    include("conexion.php");

    //Consulta
    $consulta = "SELECT * FROM contactos WHERE email = '$email'";

    //Ejecuto
    $ejecutar_consulta = $conexion->query($consulta);

    //Guardo el numero de registros obtenidos de la consulta
    //num_rows devuelve el numero de resultados (filas) que obtuvo la consulta
    $num_reg = $ejecutar_consulta->num_rows;

    //Si num_reg es 0 entonces no se repite email y puedo insertar, si no quiere decir que ya existe un email igual
    //por lo que mando el mensaje que esta ocupado el email (PK)
    if($num_reg == 0){
        //Inserto Registro
        //Se ejecuta la funcion para subir la imagen
        include("funciones.php");

        $tipo = $_FILES["foto_fls"]["type"];
        $archivo = $_FILES["foto_fls"]["tmp_name"];
        $se_subio_imagen = subir_imagen($tipo,$archivo,$email);

        //Si la foto en el formulario viene vacia le asigno el valor de la imagen generica
        //sino el nombre de la foto que se subio
        $imagen = empty($archivo)? $imagen_generica : $se_subio_imagen;

        //HAGO EL INSERT
        $consulta = "INSERT INTO contactos (email,nombre,sexo,nacimiento,telefono,pais,imagen) 
        VALUES ('$email','$nombre','$sexo','$nacimiento','$telefono','$pais','$imagen')";

        $ejecutar_consulta = $conexion->query($consulta);

        if($ejecutar_consulta) 
            $mensaje = "Se ha dado de alta al contacto con el email <b>$email</b>";
        else
            $mensaje = "No se pudo dar de alta al contacto con el email <b>$email</b>";

    }else {
        //Mensaje de Error
        $mensaje = "No se pudo dar de alta al contacto con el email <b>$email porque ya existe</b>";
    }

    //Cierro la conexion
    $conexion->close();
    header("Location: ../index.php?op=alta&mensaje=$mensaje");

?>