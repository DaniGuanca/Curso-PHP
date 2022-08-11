<?php 
    //Cuando hago la consulta desde consulta por pais el archivo ya hace una conexion para llenar el select de paises
    //entonces tira error de doble conexion cuando entra a tabla-resultados
    //Para arreglar valido si viene vacia la variable pais_slc si viene vacia es porque esta haciendo consulta
    //por otra variable entonces hago la conexion
    //Y si no viene vacia quiere decir que ya hizo una conexion para cargar el select asi que no hago nueva conexion
    //La funcion empty(variable) se fija si la variable esta vacia o no
    if(empty($_GET["pais_slc"]))
    {
        include("conexion.php");
    }
    
    include("funciones.php");

    //$consulta viene del archivo donde hago el include a este archivo, asi que ya lo defini, dinamicamente se va a ver
    $ejecutar_consulta = $conexion->query($consulta);
    $num_regs = $ejecutar_consulta->num_rows;

    if($num_regs == 0)
    {
        echo "<br/><br/><span class='mensajes'>No se encontraron registros con esta busqueda</span><br/>";
    }
    else
    {
    //VOY A GENERAR LA TABLA DINAMICAMENTE
?>
        <br/><br/>   
        <table>
            <thead>
                <tr>
                    <th>email</th>
                    <th>nombre</th>
                    <th>sexo</th>
                    <th>nacimiento</th>
                    <th>telefono</th>
                    <th>pais</th>
                    <th>imagen</th>
                </tr>
            </thead>
            <tbody>
                <!-- Voy a mostrar los datos aca -->
                <?php
                    while($registro = $ejecutar_consulta->fetch_assoc())
                    {
                ?>
                        <tr>
                            <td><?php echo $registro["email"]; ?></td>
                            <td><?php echo $registro["nombre"]; ?></td>
                            <td><?php echo ($registro["sexo"]=="M")? "Masculino": "Femenino"; ?></td>
                            <td><?php echo $registro["nacimiento"]; ?></td>
                            <td><?php echo $registro["telefono"]; ?></td>
                            <td><?php echo $registro["pais"]; ?></td>
                            <td><img src="img/fotos/<?php echo $registro["imagen"]; ?>"/></td>
                        </tr>
                <?php
                    }
                ?>

            </tbody>
        </table>



<?php
    }

    $conexion->close();
?>
