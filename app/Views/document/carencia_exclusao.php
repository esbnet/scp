<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <a class="btn btn-primary float-right btn-circle" href="#"><i class="fas fa-question"></i></a>
            <h2 class="text-primary" id="titleCard"> <?= $title; ?> </h2>
        </div>

        <div id="borderCard" class="card-body border-left-primary">

            <p>
                Para realizar a "Exclusão" em um registro de carência é necessário encontrá-la na tela de
                <a href="<?= base_url('/document/carencia_pesquisa') ?>">pesquisa</a>.
            </p>

            <p class="text-center">
                <img src="<?= base_url('assets/images/Carencia_Tela_Alterar.PNG') ?>" style="width: 70%;">
            </p>
            <br>

            <p>Localizado o registros clique na lixeira (item 5) e será exibido uma mensagem de confirmação:</p>

            <p class="text-center">
                <img src="<?= base_url('assets/images/Carencia_Confirmação_Excluir.PNG') ?>" style="width: 70%;">
            </p>

            <br>

            <p>
                Ao confirma, o sistema exclui a carência de forma permanente e apresenta a confirmação.
            </p>

            <p class="text-center">
                <img src="<?= base_url('assets/images/Carencia_Excluido.png') ?>" style="width: 40%;">
            </p>
            <br>
            <hr>
            <P>Legenda do campos:
                <strong class="badge badge-danger">obrigatório</strong>
                <strong class="badge badge-secondary">opcional</strong>
            </P>

        </div>
        <div class="card-footer footer text-right">
            <a title="Retornar ao início" class="btn btn-outline-success " href="/"><i class="fas fa-home">&nbsp;&nbsp;Home</i></a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->