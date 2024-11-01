<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\CursoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Nombre_Curso') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?= $form->field($model, 'Fk_Foto_Portada') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'Fecha_Inicia') ?>

    <?php // echo $form->field($model, 'Fecha_Termina') ?>

    <?php // echo $form->field($model, 'Horario') ?>

    <?php // echo $form->field($model, 'Modalidad') ?>

    <?php // echo $form->field($model, 'Capacidad') ?>

    <?php // echo $form->field($model, 'Lugar') ?>

    <?php // echo $form->field($model, 'Fk_categoria') ?>

    <?php // echo $form->field($model, 'Fecha_creacion') ?>

    <?php // echo $form->field($model, 'Fecha_actualizacion') ?>

    <?php // echo $form->field($model, 'Fk_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
