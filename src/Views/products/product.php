<?php
$id = isset($_COOKIE['id']) ? $_COOKIE['id'] : $_COOKIE[' '];

?>
<h2>Информация о товаре</h2>
<p id="error"></p>
<form method="post" action="/product" name="product" >
        <section>
            <div class="img">
                <img src="/static/img/<? echo $product['photo_product']; ?>">
            </div>
            <div class="descr">
                <h3 name="name"><? echo $product['name']; ?></h3>
                <p><? echo $product['description']; ?></p>
                <span>Описание: </span>
                <p><? echo $product['full_description']; ?></p>
            </div>
            <div class="price">
                    <h3>Цена</h3>
                    <div class="value" style="text-align: center" name="cost"><? echo $product['price']; ?> ₽</div>
            </div>
        </section>
</form>
        <input type="submit" name="articul" data-art="<? echo $product['articul']; ?>" class="add_to_cart" onclick="buttonClick()" value="Добавить в корзину">
        <p>Добавлено <span id="elem" name="count" >0</span> шт.</p>
<script src="/static/js/product.js"></script>

