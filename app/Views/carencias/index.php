<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-circle btn-outline-success float-right" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Adicionar nova carência" class="btn btn-circle btn-outline-primary float-right" href="/LancamentoCarencias/carencia"><i class="fas fa-plus"></i></a>
        </div>

        <div class="card-body">

            <?php if ($carencias) : ?>

                <div class="table-responsive">
                    <table class="table-striped table-hover compact dataTable" style="width:100%" cellspacing="0">
                    <!-- <table class="table dataTable" width="100%" cellspacing="0"> -->
                        <thead>
                            <tr>
                                <th>NTE</th>
                                <th>Município</th>
                                <th>Escola</th>
                                <th>Disciplina</th>
                                <th>Total</th>
                                <th class="text-center">Temp.</th>
                                <th class="text-center no-sort">Alterar</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php foreach ($carencias as $carencia) : ?>
                                <tr>
                                    <td><?= esc($carencia['nte_id']); ?> </td>
                                    <td><?= esc($carencia['municipio']); ?> </td>
                                    <td><?= esc($carencia['escola_nome']); ?> </td>
                                    <td><?= esc($carencia['disciplina_nome']); ?> </td>
                                    <td class="text-center" ><?= esc($carencia['total']); ?> </td>
                                    <td class="text-center pr-4">
                                        <?php echo ($carencia['temporaria'] == 1
                                            ? '<span class="badge badge-warning">Sim</span>'
                                            : '<span class="badge badge-secondary">Não</span>'); ?>
                                    </td>


                                    <td class="text-center">
                                        <a class="btn btn-light btn-circle btn-sm" style='color: #0D47A1' href="<?= base_url('/LancamentoCarencias/edit/' . $carencia['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
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