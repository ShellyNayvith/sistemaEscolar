<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cursodetalle $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursodetalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fk_estudiante')->textInput() ?>

    <?= $form->field($model, 'Fk_curso')->textInput() ?>

    <?= $form->field($model, 'Fk_profesor')->textInput() ?>

    <?= $form->field($model, 'Fecha_inscripcion')->textInput() ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_creacion')->textInput() ?>

    <?= $form->field($model, 'Fecha_actualizacion')->textInput() ?>

    <?= $form->field($model, 'Fk_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
