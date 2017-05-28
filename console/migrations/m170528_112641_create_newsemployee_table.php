<?php

use yii\db\Migration;

/**
 * Handles the creation of table `newsemployee`.
 */
class m170528_112641_create_newsemployee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('newsemployee', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(32)->unique()->notNull(),
            'name' => $this->string(255),
            'content' => $this->text(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('newsemployee');
    }
}
