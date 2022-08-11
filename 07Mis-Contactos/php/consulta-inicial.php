<br/><br/>
<?php
    //Creo array del abecedario
    $letra = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z');

    //Con un for voy a mostrar en pantalla todo el abecedario con un enlace dinamico para cada letra
    //Count es como el length de javascript
    for($i=0; $i<count($letra); $i++)
    {
        //El condicional para que no muestre el guion despues de z
        if ($letra[$i] == "Z")
        {
            //\n es espacio en blanco asi pongo espacio y guion entre cada letra
            echo "<a class='cambio' href='?op=consultas&consulta_slc=inicial&letra=".$letra[$i]."'>".$letra[$i]."</a>";
        }
        else
        {
            //\n es espacio en blanco asi pongo espacio y guion entre cada letra
            echo "<a class='cambio' href='?op=consultas&consulta_slc=inicial&letra=".$letra[$i]."'>".$letra[$i]."</a>\n-\n";
        }
        
    }

    if($_GET["letra"] != null)
    {
        $letra = $_GET["letra"];
        $consulta = "SELECT * FROM contactos WHERE nombre LIKE '$letra%'";

        //Llamo a la tabla donde voy a mostrar los datos
        include("php/tabla-resultados.php");
    }
?>