<!-- Begin Page Content -->
<div class="container-fluid">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item item"><a href="<?= base_url('/carencias'); ?>">Carências</a></li>
      <li class="breadcrumb-item item active" aria-current="page"><?= $title; ?></li>
    </ol>
  </nav>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a title="Adicionar carência real" class="btn btn-primary btn" href="/carencias/real_new"><i class="fas fa-plus-circle">&nbsp;Real</i></a>
      <a title="Adicionar carência temporária" class="btn btn-warning btn " href="/carencias/temporaria_new"><i class="fas fa-plus-circle">&nbsp;Temporária</i></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>NTE</th>
              <th>Município</th>
              <th>Escola</th>
              <th>Disciplina</th>
              <th>Mat.</th>
              <th>Vestp.</th>
              <th>Not.</th>
              <th>Total</th>
              <th>Temporaria</th>
              <th class="text-center no-sort">Ações</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($carencias as $carencia) : ?>
              <tr>
                <td><?= esc($carencia['id']); ?> </td>
                <td>NTE </td>
                <td>Municipio </td>
                <td><?= esc($carencia['ue_id']); ?> </td>
                <td><?= esc($carencia['disciplina_id']); ?> </td>
                <td><?= esc($carencia['matutino_residual']); ?> </td>
                <td><?= esc($carencia['vespertino_residual']); ?> </td>
                <td><?= esc($carencia['noturno_residual']); ?> </td>
                <td><?= esc($carencia['total_residual']); ?> </td>

                <td class="text-center pr-4"> <?php echo ($carencia['temporaria'] == -1
                                                ? '<span class="badge badge-warning">Sim</span>'
                                                : '<span class="badge badge-secondary">Não</span>'); ?>
                </td>

                <td class="text-center">
                  <a class="btn btn-light btn-sm" style='color: #0D47A1' href="<?= base_url('/carencia/edit/' . $carencia['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-light btn-sm" style='color: #E02D1B' href="/carencia/delete/<?= esc($carencia['id']); ?>"><i class="fas fa-trash"></i></a>
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