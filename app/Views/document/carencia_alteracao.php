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
                Para realizar uma alteração em um registro de carência é necessário encontrá-la na tela de
                <a href="<?= base_url('/document/carencia_pesquisa') ?>">pesquisa</a>.
            </p>

            <p class="text-center">
                <img src="<?= base_url('assets/images/Carencia_Tela_Alterar.PNG') ?>" style="width: 70%;">
            </p>
            <br>
            <p>Na tela anterior foram enumarados que descreveremos a seguir:
            <ol>
                <li> Informa o "Tipo de carência" ( R - Real / T - Temporária )</li>
                <li> Usuário, data e hora da última atualização do geristro</li>
                <li> Botões de navegação: Voltar para pesquisa; Voltar para o painel</li>
                <li> Botões de ação: "Atualiar" - grava alterações; "Cancelar" - Abandona alterações e retorna a pesquisa</li>
                <li> Botão de excluir carência</li>
            </ol>
            </p>

            <p>
                Na alteração, por segurança, não é possível alterar todos os campos, apenas os campos relacionados abaixo.
                Caso seja necessário realizar alguma correção excluí-se o registro de carêncie e depois realiza-se a inclusão com os dados corretos.
                <li><strong class="badge badge-secondary">Matrícula</strong> - Informar o professor correto</li>
                <li><strong class="badge badge-danger">Motivo do Afastamento</strong> - Informar o motivo</li>
                <li><strong class="badge badge-danger">Inicio do Afastamento</strong> - Informar o início do afastamento</li>
                <li><strong class="badge badge-danger">Término do Afastamento</strong> - Informar o término do afastamento</li>
                <li><strong class="badge badge-warning">Mat</strong> - Informar a carência matutina</li>
                <li><strong class="badge badge-warning">Vesp</strong> - Informar a carência vespertina</li>
                <li><strong class="badge badge-warning">Not</strong> - Informar a carência noturna</li>
                <li><strong class="badge badge-secondary">Observação</strong> - Informar a Observação </li>
            </p>

            <p>
                Preencha todos os campos e clique no botão "Atualizar" para gavar os dados. Neste momento o sistema critica os dados informados
                e caso haja incosist~encia ele informará e dará orientação para concluir o cadastro.
            </p>

            <hr>
            <P>Legenda do campos:
                <strong class="badge badge-danger">obrigatório</strong>
                <strong class="badge badge-warning">ao menos um</strong>
                <strong class="badge badge-secondary">opcional</strong>
            </P>

        </div>
        <div class="card-footer footer text-right">
            <a title="Retornar ao início" class="btn btn-outline-success" href="/">
                <i class="fas fa-home">&nbsp;&nbsp;Home</i>
            </a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->