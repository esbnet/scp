<?php if (!$session->get('logged_in')) {
  echo ('Não logado: ' . $session->get('logged_in'));
  var_dump($session->get('logged_in'));
}
?>

<p class="botoes">
  <a class="btn btn-primary btn-sm" href="/polos/new"><i class="fas fa-plus"></i>&nbsp&nbspAdicionar</a>
</p>
<hr />

<div class="container shadow-sm p-3 mb-5 bg-white rounded ">

  <?php if (!empty($polos) && is_array($polos)) : ?>

    <table class="table table-bordered  table-sm table-hover">
      <thead class="thead-dark">
        <tr class="table-primary">
          <th scope="col" style="text-align: center;width: 5%;">Id</th>
          <th scope="col">Nome</th>
          <th scope="col" colspan="2" style="text-align: center;">Ações</th>
        </tr>
      </thead>
      <?php foreach ($polos as $polos_item) : ?>
        <tbody>
          <tr class="light">
            <td style="text-align: center;"> <?= esc($polos_item['id']); ?></td>
            <td><?= esc($polos_item['Nome']); ?></td>

            <td style="text-align: center; width: 5%;">
              <a class="btn btn-success btn-sm" href="/polos/edit/<?= esc($polos_item['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
            </td>
            <td style="text-align: center; width: 5%;">
              <a class="btn btn-danger btn-sm" href="/polos/delete/<?= esc($polos_item['id']); ?>"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>

    <br>

  <?php else : ?>
    <h3>Nenhum polo encontrada</h3>
    <p>Até o momento não foi cadastrado nenhuma polo.</p>
  <?php endif ?>
</div>
