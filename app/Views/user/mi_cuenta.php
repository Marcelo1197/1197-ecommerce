<?= $this->include('partes/header') ?>
<div class="container">
    <div class="mb-3">
        <h3>Mis datos</h3>
    </div>
    <form action="#">
    <div class="mb-3 col-2">
      <label for="disabledTextInput" class="form-label">ID Usuario</label>
      <input disabled type="text" id="disabledTextInput" class="form-control" placeholder="Id usuario" value="<?= $userData['id_usuario']?>">
    </div>
    <div class="mb-3 col-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingresa tu email" value="<?= $userData['email']?>">
    </div>
    <div class="input-group w-50">
        <span class="input-group-text">Nombre y Apellido</span>
        <input  type="text" aria-label="Nombre" class="form-control col-2" value="<?= $userData['nombre']?>">
        <input  type="text" aria-label="Apellido" class="form-control col-2" value="<?= $userData['apellido']?>">
    </div>
    <div class="mt-3 input-group flex-nowrap w-50">
        <span class="input-group-text" id="addon-wrapping">@</span>
        <input type="text" class="col-4 form-control" value="<?= $userData['usuario']?>" placeholder="Usuario" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
        <button class="mt-3 btn btn-primary" type="submit">Actualizar</button>
    </form>
</div>
<?= $this->include('partes/footer') ?>