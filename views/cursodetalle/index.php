<?php

use app\models\Cursodetalle;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CursodetalleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursodetalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursodetalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cursodetalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Fk_estudiante',
            'Fk_curso',
            'Fk_profesor',
            'Fecha_inscripcion',
            //'Estado',
            //'Nota',
            //'Fecha_creacion',
            //'Fecha_actualizacion',
            //'Fk_user',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cursodetalle $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
