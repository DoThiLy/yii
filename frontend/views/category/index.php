<?php

use backend\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?=Html::encode($this->title)?></h3>
        </div>
        <div class="panel-body">

        <p class="pull-right">
        <?=Html::a('Thêm mới',['create'],['class'=>'btn btn-success'])?>
        </p>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn',
            // 'header'=>'STT',
            // 'headerOptions'=>[
            //     'style'=>'with: 15px;text-align:center'
            // ],
            // 'contentOptions'=>[
            // 'style'=>'with: 15px;text-align:center'
            // ],
            // ],

            [
                'class'=>'yii\grid\CheckBoxColumn',
            ],

            [
                'attribute'=> 'id',
                'label'=>'ID',
                'headerOptions'=>[
                    'style'=>'with: 15px;text-align:center'
                ],
                'contentOptions'=>[
                'style'=>'with: 15px;text-align:center'
                ],
            ],

            //HIỂN NGÀY THÁNG NĂM
            // [
            //     'attribute'=> 'created_at',
            //     'content'=> function($model){
            //         return date('d-m-h', $model->created_at);
            //     }
            // ],

            'name',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Category $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],

            [
                'class'=>'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=> function($url, $model){
                        return Html::a('Edit',$url,['class'=>'btn btn-xs btn-primary']);
                    },
                    'update'=> function($url, $model){
                        return Html::a('Update',$url,['class'=>'btn btn-xs btn-success']);
                    },
                    'delete'=> function($url, $model){
                        //return Html::a('<span class="glyphicon glyphicon-remove"></span>Delete',$url,
                        return Html::a('Delete',$url,
                        [
                            'class'=>'btn btn-xs btn-danger',
                            'data-confirm'=>'Bạn có chắc muốn xóa ?' .$model->name,
                            'data-method'=>'post'
                        ]);
                    },
                ]
            ]
        ],
    ]); ?>
        </div>
    </div>


</div>
