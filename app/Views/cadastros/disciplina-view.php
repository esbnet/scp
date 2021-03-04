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
      <form action="/disciplinas/update" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="edt_id" class="col-form-label" style="width: 150px;">Id:</label>
            <input type="text" class="form-control" id="edt_id" name="id" disabled>
          </div>
          <div class="form-group">
            <label for="edt_disciplina" class="col-form-label">Disciplina:</label>
            <input type="text" class="form-control" id="edt_disciplina" name="Nome">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning" name="atualizaDados">Gravar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Fim Modal Editar registro -->