<section class="contacto container-fluid">
    <div class="row contacto__informacion">
        <div>
            <h1>¡Contactate con nosotros!</h1>
        </div>
        <div class="col-12 col-md-4">
            <h3>Titular</h3>
                <p>
                Como detallamos en <a href="./quienes_somos.html">¿Quienes somos?</a> el titular y CEO de la empresa es
                Agustin Sanchez. 
                Es el responsable legal de <strong>1197 Electrónica</strong>
                </p>
        </div>
        <div class="col-12 col-md-4">
            <h3>Información legal</h3>
                <p>
                    <strong>Razón social</strong>: 1197 Electrónica S.R.L
                    <br>
                    <strong>CUIT</strong>:30-89023444-5
                </p>
        </div>
        <div class="col-12 col-md-4">
            <h3>Ubicación y contacto</h3>
            <p>
                <strong>Dirección</strong>: Junin 2240
                <br>
                <strong>Telefono</strong>: 3794-892200
                <br>
                <strong>Mail</strong>: 1197electronica@1197.com.ar
                <br>
            </p>
        </div>
    </div>
  </section>

  <section class="row">
      <div class="contacto__mapa col-md-6">
        <div id="map">
        </div>
      </div>

    <?php if (session()->getFlashdata('contacto_ok')) : ?>
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php echo session()->getFlashdata('contacto_ok') ?>
        </div>
        <?php elseif (session()->getFlashdata('contacto_fail')) : ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php echo session()->getFlashdata('contacto_fail') ?>
        </div>
    <?php endif; ?>
      <div class="contacto__formulario col-md-6 container-fluid">
        <div>
            <h3>Formulario de Contacto</h3>
        </div>
        <!-- Contenedor del form -->
        <div class="container py-4">
            <!-- Bootstrap 5 starter form -->
            <form action="<?= base_url("contacto/enviar-contacto"); ?>" method="post" id="contactoForm">
        
                <!-- Nombre  -->
                <div class="mb-3">
                    <label class="form-label" for="nombre"><strong>Nombre</strong> </label>
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="titulo" value="<?= set_value('nombre') ?>"/>
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'nombre') : '' ?></span>
                </div>

                <!-- Apellido  -->
                <div class="mb-3">
                    <label class="form-label" for="apellido"><strong>Apellido</strong> </label>
                    <input class="form-control" id="apellido" name="apellido" type="text" placeholder="titulo" value="<?= set_value('apellido') ?>"/>
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'apellido') : '' ?></span>
                </div>
            
                <!-- email  -->
                <div class="mb-3">
                    <label class="form-label" for="email"><strong>email</strong> </label>
                    <input class="form-control" id="email" name="email" type="text" placeholder="titulo" value="<?= set_value('email') ?>"/>
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'email') : '' ?></span>
                </div>
            
                <!-- Titulo -->
                <div class="mb-3">
                    <label class="form-label" for="tituloContacto"><strong>Titulo</strong> </label>
                    <input class="form-control" id="tituloContacto" name="tituloContacto" type="text" placeholder="titulo" value="<?= set_value('tituloContacto') ?>"/>
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'tituloContacto') : '' ?></span>
                </div>

                <!-- Mensaje -->
                <div class="mb-3">
                    <label class="form-label" for="mensajeContacto"><strong>Mensaje</strong></label>
                    <textarea class="form-control" id="mensajeContacto" name="mensajeContacto" value="<?= set_value('nombreCategoria') ?>" type="text" placeholder="consulta" style="height: 10rem;"></textarea>
                    <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'mensajeContacto') : '' ?></span>
                </div>            
            
                <!-- Boton de envio -->
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Enviar</button>
                </div>
        
            </form>
        
        </div>
      </div>
  </section>
  
