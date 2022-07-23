<?= $this->include('admin/header.php') ?>
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
                                <p>Puedes ver el producto agregado <strong><a href="<?= base_url('admin/productos/lista-productos'); ?>">aquí</a></strong></p>
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
                                <input type="file" name="imagen" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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
<?= $this->include('admin/footer.php') ?>