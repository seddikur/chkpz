<?php
/** @var \app\models\Tasks $data */

$numVal = $data['fact']/$data['plan']*100 . ' %';

?>

<div class="col-lg-3">
    <div class="well">
        <div class="row">
            <div class="col-lg-6">
                <p><strong><?=$data['workcenter']?></strong></p>
            </div>
            <div class="col-lg-6">
                <p class="pull-right"><?=$data['operation']?></p>
            </div>
        </div>
        <div>
            <?php

            echo dosamigos\chartjs\ChartJs::widget([
                'type' => 'doughnut',
//                'id' => 'structurePie',
                'id' => $data['id'],
//                        'options' => [
//                            'height' => 200,
//                            'width' => 400,
//                        ],
                'data' => [
//                            'radius' => "50%",
                    //'labels' => ['Label 1', 'Label 2', 'Label 3'], // Your labels
                    'datasets' => [
                        [
                            'data' => [$data['fact'], $data['plan']-$data['fact']],
                            'label' => '',
                            'backgroundColor' => [
                                "#009945",
                                "#b3b3b3",
                            ],
                            'borderColor' => [
                                '#fff',
                                '#fff',
                            ],
                            'borderWidth' => 1,
                            'hoverBorderColor' => ["#999", "#999",],
                        ]
                    ]
                ],
                'clientOptions' => [
                    'legend' => [
                        'display' => false,
                        'position' => 'bottom',
                        'labels' => [
                            'fontSize' => 14,
                            'fontColor' => "#425062",
                        ]
                    ],
                    'tooltips' => [
                        'enabled' => true,
                        'intersect' => true
                    ],
                    'hover' => [
                        'mode' => false
                    ],
                    'maintainAspectRatio' => false,
                ],
                'plugins' =>
                    new \yii\web\JsExpression('
                    [{
                  
                        id: \'text\',
                        afterDatasetsDraw: function(chart, a, b) {
                            var width = chart.chartArea.right,
                            height = chart.height,
                            ctx=chart.ctx;
                            ctx.restore();
                            var fontSize = (height / 80).toFixed(2);
                            ctx.font = fontSize + "em sans-serif";
                            ctx.textBaseline = "middle";
                            ctx.fillStyle ="rgb(0,0,0)";
                
                            var text = "' . $numVal . '",
                            textX = Math.round((width - ctx.measureText(text).width) / 2),
                            textY = height / 2;
                
                            ctx.fillText(text, textX, textY);
                            ctx.save();
                        }
                    }]')


            ]);
            ?>
        </div>
        <p class="text-center" style="color: #214092;font-size: 18px;"><strong class="big"><?=$data['operator']?></strong></p>
    </diV>
</div>
