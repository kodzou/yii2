<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget
{
    public $template;
    public $model;
    public $data;
    public $tree;
    public $menuHtml;


    public function init() {
        parent::init();

        if ($this->template === null) {
            $this->template = 'menu';
        }
        $this->template .= '.php';
    }

    public function run() {
        // Get cache
        if ($this->template == 'menu.php') {
            $menu = Yii::$app->cache->get('menu');
            if ($menu) return $menu;
        }

        // Build menu
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        // Set cache
        if ($this->template == 'menu.php') {
            Yii::$app->cache->set('menu', $this->menuHtml, 60);
        }

        return $this->menuHtml;
    }

    protected function getTree() {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '') {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab) {
        ob_start();
        include __DIR__ . '/menu_template/' . $this->template;
        return ob_get_clean();
    }
}