<?php
use backend\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var frontend\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerCssFile("@web/css/test.css",
    ['depends' => [\backend\assets\AppAsset::className()]]);
$this->registerJsFile("@web/lib/bootstrap/bootstrap-vue.min.js",
    ['depends' => [\backend\assets\AppAsset::className()]]);
    
$this->title = 'Danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="category-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?=Html::encode($this->title)?></h3>
        </div>
        <div class="panel-body">

            <p class="hi">
                <?=Html::a('Thêm mới',['create'],['class'=>'btn btn-success'])?>
            </p>

            <div class="container mt-3">
                <h2>Hover Rows</h2>
                <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Danh mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?='id'?></td>
                            <td><?='name'?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
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
                'name',
            [
                'attribute'=> 'parent',
                'content'=>function($model){
                    if($model->parent==0){
                        return 'Root';
                    }
                    else{
                        $parent = Category::find()->where(['id'=>$model->parent])->one();
                        if($parent){
                            return $parent->name;
                        }
                        else{
                            return 'không rõ';
                        }
                       
                    }
                },
                'headerOptions'=>[
                    'style'=>'with: 150px;text-align:center'
                ],
                'contentOptions'=>[
                    'style'=>'with: 150px;text-align:center'
                ],
            ],        
            [
                'attribute'=> 'status',
                'content'=>function($model){
                    if($model->status==0){
                        return '<span class="label label-danger">Không kích hoạt</span>';
                    }
                    else{
                        return '<span class="label label-success">Kích hoạt</span>';
                    }
                },
                'headerOptions'=>[
                    'style'=>'with: 150px;text-align:center'
                ],
                'contentOptions'=>[
                    'style'=>'with: 150px;text-align:center'
                ],
            ],
             //HIỂN NGÀY THÁNG NĂM
            [
                'attribute'=> 'created_at',
                'content'=> function($model){
                    return date('d-m-Y', $model->created_at);
                }
            ],
            [
                'class'=>'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=> function($url, $model){
                        return Html::a('View',$url,['class'=>'btn btn-xs btn-primary']);
                    },
                    'update'=> function($url, $model){
                        return Html::a('Edit',$url,['class'=>'btn btn-xs btn-success']);
                    },
                    'delete'=> function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>Delete',$url,
                        //return Html::a('Delete',$url,
                        [
                            'class'=>'btn btn-xs btn-danger',
                            'data-confirm'=>'Bạn có chắc muốn xóa ? ' . $model->name,
                            'data-method'=>'post'
                        ]);
                    },
                ]
            ]
            ],
        ]); 
        ?>
        </div>
    </div>
</div>