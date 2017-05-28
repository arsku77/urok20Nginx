<?php

use yii\db\Migration;

/**
 * Handles adding salary to table `employee`.
 */
class m170528_064614_add_salary_column_to_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('employee', 'salary', $this->money()->after('work_position'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('employee', 'salary');
    }
}
