<div class="card border-primary mb-3" style="max-width: 40rem;">
    <div class="card-header">CARÊNCIA</div>
    <div class="card-body">
        <h4 class="card-title"><?= esc($carencias['UEId']); ?> - <?= esc($carencias['Nome']); ?> - <?= esc($carencias['DisciplinaId']); ?> - Matemática</h4>
        <label class="control-label" for="disabledInput">Id</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['Id']); ?>" disabled="">
        <label class="control-label" for="disabledInput">Unidade Escolar</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['UEId']); ?>" disabled="">
        <label class="control-label" for="disabledInput">Matrícula</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['Matricula']); ?>" disabled="">
        <label class="control-label" for="disabledInput">Nome do Professor</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['Nome']); ?>" disabled="">
        <label class="control-label" for="disabledInput">Matutino</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['Mat']); ?>" disabled="">
        <label class="control-label" for="disabledInput">Vespertino</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['Vesp']); ?>" disabled="">
        <label class="control-label" for="disabledInput">Noturno</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['Not']); ?>" disabled="">
        <label class="control-label" for="disabledInput">Total</label>
        <input class="form-control" id="disabledInput" type="text" value="<?= esc($carencias['Total']); ?>" disabled="">
    </div>
</div>
<div class="d-flex flex-row bd-highlight mb-3">
    <p><a class="btn btn-outline-success" href="/carencias/edit/<?= esc($carencias['Id']);?>">Editar</a></p>  
    <form action="/carencias/delete/<?= esc($carencias['Id']);?>" method="post">
        <button type="submit" class="btn btn-outline-danger">Deletar</button>
    </form>
</div>