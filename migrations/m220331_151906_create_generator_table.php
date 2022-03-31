<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%generator}}`.
 */
class m220331_151906_create_generator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%generator}}', [
            'id' => $this->primaryKey(),
            'generate_key' => $this->bigInteger()->notNull()->comment('Сгенерированное число'),
            'created_at' => $this->dateTime()->defaultExpression('NOW()')->comment('Дата создания ключа')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%generator}}');
    }
}
