<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">FACTURAS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Lista de Facturas</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de <strong>FACTURAS</strong>
                </div>
                <div class="card-body">
                    <table id="tablaPaginacion" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Total Venta</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php if ($query) :?>
                                        <?php foreach($query as $key => $cabeceraConDetalles): ?>
                                            <tr>
                                                <!-- Modal detalles de venta -->
                                                <div class="modal fade" id="exampleModal<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detalle de Factura</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <?php foreach($cabeceraConDetalles as $detalle): ?>
                                                                        <div>
                                                                            <div class="card" style="width: 18rem;">
                                                                                <div class="card-header">
                                                                                    Producto#<?= $detalle['producto_id'] ?>
                                                                                </div>
                                                                                <ul class="list-group list-group-flush">
                                                                                    <li class="list-group-item"><strong>Nombre:</strong><?= $productos[$detalle['producto_id']]['nombre_prod'] ?></li>
                                                                                    <li class="list-group-item"><strong>Cantidad:</strong><?= $detalle['cantidad'] ?></li>
                                                                                    <li class="list-group-item"><strong>Precio:</strong><?= $detalle['precio'] ?></li>
                                                                                    <li class="list-group-item"><strong>Fecha:</strong><?= $detalle['fecha_venta'] ?></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                <?php endforeach; ?>    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- FIN Modal detalles de venta -->
                                                <td><?php echo $cabeceraConDetalles[0]['fecha']; ?></td>
                                                <td><?php echo $clientes[$cabeceraConDetalles[0]['usuario_id']]['nombre']; ?> <?php echo $clientes[$cabeceraConDetalles[0]['usuario_id']]['apellido']; ?></td>
                                                <td><?php echo $cabeceraConDetalles[0]['total_venta']; ?></td>
                                                <!-- Boton que abre Modal detalles de venta -->
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key ?>">DETALLES</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                  
                                <tbody>                    
                                </table>
                    
                </div>
            </div>
        </div>



    </main>