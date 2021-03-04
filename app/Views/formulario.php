<?= form_open('main/submeter') ?>
<div>
    <input type="text" name="nome" value="<?= Old('nome') ?>">
</div>
<div>
    <input type="text" name="apelido" value="<?= Old('apelido') ?>">
</div>
<div>
    <input type="submit" value="Grava">
</div>
</form>

<?php if (isset($erro)) : ?>
    <p> <?= $erro ?> </p>
<?php endif; ?>