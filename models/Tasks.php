<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string|null $date Дата
 * @property string|null $operation  Название операции
 * @property string|null $shift смена
 * @property int|null $line номер линии,
 * @property string|null $workcenter отбор в бублике
 * @property int $plan максимальное значение в бублике
 * @property int $fact На сколько заполнить бублик зеленым цветом относительно plan.
 * @property string|null $operator фио сотрудника
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * Правила
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['shift'], 'string'],
            [['line', 'plan', 'fact'], 'integer'],
            [['plan', 'fact'], 'required'],
            [['operation', 'operator'], 'string', 'max' => 255],
            [['workcenter'], 'string', 'max' => 50],
            [['workcenter'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'operation' => 'Название операции ',
            'shift' => 'Cмена',
            'line' => 'Номер линии',
            'workcenter' => 'отбор в бублике',
            'plan' => 'максимальное значение в бублике',
            'fact' => 'На сколько заполнить бублик зеленым цветом относительно plan.',
            'operator' => 'фио сотрудника',
        ];
    }

    /**
     * Поведения
     * @return array[]
     */
    public function behaviors()
    {
        return [

            //формат даты перед сохранением
            'date' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => 'date',
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => 'date',
                ],
                'value' => function ($event) {
                    return Yii::$app->formatter->asDatetime($this->date . ' 00:00:00', 'php:Y-m-d 00:00:00');
                },
            ],
        ];

    }

    /**
     * {@inheritdoc}
     * @return TasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TasksQuery(get_called_class());
    }
}
