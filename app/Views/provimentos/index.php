<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao inínio" class="btn btn-sm btn-circle btn-outline-success float-right" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;&nbsp;</a>
            <a title="Adicionar novo provimento" class="btn btn-sm btn-circle btn-outline-primary float-right" href="/provimentos/provimento"><i class="fas fa-plus"></i></a>
        </div>

        <div class="card-body">

            <?php if ($provimentos) : ?>

                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>NTE</th>
                                <th>Município</th>
                                <th>Escola</th>
                                <th>Disciplina</th>
                                <th>Professor</th>
                                <th>Mat.</th>
                                <th>Vestp.</th>
                                <th>Not.</th>
                                <th>Total</th>
                                <th class="text-center no-sort">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($provimentos as $provimento) : ?>
                                <tr>
                                    <td><?= esc($provimento['id']); ?> </td>
                                    <td>NTE </td>
                                    <td>Municipio </td>
                                    <td><?= esc($provimento['UeId']); ?> </td>
                                    <td><?= esc($provimento['DisciplinaId']); ?> </td>
                                    <td><?= esc($provimento['Matricula']); ?> </td>
                                    <td><?= esc($provimento['Mat']); ?> </td>
                                    <td><?= esc($provimento['Vesp']); ?> </td>
                                    <td><?= esc($provimento['Not']); ?> </td>
                                    <td><?= esc($provimento['Total']); ?> </td>

                                    <td class="text-center">
                                        <a class="btn btn-light btn-sm" style='color: #0D47A1' href="<?= base_url('/provimentos/edit/' . $provimento['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-light btn-sm" style='color: #E02D1B' href="/provimentos/delete/<?= esc($provimento['id']); ?>"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            <?php endif  ?>

            <?php if (!$provimentos) : ?>
                <h2>Nenhum provimento cadastrado.</h2>
            <?php endif  ?>

        </div>
    </div>

</div>
<!-- /.container-fluid -->