<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Util;

/** @var yii\web\View $this */
/** @var app\models\TuEstatu $model */

$this->title = "Registro actual ". $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Estatus', 'url' => ['index']];
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

            <div class="tu-estatu-view">
                    <!-- botones -->
                    <p style="text-align:center">
                            <?= Html::a('<i class="fas fa-reply"></i>', ['/tuestatu/index'], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                        
                            <?= Html::a('<i class="fa fa-fw fa-trash"></i>', ['delete', 'ID' => Util::encrypt_decryptId($model->ID,1)], [
                                                'class' => 'btn btn-outline-primary btn-sm',
                                                'data' => ['confirm' => Yii::t('app', 'Seguro de borrar este registro?'),
                                                'method' => 'post',
                                                ],
                                            ]); ?>
                    </p>



            <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'ID',
                        'nombre',
                        [
                            'header' => 'Fecha creada',
                            'attribute' => 'created_at',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDateTime($model->created_at,'long');
                            },
                        ],
                        [
                            'header' => 'Ultima actualización',
                            'attribute' => 'update_at',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDateTime($model->update_at,'long');
                            },
                        ],
                        [
                            'attribute'=>'fk_user',
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