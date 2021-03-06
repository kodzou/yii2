<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

if (!empty($session['cart'])):

?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>


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
                                <h4><a href="<?=Url::to(['product/view', 'id' => $id]) ?>"><?=$item['name'] ?></a></h4>
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

        <?php else: ?>
        <div class="empty_basket">
            <h3>?????????????? ??????????</h3>
        </div>
        <?php endif; ?>

    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $form = ActiveForm::begin() ?>
                <?=$form->field($order, 'name') ?>
                <?=$form->field($order, 'email') ?>
                <?=$form->field($order, 'phone') ?>
                <?=$form->field($order, 'address') ?>
                <?=Html::submitButton('Order', ['class' => 'btn  btn-success']) ?>
                <?php ActiveForm::end() ?>
            </div>
            <div class="col-sm-6">
                <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert-success">
                    <button type="button" class="close">
                        <span>&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
                <?php elseif (Yii::$app->session->hasFlash('error')): ?>
                    <div class="alert-danger">
                        <button type="button" class="close">
                            <span>&times;</span>
                        </button>
                        <?php echo Yii::$app->session->getFlash('error'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!--<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--/#do_action-->
