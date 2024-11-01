<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursodetalle $model */

$this->title = 'Update Cursodetalle: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cursodetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursodetalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
