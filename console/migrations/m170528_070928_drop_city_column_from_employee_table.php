<?php

use yii\db\Migration;

/**
 * Handles dropping city from table `employee`.
 */
class m170528_070928_drop_city_column_from_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('employee', 'city');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('employee', 'city', $this->string(150)->after('date_birth'));
    }
}
