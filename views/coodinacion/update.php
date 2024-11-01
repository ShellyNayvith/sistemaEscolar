<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Coodinacion $model */

$this->title = 'Update Coodinacion: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Coodinacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coodinacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
