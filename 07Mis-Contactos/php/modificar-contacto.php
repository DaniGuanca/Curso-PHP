<?php
    //Asigno a variables php los valores que vienen del formulario
    //Como el campo del email esta deshabilitado en el form php no lo reconoce por eso tengo 
    //que guardar su valor en un campo oculto
    $email = $_POST["email_hdn"];
    $nombre = $_POST["nombre_txt"];
    $sexo = $_POST["sexo_rdo"];
    $nacimiento = $_POST["nacimiento_txt"];
    $telefono = $_POST["telefono_txt"];
    $pais = $_POST["pais_slc"];

    include("conexion.php");
    $consulta = "SELECT * FROM contactos WHERE email='$email'";
    $ejecutar_consulta = $conexion->query($consulta);
    $num_reg = $ejecutar_consulta->num_rows;

    //Si existe el contacto
    if($num_reg == 1){
        /* Si la foto viene vacia asignamos el valor del boton oculto de la foto que tiene el 
        valor anterior a la busqueda osea lo del hidden, sino subo la nueva foto y reemplazo el valor */
        if(empty($_FILES["foto_fls"]["tmp_name"])){
            //Esta vacio entonces va la imagen que ya tenia
            $imagen = $_POST["foto_hdn"];

        }else{
            //Si subio una imagen nueva asi que ejecuto las funciones de subir imagen
            include("funciones.php");
            $tipo = $_FILES["foto_fls"]["type"];
            $archivo = $_FILES["foto_fls"]["tmp_name"];

            $imagen = subir_imagen($tipo,$archivo,$email);
        }

        //HAGO EL UPDATE
        $consulta = "UPDATE contactos SET nombre='$nombre', sexo='$sexo', nacimiento='$nacimiento', telefono='$telefono', pais='$pais', imagen='$imagen' WHERE email='$email'";
        $ejecutar_consulta = $conexion->query($consulta);

        if($ejecutar_consulta){
            $mensaje = "Se modificaron los datos del contacto con el email <b>$email</b>";
        }else {
            $mensaje = "No se pudieron hacer los cambios en los datos del contacto con el email <b>$email</b>";
        }

    }else {
        $mensaje = "No se pudieron hacer los cambios en los datos del contacto con el email <b>$email</b>";
    }

    $conexion->close();
    header("Location: ../index.php?op=cambios&mensaje=$mensaje");
?>