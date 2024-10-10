<?php

use app\models\TuEstatu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\components\Util;

/** @var yii\web\View $this */
/** @var app\models\search\TuestatuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estatus';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="layoutSidenav_content">
    <main>
	<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $this->title ?></h1>
	
    <div class="row">
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        <?= $this->title ?>
                                    </div>
                                    <div class="card-body">
                                    <p>
                                        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                                    </p>

                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],

                                            'ID',
                                            'nombre',
                                            //'created_at',
                                            //'update_at',
                                            //'fk_user',
                                            [
                                                'class' => ActionColumn::className(),
                                                'urlCreator' => function ($action, TuEstatu $model, $key, $index, $column) {
                                                    return Url::toRoute([$action, 'ID' => Util::encrypt_decryptID($model->ID, 1)]);
                                                }
                                            ],
                                        ],
                                    ]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Nuevo estatus
                                    </div>
                                    <div class="card-body">
                                        <?= $this->render('_form', [
                                            'model' => $model,
                                        ]) ?>  

                                    </div>
                                </div>
                            </div>
                        </div>
	
	
</div>
	</div>
	</div>
	</main>
</div>
