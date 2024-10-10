<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TuEstatu $model */

$this->title = 'Crear Nuevo Estatus';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
	
	<div class="card mb-4 text-left">
		<div class="card-header">
			<i class="fas fa-table me-1"></i>
			<?= $this->title ?>
		</div>
		<div class="card-body">


<div class="tu-estatu-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


</div>
	</div>
	</div>
