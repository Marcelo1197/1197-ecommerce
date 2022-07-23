<section class="comercializacion mt-3 container-fluid">
    <div class="comercializacion__Intro text-center">
        <h1>Comercializacion de nuestros productos</h1>
        <div class="row justify-content-center" style="max-width:">
        <div class="col-12 col-md-8">
          <p>
            Bienvenidos al canal de comercializacion de <strong>1197 Electronica</strong>, en esta sección
            encontrarás toda la información sobre cómo comprar nuestros productos, tipos de entregas, formas
            de envíos y métodos de pago.
          </p>
        </div>
          
        </div>
        
    </div>

    <div class="row comercializacion__Cards">
        <div class="col-sm-6 col-lg-4">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
              <?= img(['src' => '/assets/img/carritoIcon_comercializacion.png', 'class' => 'img-fluid rounded-start'])?>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Compras</h5>
                <p class="card-text">Comprá nuestro sitio seguro y recibilo en tu casa en un sólo click.</p>
                </div>
              </div>
            </div>
          </div>    
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <?= img(['src' => '/assets/img/atencionIcon_comercializacion.png', 'class' => 'img-fluid rounded-start'])?>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Atención Personalizada</h5>
                  <p class="card-text">Resolve tus dudas sobre tus compras con nuestro equipo de atención.</p>
                </div>
              </div>
            </div>
          </div>    
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <?= img(['src' => '/assets/img/enviosIcon_comercializacion.png', 'class' => 'img-fluid rounded-start'])?>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Envíos</h5>
                  <p class="card-text">Realizamos envíos a todo el país. Recibí tu producto donde sea que estés</p>
                </div>
              </div>
            </div>
          </div>    
        </div>
        <div class="col-sm-6 col-lg-6">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <?= img(['src' => '/assets/img/pickupIcon_comercializacion.png', 'class' => 'img-fluid rounded-start'])?>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Retiro Gratis en 1197 PickUp </h5>
                  <p class="card-text">Podés retirar tus productos en nuestra Sucursal en Junin 1077, Ctes Capital.</p>
                </div>
              </div>
            </div>
          </div>    
        </div>
        <div class="col-12 col-lg-6">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <?= img(['src' => '/assets/img/mediosPagoIcon_comercializacion.png', 'class' => 'img-fluid rounded-start'])?>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Medios de Pago</h5>
                  <p class="card-text">Aceptamos Tarjeta de Crédito, Transferencias, MercadoPago y GoCuotas!</p>
                </div>
              </div>
            </div>
          </div>   
          
        </div>
        
        
  </section>

  <section class="container-fluid">
    <div class="row justify-content-center imagenesLocal">
    <div class="col-12 text-center">
      <h3>Conoce nuestro local por dentro</h3>
    </div>
    <div class="col-md-8" style="max-width: 1000px;">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <?= img(['src' => '/assets/img/local_interior_1.png', 'class' => 'd-block w-100'])?>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <?= img(['src' => '/assets/img/local_interior_2.png', 'class' => 'd-block w-100'])?>
          </div>
          <div class="carousel-item" data-bs-interval="1500">
            <?= img(['src' => '/assets/img/local_interior_3.png', 'class' => 'd-block w-100'])?>
          </div>
          <div class="carousel-item" data-bs-interval="1500">
            <?= img(['src' => '/assets/img/local_interior_1.jpg', 'class' => 'd-block w-100'])?>
          </div>
          <div class="carousel-item" data-bs-interval="1500">
            <?= img(['src' => '/assets/img/local_interior_2.jpg', 'class' => 'd-block w-100'])?>
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
 