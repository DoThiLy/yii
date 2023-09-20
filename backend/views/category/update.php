<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Category $model */

//$this->title = 'Sửa danh mục: ' . $model->name;
$this->title = 'Sửa danh mục';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sửa';
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>