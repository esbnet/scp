<h2><?= esc($title); ?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<div style="width: 70%;">
    <form action="/carencias/update/<?= esc($carencias['Id']);?>" method="post">
        <?= csrf_field() ?>

        <label class="control-label">Unidade Escolar</label>
        <input type="text" class="form-control" name="UEId" id="inputDefault" value="<?= esc($carencias['UEId']);?>">
        <label class="control-label">Matrícula</label>
        <input type="text" class="form-control" name="Matricula" id="inputDefault" value="<?= esc($carencias['Matricula']);?>"">
        <label class="control-label">Disciplina</label>
        <input type="text" class="form-control" name="DisciplinaId" id="inputDefault" value="<?= esc($carencias['DisciplinaId']);?>"">
        <label class="control-label">Nome do Professor</label>
        <input type="text" class="form-control" name="Nome" id="inputDefault" value="<?= esc($carencias['Nome']);?>">

        <div class="form-group">
            <label class="control-label">Matutino</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Mat"  value="<?= esc($carencias['Mat']);?>">
                    <div class="input-group-append">
                        <span class="input-group-text">h</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Vespertino</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Vesp" value="<?= esc($carencias['Vesp']);?>">
                    <div class="input-group-append">
                        <span class="input-group-text">h</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Noturno</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Not" value="<?= esc($carencias['Not']);?>">
                    <div class="input-group-append">
                        <span class="input-group-text">h</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Total</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Total" value="<?= esc($carencias['Total']);?>">
                    <div class="input-group-append">
                        <span class="input-group-text">h</span>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" name="submit" value="Create news item" />
    </form>
</div>
