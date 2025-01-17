<?php

use phpnt\chartJS\ChartJs;
use practically\chartjs\widgets\Chart;
use yii\web\JsExpression;

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
$numVal = '78';
?>
<div class="site-index">

    <div class="row">

        <div class="col-lg-3">
            <div class="well">
                <div class="row">
                    <div class="col-lg-6">
                        <p><strong>2-3-14</strong></p>
                    </div>
                    <div class="col-lg-6">
                        <p class="pull-right">Токарная с ЧПУ-4</p>
                    </div>
                </div>
                <?php
                echo ChartJs::widget([
                    'type' => ChartJs::TYPE_DOUGHNUT,
                    'data' => [
                        'datasets' => [
                            [
                                'data' => [300, 100],
                                'backgroundColor' => [
                                    "#009945",
                                    "#b3b3b3",
                                ],
                                'hoverBackgroundColor' => [
                                    "#009945",
                                    "#b3b3b3",
                                ]
                            ],
                        ],
                    ],
                    'clientOptions' => [
                        'scales' => [
                            'y' => [
                                'min' => 0,
                                'max' => 100,
                                'title' => [
                                    'display' => true,
                                    'text' => 'Average (%)',
                                ],
                                'ticks' => [
                                    'callback' => new JsExpression('function(value, index, values) {
							return \'£\'+value;
					}')
                                ]
                            ]
                        ],
                        'plugins' => [
                            'tooltip' => [
                                'callbacks' => [
                                    'label' => new JsExpression('function(context) {
                                     alert(555);
						return \'£\'+context.chart.data.labels[context.dataIndex];
					}')
                                ]
                            ]
                        ]
                    ],


//                    'options' => [
//                        'elements' => [
//                            'center' => ['text' => 'textInside']
//                        ],
//                    ],

                ]);
                ?>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="well">
                <?php
                echo ChartJs::widget([
                    'type' => ChartJs::TYPE_DOUGHNUT,
                    'data' => [
                        'labels' => [
                            "Красный",
                            "Синий",
                            "Желтый"
                        ],
                        'datasets' => [
                            [
                                'data' => [300, 50, 100],
                                'backgroundColor' => [
                                    "#FF6384",
                                    "#36A2EB",
                                    "#FFCE56"
                                ],
                                'hoverBackgroundColor' => [
                                    "#FF6384",
                                    "#36A2EB",
                                    "#FFCE56"
                                ]
                            ]
                        ]
                    ],
                    'options' => []
                ]);
                ?>
            </div>
        </div>


    </div>

</div>
