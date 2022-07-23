<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">CONTACTO</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">MENSAJES DE CONTACTO</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de CONSULTAS <strong style="background-color: red; padding:4px; border-radius:4px;">NO RESUELTAS</strong>
                </div>
                <div class="card-body">
                    <table id="tablaPaginacion" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Nombre y Apellido</th>
                                <th>Titulo</th>
                                <th>Mensaje</th>
                                <th>Contestado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($contactos): ?>
                            <?php foreach($contactos as $key => $contacto): ?>
                                <?php if(!$contacto['contestado']): ?>
                                    <tr>
                                        <td><?php echo $contacto['email']; ?></td>
                                        <td><?php echo $contacto['nombre']; ?><?php echo $contacto['apellido']; ?></td>
                                        <td><?php echo $contacto['titulo']; ?></td>
                                        <td><?php echo $contacto['mensaje']; ?></td>
                                        <td><strong><?php echo $contacto['contestado'] ? "SI" : "NO"; ?></strong></td>
                                        <td>
                                            <form action="<?= base_url("admin/contactos/resolver")?>" method="post">
                                                <input type="hidden" name="idContactoResuelto" value="<?= $contacto['id_contacto'] ?>">
                                                <button class="btn btn-success" type="submit">✔</button>
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
                    Lista de CONSULTAS <strong style="background-color: green; padding:4px; border-radius:4px;">RESUELTAS</strong>
                </div>
                <div class="card-body">
                    <table id="tablaPaginacion2" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Nombre y Apellido</th>
                                <th>Titulo</th>
                                <th>Mensaje</th>
                                <th>Contestado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($contactos): ?>
                            <?php foreach($contactos as $key => $contacto): ?>
                                <?php if($contacto['contestado']): ?>
                                    <tr>
                                        <td><?php echo $contacto['email']; ?></td>
                                        <td><?php echo $contacto['nombre']; ?><?php echo $contacto['apellido']; ?></td>
                                        <td><?php echo $contacto['titulo']; ?></td>
                                        <td><?php echo $contacto['mensaje']; ?></td>
                                        <td><strong><?php echo $contacto['contestado'] ? "SI" : "NO"; ?></strong></td>
                                        <td>
                                        <form action="<?= base_url("admin/contactos/deshacer-resuelto")?>" method="post">
                                                <input type="hidden" name="idContactoNoResuelto" value="<?= $contacto['id_contacto'] ?>">
                                                <button class="btn btn-danger" type="submit">X</button>
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
