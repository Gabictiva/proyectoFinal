<?php

$id = (isset($_POST['id_usuario']))? $_POST['id_usuario']:"";
$name =  (isset($_POST['nombre_usuario']))? $_POST['nombre_usuario']:"";
$last_name =  (isset($_POST['apellido_usuario']))? $_POST['apellido_usuario']: "";
$mail =  (isset($_POST['email']))? $_POST['email']: "";
$pass =  (isset($_POST['password']))? $_POST['password']: "";
$tel =  (isset($_POST['telefono']))? $_POST['telefono']: "";
$dir =  (isset($_POST['direccion']))? $_POST['direccion']: "";


$id_mascota = (isset($_POST['id_mascota']))? $_POST['id_mascota']:"";
$name_mascota =  (isset($_POST['nombre_mascota']))? $_POST['nombre_mascota']:"";
$tipo =  (isset($_POST['tipo']))? $_POST['tipo']: "";
$raza =  (isset($_POST['raza']))? $_POST['raza']: "";
$color =  (isset($_POST['color']))? $_POST['color']: "";
$usuario_id =  (isset($_POST['usuario_id']))? $_POST['usuario_id']: "";

$action =  (isset($_POST['action']))? $_POST['action']: "";

$mostrarModal = false;
$cancelar=$modificar=$eliminar=$mascota="disabled";
$agregar = "";


/*BOTONES PARA HACER CRUD*/

if($action == 'Agregar'){
    $query = "INSERT INTO usuarios (id_usuario, nombre_usuario, apellido_usuario, email, password, telefono, direccion)  
    VALUES ('DEFAULT', '$name', '$last_name','$mail', '$pass', '$tel', '$dir')";
    $result = $conex->ejecutar($query);
 
}elseif($action =='Modificar'){
    $query = "UPDATE usuarios 
    SET nombre_usuario ='$name', apellido_usuario ='$last_name', email = '$mail', 
        password = '$pass', telefono = '$tel', direccion ='$dir' 
    WHERE id_usuario = '$id'";
    $result = $conex->ejecutar($query);
    header("Location: cliente.php");
}elseif($action =='Eliminar'){
    $query = "DELETE FROM usuarios WHERE id_usuario = '" .$id ."'";
    $result = $conex->ejecutar($query);
    header("Location: cliente.php");
}elseif($action == 'Cancelar'){
    header("Location: cliente.php");
}elseif($action == 'Seleccionar'){
    $mostrarModal = true;
    $cancelar=$modificar=$eliminar=$mascota="";
    $agregar = "disabled";

}elseif($action == 'AgregarMascota'){
    $queryMascota = "INSERT INTO mascotas (id_mascota, nombre_mascota, tipo, raza, color, usuario_id)  
                    VALUES ('DEFAULT', '$name_mascota', '$tipo','$raza', '$color', '$usuario_id')";
    $resultMascota = $conex->ejecutar($queryMascota);
}

?>