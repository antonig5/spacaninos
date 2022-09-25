<?php
include("../conexiones/conexion.php");
if(isset($_GET['Registrar'])){
       
        $nombreR= $_GET['nomR'];
    
        ?>
        
        <?php 
        $sql="INSERT INTO raza ( nombre_raza) values (:nomR)";
        $resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
        $resultado->execute(array(":nomR"=>$nombreR));

        echo"<script>alert('Se registro su registro .')</script>";
        echo"<script>window.location='tablaR.php'</script>";
    
     
    }
?>