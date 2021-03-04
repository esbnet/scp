<!-- Begin Page Content -->
<div class="container-fluid">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item item"><a href="<?= base_url('/home'); ?>">Home</a></li>
      <li class="breadcrumb-item item active" aria-current="page"><?= $title; ?></li>
    </ol>
  </nav>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a title="Adicionar um usuário" class="btn btn-success btn-sm float-right" href="/users/new"><i class="fas fa-plus-circle">&nbsp;Novo</i></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Usuário</th>
              <th>E-mail</th>
              <th>Ativo</th>
              <th>Status</th>
              <th class="text-center no-sort">Ações</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($users as $user) : ?>
              <tr>
                <td><?= esc($user['id']); ?> </td>
                <td><?= esc($user['username']); ?> </td>
                <td><?= esc($user['email']); ?> </td>
                <td><?= esc($user['active']); ?> </td>
                <td><?= esc($user['status']); ?> </td>
                <td class="text-center">
                  <a class="btn btn-light btn-sm" style='color: #0D47A1' href="<?= base_url('/users/edit/' . $user['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-light btn-sm" style='color: #E02D1B' href="/users/delete/<?= esc($user['id']); ?>"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->