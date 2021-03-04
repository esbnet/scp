<?php if (!$session->get('logged_in')) {
  echo ('Não logado: ' . $session->get('logged_in'));
  var_dump($session->get('logged_in'));
}
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
  <i class="fas fa-plus" style="font-size: small; margin-right: 5px; "></i>
  Adicionar
</button>

<hr />

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <i class="fas fa-code-branch" style="font-size: x-large; "></i>
          Novo Motivo de Carência</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/motivo_carencia/create" method="post">
          <div class="form-group">
            <label for="motivo" class="col-form-label">Motivo de Carência:</label>
            <input type="text" class="form-control" id="motivo" name="motivo" size="60">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="temp" nome="temp">
            <label class="form-check-label" for="temp">Temporária ?</label>
          </div>
          <hr>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Gravar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php if (!empty($motivo_carencia) && is_array($motivo_carencia)) : ?>

  <table class="table table-bordered  table-sm table-hover">
    <thead class="thead-dark">
      <tr class="table-primary">
        <th scope="col" style="text-align: center;width: 5%;">Id</th>
        <th scope="col">Nome</th>
        <th scope="col" style="text-align: center; width: 5%;">Temp</th>
        <th scope="col" colspan="2" style="text-align: center;">Ações</th>
      </tr>
    </thead>
    <?php foreach ($motivo_carencia as $motivo_carencia_item) : ?>
      <tbody>
        <tr class="light">
          <td style="text-align: center;width: 5%;"><?= esc($motivo_carencia_item['id']); ?></td>
          <td><?= esc($motivo_carencia_item['Motivo']); ?></td>
          <td style="text-align: center; width: 5%;"><?= esc($motivo_carencia_item['Temp']); ?></td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/motivo_carencia/edit/<?= esc($motivo_carencia_item['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
          </td>
          <td style="text-align: center;width: 5%;">
            <a class="btn btn-link btn-sm" href="/motivo_carencia/delete/<?= esc($motivo_carencia_item['id']); ?>"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>

  <br>

<?php else : ?>

  <h3>Nenhum motivo para carência cadastrada</h3>

  <p>Até o momento não foi cadastrado nenhum motivo de carência.</p>

<?php endif ?>