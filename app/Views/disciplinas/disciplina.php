<p class="botoes">
  <a class="btn btn-primary btn-sm" href="/disciplinas/new"><i class="fas fa-plus"></i>&nbsp&nbspAdicionar</a>
</p>
<hr />

<div class="container shadow-sm p-3 mb-5 bg-white rounded ">

  <!-- Inicio - Popular tabela -->
  <?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>

    <table class="table table-sm  table-hover">
      <thead class="thead-dark">
        <tr class="table-primary">
          <th scope="col" style="text-align: center;width: 5%;">Id</th>
          <th scope="col">Nome</th>
          <th scope="col" colspan="3" style="text-align: center;">Ações</th>
        </tr>
      </thead>
      <?php foreach ($disciplinas as $disciplinas_item) : ?>
        <tbody>
          <tr class="light">
            <td style="text-align: center;"> <?= esc($disciplinas_item['id']); ?></td>
            <td><?= esc($disciplinas_item['Nome']); ?></td>

            <td style="text-align: center; width: 5%;">
              <a class="btn btn-success btn-sm" href="/disciplinas/edit/<?= esc($disciplinas_item['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
            </td>
            <td style="text-align: center; width: 5%;">
              <a class="btn btn-danger btn-sm" href="/disciplinas/delete/<?= esc($disciplinas_item['id']); ?>"><i class="fas fa-trash"></i></a>
            </td>

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