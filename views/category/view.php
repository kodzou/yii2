<?php

/* @var $this yii\web\View */
/* @var $model app\models\Category */

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<section id="advertisement">
    <div class="container">
        <img src="/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <!--category-products-->
                    <h2>Category</h2>
                    <ul id="catalog" class="category-products">
                        <?=MenuWidget::widget(['template' => 'menu'])?>
                    </ul>
                    <!--/category-products-->
                    <!--brands_products-->
                    <div class="brands_products">
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/brands_products-->
                    <!--price-range-->
                    <div class="price-range">
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <!--/price-range-->
                    <!--shipping-->
                    <div class="shipping text-center">
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->
                </div>
            </div>
            <!--features_items-->

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center"><?=$category->name ?></h2>
                    <?php if (!empty($products) ): ?>
                    <?php $i = 0; foreach ($products as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <?/*=Html::img("@web/images/products/{$product->img}", ['alt' => $product->name]) */?>
                                        <?php $image = $product->getImage(); ?>
                                        <?=Html::img($image->getUrl(), ['alt' => $product->name]) ?>
                                        <h2>$<?=$product->price ?></h2>
                                        <p><a href="<?=Url::to(['product/view', 'id' => $product->id]) ?>"><?=$product->name ?></a></p>
                                        <a href="<?=Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?=$product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <?php if ($product->new): ?>
                                        <?=Html::img('@web/images/shop/new.png', ['alt' => 'Новинка', 'class' => 'new']) ?>
                                    <?php elseif ($product->sale): ?>
                                        <?=Html::img('@web/images/shop/sale.png', ['alt' => 'Скидка', 'class' => 'new']) ?>
                                    <?php endif; ?>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php $i++; if ($i % 3 == 0): ?>
                            <div class="clearfix"></div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
                    <div class="clearfix"></div>
                    <?php echo LinkPager::widget(['pagination' => $pages]) ?>
                    <?php else: ?>
                        <h3>Здесь товаров пока нет =/</h3>
                    <?php endif; ?>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>