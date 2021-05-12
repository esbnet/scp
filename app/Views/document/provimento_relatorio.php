<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div id="borderCard" class="card-body border-left-primary">

            <h4><?= $title; ?></h4>
            <br>
            <p>
                Inicialmente o cadastro do usuário será disponibilidade na tela inicial através de um link "Precisa de uma conta?".
            </p>

            <br>
            <img src="<?= base_url('assets/images/Tela_Login.PNG') ?>" style="width: 70%;">

            <br><br>

            <p>Após clicar em "Precisa de uma conta?" será exibido a tela a seguir: </p>
            <br>
            <img src="<?= base_url('assets/images/Cadastro_Usuario.PNG') ?>" style="width: 70%;">

            <br><br>

            <p>
                Na tela para cadastro é obrigatório preencher os campos:
                <li><strong  class="badge badge-secondary">E-mail</strong> informormar o email corporativo</li>
                <li><strong  class="badge badge-secondary">Nome do usuário</strong> informar a matrícula/cpf</li>
                <li><strong  class="badge badge-secondary">Senha</strong> a senha pode ter número, texto, carectéres e no tamanho mínimo 8</li>
                <li><strong  class="badge badge-secondary">Senha novamente</strong>repetir a senha para confirmação </li> 
            </p>

            <p>
                Preencha todos os campos e clique no botão "Registrar-me" para gavar os dados. Neste momento o sistema critica os dados informados 
                e caso haja incosist~encia ele informará e dará orientação para concluir o cadastro.
            </p>

            <div class="card-footer footer">
                <a title="Retornar ao início" class="btn btn-outline-success " href="/"><i class="fas fa-home">&nbsp;&nbsp;Home</i></a>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->