<?php

use yii\db\Migration;

/**
 * Class m210817_205209_product
 */
class m210817_205209_add_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(10)->notNull(),
            'name' => $this->string()->notNull(),
            'content' => $this->text(),
            'price' => $this->float()->notNull(),
            'keywords' => $this->string(),
            'description' => $this->string(),
            'img' => $this->string()->defaultValue('no-image.png'),
            'hit' => "ENUM('1', '0') NOT NULL DEFAULT '0'",
            'new' => "ENUM('1', '0') NOT NULL DEFAULT '0'",
            'sale' => "ENUM('1', '0') NOT NULL DEFAULT '0'"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210817_205209_product cannot be reverted.\n";

        return false;
    }
    */
}
