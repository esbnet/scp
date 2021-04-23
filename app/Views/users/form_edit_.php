<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary" id="titleCard"> <?= $title; ?> </h2>
            <a title="Voltar ao painel" class="btn btn-outline-success float-right btn-circle shadow" href="/"><i class="fas fa-chart-line"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Adicionar grupo de usuário" class="btn btn-outline-primary float-right btn-circle" href="/system/grupos"><i class="fas fa-undo"></i></a>
        </div>

        <div id="borderCard" class="card-body">

            <?= \Config\Services::validation()->listErrors(); ?>

            <div class="container shadow-sm p-3 mb-5 bg-white rounded ">

                <form action="<?= '/system/grupos/store' ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label class="control-label">Grupo:</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($grupos['name']) ? $grupos['name'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Descrição:</label>
                        <input type="text" class="form-control" name="description" id="description" value="<?php echo isset($grupos['description']) ? $grupos['description'] : ''; ?>">
                    </div>

                    <br>
                    <hr><br>

                    <p class="botoes">
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i>&nbsp&nbspGravar</button>
                        <a class=" btn btn-outline-warning" href="/system/grupos"><i class="fas fa-ban"></i>&nbsp&nbspCancel</a>

                        <a title="Exclusão permamente" class="btn btn-outline-danger btn-circle text-danger float-right" href="/system/grupos/remove/<?php echo $grupos['id']; ?>"><i class="fas fa-trash"></i></a>

                    </p>

                    <input type="hidden" name="id" value="<?php echo isset($grupos['id']) ? $grupos['id'] : ''; ?>">

                </form>

            </div>

        </div>
    </div>
</div>