<?php include ("sesion.php"); ?>
Bienvenido:
<?php $_SESSION["usuario"]; ?>
<br><br>
Estas en otra pagina segura con sesiones en PHP
<br><br>
<a href="archivo-protegido.php">Ir a la primer pagina</a>
<br><br>
<a href="salir.php">SALIR</a>