<!-- Begin Page Content -->
<div class="container-fluid">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item item"><a href="<?= base_url('/users'); ?>">Usuários</a></li>
      <li class="breadcrumb-item item active" aria-current="page"><?= $title; ?></li>
    </ol>
  </nav>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-header py-3">
      <a title="Editar usuário" class="btn btn-success btn-sm float-right" href="<?= base_url('users'); ?> "><i class="fas fa-arrow-left">&nbsp;Voltar</i></a>
    </div>

    <div class="card-body">

      <?= form_open('/users/store') ?>
      <!-- <form method="POST" name="form_edit" action="/user/update"> -->

      <div class="form-group row">
        <div class="col-md-6">
          <label for="username">Usuário</label>
          <input id="username" name="username" type="text" class="form-control" aria-describedby="userHelp" value="<?= isset($user['username']) ? $user['username'] : set_value('username') ?>">
          <small id="userHelp" class="form-text text-danger"><?= isset($user->username) ? $user['username'] : ""; ?></small>
        </div>

        <div class="col-md-6">
          <label for="email">E-mail</label>
          <input id="email" name="email" type="text" class="form-control" aria-describedby="emailHelp" value="<?= isset($user['email']) ? $user['email'] : set_value('email') ?>">
          <small id=" emailHelp" class="form-text text-danger"><?= isset($user['email']) ? $user['email'] :  ""; ?></small>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="user_password">Senha</label>
          <input type="password" class="form-control" id="password_hash" name="password_hash" aria-describedby="senhaHelp" value="">
          <small id="password_hashHelp" class="form-text text-danger"><?= isset($user['password_hash']) ? $user['password_hash'] : ""; ?></small>
        </div>
        <div class="col-md-6">
          <label for="user_confirm">Confirmação da Senha</label>
          <input type="password" class="form-control" id="user_confirm" name="user_confirm" aria-describedby="confirmHelp" value="">
          <small id="confirmHelp" class="form-text text-danger"><?= isset($user['user_confirm']) ? $user['user_confirm'] : ""; ?></small>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="status">Status</label>
          <input type="text" class="form-control" id="status" name="status" aria-describedby="statusHelp" value="<?= isset($user['status']) ? $user['status'] : set_value('status') ?>">
          <small id="statusHelp" class="form-text text-danger"><?= isset($user['status']) ? $user['status'] : ""; ?></small>
        </div>
        <div class="col-md-6">
          <label for="active">Ativo</label>
          <select class="form-control" name="Inputstatus" id="active">
            <option value="1" <?php echo ($user['active'] == 1) ? 'selected' : ''; ?>>Sim</option>
            <option value="0" <?php echo ($user['active'] == 0) ? 'selected' : ''; ?>>Não </option>
          </select>
          <small id="activeHelp" class="form-text text-danger"><?= isset($user['active']) ? $user['active'] : ""; ?></small>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="group">Grupo</label>
          <select class="form-control" name="Inputgroup" id="group_id">
            <option value="2" <?php echo ($group[0]['group_id'] == 2) ? 'selected' : ''; ?>>Carência</option>
            <option value="3" <?php echo ($group[0]['group_id'] == 3) ? 'selected' : ''; ?>>Provimento</option>
            <option value="1" <?php echo ($group[0]['group_id'] == 1) ? 'selected' : ''; ?>>Admin</option>
          </select>
          <small id="groupHelp" class="form-text text-danger"></small>
        </div>
        <input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : set_value('id') ?>">
      </div>

    </div>

    <div class="card-footer ">
      <button type="submit" name="submit" class="btn btn-primary btn-sm" value="Salvar">Gravar</button>
    </div>

  </div>

  </form>

</div>
<!-- /.container-fluid -->