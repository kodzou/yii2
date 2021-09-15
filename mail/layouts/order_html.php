<div id="cart_items">
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
            <tr class="cart_menu">
                <td class="description">Name</td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Sum</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
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
                </tr>
            <?php endforeach; ?>
            <tr class="cart_total_line">
                <td>
                    <p>Total:</p>
                </td>
                <td></td>
                <td>
                    <p><?=$session['cart.qty'] ?></p>
                </td>
                <td>
                    <p>$<?=$session['cart.total'] ?></p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>