<?php
    require("../conexion/conexion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
</head>
<body>
<form action="crear.php" method="get">
    <div>
       
                    <select id="tip" name="tip" scope="col">
  
                            <?php
		                        $sql= "SELECT * FROM tipo_usu"; 
		                        $resultado=$base_de_datos->prepare($sql);
		                        $resultado->execute(array());
		                        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		                            ?> 
                                    <option value="<?php echo($registro['id_tipo'])?>"> <?php echo($registro['tipo'])?>
                                <?php 
                                }
                                ?>
                    </select>
                    <input type="text" id="user" name="usua" placeholder="Usuario">
                    <input type="text" name="clave" placeholder="Contraseña">
                    <input type="text" name="nomb" placeholder="Nombre" >
                    <input type="teñxt" name="apel" placeholder="Apellido">
                    <input type="text" name="email" placeholder="Correo">
                    <input type="submit" class="btn btn-primary" id="ingresar" name="mod" value="Crear">
                    
                  
    </div>
    </form>

    <script>
      var btn = document.getElementById('ingresar');
var clave = document.getElementById('id');
var usuario = document.getElementById('user');




btn.addEventListener('click', function(evt){

      if(clave.value === ''){

          alert('El campo esta vacio')
          evt.preventDefault();
          return false;

      }else if(usuario.value === ''){

      alert('El campo esta vacio')
          evt.preventDefault();
          return false;

      }


});


    </script>
</body>
</html>