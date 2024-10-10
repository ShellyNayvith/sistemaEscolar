<?php

use yii\bootstrap4\Html;


?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tema</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <?= Html::a(
            '<i class="fas fa-fw fa-tachometer-alt"></i><span>Panel de Control</span>',
            [
                '/site/index'
            ],
            ['class' => 'nav-link']
        ) ?>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Módulos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Menu 1</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Operaciones:</h6>
                
                    <?= Html::a(
                        'Opcion 1',
                        ['/tuestatu/index'],
                        ['class' => 'collapse-item']
                    ); ?>
                   
               
                
            </div>
        </div>
    </li>
      

        <?php if (Yii::$app->user->identity->hasRole('Admin')) { ?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilerias</span>
        </a>

        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Configuración:</h6>
                
                    <?= Html::a(
                        'Usuarios',
                        ['/user-management/user/index'],
                        ['class' => 'collapse-item']
                    ) ?>
                    <?= Html::a(
                        'Permisos de Usuarios',
                        ['/user-management/permission/index'],
                        ['class' => 'collapse-item']
                    ) ?>
                    <?= Html::a(
                        'Roles  de Usuarios',
                        ['/user-management/role/index'],
                        ['class' => 'collapse-item']
                    ) ?>
                    <?= Html::a(
                        'Visitas',
                        ['/user-management/user-visit-log/index'],
                        ['class' => 'collapse-item']
                    ) ?>
                    
               

            </div>
        </div>

    </li>
    <?php } ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="<?= Yii::getAlias('@web') ?>/img/sun.svg" alt="...">
        <p class="text-center mb-2" style="color:white"><strong>Hoy es un gran día </strong> para ser feliz y mejorar</p>
        <!-- <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> -->
    </div>

</ul>
<!-- End of Sidebar -->