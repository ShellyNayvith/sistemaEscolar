<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TuEstatu $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tu-estatu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-row">
            <div class="col-lg-8">
                <?= $form->field($model, 'nombre',
                 ['template' => '
                 <label class="form-label mb-2 text-5"> Nombre</label>
                     {input}
                 {error}',
                 'inputOptions' => [
                 'class'=>'form-control',
                 ]] 
                )->textInput(['maxlength' => true]) ?>
            </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-outline-primary btn-lg']) ?>
        <?= Html::a('<i class="fas fa-reply"></i> ', ['/tuestatu/index'], ['class' => 'btn btn-outline-primary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
