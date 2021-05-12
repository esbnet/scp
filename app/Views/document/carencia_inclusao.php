<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="text-primary" id="titleCard"> <?= $title; ?> </h2>
        </div>

        <div id="borderCard" class="card-body border-left-primary">

            <br>
            <p>Para efetuar a inclusão de carência siga os passo a seguir:</p>

            <p>1. No menu a esquerda clicar em "Carência" e depois em "+ Incluir"</p>

            <p class="text-center"><img src="<?= base_url('assets/images/Menu_Carencia_Incluir.PNG') ?>" style="width: 70%;"></p>
            
            <p>2. Na tela a seguir preencha o campo <strong class="badge badge-danger">Unidade Escolar</strong> com o código RHBahia ou Codsecul e clique no botão de pesquisa (lupa).</p>
            <p class="text-center"><img src="<?= base_url('assets/images/provimento_incluir_informar_ue.PNG') ?>" style="width: 70%;"></p>
            
            <p>3. A seguir preencha os campos do formulário de acordo com os critérios descrito a seguir.</p>
            <p class="text-center"><img src="<?= base_url('assets/images/carencia_incluir_tela_completa.png') ?>" style="width: 70%;"></p>

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

            <hr>
            <P>Legenda do campos:
                <strong class="badge badge-danger">obrigatório</strong>
                <strong class="badge badge-warning">ao meno um</strong>
                <strong class="badge badge-secondary">opcional</strong>
            </P>

        </div>
        <div class="card-footer footer text-right ">
            <a title="Retornar ao início" class="btn btn-outline-success " href="/">
                <i class="fas fa-home">&nbsp;&nbsp;Home</i>
            </a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->