<script type="text/javascript" src="<?php echo base_url('pesquisa.js')?>"> </script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item item"><a href="<?= base_url('/carencias'); ?>">Carência Real</a></li>
      <li class="breadcrumb-item item active" aria-current="page"><?= $title; ?></li>
    </ol>
  </nav>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a title="Voltar a lista de carências" class="btn btn-success btn-sm float-right" href="/carencias"><i class="fas fa-arrow-left">&nbsp;Voltar</i></a>
    </div>

    <div class="card-body ">

      <!-- Form1 -->
      <div class="form-row">

        <div class="form-group col-md-2">
          <div class="input-group mb-3">
            <input id="CodUE" name="ue_id" type="text" class="form-control form-control-sm" placeholder="Cód. UE" aria-label="Recipient's username" aria-describedby="button-addon2">
            <small id="ue_idHelp" class="form-text text-danger"><?= isset($options['ue_id']) ? $options['ue_id'] : ""; ?></small>
            <div class="input-group-append">
              <a class="btn btn-primary btn-sm" href="<?= base_url('/escolas/pesquisaEscola/' . $escola[0]['UeID'] ); ?>"><i class="fas fa-search"></i></a>
            </div>
          </div>
        </div>

        <div class="form-group col-md-2">
          <input value = "<?= $escola[0]['UeID']?>" name="UEId" placeholder="Cód. RHB" type="text" class="form-control form-control-sm" id="CodRHB" disabled>
        </div>

        <div class="form-group col-md-6">
          <input value="<?= isset($data['Ue']) ? $data['Ue'] : ""; ?>" name="UE" placeholder="Nome da Escola" type="text" class="form-control form-control-sm" id="UE" disabled>
        </div>

      </div>
      <!-- Fim Form1-->


      <?= form_open('/carencias/store') ?>
      <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->
      <div class="form-row">
        <div class="form-group col-md-2">
          <div class="input-group mb-3">
            <input id="CodUE" name="ue_id" type="text" class="form-control form-control-sm" placeholder="Cód. UE" aria-label="Recipient's username" aria-describedby="button-addon2">
            <small id="ue_idHelp" class="form-text text-danger"><?= isset($options['ue_id']) ? $options['ue_id'] : ""; ?></small>
            <div class="input-group-append">
              <button class="btn btn-primary btn-sm" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
        <div class="form-group col-md-2">
          <input name="UEId" placeholder="Cód. RHB" type="text" class="form-control form-control-sm" id="CodRHB" disabled>
        </div>
        <div class="form-group col-md-6">
          <input value="<?= isset($data['Ue']) ? $data['Ue'] : ""; ?>" name="UE" placeholder="Nome da Escola" type="text" class="form-control form-control-sm" id="UE" disabled>
        </div>
        <div class="form-group col-md-2">
          <select name="disciplina_id" placeholder="Disciplina" id="inputDisciplina" class="form-control  form-control-sm">
            <option selected>Disciplina...</option>
            <option>...</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-2">
          <div class="input-group mb-3">
            <input name="cadastro" placeholder="Matrícula" id="inputMatricula" type="text" class="form-control form-control-sm">
            <div class="input-group-append">
              <button class="btn btn-primary btn-sm" type="button" id="button-addon3"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
        <div class="form-group col-md-2">
          <input placeholder="CodSecul" type="text" class="form-control form-control-sm" id="inputCodSecul" disabled>
        </div>
        <div class="form-group col-md-6">
          <input placeholder="Nome do Professor" type="text" class="form-control form-control-sm" id="inputNomeProfessor" disabled>
        </div>
        <div class="form-group col-md-2">
          <input placeholder="Vínculo" type="Text" class="form-control form-control-sm" id="inputVinculo" Name="Vinculo" disabled>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <select placeholder="Motivo do Afastamento" id="inputMotivoAfastamento" class="form-control  form-control-sm">
            <option selected>Motivo do Afastamento...</option>
            <option>...</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Início</span>
            </div>
            <input placeholder="Início" type="date" class="form-control form-control-sm" id="DataInicio" name="DataInicio">
          </div>
        </div>
        <div class="form-group col-md-3">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Término</span>
            </div>
            <input placeholder="Término" type="date" class="form-control form-control-sm" id="DataFim" name="DataFim">
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-1">
          <input placeholder="Mat." type="text" class="form-control form-control-sm" id="Matutino">
        </div>
        <div class="form-group col-md-1">
          <input placeholder="Vesp." type="text" class="form-control form-control-sm" id="Vespertino">
        </div>
        <div class="form-group col-md-1">
          <input placeholder="Vesp." type="text" class="form-control form-control-sm" id="Noturno">
        </div>
        <div class="form-group col-md-1">
          <input placeholder="Total" type="Text" class="form-control  form-control-sm" id="Total">
        </div>
        <div class="col-sm">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Observação</span>
              </div>
              <textarea class="form-control  form-control-sm" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="card-footer ">
      <button type="submit" name="submit" class="btn btn-primary btn-sm" value="Salvar">Gravar</button>
    </div>
  </div>

</div>
<!-- /.container-fluid -->