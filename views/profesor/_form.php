<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Profesor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profesor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ap_Paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ap_Materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fk_coordinacion')->textInput() ?>

    <?= $form->field($model, 'Fecha_creacion')->textInput() ?>

    <?= $form->field($model, 'Fecha_actualizacion')->textInput() ?>

    <?= $form->field($model, 'Fk_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
