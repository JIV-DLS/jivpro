
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/master/acceuil">
        <div class="sidebar-brand-icon ">
            <img src="{{ asset('storage/admin/img/logo.png') }}" alt="logo" width="60" />
           <!-- <i class="fas fa-dice-d20"></i> -->
        </div>
        <!--<div class="sidebar-brand-text mx-3">Cpanel</div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('master/acceuil') ? 'active' : '' }}">
        <a class="nav-link" href="/master/acceuil">
            <i class="fas fa-fw fa-home"></i>
            <span>Acceuil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       Le site
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  {{ (request()->is('master/ajtpost') or request()->is('master/post/affichage') or request()->is('master/post/edit')) ? 'active' : '' }}">
        <a class="nav-link collapsed " href data-toggle="collapse" data-target="#collapsePostes" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dove"></i>
            <span>Postes</span>
        </a>
        <div id="collapsePostes" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion des Postes</h6>
                <a class="collapse-item {{ request()->is('master/ajtpost') ? 'active' : '' }}" href="/master/ajtpost" >Ajouter</a>
                <a class="collapse-item {{ request()->is('master/post/edit') ? 'active' : '' }}" href="/master/post/edit">Modifier/Supprimer</a>
                <a class="collapse-item {{ request()->is('master/post/affichage') ? 'active' : '' }}" href="/master/post/affichage">Afficher</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServices" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Services</span>
        </a>
        <div id="collapseServices" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Vos Services</h6>
                <a class="collapse-item" href="#">Afficher</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDemandes" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Demandes</span>
        </a>
        <div id="collapseDemandes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Demandes d'emploies</h6>
                <a class="collapse-item" href="#">Afficher</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Parametres
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->is('master/adda') or request()->is('master/perso')) ? 'active' : '' }}">
        <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
        <div id="collapseProfile" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Personnaliser vos infos</h6>
                <a class="collapse-item {{ request()->is('master/perso') ? 'active' : '' }}" href="/master/perso">Personnaliser</a>
                <a class="collapse-item" href="">Historiques</a>
                <a class="collapse-item {{ request()->is('master/adda') ? 'active' : '' }}" href="/master/adda">Ajouter Admin</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>D&eacute;connecter</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
