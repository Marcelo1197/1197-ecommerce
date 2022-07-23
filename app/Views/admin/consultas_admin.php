<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">CONSULTAS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">ABM DE CONSULTAS</li>
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
                                            <th>ID Usuario</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Titulo</th>
                                            <th>Consulta</th>
                                            <th>Contestado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Usuario</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Titulo</th>
                                            <th>Consulta</th>
                                            <th>Contestado</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if($consultas): ?>
                                    <?php foreach($consultas as $key => $consulta): ?>
                                        <?php if(!$consulta['contestado']): ?>
                                            <tr>
                                                <td><?php echo $consulta['usuario_id']; ?></td>
                                                <td></td>
                                                <td><?php echo $consulta['titulo']; ?></td>
                                                <td><?php echo $consulta['mensaje']; ?></td>
                                                <td><strong><?php echo $consulta['contestado'] ? "SI" : "NO"; ?></strong></td>
                                                <td>
                                                    <form action="<?= base_url("admin/consultas/resolver") ?>" method="post">
                                                        <input type="hidden" name="idConsultaResuelta" value="<?= $consulta['id_consulta'] ?>">
                                                        <button type="submit" class="btn btn-success">✔</button>
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
                    <div class="container-fluid">
                        <div class="card ">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Lista de CONSULTAS <strong style="background-color: green; padding:4px; border-radius:4px;">RESUELTAS</strong> 
                            </div>
                            <div class="card-body">
                                <table id="tablaPaginacion" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID Usuario</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Titulo</th>
                                            <th>Consulta</th>
                                            <th>Contestado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($consultas): ?>
                                            <?php foreach($consultas as $key => $consulta): ?>
                                                <?php if($consulta['contestado']): ?>
                                                    <tr>
                                                        <td><?php echo $consulta['usuario_id']; ?></td>
                                                        <td></td>
                                                        <td><?php echo $consulta['titulo']; ?></td>
                                                        <td><?php echo $consulta['mensaje']; ?></td>
                                                        <td><strong><?php echo $consulta['contestado'] ? "SI" : "NO"; ?></strong></td>
                                                        <td>
                                                            <form action="<?= base_url("admin/consultas/deshacer-resuelta") ?>" method="post">
                                                                <input type="hidden" name="idConsultaNoResuelta" value="<?= $consulta['id_consulta'] ?>">
                                                                <button type="submit" class="btn btn-danger">X</button>
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
