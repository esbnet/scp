<?php if (!empty($carencias) && is_array($carencias)) : ?>

    <table class="table table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">UEId</th>
                <th scope="col">DisciplinaId</th>
                <th scope="col">Matricula</th>
                <th scope="col">Nome</th>
                <th scope="col">Mat</th>
                <th scope="col">Vesp</th>
                <th scope="col">Not</th>
                <th scope="col">Total</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <?php foreach ($carencias as $carencias_item) : ?>
            <tbody>
                <tr class="light">
                    <td><?= esc($carencias_item['Id']); ?></td>
                    <td><?= esc($carencias_item['UEId']); ?></td>
                    <td><?= esc($carencias_item['DisciplinaId']); ?></td>
                    <td><?= esc($carencias_item['Matricula']); ?></td>
                    <td><?= esc($carencias_item['Nome']); ?></td>
                    <td><?= esc($carencias_item['Mat']); ?></td>
                    <td><?= esc($carencias_item['Vesp']); ?></td>
                    <td><?= esc($carencias_item['Not']); ?></td>
                    <td><?= esc($carencias_item['Total']); ?></td>
                    <td>
                        <p><a class="btn btn-outline-warning" href="/carencias/view/<?= esc($carencias_item['Id']); ?>">Detalhar</a></p>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>

    <br>

<?php else : ?>
    <h3>Nenhuma carência encontrada</h3>
    <p>Até o momento não foi cadastrado nenhuma carência.</p>
<?php endif ?>