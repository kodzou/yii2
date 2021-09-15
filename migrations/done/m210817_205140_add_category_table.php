<?php

use yii\db\Migration;

/**
 * Class m210817_205140_category
 */
class m210817_205140_add_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(10)->notNull()->defaultValue(0),
            'name' => $this->string()->notNull(),
            'keywords' => $this->string(),
            'description' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210817_205140_category cannot be reverted.\n";

        return false;
    }
    */
}
