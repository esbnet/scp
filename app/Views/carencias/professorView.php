<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item item"><a href="<?= base_url('/carencias'); ?>">Carência Real</a></li>
      <li class="breadcrumb-item item active" aria-current="page"><?= $title; ?></li>
    </ol>
  </nav> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="float-left text-primary"> <?= $title; ?> </h2>
            <a title="Voltar ao inínio" class="btn btn-success btn-sm float-right" href="/"><i class="fas fa-home"></i></a>
            <a class="float-right">&nbsp;</a>
            <a title="Voltar a lista de carência" class="btn btn-success btn-sm float-right" href="/carencias"><i class="fas fa-undo"></i></a>
        </div>

        <div class="card-body ">

            <form action="<?= '/carencias/pesquisaProfessor' ?>" method="post">
                <?= csrf_field(); ?>

                <!-- Form1 -->
                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label class="control-label" for="ueid">Unidade Escolar</label>
                        <div class="input-group mb-3">
                            <input value="<?= ($ue['UeID']) ?>" id="ueid" name="ueid" type="text" class="form-control form-control-sm" placeholder="Cód. UE" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="control-label" for="OU">Cód. RH Bahia</label>
                        <input value="<?= ($ue['OU']) ?>" name="ou" placeholder="Cód. RHB" type="text" class="form-control form-control-sm" id="OU" readonly>
                    </div>

                    <div class="form-group col-md-8">
                        <label class="control-label" for="UE">Nome da Unidade Escolar</label>
                        <input value="<?= $ue['Ue'] ?>" name="ue" placeholder="Nome da Escola" type="text" class="form-control form-control-sm" id="UE" readonly>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="control-label" for="ueid">Matrícula</label>
                        <div class="input-group mb-3">
                            <input value="<?= isset($professor['matricula']) ? $professor['matricula'] : "" ?>" id="matricula" name="matricula" type="number" class="form-control form-control-sm" aria-label="Mátrícula do professor" aria-describedby="button-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" type="submit" id="button-addon3"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

        <div class="card-footer ">
            <a name="cancel" class="btn btn-warning btn-sm" href="/carencias/real_new/"><i class="fas fa-ban">&nbsp;&nbsp;Cancelar</i></a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->