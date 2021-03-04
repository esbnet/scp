<?php if (!$session->get('logged_in')) {
  echo ('Não logado: ' . $session->get('logged_in'));
  var_dump($session->get('logged_in'));
}
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProfessorModal" data-whatever="@getbootstrap">
  <i class="fas fa-plus" style="font-size: small;  "> </i> Adicionar
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProfessorModal" data-whatever="@getbootstrap">
  <i class="fas fa-search" style="font-size: small; "></i>
  pesquisar
</button>

<hr />

<div class="modal fade bd-example-modal-lg" id="ProfessorModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <i class="fas fa-graduation-cap" style="font-size: x-large; "></i>
          Novo Professor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form class="shadow p-3 mb-5 bg-white rounded">
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="codsecul">Codsecul</label>
              <input id="codsecul" type="text" class="form-control" id="codsecul" name="codsecul" size="9">
            </div>
            <div class="form-group col-md-2">
              <label for="rhbahia">RHBahia</label>
              <input type="text" class="form-control" id="rhbahia" name="rhbahia" name="codsecul" size="8">
            </div>
            <div class="form-group col-md-8">
              <label for="nome">Nome do Professor</label>
              <input type="text" class="form-control" id="nome" maxlength="150">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputPassword4">CPF</label>
              <input id="cpf" type="cpf" class="form-control" id="inputPassword4">
            </div>
            <div class="form-group col-md-6">
              <label for="inputCity">Cargo</label>
              <select id="inputEstado" class="form-control">
              <option>Escolha...</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputCity">Vínculo</label>
              <select id="inputEstado" class="form-control">
                <option>Escolha...</option>
                <option>Reda</option>
                <option>Efetivo</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="inputCity">Licenciatura Plena</label>
              <select id="inputEstado" class="form-control">
              <option>Escolha...</option>
              </select>
            </div>
          </div>

          <button type="submit" class="btn btn-danger">
            <i class="fas fa-sign-out-alt" style="font-size: small; "></i>
            Sair
          </button>

          <button type="submit" class="btn btn-success">
          <i class="fas fa-plus" style="font-size: small; "></i>
            Gravar
          </button>
          
        </form>
      </div>

    </div>
  </div>
</div>

<?php if (!empty($polos) && is_array($polos)) : ?>

  <table class="table table-bordered  table-sm table-hover">
    <thead class="thead-dark">
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

  <h3>Nenhum professor encontrada</h3>

  <p>Até o momento não foi cadastrado nenhum professor.</p>

<?php endif ?>