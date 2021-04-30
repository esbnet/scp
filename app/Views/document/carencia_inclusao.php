<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div id="borderCard" class="card-body border-left-primary">

            <h4><?= $title; ?></h4>
            <br>
            <p>Para efetuar a inclusão de carência siga os passo a a seguir:</p>
            <p>1. Acesse o sistema"</p>
            <p>2. No menu a esquerda clicar em carência e depois em "Incluir"</p>
            <p class="text-center"><img src="<?= base_url('assets/images/Menu_Carência_Incluir.PNG') ?>" style="width: 70%;"></p>
            <p>3. Na tela a seguir preencha o campo <strong class="badge badge-secondary">Unidade Escolar</strong> com o código RHBahia ou Codsecul</p>
            <p class="text-center"><img src="<?= base_url('assets/images/Carência_Incluir_Informar_UE.PNG') ?>" style="width: 70%;"></p>
            <p>4. A seguir preencha os campos do formulário de acordo com os critérios abaixo:</p>
            <p class="text-center"><img src="<?= base_url('assets/images/Carência_Incluir_Tela_Completa.PNG') ?>" style="width: 70%;"></p>

            <p>
                Na tela para cadastro é obrigatório preencher os campos:
                <li><strong class="badge badge-secondary">Matrícula</strong> informormar a matrícula (RHBahia/CodSecul) ou CPF para informar o professor. </li>
                <li><strong class="badge badge-danger"> Disciplina</strong> Selecione a disciplina. Este campo tem oriengem em um cadastro prévio realizado pelo coordenador</li>
                <li><strong class="badge badge-danger"> Motivo de Afastamento</strong> Selecione o motivo do afastamento. Este camop tem oriengem em um cadastro prévio realizado pelo coordenador</li>
                <li><strong class="badge badge-danger"> Início do Afastamento</strong> Inform o início da carência. </li>
                <li><strong class="badge badge-danger"> Término do Afastamento</strong> Caso seja carência temporária o sistema solicitará o preenchimento deste campo. </li>
                <li><strong class="badge badge-warning"> Mat</strong> Informa a carência matutina, caso exista (obrigatório o preenchimento de ao menos um período preenchido) </li>
                <li><strong class="badge badge-warning"> Vesp</strong> Informa a carência vespertina, caso exista (obrigatório o preenchimento de ao menos um período preenchido) </li>
                <li><strong class="badge badge-warning"> Not</strong> Informa a carência noturna, caso exista (obrigatório o preenchimento de ao menos um período preenchido) </li>
                <li><strong class="badge badge-secondary"> Observação</strong> Este campo é destinado a anotação de qualquer tipo de observaçã (no máximo 255 letras) </li>
            </p>

            <p>
                Preencha todos os campos e clique no botão "Gravar" para gavar os dados. Neste momento o sistema critica os dados informados
                e caso haja incosistêencia ele informará e dará orientação para concluir o cadastro. Clicando em "Cacelar" o sistema irá descartar todas as informações e retornar a tela de pesquisa
            </p>

            <br>
            <div class="card-footer footer float-right">
                <a title="Retornar ao início" class="btn btn-outline-success " href="/">
                    <i class="fas fa-home">&nbsp;&nbsp;Home</i>
                </a>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->