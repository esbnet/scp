<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary" id="titleCard"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-outline-success float-right btn-circle shadow" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Voltar a pesquisa de carência" class="btn btn-outline-primary float-right btn-circle" href="/LancamentoCarencias"><i class="fas fa-undo-alt"></i></a>
        </div>

        <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->

        <form class="needs-validation shadow" action="<?= '/LancamentoCarencias/store' ?>" method="post">
            <?= csrf_field() ?>

            <div id="borderCard" class="card-body border-left-primary">

                <!-- Form1 -->
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="ueid">Unidade Escolar</label>
                        <div class="input-group mb-3">
                            <input type="number" value="1100485" size="9" id="ueid" name="ueid" class="form-control form-control-sm btn-sm" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <!-- <input type="number" value="<?= isset($ue['UeID']) ? $ue['UeID'] : "" ?>" size="9" id="ueid" name="ueid" class="form-control form-control-sm btn-sm" aria-label="Recipient's username" aria-describedby="button-addon2" required> -->
                            <button class="btn btn-primary btn-sm" type="button" id="busca_escola" onclick="pesquisa_escola_carencia()"><i class="fas fa-search"></i></button>
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
                        <label class="control-label" for="CodNte">Nte</label>
                        <input value="<?= isset($ue['CodNte']) ? $ue['CodNte'] : ""; ?>" name="CodNte" type="text" class="form-control form-control-sm" id="CodNte" readonly>
                    </div>
                </div>
                <!-- Fim Form1-->

                <div class="form-row d-none linha-01">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="inputMatricula">Matrícula</label>
                        <div class="input-group mb-3">
                            <input type="number" value="110568394" size="9" name="matricula" id="Matricula" class="form-control form-control-sm matricula" readonly>
                            <!-- <input type="number" value="<?= isset($professor['matricula']) ? $professor['matricula'] : '' ?>" size="9" name="matricula" id="Matricula" class="form-control form-control-sm matricula" readonly> -->
                            <button class="btn btn-primary btn-sm btn-matricula" type="button" id="busca_professor" onclick="pesquisa_professor_carencia()" disabled><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="matricula_sap">Cód. RH Bahia</label>
                        <input value="<?= isset($professor['matricula_sap']) ? $professor['matricula_sap'] : '' ?>" type="text" class="form-control form-control-sm " name="matricula_sap" id="matricula_sap" readonly>
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

                <div class="form-row d-none linha-02">
                    <div class="form-group col-md-3">
                        <label class="control-label" for="disciplina_id">Disciplina</label>
                        <select name="disciplina_id" id="disciplina_id" class="form-control form-control-sm" required>
                            <option value="" selected>Disciplina...</option>
                            <?php foreach ($disciplinas as $disciplina) : ?>
                                <option value="<?php echo esc($disciplina['id']); ?>"> <?= $disciplina['nome'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="control-label" for="inputMotivoAfastamento">Motivo do Afastamento</label>
                        <select name="motivo_vaga_id" id="inputMotivoAfastamento" class="form-control  form-control-sm" required>
                            <option value="" selected >Motivo do Afastamento...</option>
                            <?php foreach ($motivos as $motivo) : ?>
                                <option value="<?= esc($motivo['id']); ?>" > <?= $motivo['Motivo'] ?> </option>
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

                <div class="form-row d-none linha-03">
                    <div class="form-group col-md-1">
                        <label class="control-label">Mat.</label>
                        <input name="matutino" type="number" class="form-control form-control-sm" min="0" id="Matutino" value="0" onblur="calcular_total_carencia()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Vesp.</label>
                        <input name="vespertino" type="number" class="form-control form-control-sm" min="0" id="Vespertino" value="0" onblur="calcular_total_carencia()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Not.</label>
                        <input name="noturno" type="number" class="form-control form-control-sm" min="0" id="Noturno" value="0" onblur="calcular_total_carencia()" required>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Total</label>
                        <input class="form-control  form-control-sm" name="total" type="number" min="1" id="total" value="" readonly required>
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

            <div class="card-footer d-none footer">
                <button type="submit" name="submit" id="submit" class="btn btn-outline-primary " value="Salvar" disabled><i class="fas fa-database">&nbsp;&nbsp;Gravar</i></button>
                <!-- <button onclick="confirmaGravacaoCarencia()" type="submit" name="submit" id="submit" class="btn btn-outline-primary " value="Salvar"><i class="fas fa-database">&nbsp;&nbsp;Gravar</i></button> -->
                <a name="cancel" class="btn btn-outline-warning " href="/LancamentoCarencias/carencia" disabled><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
            </div>

        </form>

    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal show" id="modalTipoCarencia" tabindex="-1" role="dialog" aria-labelledby="tipoCarenciaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tipoCarenciaModalLabel">Tipo de Carência?</h5>
            </div>
            <div class="modal-body">
                <br>
                <div class="row">
                    <div class="col-sm text-center">
                        <button type="button" onclick="setTipoCarenciaDefinitiva()" class="btn btn-primary  btn-icon-split" data-dismiss="modal">
                            <span class="text">Real</span>
                            <span class="icon text-white-50">
                                <i class="fas fa-hourglass"></i>
                            </span>
                        </button>
                    </div>
                    <div class="col-sm text-center">
                        <button type="button" onclick="setTipoCarenciaTemporaria()" class="btn btn-warning btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-hourglass-start"></i>
                            </span>
                            <span class="text">Temp</span>
                        </button>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>