<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TasksSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tasks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'operation') ?>

    <?= $form->field($model, 'shift') ?>

    <?= $form->field($model, 'line') ?>

    <?php // echo $form->field($model, 'workcenter') ?>

    <?php // echo $form->field($model, 'plan') ?>

    <?php // echo $form->field($model, 'fact') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
