<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Coodinacion $model */

$this->title = 'Create Coodinacion';
$this->params['breadcrumbs'][] = ['label' => 'Coodinacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coodinacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
