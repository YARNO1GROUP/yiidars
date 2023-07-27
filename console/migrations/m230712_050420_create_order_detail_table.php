<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_detail}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 * - `{{%product}}`
 */
class m230712_050420_create_order_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_detail}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'count' => $this->integer(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_detail-order_id}}',
            '{{%order_detail}}',
            'order_id'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-order_detail-order_id}}',
            '{{%order_detail}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-order_detail-product_id}}',
            '{{%order_detail}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-order_detail-product_id}}',
            '{{%order_detail}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-order_detail-order_id}}',
            '{{%order_detail}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_detail-order_id}}',
            '{{%order_detail}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-order_detail-product_id}}',
            '{{%order_detail}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-order_detail-product_id}}',
            '{{%order_detail}}'
        );

        $this->dropTable('{{%order_detail}}');
    }
}
