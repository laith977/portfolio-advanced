<?php

use yii\db\Migration;

class m260117_151403_fix_file_foreign_key_in_testimonial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // check if FK exists
        $fk = Yii::$app->db->createCommand("
        SELECT CONSTRAINT_NAME
        FROM information_schema.KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = DATABASE()
          AND TABLE_NAME = 'testimonial'
          AND CONSTRAINT_NAME = 'testimonial_ibfk_1'
    ")->queryScalar();

        if ($fk) {
            $this->dropForeignKey('testimonial_ibfk_1', '{{%testimonial}}');
        }

        // MUST be nullable for SET NULL
        $this->alterColumn(
            '{{%testimonial}}',
            'customer_image_id',
            $this->integer()->null()
        );

        $this->addForeignKey(
            'testimonial_ibfk_1',
            '{{%testimonial}}',
            'customer_image_id',
            '{{%file}}',
            'id',
            'SET NULL'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-testimonial-customer_image_id}}',
            '{{%testimonial}}'
        );
        $this->alterColumn('{{%testimonial}}', 'customer_image_id', $this->integer()->notNull());
        $this->addForeignKey(
            '{{%fk-testimonial-customer_image_id}}',
            '{{%testimonial}}',
            'customer_image_id',
            '{{%file}}',
            'id',
            'CASCADE'
        );
    }
}
