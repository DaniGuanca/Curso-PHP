<?php
    $de = $_POST["de_txt"];
    $para = $_POST["para_txt"];
    $asunto = $_POST["asunto_txt"];
    $mensaje = $_POST["mensaje_txa"];
    //Especifico la cabecera del mensaje
    $cabeceras = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1\r\nFrom: $de \r\n";

    //Primero hay que subir el archivo al servidor y despues enviarlo al mail
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    //Lo voy a guardar en la misma direcion y con su nombre
    $destino = $_FILES["archivo_fls"]["name"];

    if(move_uploaded_file($archivo,$destino)){
        //incluyo clase phpMailer include() e include_once() hacen lo mismo solo que la segunda no repite
        include_once("class.phpmailer.php");
        include_once("class.smtp.php");

        //Creo una instancia de PHPMailer
        $mail = new PHPMailer();
        //Uso protocolo SMTP
        //En PHP para acceder a propiedades de objetos y clases se usa ->   NO PUNTO PORQUE SE USA PARA CONCATENAR
        $mail->IsSMTP();
        //Autentico el smtp
        $mail->SMTPAuth = true;
        //PONGO EL METODO DE SEGURIDAD SSL Security Socket Layer
        $mail->SMTPSecure = "ssl";
        //El host desde el que vamos a enviar el mail, voy a usar el de gmail
        $mail->Host = "smtp.gmail.com";
        //Hay que indicar el puerto donde sale, en general para mail se usa el puerto seguro de gmail es 465
        $mail->Port = 465;
        //De quien o remitente
        $mail->From = $de;
        //Para quien o destinatario
        $mail->AddAddress($para);

        //MI CUENTA DE GMAIL PARA ENVIAR EL CORREO
        $mail->Username  = "dany12rp13@gmail.com";
        $mail->Password = "********";

        //Asunto
        $mail->Subject = $asunto;
        //Contenido del correo
        $mail->Body = $mensaje;
        //Numero de columnas del correo 
        $mail->WordWrap = 50;
        //Indico que el cuerpo del correo va a tener formato html
        $mail->MsgHTML($mensaje);
        //Adjunto el archivo subido al servidor para enviar por mail
        $mail->AddAttachment($destino);

        //Send() para enviar
        if($mail->Send()){
            $respuesta = "Se envio el mensaje por phpmailer y tu cuenta gmail :)";
        } else {
            $respuesta = "No se envio el mensaje por phpmailer y tu cuenta gmail :( ";
            //Concateno el error
            $respuesta .= "Error: ".$mail->ErrorInfo;
        }

    }else {
        $respuesta = "Error en el envio :(";    
    }

    header("Location: formulario-mailPHPMailer.php?respuesta=$respuesta");
?>