<!-- Begin Page Content -->
<div class="container-fluid">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item item"><a href="<?= base_url('/home'); ?>">Escolas</a></li>
      <li class="breadcrumb-item item active" aria-current="page"><?= $title; ?></li>
    </ol>
  </nav>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-header py-3">
      <a title="Voltar" class="btn btn-success btn-sm float-right" href="/escolas"><i class="fas fa-arrow-alt-circle-left">&nbsp;Voltar</i></a>
    </div>

    <div class="card-body">

      <?= form_open('/escolas/store', 'method="post" class="form-horizontal" nome="form" ') ?>
      <?= csrf_field() ?>

      <input type="hidden" name="id" value="<?= $ues['Id'] ; ?>">
      <input type="hidden" name="codnte" value="<?= $ues['CodNte']; ?>">

      <div class="form-row">

        <div class="form-group col-md-2">
          <label for="UeID">Cod. UE</label>
          <input type="text" class="form-control" id="UeID" name="ueid" maxlength="9" value=" <?= $ues['UeID']; ?>">
          
          <p><?= [$erros] ?></p>
          <?php if (isset($erros['UeID'])) : ?>
            <small id="ueidHelp" class="form-text text-danger"><?= $erros['UeID'];?></small>
          <?php endif ?>
        </div>

        <div class="form-group col-md-2">
          <label for="ou">RHBahia</label>
          <input type="text" class="form-control" id="ou" name="ou" maxlength="8" value="<?= $ues['OU'];  old('UeID');?>">
          <?php if ($validation->getError('Ou')) : ?>
            <small id="ouHelp" class="form-text text-danger"><?= $error = $validation->getError('Ou'); ?></small>
          <?php endif ?>
        </div>

        <div class="form-group col-md-8">
          <label for="ue">Escola</label>
          <input type="text" class="form-control" id="ue" name='ue' maxlength="200" value="<?= $ues['Ue'] ; ?>">
          <?php if ($validation->getError('ue')) : ?>
            <small id="ueHelp" class="form-text text-danger"><?= $error = $validation->getError('ue'); ?></small>
          <?php endif ?>
        </div>
      </div>

      <div class="form-row">

        <div class="form-group col-md-7">
          <label for="nte">NTE</label>
          <select id="nte" name="nte" class="form-control" value="<?= $ues['Nte']; ?>">
            <option></option>
            <?php foreach ($ntes as $nte) : ?>
              <option value="<?php echo esc($nte['nome']); old('nome');?>" <?= esc($nte['nome'] == $ues['Nte'] ? 'selected' : ''); ?>> <?php echo $nte['nome'] ?> </option>
            <?php endforeach; ?>
          </select>
          <?php if ($validation->getError('nte')) : ?>
            <small id="NteHelp" class="form-text text-danger"><?= $error = $validation->getError('nte'); ?></small>
          <?php endif ?>
        </div>
        <div class="form-group col-md-5">
          <label for="municipio">Município</label>

          <select id="municipio" name="municipio" class="form-control" value="<?= isset($ues['Municipio']) ? $ues['Municipio'] : set_value('municipio');
                                                                              old('municipio') ?>">
            <option></option>
            <?php foreach ($municipios as $cidade) : ?>
              <option value="<?php echo esc($cidade['Municipio']); ?>" <?= esc($cidade['Municipio'] == $ues['Municipio'] ? 'selected' : '') ?>><?php echo $cidade['Municipio'] ?></option>
            <?php endforeach; ?>
          </select>
          <?php if ($validation->getError('municipio')) : ?>
            <small id="municipioHelp" class="form-text text-danger"><?= $error = $validation->getError('municipio'); ?></small>
          <?php endif ?>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="tipo">Tipo de Escola</label>
          <select id="tipo" name="tipo" class="form-control" value="<?= isset($ues['Tipo']) ? $ues['Tipo'] : set_value('tipo'); old('tipo') ?>">
            <option></option>
            <option>ANEXO</option>
            <option>SEDE</option>
          </select>
          <?php if ($validation->getError('tipo')) : ?>
            <small id="tipoHelp" class="form-text text-danger"><?= $error = $validation->getError('tipo'); ?></small>
          <?php endif ?>
        </div>
        <div class="form-group col-md-5">
          <label for="departamento">Departamento Adm</label>
          <select id="departamento" name="depadm" class="form-control" value="<?php echo isset($ues['DepAdm']) ? $ues['DepAdm'] : set_value('depadm');
                                                                              old('depadm') ?>">
            <option></option>
            <option>Est./Conveniada</option>
            <option>Estadual</option>
            <option>Municipal</option>
            <option>Particular</option>
          </select>
          <?php if ($validation->getError('depadm')) : ?>
            <small id="depadmHelp" class="form-text text-danger"><?= $error = $validation->getError('depadm'); ?></small>
          <?php endif ?>
        </div>
        <div class="form-group col-md-3">
          <label for="Situacao">Situação</label>
          <select id="Situacao" name="Situacao" class="form-control" value="<?php echo isset($ues['Situacao']) ? $ues['Situacao'] : set_value('Situacao');
                                                                            old('Situacao') ?>">
            <option></option>
            <option>Em atividade</option>
            <option>Extinta</option>
            <option>Paralisada</option>
          </select>
          <?php if ($validation->getError('Situacao')) : ?>
            <small id="situacaoHelp" class="form-text text-danger"><?= $error = $validation->getError('Situacao') ?></small>
          <?php endif ?>
        </div>
      </div>

      <hr>

      <p class="botoes">
        <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i>&nbsp&nbspGravar Alterações</button>
      </p>

      </form>

    </div>
  </div>

</div>
<!-- /.container-fluid -->