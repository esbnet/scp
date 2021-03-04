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
            <h2 class="float-left text-primary" id="titleCard"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-success float-right btn-circle shadow" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Voltar a pesquisa de carência" class="btn btn-success float-right btn-circle shadow" href="#"><i class="fas fa-search"></i></a>
        </div>

        <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->
        <form action="<?= '/lancamentocarencias/store' ?>" method="post">
            <input class="d-none" type="hidden" name="id" value="<?php echo ($carencia['id']) ?>" />
            <?= csrf_field() ?>

            <div id="borderCard" class="card-body border-left-primary">

                <!-- Form1 -->
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="UeID">Unidade Escolar</label>
                        <div class="input-group mb-3">
                            <input type="number" value="<?= isset($ue['UeID']) ? $ue['UeID'] : "" ?>" size="9" id="ueid" name="ueid" class="form-control form-control-sm btn-sm" aria-label="Recipient's username" aria-describedby="button-addon2" required readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="control-label" for="ou">Cód. SAP</label>
                        <input value="<?= isset($ue['OU']) ? $ue['OU'] : ""  ?>" name="OU" type="text" class="form-control form-control-sm" id="OU" readonly>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="control-label" for="ue">Nome da Unidade Escolar</label>
                        <input value="<?= isset($ue['Ue']) ? $ue['Ue'] : ""; ?>" name="UE" type="text" class="form-control form-control-sm" id="UE" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="Municipio">Município</label>
                        <input value="<?= isset($ue['Municipio']) ? $ue['Municipio'] : ""; ?>" name="Municipio" type="text" class="form-control form-control-sm" id="Municipio" readonly>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label" for="CodNte">NTE</label>
                        <input value="<?= isset($ue['CodNte']) ? $ue['CodNte'] : ""; ?>" name="CodNte" type="text" class="form-control form-control-sm" id="CodNte" readonly>
                    </div>
                </div>
                <!-- Fim Form1-->

                <div class="form-row ">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="inputMatricula">Matrícula</label>
                        <div class="input-group mb-3">
                            <input type="number" value="<?= isset($professor['Matricula']) ? $professor['Matricula'] : '' ?>" size="9" name="cadastro" id="Matricula" class="form-control form-control-sm matricula">
                            <button class="btn btn-primary btn-sm btn-matricula" type="button" id="busca_professor" onclick="pesquisa_professor()"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="MatriculaSap">Cód. RH Bahia</label>
                        <input value="<?= isset($professor['MatriculaSap']) ? $professor['MatriculaSap'] : '' ?>" type="text" class="form-control form-control-sm " name="MatriculaSap" id="MatriculaSap" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="NomeProfessor">Nome do Professor</label>
                        <input value="<?= isset($professor['Nome']) ? $professor['Nome'] : '' ?>" type="text" class="form-control form-control-sm" name="NomeProfessor" id="NomeProfessor" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="Vinculo">Vínculo</label>
                        <input value="<?= isset($professor['Vinculo']) ? $professor['Vinculo'] : '' ?>" type="Text" class="form-control form-control-sm" id="Vinculo" Name="Vinculo" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="control-label" for="inputDisciplina">Disciplina</label>
                        <select name="disciplina_id" placeholder="Disciplina" id="inputDisciplina" class="form-control  form-control-sm">
                            <option selected>Disciplina...</option>
                            <?php foreach ($disciplinas as $disciplina) : ?>
                                <option value="<?php echo esc($disciplina['id']); ?>" <?= esc($disciplina['id'] == $carencia['disciplina_id'] ? 'selected' : '') ?>><?php echo $disciplina['Nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="control-label" for="inputMotivoAfastamento">Motivo do Afastamento</label>
                        <select name="motivo_vaga_id" id="inputMotivoAfastamento" class="form-control  form-control-sm">
                            <option selected>Motivo do Afastamento...</option>
                            <?php foreach ($motivos as $motivo) : ?>
                                <option value="<?php echo esc($motivo['id']); ?>" <?= ($motivo['id'] == $carencia['motivo_vaga_id'] ? 'selected' : '') ?>><?php echo $motivo['Motivo'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="control-label" for="DataInicio">Início do Afastamento</label>
                        <div class="input-group input-group-sm mb-2">
                            <input type="date" class="form-control form-control-sm" id="DataInicio" name="inicio_afastamento">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="DataFim">Fim do Afastamento</label>
                        <div class="input-group input-group-sm mb-2">
                            <input placeholder="Término" type="date" class="form-control form-control-sm" id="DataFim" name="termino_afastamento">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label class="control-label">Mat.</label>
                        <input name="matutino" type="number" class="form-control form-control-sm" min="0" id="Matutino" value="<?= $carencia['matutino'] ?>" onblur="calcular()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Vesp.</label>
                        <input name="vespertino" type="number" class="form-control form-control-sm" min="0" id="Vespertino" value="<?= $carencia['vespertino'] ?>" onblur="calcular()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Not.</label>
                        <input name="noturno" type="number" class="form-control form-control-sm" min="0" id="Noturno" value="<?= $carencia['noturno'] ?>" onblur="calcular()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Total</label>
                        <input name="total" type="number" class="form-control  form-control-sm" min="1" id="Total" value="<?= $carencia['total'] ?>" readonly>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label class="control-label">Observação</label>
                            <div class="input-group">
                                <textarea name="observacao" class="form-control  form-control-sm" id="observacao" rows="2" maxlength="150"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <input class="d-none" type="hidden" name="user" value="<?php echo (user()->username) ?>" />
            <input id="tipoCarencia" type="hidden" name="temporaria" value="original" />

            <div class="card-footer footer">
                <button type="submit" name="submit" onclick="setTipoCarenciaTemporaria()" class="btn btn-primary " value="Salvar"><i class="fas fa-database">&nbsp;&nbsp;Gravar</i></button>
                <a name="cancel" class="btn btn-warning " href="/LancamentoCarencias"><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
            </div>

        </form>

    </div>

</div>
<!-- /.container-fluid -->

<script>
    function confirmaGravacaoCarencia() {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Carência gravada com sucesso!',
            showConfirmButton: false,
            timer: 3000
        })
    }
</script>