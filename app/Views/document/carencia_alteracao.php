<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div id="borderCard" class="card-body border-left-primary">

            <h4><?= $title; ?></h4>
            <br>
            <p>
                Para realizar uma alteração em um registro de carência é necessário encontrá-la na tela de
                <a href="<?= base_url('/document/carencia_pesquisa') ?>">pesquisa</a>.
            </p>

            <p class="text-center">
                <img src="<?= base_url('assets/images/Carência_Tela_Alterar.PNG') ?>" style="width: 70%;">
            </p>
            <br>
            <p>Na tela de edição existe os recursos enumarados que descreveremos a seguir:
            <ol>
                <li> Tipo de caência</li>
                <li> Usuário, data e hora que da última atualização do geristro</li>
                <li> Botões de navegação: Voltar para pesquisa; Voltar para o painel</li>
                <li> Botões de ação: Atualiar - grava alterações; Cancelar - Abandona alterações e retorna a pesquisa</li>
                <li> Botão de excluir carência</li>
            </ol>
            </p>

            <p>
                Na funcionalidade de alteração, por segurança, não é possível alterar todos os campos, apenas os campos relacionados abaixo.
                <li><strong class="badge badge-secondary">Matrícula</strong> Informar o professor correto</li>
                <li><strong class="badge badge-danger">Motivo do Afastamento</strong> Informar o motivo</li>
                <li><strong class="badge badge-danger">Inicio do Afastamento</strong> Informar o início do afastamento</li>
                <li><strong class="badge badge-danger">Término do Afastamento</strong> Informar o término do afastamento</li>
                <li><strong class="badge badge-danger">Mat</strong>Informar a carência matutina</li>
                <li><strong class="badge badge-danger">Vesp</strong>Informar a carência vespertina</li>
                <li><strong class="badge badge-danger">Not</strong>Informar a carência noturna</li>
                <li><strong class="badge badge-secondary">Observação</strong>Informar a Observação </li>
            </p>

            <p>
                Preencha todos os campos e clique no botão "Atualizar" para gavar os dados. Neste momento o sistema critica os dados informados
                e caso haja incosist~encia ele informará e dará orientação para concluir o cadastro.
            </p>

            <div class="card-footer footer float-right">
                <a title="Retornar ao início" class="btn btn-outline-success " href="/">
                    <i class="fas fa-home">&nbsp;&nbsp;Home</i>
                </a>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->