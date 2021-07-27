<?php
include('clases/Basededatos.php');

$nuevaConn = new Basededatos();
$nuevaConn->conectaDB();
if(isset($_POST['ingresar'])){
    $email= $_POST['email'];
    $pass = $_POST['pass'];

}
$query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$pass'";
$resultado = $nuevaConn->ejecutar($query);
$row_cnt = $resultado->num_rows;
$bienvenida = $resultado->fetch_array();
$nombre = $bienvenida['nombre_usuario'];
if (!$row_cnt == 1){
    echo '<h3 class="mal">Algo salió mal</h3><br><br><h4><a href="login.html">Vuelva a iniciar sesión</a></h4>';
}else{
    header("Location:index.php");
}

?>