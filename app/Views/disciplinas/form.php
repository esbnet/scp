<?= \Config\Services::validation()->listErrors(); ?>

<div style="width: 90%;" class="container shadow-sm p-3 mb-5 bg-white rounded ">

  <form action="<?= '/disciplinas/store'?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <label class="control-label">Disciplina:</label>
      <input type="text" class="form-control" name="Nome" id="inputDefault" 
      value="<?php echo isset($disciplinas['Nome']) ? $disciplinas['Nome'] : set_value('Nome'); ?>" >
    </div>

    <br>
    <hr><br>

    <p class="botoes">
    <button type="submit" class="btn btn-success"><i class="fas fa-pencil-alt"></i>&nbsp&nbspGravar</button>
    <a class=" btn btn-danger" href="/disciplinas"><i class="fas fa-ban"></i>&nbsp&nbspCancel</a>
    </p>

    <input type="hidden" name="id" 
    value="<?php echo isset($disciplinas['id']) ? $disciplinas['id'] : set_value('id'); ?>" >
  </form>

</div>