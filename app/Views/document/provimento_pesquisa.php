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
            <p>Para efetuar a pesquisa de carência siga os passo a seguir:</p>

            <p>1. No menu a esquerda clicar em "Carência" e depois em "Pesquisar". Aparece a tela:</p>

            <p class="text-center"><img src="<?= base_url('assets/images/carencia_tela_pesquisa.PNG') ?>" style="width: 70%;"></p>
            <br>
            
            <p>
                2. Informe os critérios desejados e clique no botão de pesquisa (botão amarelo com uma lupa). 
                Ao clicar o sistema irá pesquisar na base de carência registros que contenham os critérios informados.
                Se não encontrar será apresentado uma mensagem e solicitado nova tentativa. Encontrando, o sistema irá preencher
                a tabela abaixo com os dados encontrados.
            </p>

            <p class="text-center"><img src="<?= base_url('assets/images/carencia_pesquisa.PNG') ?>" style="width: 70%;"></p>

            <br>

            <p>Após clicar em "Precisa de uma conta?" será exibido a tela a seguir: </p>
            <ol>
                <li> Botão de pesquisa. Ao clicar serrá sinalizado ao sistema para pesquisar as carências de acordo com os critérios informados. <satrong class="text-danger">Cuidado! Não informado nada, o sistema trará todas as carências registradas.</satrong> </li>
                <li> Botões de "exportações". Na ordem: Excel; PDF; CSV; Cópia para memória</li>
                <li> Botão para edição ou consulta do registro. Ao clicar neste botão, o registro será aberto para consulta (Provimento) ou para edição (Carência)</li>
                <li> Botões para navegação na paginação do resultado da consulta. Clique em "Preview" para "Anterior" e "Next" para próximo.</li>
            </ol>

        </div>
        <div class="card-footer footer text-right">
            <a title="Retornar ao início" class="btn btn-outline-success " href="/"><i class="fas fa-home">&nbsp;&nbsp;Home</i></a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->