<?php require_once('clases/Basededatos.php');?>
<?php require_once('head.php');?>
<?php require_once('header.php');?>
<?php 

$conex = new Basededatos();
$conex->conectaDB();

$id_mascota = (isset($_POST['id_mascota']))? $_POST['id_mascota']:"";
$name_mascota =  (isset($_POST['nombre_mascota']))? $_POST['nombre_mascota']:"";
$tipo =  (isset($_POST['tipo']))? $_POST['tipo']: "";
$raza =  (isset($_POST['raza']))? $_POST['raza']: "";
$color =  (isset($_POST['color']))? $_POST['color']: "";
$usuario_id =  (isset($_POST['usuario_id']))? $_POST['usuario_id']: "";
$action =  (isset($_POST['action']))? $_POST['action']: "";

$mostrarModal = false;
?>


<?php 

if($action =='Update'){
    $query = "UPDATE mascotas 
    SET  id_mascota ='$id_mascota', nombre_mascota ='$name_mascota', 
        tipo = '$tipo', raza = '$raza', 
        color = '$color', usuario_id ='$usuario_id' 
    WHERE id_mascota = '$id_mascota'";
    $result = $conex->ejecutar($query);
    header('Location:mascota.php');
}elseif($action == 'Delete'){
    $query = "DELETE FROM mascotas WHERE id_mascota = '" .$id_mascota ."'";
    $result = $conex->ejecutar($query);
    header('Location: mascota.php');

}elseif($action == 'Select'){
    $mostrarModal = true;
}elseif($action == 'Cancel'){
    header('Location: mascota.php');
}

$query2 = "SELECT id_mascota, nombre_mascota, tipo, raza, color, usuario_id, concat_ws(' ', nombre_usuario, apellido_usuario) as dueno
          FROM mascotas
          INNER JOIN usuarios
	      ON mascotas.usuario_id = usuarios.id_usuario; ";
$mostrarTabla = $conex->ejecutar($query2);

?>
    <!-- Button trigger modal 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Modificar registro
</button>-->
<div class="mascota__form">

<form class="" method="POST" action="">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Administrar mascota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="hidden" name ="id_mascota" class="form-control" value="<?php echo $id_mascota; ?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre_mascota" class="form-control" placeholder="" id="nombre_mascota" required value="<?php echo $name_mascota; ?>">
        <br>
        <label for="tipo">Tipo</label>
        <input type="text" name="tipo" class="form-control" placeholder="" id="tipo" required value="<?php echo $tipo; ?>">
        <br>
        <label for="raza">Raza</label>
        <input type="text" name="raza" class="form-control" placeholder="" id="raza" required value="<?php echo $raza; ?>">
        <br>
        <label for="color">Color</label>
        <input type="text" name="color" class="form-control" placeholder="" id="color" required value="<?php echo $color; ?>">
        <br>
        <input type="hidden" name="usuario_id" id="usuario_id" required value="<?php echo $usuario_id; ?>">
        <br>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary"name="action" value="Update">Modificar</button>
        <button type="submit" class="btn btn-danger" name="action" value="Delete">Eliminar</button>
        <button type="submit" name="action" value="Cancel" class="btn btn-secondary" >Cancelar</button>
      </div>
    </div>
  </div>
</div>
   
   
</form>
</div>

    <table class="tabla table table-hover table-bordered">
    <tbody class="cabecera">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>TIPO</th>
        <th>RAZA</th>
        <th>COLOR</th>
        <th>DUEÑO</th>
        <th></th>
        
        </tbody>
    <?php
if($mostrarTabla){
    while ($filas = $conex->mostrar_filas($mostrarTabla)){
       $id_mascota = $filas['id_mascota'];
       $name_mascota =  $filas['nombre_mascota'];
       $tipo =  $filas['tipo'];
       $raza =  $filas['raza'];
       $color =  $filas['color'];
       $color =  $filas['color'];
       $usuario_id =  $filas['usuario_id'];
       $name_usuario = $filas['dueno'];
    
    ?>
    <tr>
        <td><?php echo $id_mascota; ?></td>
        <td><?php echo $name_mascota; ?></td>
        <td><?php echo $tipo;?></td>
        <td><?php echo $raza;?></td>
        <td><?php echo $color;?></td>
        <td><?php echo $name_usuario;?></td>
        <td>
            <form action="" method="POST">
                <input type="hidden" name="id_mascota" value="<?php echo $filas['id_mascota']; ?>">
                <input type="hidden" name="nombre_mascota" value="<?php echo $filas['nombre_mascota']; ?>">
                <input type="hidden" name="tipo" value="<?php echo $filas['tipo'];?>">
                <input type="hidden" name="raza" value="<?php echo $filas['raza']; ?>">
                <input type="hidden" name="color" value="<?php echo $filas['color']; ?>">
                <input type="hidden" name="usuario_id" value="<?php echo $filas['usuario_id']; ?>">
                <button type="submit" class="btn boton2" id="centrar" name="action" value="Select">Seleccionar</button></td>
        </form>
        

    </tr>

    <?php } ?>
    </table>
 <?php
}
if($mostrarModal){
    ?><script language="javascript">
  // Show the Modal on load
  $(document).ready(function(){
  $("#exampleModal").modal("show");
});
 </script>
<?php 
}
require_once('footer.php');
?>
