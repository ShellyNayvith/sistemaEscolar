<?php

use app\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Modal;
use app\components\Util;

/** @var yii\web\View $this */
/** @var app\models\search\CategoriaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorías';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid">

<div class="row">

<!-- Content Column -->
<div class="col-lg-12 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-primary">Categorías</h6>
        </div>
        <div class="card-body">
            <p>
            <?php 
                echo Html::button('<i class="fa fa-plus"></i>', 
                ['value'=>Url::to(['categoria/create']),
                                'class' => 'btn btn-success','id'=>'modalButton']) 
                ?>
            </p>

        
                <?php
        Modal::begin([
            'title' =>'<h4>Categorías</h4>',
            'id'     =>'movi-modal',
            'size'   =>'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
            echo "<div id='movi-modalContent'> </div>";
        Modal::end();
    ?>

<?php 
                $gridColumns = [
                    //['class' => 'kartik\grid\SerialColumn'],
                    [
                        'attribute'=>'ID',
                        'header'=>'ID',
                        'vAlign'=>'middle',
                        'hAlign' => 'left',
                        'width' => '10%',
                    ],
                    [
                        'attribute'=>'Nombre',
                        'header'=>'Nombre',
                        'vAlign'=>'middle',
                    ],
                    
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{ver}',
                        'header' => 'Ver',
                        'buttons' => [
                            'ver' => function ($url, $dataProvider) {
                                return Html::button('<i class="fa fa-fw fa-eye"></i>', 
                                         ['value'=>Url::to(['categoria/view', 'ID'=> Util::encrypt_decryptID($dataProvider->ID,1)]), 
                                          'class' => 'btn btn-default btn-xs custom_button'
                                         ]);
                            },
                        ],
                    ],
                    
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{actualizar}',
                        'header' => 'Modificar',
                        'buttons' => [
                            'actualizar' => function ($url, $dataProvider) {
                            return Html::button('<i class="fa fa-fw fa-pen"></i></span>', 
                            ['value'=>Url::to(['categoria/update', 'ID'=> Util::encrypt_decryptID($dataProvider->ID,1)]),
                            'class' => 'btn btn-default btn-xs custom_button'
                            ]);
                            },
                        ],
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{borrar}',
                        'header' => 'Eliminar',
                        'buttons' => [
                            'borrar' => function ($url, $dataProvider) {
                                return Html::a('<i class="fa fa-fw fa-trash"></i>', ['delete', 'ID' => Util::encrypt_decryptId($dataProvider->ID, 1)], [
                                    'class' => 'btn btn-outline-primary btn-sm',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Seguro de borrar este registro?'),
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                        ],
                    ],


                ]
                   
            ?>  
            <?php Pjax::begin(); ?> 
            <?=   GridView::widget([
            'dataProvider'=> $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'responsive'=>true,
            'hover'=>true,
            'bordered'=>true,
            /*'pjax' => true,
            'pjaxSettings' =>[
                'neverTimeout'=>true,
                'options'=>[
                  'id'=>'grid-eval',
                ]
              ],*/
            //'resizableColumns'=>true,
            'headerRowOptions'=>['style'=>'font-size: .8em;background-color:#E6E6E6;color:#31708f'],
            'rowOptions' => ['style'=>'font-size: .7em;color:#000000;'],
            'panel' => [
                        'heading'=>'<h6 style="color:white;text-align:center">Categorías</h6>',
                        'type'=>'primary',
                        'footer'=>false,
                        'before'=>false,
                            ],
                ]);
            ?>
             <?php Pjax::end(); ?>

</div> <!-- center -->

            </div> <!-- card body -->
            </div> <!-- card shadow-->

            </div><!-- columna col-lg-->
        


    </div> <!-- row -->
    </div> <!-- container-->
    <?php
$js = <<<JAVASCRIPT
        $(function(){
                $('#modalButton').click(function(){
                    
                    $('#movi-modal').modal('show')
                                .find('#movi-modalContent')
                                .load($(this).attr('value'));
                    });


                    $('.custom_button').click(function(){
                        $('#movi-modal').modal('show')
                                .find('#movi-modalContent')
                                .load($(this).attr('value'));
                        //dynamiclly set the header for the modal
                    });

            });

        JAVASCRIPT;
        $this->registerJs($js);
?>
