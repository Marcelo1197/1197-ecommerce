
<div id="layoutSidenav_content">
    <main>
        <!-- ###################################################################################################### -->
        <div class="container-fluid px-4">
            <h1 class="mt-4">CATEGORIAS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">ABM DE CATEGORIAS</li>
            </ol>

            <!-- FORMULARIO --> 
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-6">
                        <h1>Cargar Categoria</h1>
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
                        <form action="<?= base_url("admin/categorias/agregar-categoria"); ?>" method="post">
                            <div class="mb-3">
                                <label for="InputForCategoria" class="form-label">Nombre de la Categoria</label>
                                <input required type="text" name="nombreCategoria" class="form-control" id="InputForCategoria" value="<?= set_value('nombreCategoria') ?>">
                                <span class="text-danger"><?= isset($validation) ? mostrar_error($validation, 'nombreCategoria') : '' ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Categoria</button>
                        </form>
                    </div>
                </div>
            </div>
                              
            <!-- FIN FORMULARIO --> 

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de Categorias
                </div>
                <div class="card-body">
                    <table id="tablaPaginacion" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id Categoria</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>     
                            <?php if($categorias): ?>
                                <?php foreach($categorias as $key => $categoria): ?>
                                    <?php if ($categoria['eliminado'] == 0): ?>
                                        <tr>
                                            <td><?= $categoria['id_categoria']; ?></td>
                                            <td><?= $categoria['categoria']; ?></td>
                                            <td>
                                                <form action="<?= base_url('admin/categorias/eliminar-categoria'); ?>" method="post">
                                                    <input type="hidden" name="idCategoriaEliminar" value="<?= $categoria['id_categoria']; ?>">
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table> 
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de categorias <strong style="background-color: red; padding:4px; border-radius:4px;">ELIMINADAS</strong>
                </div>
                <div class="card-body">
                    <table id="tablaPaginacion2" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id Categoria</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>     
                            <?php if($categorias): ?>
                                <?php foreach($categorias as $key => $categoria): ?>
                                    <?php if ($categoria['eliminado'] == 1): ?>
                                        <tr>
                                            <td><?= $categoria['id_categoria']; ?></td>
                                            <td><?= $categoria['categoria']; ?></td>
                                            <td>
                                                <form action="<?= base_url('admin/categorias/habilitar-categoria'); ?>" method="post">
                                                    <input type="hidden" name="idCategoriaHabilitar" value="<?= $categoria['id_categoria']; ?>">
                                                    <button type="submit" class="btn btn-success">Habilitar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
</main>