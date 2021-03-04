<?= \Config\Services::validation()->listErrors(); 
    helper(['form', 'url']);
?>

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

      <form action="<?= '/escolas/store' ?>" method="post" class="form-horizontal">
      <?= csrf_field() ?>
      
      <input type="hidden" name="id" value="<?php echo isset($ues['id']) ? $ues['id'] : set_value('id'); ?>">

      <div class="form-row">

          <div class="form-group col-md-2">
            <label for="UeID">Cod. UE</label>
            <input id="UeID" type="text" class="form-control" id="UeID" name="UeID" maxlength="9" value="<?php echo isset($ues['UeID']) ? $ues['UeID'] : set_value('UeID'); ?>">
            <?= $validation->getError('UeID'); ?>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
          </div>

          <div class="form-group col-md-2">
            <label for="ou">RHBahia</label>
            <input type="text" class="form-control" id="ou" name="ou" maxlength="8" value="<?php echo isset($ues['OU']) ? $ues['OU'] : set_value('OU'); ?>">
            <?= $validation->getError('ou'); ?>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
          </div>

          <div class="form-group col-md-8">
            <label for="ue">Escola</label>
            <input type="text" class="form-control" id="ue" name='ue' maxlength="200" value="<?php echo isset($ues['Ue']) ? $ues['Ue'] : set_value('Ue'); ?>">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
          </div>
        </div>

        <div class="form-row">

          <div class="form-group col-md-7">
            <label for="nte">NTE</label>
            <select id="nte" name="nte" class="form-control" value="<?php echo isset($ues['Nte']) ? $ues['Nte'] : set_value('Nte'); ?>">
              <option></option>

              <?php foreach ($ntes as $nte) : ?>
                <option value="<?php echo esc($nte['nome']); ?>" <?php echo esc($nte['nome'] == $ues['Nte'] ? 'selected' : ''); ?>> <?php echo $nte['nome']; ?> </option>
              <?php endforeach; ?>
            </select>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
          </div>
          <div class="form-group col-md-5">
            <label for="municipio">Município</label>

            <select id="municipio" name="municipio" class="form-control">
              <option></option>
              <?php foreach ($municipios as $cidade) : ?>
                <option value="<?php echo esc($cidade['Municipio']); ?>" <?php echo esc($cidade['Municipio'] == $ues['Municipio'] ? 'selected' : '') ?>><?php echo $cidade['Municipio']; ?></option>
              <?php endforeach; ?>

            </select>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>

          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="tipo">Tipo de Escola</label>
            <select id="tipo" name="tipo" class="form-control">
              <option></option>
              <option>ANEXO</option>
              <option>SEDE</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
          </div>
          <div class="form-group col-md-5">
            <label for="departamento">Departamento Adm</label>
            <select id="departamento" name="departamento" class="form-control">
              <option></option>
              <option>Est./Conveniada</option>
              <option>Estadual</option>
              <option>Municipal</option>
              <option>Particular</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
          </div>
          <div class="form-group col-md-3">
            <label for="situacao">Situação</label>
            <select id="situacao" name="situacao" class="form-control">
              <option></option>
              <option>Em atividade</option>
              <option>Extinta</option>
              <option>Paralisada</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
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