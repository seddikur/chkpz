<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Tasks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'date')->widget(
                DatePicker::className(), [
                'type' => DatePicker::TYPE_INPUT,
                'language' => 'ru',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy',
                ]
            ]); ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'operation')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'shift')->dropDownList([1 => '1', 2 => '2',], ['prompt' => '']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'line')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'workcenter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'plan')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'fact')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
