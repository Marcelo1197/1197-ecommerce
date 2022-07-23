<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <h1>Registrarse</h1>
            <?php if (!empty(session()->getFlashData('fail'))) :  ?> 
                <div class="alert alert-danger">
                    <?= session()->getFlashData('fail'); ?>
                </div>
            <?php endif ?>

            <?php if (!empty(session()->getFlashData('success'))) :  ?> 
                <div class="alert alert-success">
                    <?= session()->getFlashData('success'); ?>
                </div>
            <?php endif ?>

            <?php $validation =  \Config\Services::validation(); ?>
            
            <form action="<?= base_url("registro/save"); ?>" method="post">
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="InputForName" value="<?= set_value('nombre') ?>">
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'nombre') : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="InputForName" value="<?= set_value('apellido') ?>">
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'apellido') : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="InputForName" value="<?= set_value('usuario') ?>">
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'usuario') : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="InputForEmail"  value="<?= set_value('nombre') ?>">
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'email') : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword"  value="<?= set_value('pass') ?>">
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'password') : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="InputForConfPassword" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="confpassword" class="form-control" id="InputForConfPassword"  value="<?= set_value('pass') ?>">
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'confpassword') : '' ?></span>
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
        </div>
    </div>
</div>
