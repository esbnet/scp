<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
  <i class="fas fa-plus" style="font-size: small; margin-right: 5px; "></i>
  Adicionar
</button>

<hr />

<!-- Inicio - Modal Adicionar novo registro -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova disciplina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/disciplinas/create" method="post">
          <div class="form-group">
            <label for="add-disciplina" class="col-form-label">Disciplina:</label>
            <input type="text" class="form-control" id="add-disciplina" name="nome">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Gravar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Inicio - Popular tabela -->
<?php if (!empty($disciplinas) && is_array($disciplinas)) : ?>

  <table class="table table-bordered  table-sm table-hover">
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

          <!-- <td style="text-align: center; width: 5%;">
            <button type="button" class="btn btn-link btn-sm editdisciplinabtn" id="<?= esc($disciplinas_item['id']); ?>" onclick="/disciplinas/edit/<?= esc($disciplinas_item['id']); ?>">
              <i class="fas fa-pencil-alt"></i>
            </button>
          </td> -->
          <td style="text-align: center; width: 5%;">
            <a class="btn btn-link btn-sm" href="/disciplinas/edit/<?= esc($disciplinas_item['id']); ?>"><i class="fas fa-pencil-alt"></i></a>
          </td>
          <td style="text-align: center; width: 5%;">
            <a class="btn btn-link btn-sm" href="/disciplinas/delete/<?= esc($disciplinas_item['id']); ?>"><i class="fas fa-trash"></i></a>
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

<!-- Inicio Modal Editar registro -------------------------------------------------------------->
<div class="modal fade" id="disciplinaEdit" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditModalLabel">Editar disciplina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="formEdit" action="/disciplinas/update/">
        <div class="modal-body">
          <div class="form-group">
            <label for="edt_id" class="col-form-label" style="width: 150px;">Id:</label>
            <input type="text" class="form-control" id="edt_id" name="id" value="" disabled>
          </div>
          <div class="form-group">
            <label for="edt_disciplina" class="col-form-label">Disciplina:</label>
            <input type="text" class="form-control" id="edt_disciplina" name="Nome" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-warning" onClick="mudarAction()">Gravar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Fim Modal Editar registro -->

<!-- Move dados da tabela para o modal -->
<script>
  $(document).ready(function() {

    $('.editdisciplinabtn').on('click', function() {

      $('#disciplinaEdit').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      $('#edt_id').val(data[0]);
      $('#edt_disciplina').val(data[1]);

    })

  });

  function mudarAction() {

    var id = $('#edt_id').val();
    // alert('/disciplinas/update/' + id.replace(" ", ""));
    document.getElementById("formEdit").action = '/disciplinas/create/';
    document.getElementById("formEdit").submit();

  }
</script>
