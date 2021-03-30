<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <!-- <sub>&copy;</sub> -->
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        OPERAÇÕES
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clock"></i>
            <span>Carência</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item text-success" href="<?= base_url('#') ?>"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;Painel Carência</a>
                <a class="collapse-item text-primary" href="<?= base_url('LancamentoCarencias') ?>"><i class="fas fa-hourglass-half"></i>&nbsp;&nbsp;Relação</a>
                <a class="collapse-item text-primary" href="<?= base_url('LancamentoCarencias/carencia') ?>"><i class="fas fa-plus"></i>&nbsp;&nbsp;Incluir</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Provimento</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item text-success" href="<?= base_url('#') ?>"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;Painel Provimento</a>
                <a class="collapse-item text-primary" href="<?= base_url('provimentos') ?>"><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;Relação</a>
                <a class="collapse-item text-primary" href="<?= base_url('provimentos/provimento') ?>"><i class="fas fa-plus"></i>&nbsp;&nbsp;Incluir</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCadastro" aria-expanded="true" aria-controls="collapseCadastro">
            <i class="fas fa-fw fa-file-signature"></i>
            <span>Cadastros</span>
        </a>
        <div id="collapseCadastro" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('escolas/index') ?>">Escolas</a>
                <a class="collapse-item" href="/esbnet10">Professores</a>
                <a class="collapse-item" href="/disciplinas">Disciplinas</a>
                <a class="collapse-item" href="/polo">Polo</a>
                <a class="collapse-item" href="/forma_suprimento">Forma de Suprimento</a>
                <a class="collapse-item" href="/tipo_movimentação">Tipo de Movimentação</a>
                <a class="collapse-item" href="/motivo_carência">Motivo - Carência</a>
                <a class="collapse-item" href="/motivo_Suprimento">Motivo - Suprimento</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsultas" aria-expanded="true" aria-controls="collapseConsultas">
            <i class="fas fa-fw fa-search-location"></i>
            <span>Consultas</span>
        </a>
        <div id="collapseConsultas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('escolas/index') ?>">Escolas</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRelatorios" aria-expanded="true" aria-controls="collapseRelatorios">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Relatórios</span>
        </a>
        <div id="collapseRelatorios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('escolas/index') ?>">Escolas</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">







    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTools" aria-expanded="true" aria-controls="collapseCadastro">
            <i class="fas fa-fw fa-tools"></i>
            <span>Configurações</span>
        </a>
        <div id="collapseTools" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item text-danger" href="/sistema"><i class="fas fa-fw fa-cogs"></i>&nbsp;&nbsp;Sistema</a>
                <a class="collapse-item text-danger" href="/opcoes"><i class="fas fa-fw fa-arrows-alt"></i>&nbsp;&nbsp;Opções</a>
                <a class="collapse-item text-danger" href="/users"><i class="fas fa-fw fa-user"></i>&nbsp;&nbsp;Usuários</a>
                <a class="collapse-item text-danger" href="/grupos"><i class="fas fa-fw fa-users"></i>&nbsp;&nbsp;Grupos</a>
                <a class="collapse-item text-danger" href="/autorizacoes"><i class="fas fa-fw fa-user-lock"></i>&nbsp;&nbsp;Autorizações</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAjuda" aria-expanded="true" aria-controls="collapseCadastro">
            <i class="fas fa-fw fa-question"></i>
            <span>Ajuda</span>
        </a>
        <div id="collapseAjuda" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ajuda:</h6>
                <a class="collapse-item" href="/escolas">Dicas</a>
                <h6 class="collapse-header">Ambiente:</h6>
                <a class="collapse-item" href="/escolas">Sobre</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">