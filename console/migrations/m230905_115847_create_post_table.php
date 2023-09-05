<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m230905_115847_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512),
            'body' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
        ]);

        $this->addForeignKey(
            'FK_post_created_by',
            '{{%post}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_post_created_by', '{{%post}}');
        $this->dropTable('{{%post}}');
    }
}