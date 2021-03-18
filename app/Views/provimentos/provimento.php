<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <!-- Início do header do card -->
        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao inínio" class="btn btn-circle btn-outline-success float-right" href="/"><i class="fas fa-home"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Voltar a lista de provimentos" class="btn btn-circle btn-outline-primary float-right" href="/provimentos"><i class="fas fa-undo"></i></a>
        </div>
        <!-- Fim do header do card -->

        <form class="needs-validation shadow" action="<?= '/provimentos/store' ?>" method="post">
            <!-- Início do body do card -->
            <div class="card-body ">

                <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->

                <?= csrf_field() ?>

                <!-- Variável para pegar a tabela. --><input type="hidden" id="variavel_tabela" name="variavel_tabela" />

                <!-- Form1 -->
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="ueid">UE</label>
                        <div class="input-group mb-3">
                            <input title="Informa o código CodSecul ou SAP" type="number" value="<?= isset($ue['ue_id']) ? $ue['ue_id'] : "1100159" ?>" size="9" id="ueid" name="ueid" class="form-control form-control-sm text-primary" data-toggle="tooltip" data-placement="top" title="Tooltip na parte superior" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <button class="btn btn-primary btn-sm" type="button" id="busca_escola" onclick="pesquisa_carencia()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="control-label" for="ou">Cód. SAP</label>
                        <input value="<?= isset($ue['OU']) ? $ue['OU'] : ""  ?>" name="OU" type="text" class="form-control form-control-sm text-primary" id="OU" readonly>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="control-label" for="ue">Nome da Unidade Escolar</label>
                        <input value="<?= isset($ue['Ue']) ? $ue['Ue'] : ""; ?>" name="UE" type="text" class="form-control form-control-sm text-primary" id="UE" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="control-label" for="Municipio">Município</label>
                        <input value="<?= isset($ue['Municipio']) ? $ue['Municipio'] : ""; ?>" name="Municipio" type="text" class="form-control form-control-sm text-primary" id="Municipio" readonly>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label" for="CodNte">Nte</label>
                        <input value="<?= isset($ue['CodNte']) ? $ue['CodNte'] : ""; ?>" name="CodNte" type="text" class="form-control form-control-sm text-primary" id="CodNte" readonly>
                    </div>
                </div>
                <!-- Fim Form1-->


                <div class="form-row d-none quadroTabelaCarencia">

                    <div class="form-group col-md-12">

                        <!-- Professor -->
                        <div class="form-row d-none linha-01">
                            <div class="form-group col-md-2">
                                <label class="control-label" for="inputMatricula">Matrícula</label>
                                <div class="input-group mb-3">
                                    <input title="CodSecul ou Cod. SAP ou CPF" data-toggle="tooltip" data-placement="top" title="Tooltip na parte superior" type="number" value="<?= isset($professor['matricula_id']) ? $professor['matricula_id'] : '11019361' ?>" size="9" name="matricula_Id" id="Matricula" class="form-control form-control-sm text-primary matricula">
                                    <button class="btn btn-primary btn-sm btn-matricula" type="button" id="busca_professor" onclick="pesquisa_professor_provimento()"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            <div class="form-group col-md-7">
                                <label class="control-label" for="NomeProfessor">Nome do Professor</label>
                                <input value="<?= isset($professor['nome']) ? $professor['nome'] : '' ?>" type="text" class="form-control form-control-sm text-primary" name="NomeProfessor" id="NomeProfessor" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label" for="Vinculo">Vínculo</label>
                                <input value="<?= isset($professor['vinculo']) ? $professor['vinculo'] : '' ?>" type="Text" class="form-control form-control-sm text-primary" id="Vinculo" Name="Vinculo" readonly>
                            </div>
                        </div>

                        <!-- Professor -->
                        <div class="form-row d-none linha-02 ">
                            <div class="form-group col-md-3 ">
                                <label class="control-label" for="MatriculaSap">Cód. RH Bahia</label>
                                <input value="<?= isset($professor['MatriculaSap']) ? $professor['MatriculaSap'] : '' ?>" type="text" class="form-control form-control-sm text-primary" name="MatriculaSap" id="MatriculaSap" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="CPF">CPF</label>
                                <input type="text" class="form-control form-control-sm text-primary" id="CPF" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Licenciatura">Licenciatura Plena (Seconline)</label>
                                <input type="text" class="form-control form-control-sm text-primary" id="Licenciatura" disabled>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-md-12">
                            <h3 class="control-label text-primary" for="CodNte">Carência da Unidade</h3>
                            <!-- <div class="form-group col-md-12"> -->
                            <div class="table-responsive">
                                <table id="tabelaCarencia" name="tabelaCarencia" class="table table-hover table-bordered table-sm dataTable" width="100%" readonly>
                                    <!-- <table  class='table table-striped table-sm table-bordered'> -->
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th class=''>Disciplina</th>
                                            <th class=''>Temp</th>
                                            <th class=''>Matutino</th>
                                            <th class=''>Vespertino</th>
                                            <th class=''>Noturno</th>
                                            <th class=''>Total</th>
                                            <th class=''>Prover</th>
                                            <th style='display:none;'>id</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <hr>

                        <div class="form-row d-none linha-03 ">
                            <div class="form-group col-md-3">
                                <label for="inputMotivo">Forma de Suprimento</label>
                                <select name="FormaSupId" id="forma_suprimento_id" class="form-control form-control-sm text-primary">
                                    <option value="0" selected>Selecione o motivo...</option>
                                    <?php foreach ($formas_suprimento as $forma) : ?>
                                        <option value="<?php echo esc($forma['id']); ?>" <?= esc($forma['id'] == $forma['id'] ? 'selected' : '') ?>>
                                            <?php echo $forma['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="erroForma"> </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="motivo_provimento_id">Tipo de Movimentação</label>
                                <select name="TipoMovId" id="motivo_provimento_id" class="form-control form-control-sm text-primary">
                                    <option value="0" selected>Selecione o tipo de movimentação...</option>
                                    <?php foreach ($tipos_movimentacao as $tipo) : ?>
                                        <option value="<?php echo esc($tipo['id']); ?>" <?= esc($tipo['id'] == $tipo['id'] ? 'selected' : '') ?>>
                                            <?php echo $tipo['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="erroMotivo"> </div>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input" type="checkbox" id="AulaNormal" name="AulaNormal">
                                <label class="form-check-label " for="AulaNormal">Aula Normal</label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input text-primary" type="checkbox" id="AulaExtra" name="AulaExtra">
                                <label class="form-check-label " for="AulaExtra">Aula Extra</label>
                            </div>
                        </div>

                        <div class="form-row d-none linha-04 ">
                            <div class="form-group ">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input text-primary" type="checkbox" id="cb_anuencia" name="Anuencia" onchange="habilitaDataAnuencia()">
                                    <label class="form-check-label" for="cb_anuencia">Anuência</label>&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control form-control-sm text-primary" id="DataAnuencia" name="DataAnuencia" disabled>

                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input text-primary" type="checkbox" id="cb_assuncao" name="Assuncao" onchange="habilitaDataAssuncao()">
                                    <label class="form-check-label " for="cb_assuncao">Assução</label>&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control form-control-sm text-primary" id="DataAssuncao" name="DataAssuncao" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row d-none linha-05 ">
                            <div class="form-group col-md-12">
                                <label for="Observacao">Observação</label>
                                <textarea class="form-control form-control-sm text-primary" id="Observacao" name="Observacao" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <h3 class="control-label text-primary" for="CodNte">Componentes Providos</h3>
                            <!-- <div class="form-group col-md-12"> -->
                            <div class="table-responsive">
                                <table id="tabelaProvimento" name="tabelaCarencia" class="table table-hover table-bordered table-sm dataTable" width="100%">
                                    <!-- <table  class='table table-striped table-sm table-bordered'> -->
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class='text-center'>Disciplina</th>
                                            <th class='text-center'>Temp</th>
                                            <th class='text-right'>(Mat</th>
                                            <th class='text-left'>Prover)</th>
                                            <th class='text-right'>(Vesp</th>
                                            <th class='text-left'>Prover)</th>
                                            <th class='text-right'>(Not</th>
                                            <th class='text-left'>Prover)</th>
                                            <th class='text-right'>Total</th>
                                            <th class='text-center'>Provido</th>
                                            <!-- <th class='text-left'>Prover</th> -->
                                            <th style='display:none;'>id</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <hr>


                    </div>

                </div>
            </div>
            <!-- Fim do body do card -->

            <!-- Início do footer do card -->
            <div class="card-footer ">
                <button title="Grava as informações de carência." type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Salvar" onclick="" disabled>
                    <i class="fas fa-database">&nbsp;&nbsp;Gravar</i>
                </button>
                <a title="Cancela a inclusão da carência." name="cancel" class="btn btn-outline-warning " href="/provimentos"><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
            </div>
            <!-- Fim do footer do card -->

        </form>

    </div>
    <!-- Fim do card -->

</div>