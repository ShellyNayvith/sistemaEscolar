<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Estudiante $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ap_paterno')->textInput() ?>

    <?= $form->field($model, 'Ap_materno')->textInput() ?>

    <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_inscripcion')->textInput() ?>

    <?= $form->field($model, 'Fk_carrera')->textInput() ?>

    <?= $form->field($model, 'Semestre')->textInput() ?>

    <?= $form->field($model, 'Turno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_creacion')->textInput() ?>

    <?= $form->field($model, 'Fecha_actualizacion')->textInput() ?>

    <?= $form->field($model, 'Fk_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
