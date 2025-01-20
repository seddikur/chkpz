<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tasks]].
 *
 * @see Tasks
 */
class TasksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tasks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tasks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * Выборка 1 смены
     * @return TasksQuery
     */
    public function findShift1()
    {
        return $this->andWhere(['shift'=>1]);
    }

    /**
     * Выборка 1 смены
     * @return TasksQuery
     */
    public function findShift2()
    {
        return $this->andWhere(['shift'=>2]);
    }
}
