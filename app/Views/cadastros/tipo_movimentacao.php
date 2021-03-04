<?php if (!$session->get('logged_in')) {
  echo ('Não logado: ' . $session->get('logged_in'));
  var_dump($session->get('logged_in'));}
?>

<button 
    type="button" 
    class="btn btn-primary" 
    data-toggle="modal" 
    data-target="#exampleModal" 
    data-whatever="@getbootstrap"
    title="Adiciona novo tipo de movimentação">
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
        <form action="/tipo_movimentacao/create" method="post">
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

<?php if (!empty($tipo_movimentacao) && is_array($tipo_movimentacao)) : ?>

  <table class="table table-bordered  table-sm table-hover">
    <thead class="thead-dark" >
      <tr class="table-primary">
        <th scope="col" style="text-align: center; width: 5%;">Id</th>
        <th scope="col">Nome</th>
        <th scope="col" colspan="2" style="text-align: center;">Ações</th>
      </tr>
    </thead>
    <?php foreach ($tipo_movimentacao as $tipo_movimentacao_item) : ?>
      <tbody>
        <tr class="light">
          <td style="text-align: center;width: 5%;"><?= esc($tipo_movimentacao_item['id']); ?></td>
          <td><?= esc($tipo_movimentacao_item['Nome']); ?></td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/tipo_movimentacao/edit/<?= esc($tipo_movimentacao_item['id']); ?>"><i class="fas fa-pencil-alt" title="Edita um tipo de manutenção"></i></a>
          </td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/tipo_movimentacao/delete/<?= esc($tipo_movimentacao_item['id']); ?>"><i class="fas fa-trash" title="Exclui um tipo de manutenção"></i></a>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>

  <br>

<?php else : ?>

  <h3>Nenhum tipo de movimentação cadastrado</h3>

  <p>Até o momento não foi cadastrado tipo de movimentacao.</p>

<?php endif ?>