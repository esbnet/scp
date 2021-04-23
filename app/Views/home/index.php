<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Carencia Real</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($TotalCarenciaReal);?> h</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hourglass fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Carência Temporária</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($TotalCarenciaTemporaria);?> h</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Provimento</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($TotalProvimento); ?> h</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Eficiência</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= esc($Eficiencia); ?>%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= esc($Eficiencia); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Disciplinas - Top 5</h6>
                        </div>

                        <div class="card-body">
                            <h4 class="small font-weight-bold">
                                <?= $TFD[0]['disciplina_nome'].' - '. number_format($TFD[0]['total'], 0, '', '.') ?> h
                                <span class="float-right">
                                    <?= number_format(($TFD[0]['total'] / $TTC * 100), 2, ',', '') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= ($TFD[0]['total'] / $TTC * 100) ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFD[1]['disciplina_nome'].' - '. number_format($TFD[1]['total'], 0, '', '.') ?> h
                                <span class="float-right">
                                    <?= number_format(($TFD[1]['total'] / $TTC * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= ($TFD[1]['total'] / $TTC * 100) ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFD[2]['disciplina_nome'].' - '. number_format($TFD[2]['total'], 0, '', '.') ?> h 
                                <span class="float-right">
                                    <?= number_format(($TFD[2]['total'] / $TTC * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: <?= ($TFD[2]['total'] / $TTC * 100) ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFD[3]['disciplina_nome'].' - '. number_format($TFD[3]['total'], 0, '', '.') ?> h 
                                <span class="float-right">
                                    <?= number_format(($TFD[3]['total'] / $TTC * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= ($TFD[3]['total'] / $TTC * 100) ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFD[4]['disciplina_nome'].' - '. number_format($TFD[4]['total'], 0, '', '.') ?> h 
                                <span class="float-right">
                                    <?= number_format(($TFD[4]['total'] / $TTC * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($TFD[4]['total'] / $TTC * 100) ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                    <!-- Color System -->
                    <!-- <div class="row d-done">
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary text-white shadow">
                                <div class="card-body">
                                    Primary
                                    <div class="text-white-50 small">#4e73df</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    Success
                                    <div class="text-white-50 small">#1cc88a</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="card bg-info text-white shadow">
                                <div class="card-body">
                                    Info
                                    <div class="text-white-50 small">#36b9cc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-warning text-white shadow">
                                <div class="card-body">
                                    Warning
                                    <div class="text-white-50 small">#f6c23e</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-danger text-white shadow">
                                <div class="card-body">
                                    Danger
                                    <div class="text-white-50 small">#e74a3b</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-secondary text-white shadow">
                                <div class="card-body">
                                    Secondary
                                    <div class="text-white-50 small">#858796</div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Escola - Top 5</h6>
                        </div>

                        <div class="card-body">
                            <h4 class="small font-weight-bold">
                                <?= $TFE[0]['escola_nome'].' - '. number_format($TFE[0]['total'], 0, '', '.') ?> h
                                <span class="float-right">
                                    <?= number_format(($TFE[0]['total'] / $TFE[0]['total'] * 100), 0, '', '.') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= ($TFE[0]['total'] / $TFE[0]['total'] * 100) ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFE[1]['escola_nome'].' - '. number_format($TFE[1]['total'], 0, '', '.') ?> h
                                <span class="float-right">
                                    <?= number_format(($TFE[1]['total'] / $TFE[0]['total'] * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= ($TFE[1]['total'] / $TFE[0]['total'] * 100) ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFE[2]['escola_nome'].' - '. number_format($TFE[2]['total'], 0, '', '.') ?> h 
                                <span class="float-right">
                                    <?= number_format(($TFE[2]['total'] / $TFE[0]['total'] * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: <?= ($TFE[2]['total'] / $TFE[0]['total'] * 100) ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFE[3]['escola_nome'].' - '. number_format($TFE[3]['total'], 0, '', '.') ?> h 
                                <span class="float-right">
                                    <?= number_format(($TFE[3]['total'] / $TFE[0]['total'] * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= ($TFE[3]['total'] / $TFE[0]['total'] * 100) ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="small font-weight-bold">
                                <?= $TFE[4]['escola_nome'].' - '. number_format($TFE[4]['total'], 0, '', '.') ?> h 
                                <span class="float-right">
                                    <?= number_format(($TFE[4]['total'] / $TFE[0]['total'] * 100), 2, ',', ',') ?> %
                                </span>
                            </h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($TFE[4]['total'] / $TFE[0]['total'] * 100) ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

                
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->