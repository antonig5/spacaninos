<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="#">
    <title>Panel  de  registros de mascotas</title>
</head>
<header>
    
    <nav>
        <ul>
            <li><a href="#">#</a></li>
            <li><a href="#">#</a></li>
            <li><a href="#">#</a></li>
            <li></li>
        </ul>
    </nav>
</header>
<body>
    <?php
    
    include("../conexiones/conexion.php");

    
    //--------------paginación-------------
    $registros=3;//indica que se van a ver 3 registro por página
    if(isset($_GET["pagina"])){
        if($_GET["pagina"]==1){
            header("Location:tablaM.php");
        }else{
            $pagina=$_GET["pagina"];
        }
    }else{
        $pagina=1;//muestra página en la que estamos cuando se carga por primera vez
    }
    
    $empieza=($pagina-1)*$registros;
        $sql_total="SELECT * FROM servicios";

        $resultado=$base_de_datos->prepare($sql_total);

        $resultado->execute(array());
        $numfilas=$resultado->rowCount();
        $totalpagina=ceil($numfilas/$registros);

        $registros=$base_de_datos->query("SELECT * FROM servicios LIMIT $empieza,$registros")->fetchALL(PDO::FETCH_OBJ);
    

    ?>
    
    <h3 align="center">Panel  de servicios</h3>
    <form action=" " method="post" autocomplete="off">
        <table border="2" align="center">
 
                <tr>
                    <th>N. de servicio</th>
                    <th>Nombre de servicios</th>
                    <th>precio de servicio</th>
                    
                
                </tr>
           
                <?php
                    foreach ($registros as $servicios) :
                    ?>
                    <tr>
                        <td><?php echo $servicios->id_servicio?></td>
                    
                    
                        <td><?php echo $servicios->nombre_servicio?></td>
                    
                    
                        <td><?php echo $servicios->precio_servicio?></td>
                    
                        <td>
				            <a href="delete.php?id=<?php echo $servicios->id_servicio?>" class="elimina">
					            <input type="button"  name="elimina" value="Eliminar">
				            </a>
                        </td>
                        <td>
				            <a href="editar.php?id=<?php echo $servicios->id_servicio?>" class="editar">
					            <input type="button"  name="editar" value="Editar">
				            </a>
                        </td>
                    </tr>

                    <?php
			            endforeach;
		
			        ?>
  
        </table>

    </form>
    <div class="formulario" align="center">
        <form action="registrar.php" method="get" >
            <h1>registros de nuevos servicios</h1>
            <br>
            
            Nombre de servicios:
            <input type="varchar" name="nomS" required><br>
            
           
            Precio de servicio:
            <input type="numbers" name="Pre" required><br>
            
            
            <br><input  type="submit" class="button" name="Registrar" value="Registrar">
            

        </form>
    </div>
    <script src="confirmacion.js"></script>
</body>

</html>
        
