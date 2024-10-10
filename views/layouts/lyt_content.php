<?php 
use yii\bootstrap4\Html;
use yii\helpers\Url;
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
    
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
           
            <div id="sidebarToggleTop" class="btn d-md-none rounded-circle">
                <span class="m-0 font-weight-bold text-primary"> SISTEMA</span>
            </div>

            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group" style="min-width:800px">
                    <?php if(!Yii::$app->user->isGuest)  { ?>
                    <?php //if (Yii::$app->user->identity->hasRole('Tutoria')) { ?>
                        <?php 
                                /* 
                                ejemplo
                                echo Html::a('<i class="fas fa-sync-alt"></i>',['/tucicloescolar/index'], 
                                ['class' => 'btn btn-outline-primary btn-sm', 
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Ciclos Escolares']);*/
                                echo Html::a('<i class="fas fa-th-large"></i>',['#'], 
                                ['class' => 'btn btn-outline-primary btn-sm',
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Acceso 1']);
                                echo Html::a('<i class="fas fa-window-restore"></i>',['#'], 
                                ['class' => 'btn btn-outline-primary btn-sm',
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Acceso 1']);
                                echo Html::a('<i class="fas fa-file-upload"></i>',['#'], 
                                ['class' => 'btn btn-outline-primary btn-sm',
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Acceso 1']);
                                echo Html::a('<i class="fas fa-user-graduate"></i>',['#'], 
                                ['class' => 'btn btn-outline-primary btn-sm',
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Acceso 1']);
                                echo Html::a('<i class="fas fa-chalkboard-teacher"></i>',['#'], 
                                ['class' => 'btn btn-outline-primary btn-sm',
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Acceso 1']);
                                echo Html::a('<i class="fas fa-stethoscope"></i>',['#'], 
                                ['class' => 'btn btn-outline-primary btn-sm',
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Acceso 1']);
                                echo Html::a('<i class="far fa-question-circle"></i>',['#'], 
                                ['class' => 'btn btn-outline-primary btn-sm',
                                'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Acceso 1']);
                                
                        ?>
                    <?php 
                    //} 
                    }
                    ?>
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Sistema Integral Escuela RMGE Educación preescolar</h6> -->
                    </div>
            </div>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <!-- <li class="nav-item dropdown no-arrow d-sm-none" style="float:left;margin-right:30px" >
                     <span class="m-0 font-weight-bold text-primary"> RMGE</span>
                </li>   -->  


                <?php if(!Yii::$app->user->isGuest)  { ?>
                <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= Yii::$app->user->identity->username;?></span>
                            <img class="img-profile rounded-circle" src="<?= Yii::getAlias('@web') ?>/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                            <?= Html::a('<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Cambiar Contraseña', [
                            '/user-management/auth/change-own-password','id'=>Yii::$app->user->identity->ID],
                            ['class' => 'dropdown-item',
                            ]) ?>
                        <!-- <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Config
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Avanzado
                        </a> -->
                        <div class="dropdown-divider"></div>
                        <?= Html::a('<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar sesión', [
                            '/user-management/auth/logout'],
                            ['class' => 'dropdown-item',
                            'data-toggle'=>'modal',
                            'data-target'=>"#logoutModal",
                            ]) ?>
                    </div>
                </li>
                <?php } ?>

            </ul>

        </nav>

        <!-- End of Topbar -->
        <div class="p-4">
            <?= $content ?>
        </div>
        <!-- Begin Page Content -->

        <?php require_once('lyt_footer.php'); ?>
    </div>
</div>