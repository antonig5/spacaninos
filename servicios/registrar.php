<?php
include("../conexion/conexion.php");
if(isset($_GET['Registrar'])){
       
        $idM = $_GET ['idm'];
        $nomM = $_GET['nomS'];
        $precio = $_GET['Pre'];
        
    
        ?>
        
        <?php 
        $sql="INSERT INTO servicios ( id_servicio, nombre_servicio, precio_servicio) values ( :idm, :nomS, :preC,)";
        $resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
        $resultado->execute(array(":idm"=>$idM, ":nomS"=>$nomM, ":preC"=>$precio));

        echo"<script>alert('Se realizo su exito correcto.')</script>";
        echo"<script>window.location='tablaS.php'</script>";
    
     
    }
?>