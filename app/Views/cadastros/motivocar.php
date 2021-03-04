<?php if (!$session->get('logged_in')) {
  echo ('Não logado: ' . $session->get('logged_in'));
  var_dump($session->get('logged_in'));}
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Adicionar Polos</button>

<hr/>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="alert-danger p-3 my-3">
    <?= \Config\Services::validation()->listErrors(); ?>
  </div>

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Polo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/polos/create" method="post">
          <div class="form-group">
            <label for="add-polo" class="col-form-label">Polo:</label>
            <input type="text" class="form-control" id="add-polo" name="nome">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Gravar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php if (!empty($polos) && is_array($polos)) : ?>

  <table class="table table-bordered  table-sm table-hover">
    <thead class="thead-dark" >
      <tr class="table-primary">
        <th scope="col" style="align-items: center;width: 5%;">Id</th>
        <th scope="col">Nome</th>
        <th scope="col" colspan="2" style="text-align: center;">Ações</th>
      </tr>
    </thead>
    <?php foreach ($polos as $polos_item) : ?>
      <tbody>
        <tr class="light">
          <td><?= esc($polos_item['id']); ?></td>
          <td><?= esc($polos_item['Nome']); ?></td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/polos/view/<?= esc($polos_item['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
          </td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/polos/delete/<?= esc($polos_item['id']); ?>"><i class="fas fa-trash"></i></a>
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