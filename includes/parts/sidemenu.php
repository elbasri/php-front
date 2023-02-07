<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VitalCare <sup>2</sup></div>
    </a>


<!-- Divider -->
<hr class="sidebar-divider my-0">
<li class="nav-item active">
        <a class="nav-link" href="index.php">
            <div class="sidebar-heading">
                Accueil
            </div>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
<!-- Nav Item - Dashboard -->
<?php if(isset($role) && $role== "admin") { ?>
    <div class="sidebar-heading">
                Services
            </div>
    <li class="nav-item" id="patientpanel" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThre"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Patients</span>
        </a>
        <div id="collapseThre" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion</h6>
                <a class="collapse-item" href="gestionpatients.php">Patients</a>
                <a class="collapse-item" href="creerpatient.php">Ajouter</a>
            </div>
        </div>
    </li>
<li class="nav-item" id="rdvpanel">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Planification</span>
    </a>
    <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Liste</h6>
            <a class="collapse-item" href="listrdvs.php">Rendez-vous</a>
        </div>
    </div>
</li>
<li class="nav-item" id="medspanel">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Données</span>
    </a>
    <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">(VIA REST API)</h6>
            <a class="collapse-item" href="listdocteurs.php">Docteurs</a>
            <a class="collapse-item" href="mdicaments.php">Médicaments</a>
            <a class="collapse-item" href="mdicaments.php">...</a>
        </div>
    </div>
</li>
<li class="nav-item" id="userpanel" >
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThr"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Utilisateurs</span>
    </a>
    <div id="collapseThr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion</h6>
            <a class="collapse-item" href="gestionusers.php">Utilisateurs</a>
            <a class="collapse-item" href="creerpatient.php">Ajouter</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<?php } else { ?>
    <div class="sidebar-heading">
                Suivi
            </div>
    <li class="nav-item" id="patientpanel" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThre"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Rendez-vous</span>
        </a>
        <div id="collapseThre" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Liste</h6>
                <a class="collapse-item" href="mesrdv.php">Mes RDV</a>
                <a class="collapse-item" href="#">Ajouter</a>
            </div>
        </div>
    </li>  
<?php } ?>

<hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>