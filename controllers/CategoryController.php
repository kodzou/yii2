<?php


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex() {
        $hits = Product::find()->where(['hit' => '1'])->limit('6')->all();
        $this->setMeta('E-SHOPPER');
        return $this->render('index', compact('hits'));
    }

    public function actionView($id) {
        /*$id = Yii::$app->request->get('id');*/

        $category = Category::findOne($id);
        if (empty($category)) {
            throw new HttpException(404, 'Такой категории нет.');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category'));
    }

    public function actionSearch() {
        $req = trim(Yii::$app->request->get('req'));
        $this->setMeta('E-SHOPPER | Search: ' . $req);
        if (!$req)
            return $this->render('search');

        $query = Product::find()->where(['like', 'name', $req]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('products', 'pages', 'req'));
    }
}