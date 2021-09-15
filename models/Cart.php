<?php


namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function addToCart($product, $qty) {
        $sum = $product->price * $qty;
        $mainImg = $product->getImage();

        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
            $_SESSION['cart'][$product->id]['sum'] += $sum;
        } else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'sum' => $sum,
                'img' => $mainImg->getUrl('x70')
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.total'] = isset($_SESSION['cart.total']) ? $_SESSION['cart.total'] + $sum : $sum;
    }

    public function recalc($id) {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        };
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart'][$id]['sum'] -= $sumMinus;
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.total'] -= $sumMinus;
        unset ($_SESSION['cart'][$id]);
    }
}