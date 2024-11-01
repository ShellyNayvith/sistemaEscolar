<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Categoria $model */

$this->title = 'Crear Categoría';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
	
	<div class="card mb-4 text-left">
		<div class="card-header">
			<i class="fas fa-table me-1"></i>
			<?= $this->title ?>
		</div>
		<div class="card-body">

<div class="categoria-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
	</div>
	</div>

