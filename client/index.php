<?php
   session_start();
   include_once("../conexion/conexion.php");

   $cedu1=                 $_SESSION['cedu'];
   $nombre1=               $_SESSION['nomb'];
   $tipo=                  $_SESSION['tipo'];
   $tip=                   $_SESSION['tip'];

    $sentencia1="SELECT * FROM clientes";
    $resultado=$base_de_datos->prepare($sentencia1);
    $resultado->execute();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/clientes.css">
    <title>Clientes</title>
</head>
<body>
<h3>PANEL DE OPCIONES CLIENTES</h3>
    <form method="post" action="buscar.php">
        <div id="nim">
            <a href="registrar.php">
                <button type="button">
                    Registrar
                </button>
            </a>
        </div>
        <input class="buscar"  type="search" name="busca"  id="" placeholder="Buscar"> 
        <button id="but" class="uno">buscar</button>
        <br> <br>
        <div id="tag">
        <table  class="table">
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th colspan="2">Accion</th>
        </tr>
        <?php
            foreach ($resultado as $move) {
        ?>
        <tr>
            <td><?php echo $move->id_cliente;?></td>
            <td><?php echo $move->nombre_cliente?></td>
            <td><?php echo $move->apellido_cliente?></td>
            <td><?php echo $move->celular?></td>
            <td><?php echo $move->direccion?></td>
            <td>
                    <a id="q1" href="eliminar.php?id=<?php echo $move->id_cliente?> & nomb=<?php echo $move->nombre_cliente?>">
					    <img src="./borrar.png" alt="eliminar">
                    </a>
                </td>
                <td>
                    <a id="q2" href="modificar.php?id=<?php echo $move->id_cliente?> & nomb=<?php echo $move->nombre_cliente?>">
					    <img src="./lapiz.png" alt="modificar">
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </div>
    </table class="dos">
		<td>
			<a href="../administrador/index.php" onmouseup="window.close()">
                <input  id="bot" type="button" value="cerrar" name="cerrar" >
            </a>
		</td>
	</table>
    </form>
</body>
</html>
    