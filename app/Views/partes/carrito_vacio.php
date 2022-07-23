<div class="carritoVacio">
      <div class="carritoVacio__contenedorImg">
        <img class="carritoVacio__img" src="<?= site_url('assets/img/carritoVacio.png')?>" alt="">
      </div>
      <div class="carritoVacio__info">
        <h3>AÚN NO HAY PRODUCTOS EN EL CARRITO</h3>
        <p>Seguí eliguiendo los mejores productos desde aquí:</p>
        <a class="carritoVacio__seguirNavegando" href="<?= site_url('productos')?>">SEGUIR NAVEGANDO</a>
      </div>
</div>

<style>
    .carritoVacio {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .carritoVacio__seguirNavegando {
    display: inline-block;
    padding: 15px;
    color: #fff;
    text-align: center;
    text-decoration: none;
    background: #424242;
    }

    .carritoVacio__seguirNavegando:hover {
    background: #757575;
    color: black;
    }
    
</style>