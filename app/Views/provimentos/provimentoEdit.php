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


        <!-- Form1 -->
        <!-- <form class="users needs-validation shadow" method="post" name="form_edit"> -->
        <form class="needs-validation shadow" action="<?= '/provimentos/save_edit' ?>" method="post">
            <!-- Início do body do card -->
            <div class="card-body ">

                <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->

                <?= csrf_field() ?>

                <!-- Variável para pegar a tabela. -->
                <input type="hidden" id="variavel_tabela" name="variavel_tabela" />

                <div class="form-group col-md-12">


                    <div class="form-row float-right">
                        <label class="control-label" for="ueid">
                            Última atualização:&nbsp;&nbsp;
                            <i class="fas fa-user-edit text-success"></i>&nbsp;&nbsp;<?php echo $provimento['user_id']; ?>
                            &nbsp;&nbsp;&nbsp;
                            <i class="fas fa-calendar-alt text-success"></i>&nbsp;&nbsp;<?php echo date($provimento['data_lancamento']); ?> </label>
                    </div>
                    <br>
                    <hr>

                    <!-- Escola -->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="control-label" for="ueid">UE</label>
                            <div class="input-group mb-3">
                                <input title="Informa o código CodSecul ou SAP" type="number" value="<?= isset($provimento['ue_id']) ? $provimento['ue_id'] : "" ?>" size="9" id="ueid" name="ueid" class="form-control form-control-sm text-primary" data-toggle="tooltip" data-placement="top" title="Tooltip na parte superior" aria-label="Recipient's username" aria-describedby="button-addon2" required readonly>
                                <!-- <button class="btn btn-primary btn-sm" type="button" id="busca_escola" onclick="pesquisa_carencia()">
                                    <i class="fas fa-search"></i>
                                </button> -->
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label class="control-label" for="ou">Cód. SAP</label>
                            <input value="<?= isset($provimento['ou']) ? $provimento['ou'] : ""  ?>" name="OU" type="text" class="form-control form-control-sm text-primary" id="OU" readonly>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="control-label" for="ue">Nome da Unidade Escolar</label>
                            <input value="<?= isset($provimento['ue']) ? $provimento['ue'] : ""; ?>" name="UE" type="text" class="form-control form-control-sm text-primary" id="UE" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label" for="Municipio">Município</label>
                            <input value="<?= isset($provimento['municipio']) ? $provimento['municipio'] : ""; ?>" name="Municipio" type="text" class="form-control form-control-sm text-primary" id="Municipio" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label" for="CodNte">Nte</label>
                            <input value="<?= isset($provimento['nte_id']) ? $provimento['nte_id'] : ""; ?>" name="CodNte" type="text" class="form-control form-control-sm text-primary" id="CodNte" readonly>
                        </div>
                    </div>

                    <!-- Professor -->
                    <div class="form-row linha-01">
                        <div class="form-group col-md-2">
                            <label class="control-label" for="inputMatricula">Matrícula</label>
                            <div class="input-group mb-3">
                                <input title="CodSecul ou Cod. SAP ou CPF" data-toggle="tooltip" data-placement="top" title="Tooltip na parte superior" type="number" value="<?= isset($provimento['professor_matricula']) ? $provimento['professor_matricula'] : '' ?>" size="9" name="matricula_Id" id="Matricula" class="form-control form-control-sm text-primary matricula" >
                                <button class="btn btn-primary btn-sm btn-matricula" type="button" id="busca_professor" onclick="pesquisa_professor_provimento()"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="form-group col-md-7">
                            <label class="control-label" for="NomeProfessor">Nome do Professor</label>
                            <input value="<?= isset($provimento['professor_nome']) ? $provimento['professor_nome'] : '' ?>" type="text" class="form-control form-control-sm text-primary" name="NomeProfessor" id="NomeProfessor" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" for="Vinculo">Vínculo</label>
                            <input value="<?= isset($provimento['vinculo']) ? $provimento['vinculo'] : '' ?>" type="Text" class="form-control form-control-sm text-primary" id="Vinculo" Name="Vinculo" readonly>
                        </div>
                    </div>

                    <!-- Professor -->
                    <div class="form-row linha-02 ">
                        <div class="form-group col-md-3 ">
                            <label class="control-label" for="MatriculaSap">Cód. RH Bahia</label>
                            <input value="<?= isset($provimento['professor_matricula_sap']) ? $provimento['professor_matricula_sap'] : '' ?>" type="text" class="form-control form-control-sm text-primary" name="MatriculaSap" id="MatriculaSap" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="CPF">CPF</label>
                            <input value="<?= isset($provimento['cpf']) ? $provimento['cpf'] : '' ?>" type="text" class="form-control form-control-sm text-primary" name="cpf" id="cpf" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Licenciatura">Licenciatura Plena (Seconline)</label>
                            <input value="<?= isset($provimento['licenca_plena']) ? $provimento['licenca_plena'] : '' ?>" type="text" class="form-control form-control-sm text-primary" name="Licenciatura" id="Licenciatura" readonly>
                        </div>
                    </div>
                    <hr>

                    <div class="form-row linha-03 ">
                        <div class="form-group col-md-3">
                            <label for="inputMotivo">Forma de Suprimento</label>
                            <select name="FormaSupId" id="forma_suprimento_id" class="form-control form-control-sm text-primary">
                                <option value="0" selected>Selecione o motivo...</option>
                                <?php foreach ($formas_suprimento as $forma) : ?>
                                    <option value="<?php echo esc($forma['id']); ?>" <?= esc($forma['id'] == $provimento['forma_suprimento_id'] ? 'selected' : '') ?>><?= $forma['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback" id="erroForma"> </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="motivo_provimento_id">Tipo de Movimentação</label>
                            <select name="TipoMovId" id="motivo_provimento_id" class="form-control form-control-sm text-primary" >
                                <option value="0" selected>Selecione o tipo de movimentação...</option>
                                <?php foreach ($tipos_movimentacao as $tipo) : ?>
                                    <option value="<?= esc($tipo['id']); ?>" <?= esc($tipo['id'] == $provimento['tipo_movimentacao_id'] ? 'selected' : '') ?>><?= $tipo['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback" id="erroMotivo"> </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input <?= intval($provimento['aula_normal']) == -1 ? 'checked' : '' ?> class="form-check-input" type="checkbox" id="AulaNormal" name="AulaNormal" readonly>
                            <label class="form-check-label " for="AulaNormal">Aula Normal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input <?= intval($provimento['aula_extra']) == -1 ? 'checked' : '' ?> class="form-check-input text-primary" type="checkbox" id="AulaExtra" name="AulaExtra" readonly>
                            <label class="form-check-label " for="AulaExtra">Aula Extra</label>
                        </div>
                    </div>

                    <div class="form-row linha-04 ">
                        <div class="form-group ">
                            <div class="form-check form-check-inline">
                                <input <?= intval($provimento['anuencia']) == -1 ? 'checked' : '' ?> class="form-check-input text-primary" type="checkbox" id="cb_anuencia" name="Anuencia" onchange="habilitaDataAnuencia()" readonly>
                                <label class="form-check-label" for="cb_anuencia">Anuência</label>&nbsp;&nbsp;&nbsp;

                                <!-- <input type="date" class="form-control form-control-sm text-primary" id="DataAnuencia" name="DataAnuencia" disabled> -->
                                <input type="date" class="form-control form-control-sm text-primary" id="DataAnuencia" name="DataAnuencia" value="<?= isset($provimento['data_anuencia']) ? $provimento['data_anuencia'] : '' ?>" <?= isset($provimento['data_anuencia']) ? '' : 'disabled' ?>>

                            </div>
                            <div class="form-check form-check-inline">
                                <input <?= intval($provimento['assuncao']) == -1 ? 'checked' : '' ?> class="form-check-input text-primary" type="checkbox" id="cb_assuncao" name="Assuncao" onchange="habilitaDataAssuncao()" readonly>
                                <label class="form-check-label " for="cb_assuncao">Assução</label>&nbsp;&nbsp;&nbsp;

                                <!-- <input type="date" class="form-control form-control-sm text-primary" id="DataAssuncao" name="DataAssuncao" disabled> -->
                                <input type="date" class="form-control form-control-sm text-primary" id="DataAssuncao" name="DataAssuncao" value="<?= isset($provimento['data_assuncao']) ? $provimento['data_assuncao'] : '' ?>" <?php echo(isset($provimento['data_assuncao']) ? '' : 'disabled') ?>>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group col-md-12">
                        <h3 class="control-label text-primary" for="CodNte">Carga Horária Provida</h3>
                        <!-- <div class="form-group col-md-12"> -->
                        <div class="table-responsive">
                            <table id="tabelaCarencia" name="tabelaCarencia" class="table table-hover table-bordered table-sm dataTable" width="100%">
                                <!-- <table  class='table table-striped table-sm table-bordered'> -->
                                <thead class="thead-dark">
                                    <tr>
                                        <th class='text-center'>Disciplina</th>
                                        <th class='text-center'>Matutino</th>
                                        <th class='text-center'>Vespertino</thth>
                                        <th class='text-center'>Noturno</th>
                                        <th class='text-center'>Total</th>
                                        <!-- <th class='text-left'>Prover</th> -->
                                        <th style='display:none;'>id</th>
                                    </tr>
                                </thead>

                                <tbody id="tbListaCarencia" class="tbListaCarencia">
                                    <?php if (isset($provimento_provido)) : ?>

                                        <?php $i = 0; ?>

                                        <?php foreach ($provimento_provido as $provido) : ?>

                                            <?php $i++; ?>

                                            <tr>
                                                <td><?php echo $provido['nome'] ?></td>
                                                <td class="text-center"><?php echo $provido['mat'] ?></td>
                                                <td class="text-center"><?php echo $provido['vesp'] ?></td>
                                                <td class="text-center"><?php echo $provido['not'] ?></td>
                                                <td class="text-center"><?php echo $provido['total'] ?></td>
                                            </tr>


                                        <?php endforeach; ?>

                                    <?php endif; ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row linha-05 ">
                        <div class="form-group col-md-12">
                            <label for="Observacao">Observação</label>
                            <textarea class="form-control form-control-sm text-primary" id="Observacao" name="Observacao" rows="3"><?= isset($provimento['observacao']) ? $provimento['observacao'] : '' ?></textarea>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Fim do body do card -->

            <input type="hidden" name="provimento_id" id="provimento_id" value="<?= $provimento['provimento_id'] ?>" />

            <!-- Início do footer do card -->

            <div class="card-footer footer">
                <button title="Grava as alteração realizadas" type="submit" class="btn btn-primary text-white" id="update_carencia" name="submit" value="Salvar"><i class="fas fa-database">&nbsp;&nbsp;Gravar</i></button>
                <a title="Abandona as alterações e retorna a lista de carência" name="cancel" class="btn btn-warning " href="/provimentos"><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
                <a title="Exclusão permamente" class="btn btn-outline-danger btn-circle text-danger float-right" onclick="deleta_provimento()"><i class="fas fa-trash"></i></a>
            </div>

            <!-- <div class="card-footer ">
                <button class="btn btn-outline-danger" id="btn_grava_provimento" form="form" title="Exclui definitivamente este provimento." type="submit" name="submit" value="Salvar">
                    <i class="fas fa-trash-alt">&nbsp;&nbsp;Exclui</i>
                </button>
                <a title="Cancela e retorna a lista de provimentos." name="cancel" class="btn btn-outline-warning " href="/provimentos"><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
            </div> -->
            <!-- Fim do footer do card -->

        </form>
        <!-- Fim Form1-->


    </div>
    <!-- Fim do card -->

</div>