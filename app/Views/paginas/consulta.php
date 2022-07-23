<?php
    if (session()->getFlashdata('consulta_ok')) : ?>
      <div class="alert alert-success alert-dismissible text-center">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <?php echo session()->getFlashdata('consulta_ok') ?>
      </div>
    <?php elseif (session()->getFlashdata('consulta_fail')) : ?>
      <div class="alert alert-danger alert-dismissible text-center">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <?php echo session()->getFlashdata('consulta_fail') ?>
      </div>
<?php endif; ?>

<section class="consulta container-fluid">
  <section class="row">    
      <div class="contacto__formulario col-md-6 container-fluid">
        <div>
            <h2>¡Dejanos tu consulta <?= session()->get('nombre') ?>!</h2>
        </div>
        <!-- Contenedor del form -->
        <div class="container py-4">
            <!-- Bootstrap 5 starter form -->
            <form action="consulta/realizar-consulta" method="post" id="contactForm">
        
            <!-- Titulo  -->
            <div class="mb-3">
                <label class="form-label" for="tituloConsulta"><strong>Asunto</strong> </label>
                <input required class="form-control" id="tituloConsulta" name="tituloConsulta" type="text" placeholder="titulo" value="<?= set_value('tituloConsulta') ?>"/>
                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'tituloConsulta') : '' ?></span>
            </div>
            <!-- Mensaje -->
            <div class="mb-3">
                <label class="form-label" for="mensajeConsulta"><strong>Consulta</strong></label>
                <textarea required class="form-control" id="mensajeConsulta" name="mensajeConsulta" value="<?= set_value('nombreCategoria') ?>" type="text" placeholder="consulta" style="height: 10rem;"></textarea>
                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'mensajeConsulta') : '' ?></span>
            </div>
        
            <!-- Boton de envio -->
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Enviar</button>
            </div>
        
            </form>
        
        </div>
      </div>
  </section>