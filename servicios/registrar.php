<?php
include("../conexiones/conexion.php");
if(isset($_GET['Registrar'])){
       
        $nomM = $_GET['nomS'];
        $precio = $_GET['Pre'];
        
    
        ?>
        
        <?php 
        $sql="INSERT INTO servicios ( nombre_servicio, precio_servicio) values (:nomS, :preC)";
        $resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
        $resultado->execute(array( ":nomS"=>$nomM, ":preC"=>$precio));

        echo"<script>alert('Se realizo su exito correcto.')</script>";
        echo"<script>window.location='tablaS.php'</script>";
    
     
    }
?>