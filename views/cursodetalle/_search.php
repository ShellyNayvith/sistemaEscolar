<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\CursodetalleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursodetalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Fk_estudiante') ?>

    <?= $form->field($model, 'Fk_curso') ?>

    <?= $form->field($model, 'Fk_profesor') ?>

    <?= $form->field($model, 'Fecha_inscripcion') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'Nota') ?>

    <?php // echo $form->field($model, 'Fecha_creacion') ?>

    <?php // echo $form->field($model, 'Fecha_actualizacion') ?>

    <?php // echo $form->field($model, 'Fk_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
