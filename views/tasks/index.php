<?php

use app\models\Tasks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TasksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Новая', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'date',
            'operation',
            'shift',
            'line',
            'workcenter',
            'plan',
            'fact',
            'operator',
            [
                'class' => yii\grid\ActionColumn::class,
                'headerOptions' => ['style' => 'width:80px '],
                'template' => ' {update} {delete} ',
                'buttons' => [
                    'update' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil text-success"></span>',
                            $url,
                            [
                                'title' => 'Download',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'delete' => function ($url, $model) {
                        $url = Url::to(['remove', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-trash text-danger"></span>',
                            $url,
                            [
                                'title' => 'delete',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                                ],

                            ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
