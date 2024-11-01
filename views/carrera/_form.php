<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Carrera $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="carrera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_creacion')->textInput() ?>

    <?= $form->field($model, 'Fecha_actualizacion')->textInput() ?>

    <?= $form->field($model, 'Fk_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
