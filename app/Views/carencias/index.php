<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-circle btn-outline-success float-right" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Adicionar nova carência" class="btn btn-circle btn-outline-primary float-right" href="/lancamentocarencias/carencia"><i class="fas fa-plus"></i></a>
        </div>

        <div class="card-body">

            <?php if ($carencias) : ?>

                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
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
                                    <td>NTE </td>
                                    <td>Municipio </td>
                                    <td><?= esc($carencia['ue_id']); ?> </td>
                                    <td><?= esc($carencia['disciplina_id']); ?> </td>
                                    <td><?= esc($carencia['matutino']); ?> </td>
                                    <td><?= esc($carencia['vespertino']); ?> </td>
                                    <td><?= esc($carencia['noturno']); ?> </td>
                                    <td><?= esc($carencia['total']); ?> </td>

                                    <td class="text-center pr-4">
                                        <?php echo ($carencia['temporaria'] == -1
                                            ? '<span class="badge badge-warning">Sim</span>'
                                            : '<span class="badge badge-secondary">Não</span>'); ?>
                                    </td>

                                    <td class="text-center">
                                        <a class="btn-circle btn-sm btn-info " href="<?= base_url('/lancamentocarencias/edit/' . $carencia['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn-circle btn-sm btn-danger " href="/carencias/delete/<?= esc($carencia['id']); ?>"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            <?php endif  ?>
        </div>

        <?php if (!$carencias) : ?>
            <h1>Nenhuma carência cadastrada.</h1>
        <?php endif  ?>

    </div>

</div>
<!-- /.container-fluid -->