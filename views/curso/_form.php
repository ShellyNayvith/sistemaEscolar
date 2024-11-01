<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Curso $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre_Curso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Codigo')->textInput() ?>

    <?= $form->field($model, 'Fk_Foto_Portada')->textInput() ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Fecha_Inicia')->textInput() ?>

    <?= $form->field($model, 'Fecha_Termina')->textInput() ?>

    <?= $form->field($model, 'Horario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Capacidad')->textInput() ?>

    <?= $form->field($model, 'Lugar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fk_categoria')->textInput() ?>

    <?= $form->field($model, 'Fecha_creacion')->textInput() ?>

    <?= $form->field($model, 'Fecha_actualizacion')->textInput() ?>

    <?= $form->field($model, 'Fk_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
