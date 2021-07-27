<?php require_once('clases/Basededatos.php');?>
<?php require_once('head.php');?>
<?php require_once('header.php');?>
<?php 

$conex = new Basededatos();
$conex->conectaDB();

require('postCliente.php');

?>
<div class="form_container">
    <form class="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADMINISTRAR USUARIO</h5>
        <?php if($action == 'Seleccionar'){
            echo "";}else{
                ?><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><?php
            }?>
        
      </div>
      <div class="modal-body">
      <input type="hidden" name="id_usuario" class="form-control" value="<?php echo $id;?>">
        <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="nombre_usuario" class="form-control"  value="<?php echo $name;?>"  required>
            
        </div>
        <div class="form-group">
        <label for="">Apellido</label>
        <input type="text" name="apellido_usuario" class="form-control" value="<?php echo $last_name;?>" required>
            
        </div>
        <label for="">Email</label>
        <input type="email" name="email" class="form-control"  value="<?php echo $mail;?>" required>
            
            <label for="">Teléfono</label>
            <input type="telefono" name="telefono" class="form-control" value="<?php echo $tel;?>" required>
            
            <label for="">Dirección</label>
            <input type="direccion" name="direccion" class="form-control" value="<?php echo $dir;?>" required>
        <?php if($action == 'Seleccionar'){?>
            <input type="hidden" name="password" class="form-control" id="pass" value="<?php echo $pass; ?>" required>
                <?php
            }else{
                ?> 
            <label for="password"  class="col-form-label" required>Contraseña</label>
            <input type="text" name="password" class="form-control" placeholder="Máximo 10 caracteres" id="pass" value="<?php echo $pass; ?>">
            <?php
            } ?>
      </div>
      <div class="modal-footer">
        <button type="submit" name="action" value="Agregar" class="btn btn-success" <?php echo $agregar;?>>Agregar</button>
        <button type="submit" name="action" value="Modificar" class="btn btn-primary" <?php echo $modificar;?>>Modificar</button>
        <button type="submit" name="action" value="Eliminar" class="btn btn-danger" <?php echo $eliminar;?>>Eliminar</button>
        <button type="submit" name="action" value="Cancelar" class="btn btn-secondary" <?php echo $cancelar;?>>Cancelar</button>
        <button type="button" name="action" value="Mascota" class="btn btn-warning" <?php echo $mascota;?> data-bs-toggle="modal" data-bs-target="#exampleModal2">Agregar mascota</button>
    </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btnAgregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
Agregar registro
</button>
<!-- Button trigger modal -->
</form>
<form class="crud__formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"">
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Mascota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="crud">

    <input type="hidden" name ="id_mascota">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre_mascota" class="form-control"placeholder="" id="nombre_mascota" required>
    <br>
    <label for="tipo">Tipo</label>
    <input type="text" name="tipo" class="form-control" placeholder="" id="tipo" required>
    <br>
    <label for="raza">Raza</label>
    <input type="text" name="raza" class="form-control" placeholder="" id="raza" required>
    <br>
    <label for="color">Color</label>
    <input type="text" name="color" class="form-control" placeholder="" id="color" required>
    <br>
    <input type="text" name="usuario_id" id="usuario_id" value="<?php echo $id; ?>">
    
    <br>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="action" value="AgregarMascota" class="btn btn-success" >Agregar</button>
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
    <th>APELLIDO</th>
    <th>EMAIL</th>
    <th>TELEFONO</th>
    <th>DIRECCIÓN</th>
    <th></th>
    <th></th>
    <th></th>
  </tbody>
<?php
$queryUsuario ="SELECT * FROM usuarios";
$usuario = $conex->ejecutar($queryUsuario);

if($usuario){
    while($filas = $conex->mostrar_filas($usuario)){
        $id = $filas['id_usuario'];
        $name =  $filas['nombre_usuario'];
        $last_name =  $filas['apellido_usuario'];
        $mail =  $filas['email'];
        $pass =  $filas['password'];
        $tel =  $filas['telefono'];
        $dir =  $filas['direccion'];

     ?>
     <tr>
         <td><?php echo $id; ?></td>
         <td><?php echo $name; ?></td>
         <td><?php echo $last_name;?></td>
         <td><?php echo $mail;?></td>
         <td><?php echo $pass;?></td>
         <td><?php echo $tel;?></td>
         <td><?php echo $dir;?></td>
         <td><form action="" method="POST">
             <input type="hidden" name="id_usuario" value="<?php echo $id;?>">
             <input type="hidden" name="nombre_usuario" value="<?php echo $name;?>">
             <input type="hidden" name="apellido_usuario" value="<?php echo $last_name; ?>">
             <input type="hidden" name="email" value="<?php echo $mail; ?>">
             <input type="hidden" name="password" value="<?php echo $pass; ?>">
             <input type="hidden" name="telefono" value="<?php echo $tel; ?>">
             <input type="hidden" name="direccion" value="<?php echo $dir; ?>">
            <button type="submit" name="action" value="Seleccionar" class="btn boton2">Seleccionar</button></td>
         </form>
             
       <?php  
    }
    ?></table><?php
}
if($mostrarModal){
    ?><script language="javascript">
  // Show the Modal on load
  $(document).ready(function(){
  $("#exampleModal").modal("show");
});
 </script>
<?php
}else{
    ?><script language="javascript">
  // Show the Modal on load
  $(document).ready(function(){
  $("#exampleModal").modal("hide");
});
 </script>
<?php
}
require_once('footer.php');