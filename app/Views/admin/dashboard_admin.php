
<div id="layoutSidenav">
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bienvenido Administrador</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Panel de Administrador</li>
            </ol>
            <div>
                <h4>Total de ventas del <strong><?= date('Y') ?>:</strong> <?= $totalVentas ?></h4>
                <div name="ventasPorMes">
                    <input type="hidden" id="ventasPorMes" value=<?= $ventasPorMes ?>>
                </div>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
    </main>