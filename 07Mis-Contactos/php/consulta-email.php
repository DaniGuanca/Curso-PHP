<br/>
<div>
    <!-- Esto va a hacer que la variable op=consultas cuando se haga el submit por get, es similar a  window.location= `?op=consultas-->
    <input type="hidden" name="op" value="consultas"/>
    <label for="email">Email: </label>
    <input type="email" id="email" class="cambio" name="email_txt" placeholder="Escribe tu email" title="Tu email" required/>
</div>
<input type="submit" id="enviar-buscar" class="cambio" name="enviar_btn" value="buscar"/>

<?php 
    if($_GET["email_txt"] != null)
    {
        $email = $_GET["email_txt"];
        $consulta = "SELECT * FROM contactos WHERE email LIKE '%$email%'";

        //Llamo a la tabla donde voy a mostrar los datos
        include("php/tabla-resultados.php");
    }
?>