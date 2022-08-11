<!-- Voy a crear las variables titulo y contenido con el archivo que corresponda segun la variable op -->
<?php
//Todos los errores menos los notices
error_reporting(E_ALL ^ E_NOTICE );
    $op = $_GET["op"];
    switch($op)
    {
        case 'alta':
            $contenido = "php/alta-contacto.php";
            $titulo = "Alta de contacto";
            break;
        
        case 'baja':
            $contenido = "php/baja-contacto.php";
            $titulo = "Baja de contacto";
            break;
        
        case 'cambios':
            $contenido = "php/cambios-contacto.php";
            $titulo = "Cambio de contacto";
            break;

        case 'consultas':
            $contenido = "php/consultas-contacto.php";
            $titulo = "Consultas de contacto";
            break;

        default:
            $contenido = "php/home.php";
            $titulo = "Mis Contactos v1";
            break;
    }

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Segun la variable op el titulo va a cambiar, asi que hago echo a la variable para mostrarla -->
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="css/mis-contactos.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
		!window.jQuery && document.write("<script src='js/jquery.min.js'><\/script>");
	</script>
</head>
<body>
    <!--Menu-->
    <section id="contenido">
        <nav>
            <ul>
                <!-- Cuando no especifico la direccion de href se redirecciona a si mismo, 
                aparte le estoy mandando variables por GET-->
                <li><a class="cambio" href="index.php">Home</a></li>
                <li><a class="cambio" href="?op=alta">Alta de Contacto</a></li>
                <li><a class="cambio" href="?op=baja">Baja de Contacto</a></li>
                <li><a class="cambio" href="?op=cambios">Cambios de Contacto</a></li>
                <li><a class="cambio" href="?op=consultas">Consultas de Contacto</a></li>
            </ul>
        </nav>

        <section id="principal">
            <!-- El contenido va a depender de la variable op, asi que llamo al archivo, que este indicado en contenido -->
            <?php include($contenido) ?>

        </section>

    </section>

    <script source="js/mis-contactos.js"></script>
</body>
</html>