<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\ProfesorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profesor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Ap_Paterno') ?>

    <?= $form->field($model, 'Ap_Materno') ?>

    <?= $form->field($model, 'Correo') ?>

    <?php // echo $form->field($model, 'Fk_coordinacion') ?>

    <?php // echo $form->field($model, 'Fecha_creacion') ?>

    <?php // echo $form->field($model, 'Fecha_actualizacion') ?>

    <?php // echo $form->field($model, 'Fk_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
