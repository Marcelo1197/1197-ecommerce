
<div class="wrap">
    <h1>Escoge un producto</h1>
    <div class="store-wrapper">
        <div class="category_list">
            <a href='<?= base_url('productos')?>' class="category_item <?= ($activo == 'todos') ? 'ct_item-active' : ''?>" category="all">Todo</a>
            <?php if($categorias): ?>
                <?php foreach($categorias as $key => $categoria): ?>
                    <a href='<?= base_url('productos/mostrar-categoria/'.$categoria['id_categoria'])?>' class="category_item <?= ($activo == $categoria['id_categoria']) ? 'ct_item-active' : ''?>"><?= $categoria['categoria']?></a>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
        <section class="products-list">
            <?php if($productos): ?>
            <?php foreach($productos as $key => $producto): ?>
                <div class="product-item" category="laptops" style="padding: 10px;">
                    <img width="100" src="<?php echo base_url('assets/uploads/'.$producto['imagen'])?>">
                    <hr>
                    <div style="padding: 10px;">
                        <h4><?= $producto['nombre_prod'] ?></h4>
                        <br>
                        <p><strong>Precio: </strong>$<?= $producto['precio'] ?></p>
                    </div>
                    
                    <form method="post" action="<?= site_url('carrito-compras/agregar-carrito')?>">
                        <?php if (session()->get('logueado')): ?>
                            <input type="hidden" name="idProducto" value="<?=  $producto['id_producto']  ?>">
                            <button type="submit" class="btn btn-primary" >Agregar Carrito</button>
                        <?php endif ?>
                    </form>
                    
                    <div>
                        <p style="font-size:10px; padding:10px;"><?= (session()->get('logueado')) ? '' : 'Recuerde loguearse para comprar un producto'?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif ?>
        </section>
    </div>
</div>