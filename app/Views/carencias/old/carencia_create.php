<h2><?= esc($title); ?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<?php if(!$session->get('logged_in')) {
        echo ('Não logado: '.$session->get('logged_in'));
        var_dump($session->get('logged_in'));
   }
?>

<div >
    <form action="/carencias/create" method="post">
        <?= csrf_field() ?>

        <label class="control-label">Unidade Escolar</label>
        <input type="text" class="form-control" name="UEId" id="inputDefault">
        <label class="control-label">Matrícula</label>
        <input type="text" class="form-control" name="Matricula" id="inputDefault">
        <label class="control-label">Disciplina</label>
        <input type="text" class="form-control" name="DisciplinaId" id="inputDefault">
        <label class="control-label">Nome do Professor</label>
        <input type="text" class="form-control" name="Nome" id="inputDefault">

        <div class="form-group">
            <label class="control-label">Matutino</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Mat">
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
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Vesp">
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
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Not">
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
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="Total">
                    <div class="input-group-append">
                        <span class="input-group-text">h</span>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" name="submit" value="Create news item" />
    </form>
</div>
