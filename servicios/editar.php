<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/editarusu.css">
	<title>Editar usuario</title>
</head>
<body>
<?php
	
	$busca=$_GET["id"];


try{
	$base_de_datos=new PDO("mysql:host=localhost;dbname=spacaninos", "root", "");//pdo es la clase
	$base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//muestra el tipo de error
	$base_de_datos->exec("set character set utf8");
//echo "Conexión exitosa";
    $sql="SELECT  * from servicios  where id_servicio=:id";//consulta con marcador, el marcador es :codigo

    $resultado=$base_de_datos->prepare($sql);//el objeto $base llama al metodo prepare que recibe por parametro la instrucción sql, el metodo prepare devuelve un objeto de tipo PDO que se almacena en la variable resultado
    $resultado->execute(array(":id"=>$busca));

	if($registro2=$resultado->fetch(PDO::FETCH_ASSOC)){
		
		?>
	        <h4 align="center">Editar servicios</h4>	
		<form action="update.php" method="GET">
        	<h5>N. de servicio:</h5><br>
				<input type="text" class="usua" readonly name="id" value="<?php echo $registro2['id_servicio']?>">
            
        	<h5>Nombre del servicio:</h5><br>
				<input type="text" class="usua" name="nomS" value="<?php echo $registro2['nombre_servicio']?>" required>

            <h5>precio del  servicio</h5>
                <input type="number" class="usua" name="Pre" value="<?php echo $registro2['precio_servicio']?>" required>
            <br>
                <input type="submit" class="btn" name="edita" class="guardar" value="Guardar">
	</form>

<?php
	}else{
		echo "No se encontro este servicio $busca";
	}

$resultado->closeCursor();

}catch(Exception $e){
	die("Error: ". $e->GetMessage());

}finally{
	$base_de_datos=null;//vaciar memoria
}


?>

</form>
<script src="confirmacion.js"></script>
</body>
</html>