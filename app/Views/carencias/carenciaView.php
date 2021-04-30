<!-- Acumula os campos dos turnos para o campo total -->
<script>
    function calcular() {
        var n1 = parseInt(document.getElementById('Matutino').value, 10);
        var n2 = parseInt(document.getElementById('Vespertino').value, 10);
        var n3 = parseInt(document.getElementById('Noturno').value, 10);
        document.getElementById('Total').value = n1 + n2 + n3;
    }
</script>
<!-- Fim -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary" id="titleCard"> Visualizar Carência </h2>
            <a title="Voltar a pesquisa de carência" class="btn btn-outline-primary float-right btn-circle" href="/LancamentoCarencias"><i class="fas fa-undo-alt"></i></a>
        </div>

        <?php $url = '/LancamentoCarencias/update'; ?>

        <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->
        <form action="<?= $url; ?> " method="post">

            <input class="d-none" type="hidden" name="id" id="id" value="<?php echo ($lancamento_carencia['id']) ?>" />
            <?php csrf_field() ?>

            <?php if (!$lancamento_carencia['temporaria']) : ?>

                <div id="borderCard" class="card-body border-left-primary">
                    <div class="form-row float-left">
                    <a title="Carência Real" class="btn btn-primary float-right btn-circle btn-sm text-white">
                        <span>R</span>
                    </a>
                    </div>
                <?php else : ?>
                    <div id="borderCard" class="card-body border-left-warning">
                        <div class="form-row float-left">
                        <a title="Carência Temporária" class="btn btn-warning float-right btn-circle btn-sm text-white">
                        <span>T</span>
                    </a>
                        </div>
                    <?php endif; ?>

                    <div class="form-row float-right">
                        <label class="control-label" for="ueid">
                            <!-- Última atualização:&nbsp;&nbsp; -->
                            <i class="fas fa-user-edit text-success"></i>&nbsp;&nbsp;<?php echo $lancamento_carencia['user_id']; ?>
                            &nbsp;&nbsp;&nbsp;
                            <i class="fas fa-calendar-alt text-success"></i>&nbsp;&nbsp;<?php echo $lancamento_carencia['data_lancamento']; ?>
                        </label>
                    </div>
                    <br>
                    <hr>

                    <?php if ($lancamento_carencia['houve_provimento'] == 1) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Atenção!</strong> Existe provimento para esta carência.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- Form1 -->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="control-label" for="UeID">Unidade Escolar</label>
                            <div class="input-group mb-3">
                                <input type="number" value="<?= isset($lancamento_carencia['ue_id']) ? $lancamento_carencia['ue_id'] : "" ?>" size="10" maxlength="10" id="ueid" name="ueid" class="form-control form-control-sm btn-sm" aria-label="Recipient's username" aria-describedby="button-addon2" required readonly>
                                <?php if ($lancamento_carencia['houve_provimento'] == 1) : ?>
                                    <button class="btn btn-warning btn-sm" title="exit provimento" type="button" id="busca_professor" disabled">&nbsp;<i class="fas fa-info"></i></button>
                                <?php endif; ?>
                            </div>
                            <!-- <button class="btn btn-outline-warning btn-circle btn-sm" type="button" id="busca_professor" disabled><span class="badge badge-secondary"><i class="fas fa-exclamation"></i></span> </button> -->
                        </div>

                        <div class="form-group col-md-2">
                            <label class="control-label" for="ou">Cód. SAP</label>
                            <div class="input-group mb-3">
                                <input value="<?= isset($ue['ou']) ? $ue['ou'] : ""  ?>" name="OU" type="text" class="form-control form-control-sm" id="OU" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="control-label" for="ue">Nome da Unidade Escolar</label>
                            <input value="<?= isset($ue['ue']) ? $ue['ue'] : ""; ?>" name="UE" type="text" class="form-control form-control-sm" id="UE" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label" for="Municipio">Município</label>
                            <input value="<?= isset($ue['municipio']) ? $ue['municipio'] : ""; ?>" name="Municipio" type="text" class="form-control form-control-sm" id="Municipio" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label" for="CodNte">NTE</label>
                            <input value="<?= isset($ue['nte_id']) ? intval($ue['nte_id']) : ""; ?>" name="CodNte" type="text" class="form-control form-control-sm" id="CodNte" readonly>
                        </div>
                    </div>
                    <!-- Fim Form1-->

                    <div class="form-row ">
                        <div class="form-group col-md-2">
                            <label class="control-label" for="inputMatricula">Matrícula</label>
                            <div class="input-group mb-3">
                                <input type="number" value="<?= isset($professor['matricula']) ? $professor['matricula'] : '' ?>" size="9" name="matricula" id="Matricula" class="form-control form-control-sm matricula" readonly>
                                <!-- <button class="btn btn-primary btn-sm btn-matricula" type="button" id="busca_professor" onclick="pesquisa_professor()"><i class="fas fa-search"></i></button> -->
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label" for="MatriculaSap">Cód. Secul</label>
                            <input value="<?= isset($professor['matricula_sap']) ? $professor['matricula_sap'] : '' ?>" type="text" class="form-control form-control-sm " name="MatriculaSap" id="MatriculaSap" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="NomeProfessor">Nome do Professor</label>
                            <input value="<?= isset($professor['nome']) ? $professor['nome'] : '' ?>" type="text" class="form-control form-control-sm" name="NomeProfessor" id="NomeProfessor" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label" for="Vinculo">Vínculo</label>
                            <input value="<?= isset($professor['vinculo']) ? $professor['vinculo'] : '' ?>" type="Text" class="form-control form-control-sm" id="Vinculo" Name="Vinculo" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="inputDisciplina">Disciplina</label>
                            <select name="disciplina_id" id="inputDisciplina" class="form-control form-control-sm" required <?= isset($lancamento_carencia['houve_provimento']) ? 'disabled' : ''; ?>>
                                <option value="" selected>Disciplina...</option>
                                <?php foreach ($disciplinas as $disciplina) : ?>
                                    <option value="<?= esc($disciplina['id']); ?>" <?= esc($disciplina['id'] == $lancamento_carencia['disciplina_id'] ? 'selected' : '') ?>><?php echo $disciplina['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="control-label" for="inputMotivoAfastamento">Motivo do Afastamento</label>
                            <select name="motivo_vaga_id" id="inputMotivoAfastamento" class="form-control form-control-sm" disabled>
                                <option value="" selected>Motivo do Afastamento...</option>
                                <?php foreach ($motivos as $motivo) : ?>
                                    <?php if ($motivo['temp'] == $lancamento_carencia['temporaria']) : ?>
                                        <option value="<?= esc($motivo['id']); ?>" <?= ($motivo['id'] == $lancamento_carencia['motivo_vaga_id'] ? 'selected' : '') ?>><?php echo $motivo['motivo'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label class="control-label" for="DataInicio">Início do Afastamento</label>
                            <div class="input-group input-group-sm mb-2">
                                <input type="date" class="form-control form-control-sm" id="DataInicio" name="inicio_afastamento" value="<?= isset($lancamento_carencia['inicio_afastamento']) ? $lancamento_carencia['inicio_afastamento'] : '' ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-2 <?= ($lancamento_carencia['temporaria'] == 0 ? 'd-none' : '') ?>">
                            <label class="control-label" for="DataFim">Fim do Afastamento</label>
                            <div class="input-group input-group-sm mb-2">
                                <input placeholder="Término" type="date" class="form-control form-control-sm" id="DataFim" name="termino_afastamento" value="<?= isset($lancamento_carencia['termino_afastamento']) ? $lancamento_carencia['termino_afastamento'] : '' ?>" <?= ($lancamento_carencia['temporaria'] == 1 ? 'required' : '') ?> disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label class="control-label">Mat.</label>
                            <input name="matutino" type="number" class="form-control form-control-sm" min="0" id="Matutino" value="<?= $lancamento_carencia['matutino'] ?>" onblur="calcular()" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Vesp.</label>
                            <input name="vespertino" type="number" class="form-control form-control-sm" min="0" id="Vespertino" value="<?= $lancamento_carencia['vespertino'] ?>" onblur="calcular()" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Not.</label>
                            <input name="noturno" type="number" class="form-control form-control-sm" min="0" id="Noturno" value="<?= $lancamento_carencia['noturno'] ?>" onblur="calcular()" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Total</label>
                            <input name="total" type="number" class="form-control  form-control-sm" min="1" id="Total" value="<?= $lancamento_carencia['total'] ?>" disabled>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label class="control-label">Observação</label>
                                <div class="input-group">
                                    <textarea name="observacao" class="form-control  form-control-sm" id="observacao" rows="2" maxlength="150" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <input class="d-none" type="hidden" name="user_id" value="<?php echo (user()->id) ?>" />
                    <input id="tipoCarencia" type="hidden" name="temporaria" value="<?php echo $lancamento_carencia['temporaria'] ?>" />

                    <div class="card-footer footer">
                        <!-- <a title="Retorna lista de carência" name="cancel" class="btn btn-success " href="/LancamentoCarencias"><i class="fas fa-undo-alt">&nbsp;&nbsp;Voltar</i></a> -->
                    </div>

        </form>

    </div>

</div>
<!-- /.container-fluid -->