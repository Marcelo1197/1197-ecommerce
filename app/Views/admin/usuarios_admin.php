<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Usuarios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">ABM DE USUARIOS</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Lista de <strong>USUARIOS</strong>
            </div>
            <div class="card-body">
                <table id="tablaPaginacion" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($usuarios): ?>
                        <?php foreach($usuarios as $key => $usuario): ?>
                            <?php if($usuario['baja'] == false): ?>
                            <tr>
                                <td><?php echo $usuario['nombre']; ?></td>
                                <td><?php echo $usuario['apellido']; ?></td>
                                <td><?php echo $usuario['usuario']; ?></td>
                                <td><?php echo $usuario['email']; ?></td>
                                <td>
                                    <form action="<?= base_url('admin/usuarios/eliminar-usuario'); ?>" method="post">
                                        <input type="hidden" name="idUsuarioEliminar" value="<?= $usuario['id_usuario'] ?>">
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
                Lista de <strong style="background-color: red; padding:4px; border-radius:4px;">USUARIOS ELIMINADOS</strong>
            </div>
            <div class="card-body">
                <?php if($usuarios): ?>
                    <table id="tablaPaginacion2" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre y Apellido</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($usuarios as $key => $usuario): ?>
                                <?php if($usuario['baja'] == true): ?>
                                    <tr>
                                        <th scope="row"><?= $usuario['id_usuario'] ?></th>
                                        <td><?= $usuario['nombre'] ?> <?= $usuario['apellido'] ?></td>
                                        <td><?= $usuario['usuario'] ?></td>
                                        <td><?= $usuario['email'] ?></td>
                                        <td>
                                            <form action="<?= base_url('admin/usuarios/alta-usuario'); ?>" method="post">
                                                <input type="hidden" name="idUsuarioAlta" value="<?= $usuario['id_usuario'] ?>">
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
    </div>
</main>
