<div class="container px-3 my-5 clearfix">

    <!-- Mensaje de exito o error -->
    <?php
    if (session()->getFlashdata('compra_ok')) : ?>
      <div class="alert alert-success alert-dismissible text-center">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <?php echo session()->getFlashdata('compra_ok') ?>
      </div>
    <?php elseif (session()->getFlashdata('compra_fail')) : ?>
      <div class="alert alert-danger alert-dismissible text-center">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <?php echo session()->getFlashdata('compra_fail') ?>
      </div>
    <?php endif; ?>
    
    <div class="card-carrito">
            <?php if($itemsCarrito): ?>
            <div class="card-header">
                <h2>CARRITO</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="<?= site_url('carrito-compras/actualizar-carrito') ?>" method="post">
                        <table class="table table-bordered m-0">
                            <thead>
                            <tr>
                                <!-- COLUMNAS  -->
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Producto &amp; Detalles</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Categoria</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Precio</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Cantidad</th>
                                <th class="text-center py-3 px-4" style="width: 120px;"><input type="submit" value="Actualizar Cantidad"></th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Subtotal</th>
                            
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                            </tr>
                            </thead>
                            <tbody>
    
    
                            <?php if($itemsCarrito): ?>
                                <?php foreach($itemsCarrito as $item): ?>
                                <!-- Recorre y muestra todos los items del carrito -->
    
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                            <div class="media-body">
                                            <p class="d-block text-dark"><?= $item['nombre_prod'] ?></p>
                                            <small>
                                                <span class="text-muted"><?= $item['descripcion'] ?></span>
                                            </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4"><?= $item['categoria_id'] ?></td>
                                    <td class="text-right font-weight-semibold align-middle p-4">$<?= $item['precio']?></td>                                
                                    <td class="text-right font-weight-semibold align-middle p-4"><?= $item['cantidad'] ?></td>
                                    <td class="align-middle p-4"><input type="number" name="cantidadUpdate[]" class="form-control text-center" value="<?= $item['cantidad'] ?>" nam></td>
                                    <td class="text-right font-weight-semibold align-middle p-4"><?= $item['cantidad']*$item['precio'] ?></td>
                                    <form action="<?= site_url('carrito-compras/eliminar-carrito')?>" method="post">
                                        <input type="hidden" name="idProductoEliminar" value="<?= $item['id_producto']  ?>">
                                        <td class="text-center align-middle px-0"><button type="submit" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</button></td>
                                    </form>
                                </tr>
                                <!-- ============================================================================ -->
    
                                <?php endforeach ?>
                            <?php endif ?>
                            </tbody>
                        </table>  
                    </form>
                </div>
                <!-- / Shopping cart table -->
            
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                  <div class="mt-4">
                    <a href="<?= site_url('carrito-compras/vaciar-carrito') ?>" class="btn btn-lg btn-danger md-btn-flat mt-2 mr-3">VACIAR CARRITO</a>
                  </div>
                  <div class="d-flex">
                    <div class="text-right mt-4">
                      <label class="text-muted font-weight-normal m-0">
                        TOTAL CARRITO</label>
                      <div class="text-large">
                        <strong>$<?= $total ?></strong>
                      </div>
                    </div>
                  </div>
                </div>
            
                <div class="float-right">
                    <a href="<?= base_url('productos') ?>" class="btn btn-lg btn-secondary md-btn-flat mt-2 mr-3">SEGUIR COMPRANDO</a>
                    <?php if($itemsCarrito): ?>
                        <a href="<?= site_url('ventas/comprar') ?>" class="btn btn-lg btn-primary mt-2">FINALIZAR COMPRA</a>
                    <?php endif ?>
                </div>
            
            </div>
            <?php else: ?>
                <div style="padding:20px 0px 20px 0px;">
                    <?= $this->include('partes/carrito_vacio.php') ?>
                </div>
            <?php endif ?>
        </div>
        
       
</div>