<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-circle btn-outline-success float-right" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Adicionar nova carência" class="btn btn-circle btn-outline-primary float-right" href="/provimentos/provimento"><i class="fas fa-plus"></i></a>
        </div>

        <div class="card-body">
            <form>
                <div class="card  mb-4">
                    <div id="borderCard" class="card-body border-down-primary">
                        <div class="form-row ">
                            <div class="form-group col-md-3">
                                <label class="control-label" for="inputDisciplina">NTE</label>
                                <select name="nte" id="nte" class="form-control form-control-sm" title="Selecione o NTE" required>
                                    <option value="" selected>NTE...</option>
                                    <?php foreach ($ntes as $nte) : ?>
                                        <option value="<?= esc($nte['id']); ?>">
                                            <?php echo $nte['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label class="control-label" for="MatriculaSap">Município</label>
                                <input value="" type="text" class="form-control form-control-sm " name="municipio" id="municipio" title="Informa a escola">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="MatriculaSap">Anuência</label>
                                <input value="" type="date" class="form-control form-control-sm " name="anuencia" id="anuencia" title="Informa a anuência">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="MatriculaSap">Assunção</label>
                                <input value="" type="date" class="form-control form-control-sm " name="assuncao" id="assuncao" title="Informa a assunção">
                            </div>
                        </div>

                        <div class="form-row ">
                            <div class="form-group col-md-2">
                                <label class="control-label" for="NomeProfessor">Cód.UE/CodSecul</label>
                                <input value="" type="number" class="form-control form-control-sm" name="ue_id" id="ue_id" title="Código RHBahia/Seconline">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label" for="NomeProfessor">Unidade Escolar</label>
                                <input value="" type="text" class="form-control form-control-sm" name="escola_nome" id="escola_nome" title="Informe a escola">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="NomeProfessor">Matrícula/CPF</label>
                                <input value="" type="number" class="form-control form-control-sm" name="matricula" id="matricula" title="Mátrícula RhBania, Seconline ou CPF">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label" for="NomeProfessor">Nome do Professor</label>
                                <input value="" type="text" class="form-control form-control-sm" name="professor_nome" id="professor_nome" title="Informe o professor">
                            </div>
                        </div>
                        <a title="Clique para pesquisar" class="btn btn-warning  float-right shadow" onclick="consulta_provimento()"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </form>

            <div class="card  mb-4">
                <div id="borderCard" class="card-body border-down-primary">
                    <div class="table-responsive">
                        <table id="consulta_provimento" name="consulta_provimento" class="table-striped table-hover compact nowrap dataTable " width="auto" cellspacing="0">
                            <!-- <table class="table dataTable" width="100%" cellspacing="0"> -->
                            <thead>
                                <tr>
                                    <th class="text-center no-sort">Edit</th>
                                    <th>NTE</th>
                                    <th>Município</th>
                                    <th class="text-center">Cód. UE</th>
                                    <th>Escola</th>
                                    <th class="text-center">Matrícula</th>
                                    <th class="text-center">CPF</th>
                                    <th>Nome do Professor</th>
                                    <th class="text-center">AN</th>
                                    <th class="text-center">AE</th>
                                    <th>Forma Suprimento</th>
                                    <th>Tipo Movimentação</th>
                                    <th class="text-center">Anuência</th>
                                    <th class="text-center">Dt.Anu.</th>
                                    <th class="text-center">Assunção</th>
                                    <th class="text-center">Dt.Ass.</th>
                                    <th class="text-center">Operador</th>
                                    <th class="text-center">Dt Lanc.</th>
                                    <th class="text-center">Obs.</th>
                                </tr>
                            </thead>

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