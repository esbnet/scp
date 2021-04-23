<?= \Config\Services::validation()->listErrors(); ?>

<div style="width: 90%;" class="container shadow-sm p-3 mb-5 bg-white rounded ">

  <form action="<?= '/cadastros/disciplinas/store' ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <label class="control-label">Disciplina:</label>
      <input type="text" class="form-control" name="nome" id="inputDefault" value="<?php echo isset($disciplinas['nome']) ? $disciplinas['nome'] : ''; ?>">
    </div>

    <br>
    <hr><br>

    <p class="botoes">
      <button type="submit" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i>&nbsp&nbspGravar</button>
      <a class=" btn btn-outline-warning" href="/cadastros/disciplinas"><i class="fas fa-ban"></i>&nbsp&nbspCancel</a>
      <a title="Exclusão permamente" class="btn btn-outline-danger btn-circle text-danger float-right" href="/cadastros/disciplinas/remove/<?= esc($disciplinas['id']); ?>" ><i class="fas fa-trash"></i></a>


    </p>

    <input type="hidden" name="id" value="<?php echo isset($disciplinas['id']) ? $disciplinas['id'] : ''; ?>">
  </form>

</div>