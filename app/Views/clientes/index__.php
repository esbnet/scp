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
      <a title="Adicionar um cliente" class="btn btn-success btn-sm float-right" href="/clientes/new"><i class="fas fa-plus-circle">&nbsp;Adicionar</i></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Sobrenome</th>
              <th>CPF</th>
              <th class="text-center">Tipo Cliente</th>
              <th class="text-center">Ativo</th>
              <th class="text-center no-sort">Ações</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($clientes as $cliente) : ?>
              <tr>
                <td><?= esc($cliente['cliente_id']); ?> </td>
                <td><?= esc($cliente['cliente_nome']); ?> </td>
                <td><?= esc($cliente['cliente_sobrenome']); ?> </td>
                <td><?= esc($cliente['cliente_cpf_cnpj']); ?> </td>

                <td class="text-center pr-4"> <?php echo ($cliente['cliente_tipo'] == 2 
                      ? '<i class="fas fa-user-tie"></i>&nbsp;&nbsp;PF' 
                      : '<i class="fas fa-hotel"></i>&nbsp;&nbsp;PJ') ; ?>
                </td>
                <td class="text-center pr-4"> <?php echo ($cliente['cliente_ativo'] == 0 
                      ? '<i class="fas fa-check-circle" style="color: black"></i>&nbsp;&nbsp;<span class="badge badge-warning">Sim</span>' 
                      : '<i class="fas fa-times-circle "></i>&nbsp;&nbsp;<span class="badge badge-secondary">Não</span>' ) ; ?>
                </td>

                <td class="text-center">
                  <a class="btn btn-light btn-sm" style='color: #0D47A1' href="<?= base_url('/clientes/edit/' . $cliente['cliente_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-light btn-sm" style='color: #E02D1B' href="/clientes/delete/<?= esc($cliente['cliente_id']); ?>"><i class="fas fa-trash"></i></a>
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