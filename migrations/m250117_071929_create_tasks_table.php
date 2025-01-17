<?php

use yii\db\Migration;

/**
 * Создается таблица "Задачи".
 */
class m250117_071929_create_tasks_table extends Migration
{
    /**
     * Наименование таблицы, которая создается
     */
    const TABLE_NAME= 'tasks';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT "Задачи"';
        }
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime()->comment('Дата'),
            'operation' => $this->string(255)->comment('Токарная с ЧПУ 4'),
            'shift' => "ENUM('1', '2')",
            'line' => $this->integer()->comment('номер линии,'),
            'workcenter' => $this->string(50)->unique()->comment('отбор в бублике'),
            'plan' => $this->integer()->notNull()->comment('максимальное значение в бублике'),
            'fact' => $this->integer()->notNull()->comment('На сколько заполнить бублик зеленым цветом относительно plan.'),
            'operator' => $this->string()->comment('фио сотрудника'),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
