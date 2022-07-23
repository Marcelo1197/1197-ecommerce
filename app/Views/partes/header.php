<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1197 Electrónica</title>
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  
  <!-- HTML Helper para insertar elementos html con php -->
  
  <?= helper('html'); ?>

  <?= link_tag(['href' => 'assets/css/style.css', 'rel' => 'stylesheet']); ?>
  <?= link_tag(['href' => 'assets/css/carrito.css', 'rel' => 'stylesheet']); ?>
  

</head>

<body>
    <header class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?=anchor(base_url(), img(['src' => '/assets/img/logo.png', 'style' => 'max-width: 40px']), ['class' => 'navbar-brand']);?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <?=anchor(base_url(), 'Principal', ['class' => 'nav-link']);?>
      </li>
      <li  class="nav-item">
          <?=anchor(base_url("/productos"), 'Productos', ['class' => 'nav-link']);?>
      </li>
      <li class="nav-item">
          <?=anchor(base_url("/quienes-somos"), 'Quienes somos', ['class' => 'nav-link']);?>
      </li>
      <li class="nav-item">
          <?=anchor(base_url("/comercializacion"), 'Comercializacion', ['class' => 'nav-link']);?>
      </li>
      <li  class="nav-item">
        <?=anchor(base_url("/terminos-usos"), 'Terminos y Usos', ['class' => 'nav-link']);?>
      </li>
      <?php if (session()->get('logueado')): ?>
        <li class="nav-item">
            <?=anchor(base_url("/consulta"), 'Consulta', ['class' => 'nav-link']);?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= session()->get('nombre') ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><?=anchor(base_url("mi-cuenta"), 'Mi cuenta', ['class' => 'dropdown-item']);?></li>
            <li>
              <form action="<?= base_url("/login/logout")?>" method="post">
                <button type="submit" class="dropdown-item">Cerrar sesion</button>
              </form>
            </li>
          </ul>
        </li>
        
        <li  class="nav-item">
          <?=anchor(base_url('carrito-compras'), img(['src' => '/assets/img/carrito.png', 'style' => 'max-width: 40px']), ['class' => 'nav-link']);?>
        </li>        
      <?php else: ?>
        <li class="nav-item">
          <?=anchor(base_url("/contacto"), 'Informacion de Contacto', ['class' => 'nav-link']);?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tu cuenta
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?=anchor(base_url("/login"), 'Ingresar', ['class' => 'dropdown-item']);?>
          <?=anchor(base_url("/registro"), 'Registrarse', ['class' => 'dropdown-item']);?>
         
          </div>
        </li>
      <?php endif; ?>
      
    </ul>
  </div>
</nav>
    </header>