<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string|null $date Дата
 * @property string|null $operation Токарная с ЧПУ 4
 * @property string|null $shift
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
            'operation' => 'Токарная с ЧПУ 4',
            'shift' => 'Shift',
            'line' => 'номер линии,',
            'workcenter' => 'отбор в бублике',
            'plan' => 'максимальное значение в бублике',
            'fact' => 'На сколько заполнить бублик зеленым цветом относительно plan.',
            'operator' => 'фио сотрудника',
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
