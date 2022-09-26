<?php
    require("../conexion/conexion.php");

    if(isset($_POST['bt'])){
		$idu=                           $_POST['cod'];
		$apellido=                      $_POST['apellido'];
        $nombre=                        $_POST['nomb'];

		?>
		<input type="number" name="idd" value="<?php echo $idu?>">
		<?php 
		$sql="INSERT INTO recepcionista (id_recepcionista, nombre_recepcionista,apellido_recepcionista) values (:id, :no, :em )";
		$resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":id"=>$idu,":no"=>$nombre,":em"=>$apellido));
        echo"<script>alert('Se registro correctamente')</script>";
        echo"<script>window.location='index.php'</script>";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/res_clientes.css">
    <title>Registrar</title>
</head>
<body>
    <div id="res">
        <div id="h2"><h2 id="h2_1">Registro </h2></div>
        <form method="post">

        <div id="lab1"><label>Cedula:</label></div>
        <input id="inp1" name="cod" type="number" placeholder="Ingrese cedula">

        <div id="lab2"><label>Nombre:</label></div>
        <input id="inp2" name="nomb" type="text" placeholder="Ingrese nombre">

        <div id="lab3"><label>Apellido:</label></div>
        <input id="inp3" name="apellido" type="text" placeholder="Ingrese apellido">

        <input id="bot" type="submit" name="bt" value="Registrar">
    </form>
    </div>
</body>
</html>