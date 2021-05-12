<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h2 class="text-primary" id="titleCard"> <?= $title; ?> </h2>
        </div>

        <div id="borderCard" class="card-body border-left-primary">

            <br>
            <p>Para efetuar a inclusão de provimento siga os passo a seguir:</p>

            <p>1. No menu a esquerda clicar em "Provimento" e depois em "+ Incluir"</p>

            <p class="text-center"><img src="<?= base_url('assets/images/Menu_Provimento_Incluir.PNG') ?>" style="width: 70%;"></p>
            
            <p>2. Na tela a seguir preencha o campo <strong class="badge badge-danger">Unidade Escolar</strong> com o código RHBahia ou Codsecul e clique no botão de pesquisa (lupa).</p>
            <p class="text-center"><img src="<?= base_url('assets/images/provimento_incluir_informar_ue.PNG') ?>" style="width: 70%;"></p>
            
            <p>3. A seguir preencha os campos do formulário de acordo com os critérios abaixo:</p>
            <p class="text-center"><img src="<?= base_url('assets/images/provimento_incluir_tela_completa.PNG') ?>" style="width: 70%;"></p>

            <p>
                Na tela para cadastro é obrigatório preencher os campos:
                <li><strong class="badge badge-secondary">Matrícula</strong> informormar a matrícula (RHBahia/CodSecul) ou CPF para informar o professor. </li>
                <li><strong class="badge badge-danger"> Carência da Unidade</strong> Seleciona quais componentes irão ter suprimento. Ao clicar no campo Prover, o sisema move o componente para a tabela de edição das horas a prover</li>
                <li><strong class="badge badge-danger"> Componentes Providos</strong> Informa para todos os componentes seleciondos quais as horas serão providas para cada turno</li>
                <li><strong class="badge badge-danger"> Forma de Suprimento</strong> Selecione o "Aforma de Suprimento". Este campo tem oriengem em um cadastro prévio realizado pelo coordenador e é obrigatório</li>
                <li><strong class="badge badge-danger"> Tipo de Movimentação</strong> Selecione o "Tipo de Movimentação". Este camop tem oriengem em um cadastro prévio realizado pelo coordenador e é obrigatório</li>
                <li><strong class="badge badge-secondary"> Aula Normal</strong> Marque se houver "Aula Normal"</li>
                <li><strong class="badge badge-secondary"> Aula Extra</strong> Marque se houver "Hora Extra"</li>
                <li><strong class="badge badge-secondary"> Anuência</strong> Marque se houver anuência</li>
                <li><strong class="badge badge-danger"> Data da Anuência</strong> Inform a data da anuência. Obrigatório se houver anuência</li>
                <li><strong class="badge badge-secondary"> Assunção</strong> Marque se houver assunção</li>
                <li><strong class="badge badge-danger"> Data da Assunção</strong> Informe a data de assunção. Obrigatório se houver assunção</li>
                <li><strong class="badge badge-secondary"> Observação</strong> Este campo é destinado a anotação de qualquer tipo de observaçã (no máximo 255 letras) </li>
            </p>

            <p>
                Preencha todos os campos e clique no botão "Gravar" para gavar os dados. Neste momento o sistema critica os dados informados
                e caso haja incosistêencia ele informará e dará orientação para concluir a inclusão. Clicando em "Cacelar" o sistema irá descartar todas as informações e retornar a tela de pesquisa.
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