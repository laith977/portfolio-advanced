<?php

use yii\db\Migration;

class m260116_220928_alter_date_columns_in_project_table extends Migration
{
    public function safeUp()
    {
        // 1. Allow NULL temporarily (still INT)
        $this->alterColumn('project', 'start_date', $this->integer());
        $this->alterColumn('project', 'end_date', $this->integer());

        // 3. Change type to DATE
        $this->alterColumn('project', 'start_date', $this->date());
        $this->alterColumn('project', 'end_date', $this->date());
    }

    public function safeDown()
    {
        // 1. Change back to INT nullable
        $this->alterColumn('project', 'start_date', $this->integer()->null());
        $this->alterColumn('project', 'end_date', $this->integer()->null());

        // 2. Convert NULL → 0
        $this->update('project', ['start_date' => 0], ['start_date' => null]);
        $this->update('project', ['end_date' => 0], ['end_date' => null]);

        // 3. Restore NOT NULL if needed
        $this->alterColumn('project', 'start_date', $this->integer()->notNull());
        $this->alterColumn('project', 'end_date', $this->integer()->notNull());
    }
}
