<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary" id="titleCard"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-outline-success float-right btn-circle shadow" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Adicionar user de usuário" class="btn btn-outline-primary float-right btn-circle" href="/register"><i class="fas fa-plus"></i></a>
        </div>

        <div id="borderCard" class="card-body">

            <!-- Inicio - Popular tabela -->
            <?php if (!empty($users) && is_array($users)) : ?>

                <!-- <table class="table table-bordered dataTable" width="100%" cellspacing="0"> -->
                <table class="table table-hover table-bordered table-sm dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Usuário</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Ativo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center no-sort">Alterar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td class="text-center"><?= esc($user['id']); ?> </td>
                                <td><?= esc($user['name']); ?> </td>
                                <td><?= esc($user['username']); ?> </td>
                                <td><?= esc($user['email']); ?> </td>
                                <td class="text-center"><?= esc($user['active']); ?> </td>
                                <td class="text-center"><?= esc($user['status']); ?> </td>
                                <td class="text-center">
                                    <a title="Alterar os dados do usuário" class="btn btn-light btn-circle btn-sm" style='color: #0D47A1' href="<?= base_url('system/users/edit/' . $user['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

                <br>

            <?php else : ?>
                <h3>Nenhuma disciplina encontrada</h3>
                <p>Até o momento não foi cadastrado nenhuma disciplina.</p>
            <?php endif ?>
        </div>

    </div>
</div>