<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (!empty($session['cart'])):

?>
<div id="cart_items">
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
            <tr class="cart_menu">
                <td class="image">Image</td>
                <td class="description">Name</td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Sum</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
            <tr>
                <td class="cart_product">
                    <a href="javascript:void(0);"><?=Html::img($item['img'], ['alt' => $item['name']]) ?></a>
                </td>
                <td class="cart_description">
                    <h4><a href="javascript:void(0);"><?=$item['name'] ?></a></h4>
                </td>
                <td class="cart_price">
                    <p>$<?=$item['price'] ?></p>
                </td>
                <td class="cart_quantity">
                    <p>
                        <?=$item['qty'] ?>
                    </p>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">$<?=$item['sum'] ?></p>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete del-item" data-id="<?=$id ?>" href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr class="cart_total_line">
                <td colspan="2">
                    <p>Total:</p>
                </td>
                <td></td>
                <td>
                    <p><?=$session['cart.qty'] ?></p>
                </td>
                <td>
                    <p>$<?=$session['cart.total'] ?></p>
                </td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
    <div class="empty_basket">
        <h3>Корзина пуста</h3>
    </div>
<?php endif; ?>
