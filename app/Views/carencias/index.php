<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-circle btn-outline-success float-right" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Adicionar nova carência" class="btn btn-circle btn-outline-primary float-right" href="/LancamentoCarencias/carencia"><i class="fas fa-plus"></i></a>
        </div>

        <div class="card-body">
            <form>
                <div class="card  mb-4">
                    <div id="borderCard" class="card-body border-down-primary">
                        <div class="form-row ">
                            <div class="form-group col-md-4">
                                <label class="control-label" for="inputDisciplina">NTE</label>
                                <select name="nte" id="nte" class="form-control form-control-sm" required>
                                    <option value="" selected>...</option>
                                    <?php foreach ($ntes as $nte) : ?>
                                        <option value="<?= esc($nte['id']); ?>">
                                            <?php echo $nte['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" for="MatriculaSap">Município</label>
                                <input value="" type="text" class="form-control form-control-sm " name="municipio" id="municipio">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="tipo_carencia">Tipo de Carência</label>
                                <select name="tipo_carencia" id="tipo_carencia" class="form-control form-control-sm">
                                    <option value="">Carencia...</option>
                                    <option value="0">Real</option>
                                    <option value="1">Temporária</option>
                                    <option value="2">Ambos</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-2">
                                <label class="control-label" for="NomeProfessor">Cód.UE/CodSecul</label>
                                <input value="" type="number" class="form-control form-control-sm" name="ue_id" id="ue_id">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="control-label" for="NomeProfessor">Unidade Escolar</label>
                                <input value="" type="text" class="form-control form-control-sm" name="unidade_escolar" id="ue">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label" for="disciplina">Disciplina</label>
                                <select name="disciplina" id="disciplina" class="form-control form-control-sm">
                                    <option value="" selected>...</option>
                                    <?php foreach ($disciplinas as $disciplina) : ?>
                                        <option value="<?= esc($disciplina['id']); ?>">
                                            <?php echo $disciplina['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label" for="area_formacao">Área de Formação</label>
                                <select name="area_formacao" id="area_formacao" class="form-control form-control-sm">
                                <option value="" selected>...</option>
                                    <?php foreach ($areas as $area) : ?>
                                        <option value="<?= esc($area['area']); ?>">
                                            <?php echo $area['area'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <a title="Carência por lançamento" class="btn btn-warning float-right shadow3" onclick="consulta_carencia_detalhada()"><i class="fas fa-search"></i></a>
                        <a class="float-right">&nbsp;</a>
                        <a class="float-right">&nbsp;</a>
                        <!-- <a title="Carência agrupada por disciplina" class="btn btn-warning float-right shadow3" onclick="consulta_carencia_real()" disabled><i class="far fa-sticky-note"></i></a> -->
                    </div>
                </div>
            </form>

            <div class="card  mb-4">
                <div id="borderCard" class="card-body border-down-primary">
                    <div class="table-responsive">
                        <table id="consulta_carencia" name="consulta_carencia" class="table-striped table-hover compact nowrap dataTable " width="auto" cellspacing="0">
                            <!-- <table class="table dataTable" width="100%" cellspacing="0"> -->
                            <thead >
                                <tr>
                                <th class="text-center no-sort">Edit</th>
                                    <th>NTE Nome</th>
                                    <th>Município</th>
                                    <th>Cód. UE</th>
                                    <th>Escola</th>
                                    <th>Disciplina</th>
                                    <th>Mat</th>
                                    <th>Vesp</th>
                                    <th>Not</th>
                                    <th>Total</th>
                                    <th class="text-center">Temp.</th>
                                    <th>Motivo</th>
                                    <th>Início</th>
                                    <th>Término</th>
                                </tr>
                            </thead>
                            <tfoot >
		                        <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
	                        </tfoot>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->