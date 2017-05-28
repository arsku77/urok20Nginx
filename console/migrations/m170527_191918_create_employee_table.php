<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee`.
 */
class m170527_191918_create_employee_table extends Migration
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

        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'auth_alias' => $this->string(32)->unique()->notNull(),
            'name_first' => $this->string(255),
            'name_last' => $this->string(255),
            'name_parent' => $this->string(255),
            'date_birth' => $this->dateTime(),
            'city' => $this->string(150),
            'date_work_start' => $this->dateTime(),
            'work_experience' => $this->string(150),
            'work_position' => $this->string(255),
            'number_department' => $this->integer(4),
            'email' => $this->string(255)->unique(),
            'observation' => $this->text(),
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
        $this->dropTable('employee');
    }
}
