<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao inínio" class="btn btn-circle btn-outline-success float-right" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;&nbsp;</a>
            <a title="Adicionar novo provimento" class="btn btn-circle btn-outline-primary float-right" href="/provimentos/provimento"><i class="fas fa-plus"></i></a>
        </div>

        <div class="card-body">

            <?php

                                                    use Config\Format;

if ($provimentos) : ?>

                <div class="table-responsive">
                    <table class="table-striped tabble-hover compact dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="d-none">Id</th>
                                <!-- <th>UE</th> -->
                                <th>Unidade Escolar</th>
                                <th>Matricula</th>
                                <th>Nome Professor</th>
                                <!-- <th>Forma Supr.</th> -->
                                <th class="text-center ">Assunção</th>
                                <th class="text-center no-sort">Alterar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($provimentos as $provimento) : ?>
                                <tr>
                                    <td class="d-none"<?= esc($provimento['id']); ?> </td>
                                    <!-- <td><?= esc($provimento['ue_id']); ?> </td> -->
                                    <td><?= esc($provimento['ue']); ?> </td>
                                    <td><?= esc($provimento['matricula_id']); ?> </td>
                                    <td><?= esc($provimento['professor_nome']); ?> </td>
                                    <!-- <td><?= esc($provimento['forma_suprimento_nome']); ?> </td> -->


                                    <td class="text-center pr-4">
                                        <?php echo ($provimento['assuncao'] == -1
                                            ? '<span class="badge badge-warning">Sim</span>'
                                            : '<span class="badge badge-secondary">Não</span>'); ?>
                                    </td>

                                    <td class="text-center">
                                        <a class="btn btn-light btn-circle btn-sm" style='color: #0D47A1' href="<?= base_url('/provimentos/edit/' . $provimento['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <!-- <a class="btn btn-light btn-circle btn-sm" style='color: #E02D1B' href="/provimentos/delete/<?= esc($provimento['id']); ?>"><i class="fas fa-trash"></i></a> -->
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