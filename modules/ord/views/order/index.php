<?php

use app\modules\ord\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\ord\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>   
        <?= Html::a('All Orders', ['index']) ?> 
        <?= Html::a('Prompt', ['index', 'OrderSearch[status]' => '1']) ?>
        <?= Html::a('In progress', ['index', 'OrderSearch[status]' => '2']) ?>
        <?= Html::a('Completed', ['index', 'OrderSearch[status]' => '3']) ?> 
        <?= Html::a('Canceled', ['index', 'OrderSearch[status]' => '4']) ?> 
        <?= Html::a('Error', ['index', 'OrderSearch[status]' => '5']) ?> 
    </p>

    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'ID',
                'attribute'=>'id',
            ],
            [
                'header' => 'User',
                'attribute'=>'user_id',
            ],
            [
                'header' => 'Link',
                'attribute'=>'link',
            ],
            [
                'header' => 'Quantity',
                'attribute'=>'quantity',
            ],
            [
                'header' => 'Service',
                'attribute'=>'service_id',
                'filter' => ['' => 'All', '0' => 'да', '1' => 'нет'],
            ],
            [
                'header' => 'Status',
                'attribute'=>'status',
                'filter' => false,
            ],
            [   'header' => '__Mode__',
                'attribute' => 'mode',
                'filter' => ['' => 'All', '0' => 'Manual', '1' => 'Auto'],
            ],
            [
                'header' => 'Created',
                'attribute'=>'created_at',
            ],
            /*
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            */
        ],
    ]); ?>
    

</div>
