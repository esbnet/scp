

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
        <a title="Adicionar uma nova escola" class="btn btn-success btn-sm float-right" href="/escolas/new"><i class="fas fa-plus-circle">&nbsp;Adicionar</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>NTE</th>
                <th>Município</th>
                <th>CodSecul</th>
                <th>RHBA</th>
                <th>Nome da Escola</th>
                <th class="text-center no-sort">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($ues as $ue) : ?>
                <tr>
                  <td><?= esc($ue['Id']); ?> </td>
                  <td><?= esc($ue['Nte']); ?> </td>
                  <td><?= esc($ue['Municipio']); ?> </td>
                  <td><?= esc($ue['UeID']); ?> </td>
                  <td><?= esc($ue['OU']); ?> </td>
                  <td><?= esc($ue['Ue']); ?> </td>
                  <td  class="text-center">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('/escolas/edit/' . $ue['Id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" href="/escolas/delete/<?= esc($ue['Id']); ?>"><i class="fas fa-trash"></i></a>
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

