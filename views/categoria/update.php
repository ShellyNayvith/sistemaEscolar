<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Categoria $model */

$this->title = 'Actualizar Categoría: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
	
	<div class="card mb-4 text-left">
		<div class="card-header">
			<i class="fas fa-table me-1"></i>
			<?= $this->title ?>
		</div>
		<div class="card-body">
<div class="categoria-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
		</div>
