
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao inínio" class="btn btn-success btn-sm float-right" href="/"><i class="fas fa-home"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Voltar a lista de carência" class="btn btn-success btn-sm float-right" href="/carencias"><i class="fas fa-undo"></i></a>
        </div>

        <div class="card-b ody ">
            <form action="<?= base_url('carencias/pesquisaEscola') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="ueid">Unidade Escolar</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-sm btn-sm" size="9" id="ueid" name="ueid" value="<?= old('ueid'); ?>" required>
                            <div class="invalid-feedback"> </div>
                            <!-- <input value="" id="UeID" name="UeID" type="text" class="form-control form-control-sm" aria-label="Cödigo da Escola" aria-describedby="button-addon2"> -->
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" type="button" id="busca_escola" onclick="pesquisa_escola()" ><i class="fas fa-search" ></i></button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group">
                        <?php if (isset($erro)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <p><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $erro ?> </p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </form>

        </div>

        <div class="card-footer ">
            <a name="cancel" class="btn btn-warning btn-sm" href="/"><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->