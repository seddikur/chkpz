<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'operation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shift')->dropDownList([ 1 => '1', 2 => '2', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'line')->textInput() ?>

    <?= $form->field($model, 'workcenter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan')->textInput() ?>

    <?= $form->field($model, 'fact')->textInput() ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
