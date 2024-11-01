<?php

use app\models\Estudiante;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\EstudianteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Nombre',
            'Ap_paterno',
            'Ap_materno',
            'Correo',
            //'Fecha_inscripcion',
            //'Fk_carrera',
            //'Semestre',
            //'Turno',
            //'Fecha_creacion',
            //'Fecha_actualizacion',
            //'Fk_user',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Estudiante $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
