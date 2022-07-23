<!-- Carousel que muestra los productos -->

<section class="introduccion row justify-content-center">
  <div class="introduccion__Texto col-12 col-md-8 px-4" style="max-width: 1000px;">
    <h1 class="text-center">1197 Electronica</h1>
    <p class="text-center">¡Los mejores <strong>COMPONENTES</strong> al mejor <strong>PRECIO</strong>!</p>
    <p>En 1197 Electronica buscamos destacar por nuestro conocimiento e intentamos establecernos como la opción ideal para sus compras de tecnología. En nuestra tienda encontrarás los mejores componentes de hardware y periféricos.
      </p>
  </div>
  
  <div class="carouselUno row justify-content-center">
    <div class="carousel__IntroTitulo text-center"> 
      <h3>Algunos de nuestros productos</h3>
    </div>
    <div class="col-md-8" style="max-width: 1000px;">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <?= img(['src' => '/assets/img/auriculares.jpg', 'class' => 'd-block w-100'])?>
            
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <?= img(['src' => '/assets/img/silla.jpg', 'class' => 'd-block w-100'])?>
          </div>
          <div class="carousel-item">
          <?= img(['src' => '/assets/img/teclado.jpg', 'class' => 'd-block w-100'])?>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="row justify-content-center mb-4">
    <div class="col-12 col-sm-6 col-md-4" style="max-width: 500px;">
      <div class="col-12 px-3">
        <h3>¿Puedo armar mi PC?</h3>
        <hr>
        <p>
          <strong>¡Por supuesto!</strong> podes elegir vos mismo parte por parte cada componente de tu PC.
          Nosotros te la podemos armar o enviarte los componentes sueltos.
        </p>
      </div>
      <div class="col-12 px-3">
        <?= img(['src' => '/assets/img/arma_tu_pc_proximamente.png', 'class' => 'img-fluid'])?>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4" style="max-width: 500px;">
      <div class="col-12 px-3">
        <h3>¿Puedo comprar una PC armada?</h3>
        <hr>
        <p>
          <strong>¡También SI!</strong> podés elegir cualquiera de nuestras PC armadas para distintos usos:
          ofimática, gaming, diseño gráfico, edición de video, etc.
        </p>
      </div>
      <div class="col-12 px-3">
        <?= img(['src' => '/assets/img/principal_pc_armadas.png', 'class' => 'img-fluid'])?>
      </div>
    </div>
  </div>
</section>
