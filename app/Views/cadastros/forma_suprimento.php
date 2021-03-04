<?php if (!$session->get('logged_in')) {
  echo ('Não logado: ' . $session->get('logged_in'));
  var_dump($session->get('logged_in'));}
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
  <i class="fas fa-plus" style="font-size: small; margin-right: 5px; "></i>
  Adicionar
</button>

<hr/>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <i class="fas fa-code-branch" style="font-size: x-large; "></i>
          Nova Forma de Suprimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/forma_suprimento/create" method="post">
          <div class="form-group">
            <label for="add-FormSup" class="col-form-label">Forma de Suprimento:</label>
            <input type="text" class="form-control" id="add-FormSup" name="nome">
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

<?php if (!empty($forma_suprimento) && is_array($forma_suprimento)) : ?>

  <table class="table table-bordered  table-sm table-hover">
    <thead class="thead-dark" >
      <tr class="table-primary">
        <th scope="col" style="text-align: center;width: 5%;">Id</th>
        <th scope="col">Nome</th>
        <th scope="col" colspan="2" style="text-align: center;">Ações</th>
      </tr>
    </thead>
    <?php foreach ($forma_suprimento as $forma_suprimento_item) : ?>
      <tbody>
        <tr class="light">
          <td style="text-align: center;width: 5%;"><?= esc($forma_suprimento_item['id']); ?></td>
          <td><?= esc($forma_suprimento_item['Nome']); ?></td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/forma_suprimento/edit/<?= esc($forma_suprimento_item['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
          </td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/forma_suprimento/delete/<?= esc($forma_suprimento_item['id']); ?>"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>

  <br>

<?php else : ?>

  <h3>Nenhuma forma de suprimento cadastrada</h3>

  <p>Até o momento não foi cadastrado forma de suprimento.</p>

<?php endif ?>