<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m170616_173944_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->Integer()->defaultValue(0),
            'name' => $this->string(),
            'email' => $this->string()->unique(),
            'text' => $this->text(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}
