
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <h1>Ingresar</h1>
                <?php if(session()->getFlashdata('fail')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif;?>
    
                <form method="post" action="<?= base_url("login/validacion"); ?>">
                    <div class="mb-3">
                        <label for="InputForEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>" required>
                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="InputForPassword" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="InputForPassword" required>
                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'password') : '' ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
