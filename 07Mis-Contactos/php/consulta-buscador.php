<br/>
<div>
    <!-- Esto va a hacer que la variable op=consultas cuando se haga el submit por get, es similar a  window.location= `?op=consultas-->
    <input type="hidden" name="op" value="consultas"/>
    <label for="buscador">Buscador: </label>
    <input type="search" id="buscador" class="cambio" name="q" placeholder="Escribe tu busqueda" title="Tu busqueda" required/>
</div>
<input type="submit" id="enviar-buscar" class="cambio" name="enviar_btn" value="buscar"/>

<?php 
    if($_GET["q"] != null)
    {
        $q = $_GET["q"];

        //IMPORTANTE ASI SE HACE UNA CONSULTA PARA USAR EL BUSCADOR DEFINIDO EN LA CREACION DE LA BD
        //PARA LA BUSQUEDA DE CAMPOS
        //Dentro de MATCH() van los campos que defini en buscador en FULLTEXT
        //Dentro de AGAINST() va la palabra contra la cual va a buscar en los campos de MATCH
        $consulta = "SELECT * FROM contactos WHERE MATCH(email, nombre, sexo, telefono, pais) AGAINST('$q' IN BOOLEAN MODE)";

        //Llamo a la tabla donde voy a mostrar los datos
        include("php/tabla-resultados.php");
    }
?>