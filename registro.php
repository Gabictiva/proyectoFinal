<?php require_once('../head.php');?>
<?php require_once('../header.php');?>


<form method="POST" >
<div class="registro">
    <div class="form-group col-md-4"> 
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="" id="nombre" required  class="form-control">
        <br>
    </div> 
    <div class="form-group col-md-4"> 
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" placeholder="" id="apellido" required class="form-control">
        <br>
    </div> 
    <div class="form-group col-md-4"> 
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="" id="email" required class="form-control">
        <br>
    </div> 
    <div class="form-group col-md-4"> 
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" placeholder="Máximo 10 caracteres" id="pass" required class="form-control">
        <br>
    </div> 
    <div class="form-group col-md-4"> 
        <label for="">Teléfono</label>
        <input type="number" name="telefono" placeholder="Sin guiones ni espacios" id="telefono" required class="form-control">
        <br>
    </div>   
    <div class="form-group col-md-4"> 
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" placeholder="" id="direccion" required class="form-control">
    </div> 
        <input type="submit" class="boton" name="registro" value="REGISTRARSE" >
     </div>
</form>

<?php include('insert_registro.php'); ?>
<?php require_once('../footer.php'); ?>
