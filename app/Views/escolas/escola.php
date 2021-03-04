<?php if (!$session->get('logged_in')) {
  echo ('Não logado: ' . $session->get('logged_in'));
  var_dump($session->get('logged_in'));
}
?>

<p class="botoes">
  <a class="btn btn-primary btn-sm" href="/escolas/new"><i class="fas fa-plus"></i>&nbsp&nbspAdicionar</a>
  <a class="btn btn-primary btn-sm" href="/escolas/find"><i class="fas fa-search"></i>&nbsp&nbspPesquisar</a>
</p>
<hr />

<div class="container shadow-sm p-3 mb-5 bg-white rounded ">

  <?php if (!empty($ues) && is_array($ues)) : ?>

    <table class="table table-bordered  table-sm table-hover">
      <thead class="thead-dark">
        <tr class="table-primary">
        <th scope="col" style="align-items: center;width: 5%;">Id</th>
        <th scope="col" style="align-items: center;width: 20%;">NTE</th>
          <th scope="col" style="align-items: center;width: 5%;">Cod. UE</th>
          <th scope="col" style="align-items: center;width: 5%;">RHBahia</th>
          <th scope="col">Nome</th>
          <th scope="col" colspan="2" style="text-align: center;">Ações</th>
        </tr>
      </thead>
      <?php foreach ($ues as $ue) : ?>
        <tbody>
          <tr class="light">
            <td><?= esc($ue['id']); ?></td>
            <td><?= esc($ue['CodNte']); ?></td>
            <td><?= esc($ue['UeID']); ?></td>
            <td><?= esc($ue['OU']); ?></td>
            <td><?= esc($ue['Ue']); ?></td>

            <td style="text-align: center;width: 5%;">
              <a class="btn btn-success btn-sm" href="/escolas/edit/<?= esc($ue['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
            </td>
            <td style="text-align: center;width: 5%;">
              <a class="btn btn-danger btn-sm" href="/escolas/delete/<?= esc($ue['id']); ?>"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>

    <br>

  <?php else : ?>

    <h3>Nenhuma escola encontrada</h3>

    <p>Até o momento não foi cadastrado nenhuma escola.</p>

  <?php endif ?>

</div>

</div>