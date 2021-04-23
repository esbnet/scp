<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary" id="titleCard"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-outline-success float-right btn-circle shadow" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Retorna para a relação de usuáiros" class="btn btn-outline-primary float-right btn-circle" href="/system/users"><i class="fas fa-undo"></i></a>
        </div>

        <div class="card-body">

            <?= form_open('/users/store') ?>
            <!-- <form method="POST" name="form_edit" action="/user/update"> -->

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="username">Usuário</label>
                    <input id="username" name="username" type="text" class="form-control" aria-describedby="userHelp" value="<?= isset($users['username']) ? $users['username'] : '' ?>">
                    <small id="userHelp" class="form-text text-danger"><?= isset($user->username) ? $user['username'] : ""; ?></small>
                </div>

                <div class="col-md-6">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="text" class="form-control" aria-describedby="emailHelp" value="<?= isset($users['email']) ? $users['email'] : set_value('email') ?>">
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
                    <input type="text" class="form-control" id="status" name="status" aria-describedby="statusHelp" value="<?= isset($users['status']) ? $users['status'] : '' ?>">
                    <small id="statusHelp" class="form-text text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="active">Ativo</label>
                    <select class="form-control" name="Inputstatus" id="active">
                        <option value="1">Sim</option>
                    </select>
                    <small id="activeHelp" class="form-text text-danger"></small>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="group">Grupo</label>
                    <select class="form-control" name="Inputgroup" id="group_id">
                        <option value="1">Sim</option>
                    </select>
                    <small id="groupHelp" class="form-text text-danger"></small>
                </div>
                <input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : set_value('id') ?>">
            </div>

        </div>

        <div class="card-footer ">
            <button title="Grava as alterações"  type="submit" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i>&nbsp&nbspGravar</button>
            <a title="Cancela as alterações" class=" btn btn-outline-warning" href="/system/users"><i class="fas fa-ban"></i>&nbsp&nbspCancel</a>
            <a title="Apaga o usuário permanentemente" class="btn btn-outline-danger float-right btn-circle " href="/grupos/delete/<?= isset($user['id']); ?>"><i class="fas fa-trash"></i></a>
        </div>


    </div>

    </form>

</div>
<!-- /.container-fluid -->