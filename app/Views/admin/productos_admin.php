<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">PRODUCTOS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">ABM DE PRODUCTOS</li>
            </ol>
            
            <!-- FORMULARIO --> 
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-6">
                        <h1>Cargar Producto</h1>
                        <!-- -->
                        <!-- -->

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
                        <form action="<?= base_url("admin/productos/agregar-producto"); ?>" method="POST" enctype='multipart/form-data'>
                            <div class="mb-3">
                                <label for="InputForName" class="form-label">Nombre del producto</label>
                                <input required type="text" name="nombreProducto" class="form-control" id="InputForName" value="<?= set_value('nombreProducto') ?>">
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'nombreProducto') : '' ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionProducto" class="form-label">Descripcion del producto</label>
                                <input required type="text" name="descripcionProducto" class="form-control" id="descripcionProducto" value="<?= set_value('descripcionProducto') ?>">
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'descripcionProducto') : '' ?></span>
                            </div>                            
                            <div class="mb-3">
                                <label for="imagenArchivo" class="form-label">Imagen del Producto</label>
                                <input required type="file" name="imagen" id="imagenArchivo">
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'imagen') : '' ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="categoriaId" class="form-label">Categoria</label>
                                <br>
                                <select class="form-select" aria-label="Default select example" name="categoriaId">
                                    <option selected>Elige una categoria</option>
                                    <?php if($categorias): ?>
                                        <?php foreach($categorias as $key => $categoria): ?>
                                        <option value="<?= $categoria['id_categoria']?>"><?= $categoria['categoria'] ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>        
                                </select>
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'categoriaId') : '' ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="InputPrecio" class="form-label">Precio</label>
                                <input required type="number" name="precio" class="form-control" id="InputPrecio"  value="<?= set_value('precio') ?>">
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'precio') : '' ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="InputStock" class="form-label">Stock</label>
                                <input required type="number" name="stock" class="form-control" id="InputStock"  value="<?= set_value('stock') ?>">
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'stock') : '' ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="InputStockMin" class="form-label">Stock Minimo</label>
                                <input required type="number" name="stockMinimo" class="form-control" id="InputStockMin"  value="<?= set_value('stockMinimo') ?>">
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'stockMinimo') : '' ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Producto</button>
                        </form>
                    </div>
                </div>
            </div>                        
            <!-- FIN FORMULARIO --> 
            <br>

            <!-- Mensaje de ??XITO/ERROR al MODIFICAR UN PRODUCTO -->

            <?php if (!empty(session()->getFlashData('fail_editado'))) :  ?> 
                            <div class="alert alert-danger">
                                <?= session()->getFlashData('fail_editado'); ?>
                            </div>
            <?php endif ?>
            <?php if (!empty(session()->getFlashData('success_editado'))) :  ?> 
                <div class="alert alert-success">
                    <?= session()->getFlashData('success_editado'); ?>
                </div>
            <?php endif ?>

            <!-- PRODUCTOS DISPONIBLES --> 
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de Productos
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nombre </th>
                                <th>Descripcion </th>
                                <th>Imagen</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Stock Minimo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Stock Minimo</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php if($productos): ?>
                            <?php foreach($productos as $key => $producto): ?>
                                <tr>
                                <?php if($producto['eliminado'] == 0): ?>
                                    <td><?php echo $producto['nombre_prod']; ?></td>
                                    <td><?php echo $producto['descripcion']; ?></td>
                                    <td>
                                        <img style="width: 100px;" src="<?= base_url('assets/uploads/'.$producto['imagen']); ?>" alt="">
                                    </td>
                                    <td>
                                        <?php foreach($categorias as $key => $categoria): ?>
                                            <?php if($categoria['id_categoria'] == $producto['categoria_id']): ?>        
                                                <?= $categoria['categoria'] ?>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?php echo $producto['precio']; ?></td>
                                    <td><?php echo $producto['stock']; ?></td>
                                    <td><?php echo $producto['stock_min']; ?></td>
                                    <!-- Boton que abre el modal cuyo id coincida con data-bs-target. Debo cambiar los ids y data-bs-target dinamicamente -->

                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $producto['id_producto'] ?>" data-bs-whatever="@getbootstrap">Editar</button></td>
                                    <td>
                                        <form action="<?= base_url('admin/productos/eliminar-producto')?>" method="post">
                                            <input type="hidden" name="idProductoEliminar" value="<?= $producto['id_producto']?>">
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                    
                                    <!-- Formulario MODAL que aparece al EDITAR producto   --------------------------------------------------------------------------------- -->  
                                    <div class="modal fade" id="exampleModal<?= $producto['id_producto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar <?php echo $producto['nombre_prod']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url("admin/productos/editar-producto"); ?>" method="post" enctype='multipart/form-data'>
                                                    <input type="hidden" name="idProductoEditar" value="<?= $producto['id_producto']?>">
                                                    <div class="mb-3">
                                                        <label for="nombreProductoEditado" class="form-label">Nombre del producto</label>
                                                        <input type="text" name="nombreProductoEditado" class="form-control" id="nombreProductoEditado" value="<?php echo $producto['nombre_prod']; ?>">
                                                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'nombreProductoEditado') : '' ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="descripcionProductoEditado" class="form-label">Descripcion del producto</label>
                                                        <input type="text" name="descripcionProductoEditado" class="form-control" id="descripcionProductoEditado" value="<?php echo $producto['descripcion']; ?>">
                                                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'descripcionProductoEditado') : '' ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="InputImagenActual" class="form-label">Imagen actual:</label>
                                                        <input type="text" id="InputImagenActual"value="<?php echo $producto['imagen']; ?>" disabled>
                                                        <br>
                                                        <label for="InputImagenEditado" class="form-label">Elija una imagen nueva</label>
                                                        <input type="file" name="imagenEditado" id="InputImagenEditado">
                                                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'imagenEditado') : '' ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="categoriaIdEditado" class="form-label">Categoria</label>
                                                        <br>
                                                        <select class="form-select" aria-label="Default select example" name="categoriaIdEditado">
                                                            <option selected><?php echo $producto['categoria_id']; ?></option>
                                                            <?php if($categorias): ?>
                                                                <?php foreach($categorias as $key => $categoria): ?>
                                                                <option value="<?= $categoria['id_categoria']?>"><?= $categoria['categoria'] ?></option>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>        
                                                        </select>
                                                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'categoriaId') : '' ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="InputPrecioEditado" class="form-label">Precio</label>
                                                        <input type="number" name="precioEditado" class="form-control" id="InputPrecioEditado"  value="<?php echo $producto['precio']; ?>">
                                                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'precioEditado') : '' ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="InputStockEditado" class="form-label">Stock</label>
                                                        <input type="number" name="stockEditado" class="form-control" id="InputStockEditado"  value="<?php echo $producto['stock']; ?>">
                                                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'stockEditado') : '' ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="InputStockMinEditado" class="form-label">Stock Minimo</label>
                                                        <input type="number" name="stockMinimoEditado" class="form-control" id="InputStockMinEditado"  value="<?php  echo $producto['stock_min']; ?>">
                                                        <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'stockMinimoEditado') : '' ?></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit"  class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- Botones internos del modal para cerrar el modal o actualizar el producto -->
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FIN FORMULARIO MODAL------------------------------------------------------------------------------------------------- -->  
                                    
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PRODUCTOS ELIMINADOS --> 
            <div class="container-fluid px-4">
                <h4 class="mt-4">Productos Eliminados</h4>
                <?php if($productos): ?>
                    <table class="table table-danger table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Precio</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos as $key => $producto): ?>
                                <?php if($producto['eliminado'] == 1): ?>
                                    <tr>
                                        <th scope="row"><?= $producto['nombre_prod'] ?></th>
                                        <td><img style="width: 100px;" src="<?= base_url('assets/uploads/'.$producto['imagen']); ?>" alt=""></td>
                                        <td>
                                            <?php foreach($categorias as $key => $categoria): ?>
                                                <?php if($categoria['id_categoria'] == $producto['categoria_id']): ?>        
                                                    <?= $categoria['categoria'] ?>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= $producto['precio'] ?></td>
                                        <td>
                                            <form action="<?= base_url('admin/productos/alta-producto'); ?>" method="post">
                                                <input type="hidden" name="idProductoAlta" value="<?= $producto['id_producto'] ?>">
                                                <button type="submit" class="btn btn-success">Habilitar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </main>