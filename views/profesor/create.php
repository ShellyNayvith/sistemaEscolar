<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Profesor $model */

$this->title = 'Create Profesor';
$this->params['breadcrumbs'][] = ['label' => 'Profesors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
