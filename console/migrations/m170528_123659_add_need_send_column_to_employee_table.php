<?php

use yii\db\Migration;

/**
 * Handles adding need_send to table `employee`.
 */
class m170528_123659_add_need_send_column_to_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('employee', 'need_send', $this->smallinteger()->defaultValue(0)->after('status'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('employee', 'need_send');
    }
}
