<?php

use yii\db\Migration;

/**
 * Class m190614_133049_create_table_comment_to_history
 */
class m190616_133049_create_table_comments_model_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('model_history_model_comment', [
            'model_history_id' => $this->integer()->notNull(),
            'model_comment_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-model_history-model_history_model_comment', '{{%model_history_model_comment%}}', 'model_history_id',
            '{{%model_history%}}', 'id');
        $this->addForeignKey('fk-model_comment-model_history_model_comment', '{{%model_history_model_comment%}}', 'comments_id',
            '{{%comments%}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('model_history_model_comment');
    }
}
