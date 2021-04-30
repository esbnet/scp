<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary" id="titleCard"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-outline-success btn-circle float-right shadow3" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Retorna para a relação de usuáiros" class="btn btn-outline-success btn-circle float-right shadow3" href="/system/users"><i class="fas fa-undo"></i></a>
        </div>

        <div class="card-body">

            <div class="container shadow p-3 mb-5 bg-white rounded ">

                <?= form_open('system/users/store') ?>
                <!-- <form method="POST" name="form_edit" action="/user/update"> -->

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">Usuário<span class="text-danger">*</span></label>
                        <input id="username" name="username" type="text" class="form-control" aria-describedby="userHelp" value="<?= isset($users['username']) ? $users['username'] : '' ?>" maxlength="30" required>
                        <small id="userHelp" class="form-text text-danger"><?= isset($user->username) ? $user['username'] : ""; ?></small>
                    </div>
                    <div class="col-md-4">
                        <label for="name">Nome<span class="text-danger">*</span></label>
                        <input id="name" name="name" type="text" class="form-control" aria-describedby="nameHelp" value="<?= isset($users['name']) ? $users['name'] : '' ?>" maxlength="100" required>
                        <small id="nameHelp" class="form-text text-danger"><?= isset($user->name) ? $user['name'] : ""; ?></small>
                    </div>
                    <div class="col-md-5">
                        <label for="email">E-mail<span class="text-danger">*</span></label>
                        <input id="email" name="email" type="email" class="form-control" aria-describedby="emailHelp" value="<?= isset($users['email']) ? $users['email'] : set_value('email') ?>" maxlength="255" required>
                        <small id=" emailHelp" class="form-text text-danger"><?= isset($user['email']) ? $user['email'] :  ""; ?></small>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="form-group col-md-3">
                        <label class="control-label" for="grupo">Grupo<span class="text-danger">*</span></label>
                        <select name="grupo" id="grupo" class="form-control form-control-sm" required>
                            <option value="" selected>...</option>
                            <?php foreach ($grupos as $grupo) : ?>
                                <option value="<?php echo esc($grupo['id']); ?>"> <?= $grupo['name'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="active">Ativo<span class="text-danger">*</span></label>
                        <select class="form-control" name="Inputstatus" id="active" required>
                            <option value="">...</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <small id="activeHelp" class="form-text text-danger"></small>
                    </div>

                    <div class="col-md-3">
                        <label for="password_hash">Senha<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_hash" name="password_hash" aria-describedby="password_hashHelp" value="" maxlength="15" required>
                        <small id="password_hashHelp" class="form-text text-danger"><?= isset($user['password_hash']) ? $user['password_hash'] : ""; ?></small>
                    </div>
                    <div class="col-md-3">
                        <label for="user_confirm">Confirmação<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="user_confirm" name="user_confirm" aria-describedby="confirmHelp" value="" maxlength="15" required>
                        <small id="confirmHelp" class="form-text text-danger"><?= isset($user['user_confirm']) ? $user['user_confirm'] : ""; ?></small>
                    </div>
                </div>

            </div>

            <input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : set_value('id') ?>">

            <div class="card-footer ">
                <button title="Grava as alterações" type="submit" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i>&nbsp&nbspGravar</button>
                <a title="Cancela as alterações" class=" btn btn-outline-warning" href="/system/users"><i class="fas fa-ban"></i>&nbsp&nbspCancel</a>
                <a title="Apaga o usuário permanentemente" class="btn btn-outline-danger float-right btn-circle " href="/grupos/delete/<?= isset($user['id']); ?>"><i class="fas fa-trash"></i></a>
            </div>
        </div>

    </div>

    </form>

</div>
<!-- /.container-fluid -->