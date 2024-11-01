<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Util;

/** @var yii\web\View $this */
/** @var app\models\Categoria $model */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    
	
	<div class="card mb-4">
		<div class="card-header text-left">
			<i class="fas fa-table me-1"></i>
			<?= $this->title ?>
		</div>
		<div class="card-body text-left">
<div class="categoria-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Nombre',
            [
                'header' => 'Fecha creada',
                'attribute' => 'Fecha_creacion',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDateTime($model->Fecha_creacion,'long');
                },
            ],
            [
                'header' => 'Ultima actualización',
                'attribute' => 'Fecha_actualizacion',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDateTime($model->Fecha_actualizacion,'long');
                },
            ],
            [
                'attribute'=>'Fk_user',
                'header'=>'Activa',
                'vAlign'=>'middle',
                'value' => function($model){
                    return $model->fkUser->username;
            }
            ],
        ],
    ]) ?>

</div>

</div>
	</div>

</div>
