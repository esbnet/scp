<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <a class="btn btn-primary float-right btn-circle" href="#"><i class="fas fa-question"></i></a>
            <h2 class="text-primary" id="titleCard"> <?= $title; ?> </h2>
        </div>
        
        <div id="borderCard" class="card-body border-left-primary">

            <br>
            <p>
                Inicialmente o cadastro do usuário será disponibilidade na tela inicial através de um link "Precisa de uma conta?".
            </p>

            <p class="text-center">
                <img src="<?= base_url('assets/images/Tela_Login.PNG') ?>" style="width: 70%;">
            </p>

            <p>Após clicar em "Precisa de uma conta?" será exibido a tela a seguir: </p>

            <p class="text-center">
                <img src="<?= base_url('assets/images/Cadastro_Usuario.PNG') ?>" style="width: 70%;">
            </p>

            <p>
                Na tela para cadastro é obrigatório preencher os campos:
                <li><strong class="badge badge-danger">E-mail</strong> - Informormar, de preferência, o email corporativo</li>
                <li><strong class="badge badge-danger">Nome do usuário</strong> - Informar a matrícula/cpf</li>
                <li><strong class="badge badge-danger">Senha</strong> - A senha pode ter número, texto, carectéres e no tamanho mínimo 8</li>
                <li><strong class="badge badge-danger">Senha novamente</strong> - Repetir a senha para confirmação </li>
            </p>

            <p>
                Preencha todos os campos e clique no botão "Registrar-me" para gavar os dados. Neste momento o sistema critica os dados informados
                e caso haja incosist~encia ele informará e dará orientação para concluir o cadastro.
            </p>
            <hr>
            <P>Legenda do campos:
                <strong class="badge badge-danger">obrigatório</strong>
                <strong class="badge badge-secondary">opcional</strong>
            </P>

        </div>
        <div class="card-footer footer text-right">
            <a title="Retornar ao início" class="btn btn-outline-success " href="/">
                <i class="fas fa-home">&nbsp;&nbsp;Home</i>
            </a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->