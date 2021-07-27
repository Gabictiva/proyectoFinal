<?php
include('clases/Basededatos.php');
$nuevaConn = new Basededatos();
$nuevaConn->conectaDB();

if(isset($_POST['registro'])){
    if( strlen($_POST['nombre'])  >= 1 && strlen($_POST['apellido']) >= 1 && 
        strlen($_POST['email']) >= 1 && strlen($_POST['pass']) >= 1 && 
        strlen($_POST['telefono']) >= 1 && strlen($_POST['direccion']) >= 1){

            $name = trim($_POST['nombre']);
            $last_name = trim($_POST['apellido']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            $dir = trim($_POST['direccion']);
            $tel = trim($_POST['telefono']);
            
            $consulta = "INSERT INTO usuarios (id_usuario, nombre_usuario, apellido_usuario, email, password, telefono, direccion)  
                        VALUES ('DEFAULT', '$name', '$last_name','$email', '$pass', '$tel', '$dir')";
            $resultado = $nuevaConn->ejecutar($consulta);
            if ($resultado) {
                ?> 
                <h3 class="ok">¡Te has inscripto correctamente!</h3>
               <?php
               $nuevaConn->filas();
               $fila = $nuevaConn->filas();
               print ($fila);
            } else {
                ?> 
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
               <?php
            }
        }   else {
                ?> 
                <h3 class="bad">¡Por favor complete los campos!</h3>
               <?php
        }
    }

?>

