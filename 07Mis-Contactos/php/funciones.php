<?php
    //ESTAS FUNCIONES LA HIZO MIRCHA EN 2 MESES Y NOS LA REGALA

    //FUNCION DE BORRAR IMAGEN
    /* El parametro de $extension determina que tipo de imagen no se borrará por ejemplo si es jpg 
    significa que la imagen con extensión .jpg se queda en el servidor y si existen imagenes con el mismo nombre 
    pero con extension png o gif se eliminaran, con esta función evito tener imagenes duplicadas con 
    distinta extensiones para cada perfil la funcion file_exists evalua si un archivo existe y la 
    funcion unlink borra un archivo del servidor */
    function borrar_imagenes($ruta,$extension){
        switch($extension){
            case ".jpg":
                //Busco imagen con el mismo nombre pero con extension png para borrarlas 
                if(file_exists($ruta.".png")){
                    unlink($ruta.".png");
                }

                if(file_exists($ruta.".gif"))
                    unlink($ruta.".gif");
                
                break;

            case ".png":
                if(file_exists($ruta.".jpg")){
                    unlink($ruta.".jpg");
                }
    
                if(file_exists($ruta.".gif"))
                    unlink($ruta.".gif");
                    
                break;

            case ".gif":  
                if(file_exists($ruta.".png")){
                    unlink($ruta.".png");
                }
        
                if(file_exists($ruta.".jpg"))
                    unlink($ruta.".jpg");
                        
                break;                
        }
    }
    
    
    //FUNCION PARA SUBIR LA IMAGEN DE PERFIL DEL USUARIO
    function subir_imagen($tipo,$imagen,$email){
        /* strstr($cadena1,$cadena2) sirve para evaluar si en la primer cadena de texto
        existe la segunda cadena de texto
        Si dentro del tipo del archivo se encuentra la palabra image significa que
        el archivo es una imagen */
        if(strstr($tipo,"image")){
            //El archivo es imagen ahora voy a ver que extension es
            if (strstr($tipo,"jpeg"))
                $extension = ".jpg";
            else if (strstr($tipo,"gif"))
                $extension = ".gif";
            else if (strstr($tipo,"png"))
                $extension = ".png";

            //para saber si la imagen tiene el ancho correcto que es de 420px
            $tam_img = getimagesize($imagen);
            //Ancho en posicion 0
            $ancho_img = $tam_img[0];
            //Alto en posicion 1
            $alto_img = $tam_img[1];

            $ancho_img_deseado = 420;
            //Si la imagen es mayor en su ancho que 420px reajusto su tamaño
            if($ancho_img > $ancho_img_deseado) {

                //Por regla de 3 obtengo el alto de la imagen de manera proporcional
                //al ancho nuevo que sera de 420px
                //Ejemplo----------------
                //  1024    420
                //  768     x
                //_----------------------
                $nuevo_ancho_img = $ancho_img_deseado;
                $nuevo_alto_img = ($alto_img/$ancho_img)*$nuevo_ancho_img;

                //Creo una imagen en color real con las nuevas dimensiones
                //imagecreatetruecolor(ancho,alto) crea un lienzo de imagen con las dimensiones pasadas
                $img_reajustada = imagecreatetruecolor($nuevo_ancho_img,$nuevo_alto_img);

                //Creo una imagen basada en la original, dependiendo de su extension es el tipo que voy a crear
                //Cada tipo o extension tiene una funcion diferente para crear
                switch($extension){
                    //JPG
                    case ".jpg":
                        //Creo imagen jpg basada en la que subio el usuario
                        $img_original = imagecreatefromjpeg($imagen);
                        //Reajusto la imagen nueva con respecto a la original
                        imagecopyresampled($img_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img, $nuevo_alto_img,$ancho_img,$alto_img);
                        //Guardo la imagen reescalada en el servidor, el nombre tiene que tener la extension
                        $nombre_img_ext = "../img/fotos/".$email.$extension;
                        imagejpeg($img_reajustada, $nombre_img_ext, 100);
                        //Ejecuto la funcion para borrar posibles imagenes repetidas o dobles
                        $nombre_img = "../img/fotos/".$email;
                        borrar_imagenes($nombre_img, ".jpg"); 
                        break;
                    
                    //GIF
                    case ".gif":
                        //Creo imagen jpg basada en la que subio el usuario
                        $img_original = imagecreatefromgif($imagen);
                        //Reajusto la imagen nueva con respecto a la original
                        imagecopyresampled($img_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img, $nuevo_alto_img,$ancho_img,$alto_img);
                        //Guardo la imagen reescalada en el servidor, el nombre tiene que tener la extension
                        $nombre_img_ext = "../img/fotos/".$email.$extension;
                        imagegif($img_reajustada, $nombre_img_ext, 100);
                        //Ejecuto la funcion para borrar posibles imagenes repetidas o dobles
                        $nombre_img = "../img/fotos/".$email;
                        borrar_imagenes($nombre_img, ".gif"); 
                        break;

                    //PNG
                    case ".png":
                        //Creo imagen jpg basada en la que subio el usuario
                        $img_original = imagecreatefrompng($imagen);
                        //Reajusto la imagen nueva con respecto a la original
                        imagecopyresampled($img_reajustada,$img_original,0,0,0,0,$nuevo_ancho_img, $nuevo_alto_img,$ancho_img,$alto_img);
                        //Guardo la imagen reescalada en el servidor, el nombre tiene que tener la extension
                        $nombre_img_ext = "../img/fotos/".$email.$extension;
                        imagepng($img_reajustada, $nombre_img_ext);
                        //Ejecuto la funcion para borrar posibles imagenes repetidas o dobles
                        $nombre_img = "../img/fotos/".$email;
                        borrar_imagenes($nombre_img, ".png"); 
                        break;
                }
                

            }else{
                //no se reajusta y se sube la imagen al servidor
                $destino = "../img/fotos/".$email.$extension;
                move_uploaded_file($imagen,$destino) or die ("No se pudo subir la imagen al servidor");

                //Ejecuto la funcion para borrar posibles imagenes repetidas o dobles
                $nombre_img = "../img/fotos/".$email;
                borrar_imagenes($nombre_img, $extension);
            }

            //Asigno el nombre de la foto que se guardara en la BD como cadena de texto
            $imagen = $email.$extension;
            return $imagen;

        }else{
            //No es imagen
            return false;
        }
    }
?>