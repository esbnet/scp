<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary" id="titleCard"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-outline-success float-right btn-circle shadow" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Adicionar diciplina" class="btn btn-outline-primary float-right btn-circle" href="/disciplinas/new"><i class="fas fa-plus"></i></a>
        </div>

        <div id="borderCard" class="card-body">

            <div class="container shadow p-3 mb-5 bg-white rounded ">

                <!-- Inicio - Popular tabela -->
                <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>

                    <table class="table table-hover table-bordered table-sm dataTable">
                        <thead class="thead-dark">
                            <tr class="table-primary">
                                <th scope="col" style="text-align: center;width: 5%;">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col" colspan="3" style="text-align: center;">Editar</th>
                            </tr>
                        </thead>
                        <?php foreach ($disciplinas as $disciplinas_item) : ?>
                            <tbody>
                                <tr class="light">
                                    <td style="text-align: center;"> <?= esc($disciplinas_item['id']); ?></td>
                                    <td><?= esc($disciplinas_item['nome']); ?></td>

                                    <td style="text-align: center; width: 3%;">
                                        <a class="btn btn-outline-success btn-circle btn-sm" href="/disciplinas/edit/<?= esc($disciplinas_item['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                    <!-- <td style="text-align: center; width: 3%;">
                                        <a class="btn btn-outline-danger  btn-circle btn-sm" href="/disciplinas/delete/<?= esc($disciplinas_item['id']); ?>"><i class="fas fa-trash"></i></a>
                                    </td> -->

                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>

                    <br>

                <?php else : ?>
                    <h3>Nenhuma disciplina encontrada</h3>
                    <p>Até o momento não foi cadastrado nenhuma disciplina.</p>
                <?php endif ?>
            </div>
        </div>

    </div>
</div>