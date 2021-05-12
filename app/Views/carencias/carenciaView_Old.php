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
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao inínio" class="btn btn-success btn-sm float-right" href="/"><i class="fas fa-home"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Voltar a lista de carência" class="btn btn-success btn-sm float-right" href="/carencias"><i class="fas fa-undo"></i></a>
        </div>

        <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->
        <form action="<?= '/carencias/store' ?>" method="post">

            <?= csrf_field() ?>

            <div class="card-body ">

                <!-- Form1 -->
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="UeID">Unidade Escolar</label>
                        <div class="input-group mb-3">
                            <input value="<?= isset($ue['UeID']) ? $ue['UeID'] : "" ?>" id="UeID" name="ue_id" type="text" class="form-control form-control-sm" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="control-label" for="ou">Cód. RH Bahia</label>
                        <input value="<?= isset($ue['OU']) ? $ue['OU'] : ""  ?>" name="OU" type="text" class="form-control form-control-sm" id="OU" disabled>
                    </div>

                    <div class="form-group col-md-8">
                        <label class="control-label" for="ue">Nome da Unidade Escolar</label>
                        <input value="<?= isset($ue['Ue']) ? $ue['Ue'] : ""; ?>" name="UE" type="text" class="form-control form-control-sm" id="UE" disabled>
                    </div>
                </div>
                <!-- Fim Form1-->

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="inputMatricula">Matrícula</label>
                        <div class="input-group mb-3">
                            <input value="<?= isset($professor['Matricula']) ? $professor['Matricula'] : '' ?>" name="cadastro" id="inputMatricula" type="text" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="matriculaSap">Cód. RH Bahia</label>
                        <input value="<?= isset($professor['MatriculaSap']) ? $professor['MatriculaSap'] : '' ?>" placeholder="CodSecul" type="text" class="form-control form-control-sm" id="inputCodSecul" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="inputNomeProfessor">Nome do Professor</label>
                        <input value="<?= isset($professor['Nome']) ? $professor['Nome'] : '' ?>" placeholder="Nome do Professor" type="text" class="form-control form-control-sm" id="inputNomeProfessor" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="vinculo">Vínculo</label>
                        <input value="<?= isset($professor['Vinculo']) ? $professor['Vinculo'] : '' ?>" placeholder="Vínculo" type="Text" class="form-control form-control-sm" id="inputVinculo" Name="Vinculo" readonly>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label class="control-label" for="inputDisciplina">Disciplina</label>
                        <select name="disciplina_id" placeholder="Disciplina" id="inputDisciplina" class="form-control  form-control-sm">
                            <option selected>Disciplina...</option>
                            <?php foreach ($disciplinas as $disciplina) : ?>
                                <option value="<?php echo esc($disciplina['id']); ?>" <?= esc($disciplina['id'] == $disciplina['id'] ? 'selected' : '') ?>><?php echo $disciplina['Nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="control-label" for="inputMotivoAfastamento">Motivo do Afastamento</label>
                        <select name="motivo_vaga_id" id="inputMotivoAfastamento" class="form-control  form-control-sm">
                            <option selected>Motivo do Afastamento...</option>
                            <?php foreach ($motivos as $motivo) : ?>
                                <option value="<?php echo esc($motivo['id']); ?>" <?= esc($motivo['id'] == $motivo['id'] ? 'selected' : '') ?>><?php echo $motivo['Motivo'] ?></option>
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
                        <input name="matutino" type="number" class="form-control form-control-sm" min="0" id="Matutino" value="0" onblur="calcular()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Vesp.</label>
                        <input name="vespertino" type="number" class="form-control form-control-sm" min="0" id="Vespertino" value="0" onblur="calcular()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Not.</label>
                        <input name="noturno" type="number" class="form-control form-control-sm" min="0" id="Noturno" value="0" onblur="calcular()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Total</label>
                        <input name="total" type="number" class="form-control  form-control-sm" min="1" id="Total" readonly>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label class="control-label">Observação</label>
                            <div class="input-group">
                                <textarea class="form-control  form-control-sm" id="exampleFormControlTextarea1" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer ">
                <button type="submit" name="submit" class="btn btn-primary btn-sm" value="Salvar"><i class="fas fa-database">&nbsp;&nbsp;Gravar</i></button>
                <a name="cancel" class="btn btn-warning btn-sm" href="/carencias/real_new/"><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
            </div>

        </form>
    </div>

</div>
<!-- /.container-fluid -->