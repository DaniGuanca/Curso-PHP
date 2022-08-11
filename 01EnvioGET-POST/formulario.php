<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envío de Datos por GET y POST</title>
</head>
<body>
    <!-- Desde este formulario voy a mandar datos al archivo envia-datos.php -->

    <!-- hgroup sirve para cuando si o si necesito usar mas de un h1 -->
    <hgroup><h1>Formulario enviado por el metodo GET</h1></hgroup>
    <form name="enviar-get_frm" action="envia-datos.php" method="get" enctype="application/x-www-form-urlencoded">
        <label>Ingresa tu Nombre:</label>
        <input type="text" name="nombre_txt"/>
        <br/><br/>
        <label>Ingresa tu Password:</label>
        <input type="password" name="password_txt"/>
        <br/><br/>
        <input type="submit" name="enviar_btn" value="Envia-GET"/>
    </form>

    <hgroup><h1>Formulario enviado por el metodo POST</h1></hgroup>
    <form name="enviar-post_frm" action="envia-datos.php" method="post" enctype="application/x-www-form-urlencoded">
        <label>Ingresa tu Nombre:</label>
        <input type="text" name="nombre_txt"/>
        <br/><br/>
        <label>Ingresa tu Password:</label>
        <input type="password" name="password_txt"/>
        <br/><br/>
        <input type="submit" name="enviar_btn" value="Envia-POST"/>
    </form>
</body>
</html>