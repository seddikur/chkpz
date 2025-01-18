<?php

use phpnt\chartJS\ChartJs;
use practically\chartjs\widgets\Chart;
use yii\web\JsExpression;
use yii\helpers\Html;

/** @var yii\web\View $this */

//https://www.yiiframework.com/extension/practically/yii2-chartjs
//https://github.com/phpnt/yii2-chartjs
$this->title = 'Графики';

/**
 * Цвета
 * "#009945",
 * "#b3b3b3",
 * "#214092"
 */

/** @var \app\models\Tasks $model */
$numVal = '78 %';
?>

<style>
    .made {
        display: inline;
    }

</style>
<div class="site-index">
    <div class="row">
        <div class="col-lg-4">
            <div class="well text-center">
            <?php echo Html::img('@web/logo.png',
                ['width' => '320']
            )
            ?>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
            <div class="well text-center">
                <strong>
                    <p class="made" style="color: #214092;font-size: 26px;">
                        Изготовлено /
                    </p>
                    <p class="made" style="color: #999999;font-size: 26px;">
                        Осталось
                    </p>
                </strong>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($model as $data): ?>
            <?php echo $this->render('_chart', ['data' => $data,]) ?>
        <?php endforeach; ?>

    </div>

</div>
