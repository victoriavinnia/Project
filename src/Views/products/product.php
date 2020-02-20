
<h2>Информация о товаре</h2>
<p id="error"></p>
<form action="/product" name="testTest" method="post">
    <section>
        <div class="img">
            <img src="/static/img/<? echo $product['photo_product']; ?>">
        </div>
        <div class="descr">
            <h3><? echo $product['name']; ?></h3>
            <p><? echo $product['description']; ?></p>
            <span>Описание: </span>
            <p><? echo $product['full_description']; ?></p>
        </div>
        <div class="price">
            <h3>Цена</h3>
            <div class="value" style="text-align: center"><? echo $product['price']; ?> ₽</div>

            <div style="text-align: center">
                <button type="button" data-art="<? echo $product['articul']; ?>" class="minus">-</button>
                <div id="total-count-<? echo $product['articul']; ?>" class="count_item">1</div>
                <button type="button" data-art="<? echo $product['articul']; ?>" class="plus">+</button>
            </div>
        </div>

    </section>
    <?  ?>
    <? if(!isset ($_SESSION['login'])): ?>

    <span class="message"><a href="/cabinet">Авторизоваться</a> для добавления товара</span>
    <? else:?>
    <input type="submit"
           id="submitProduct"
           data-art="<? echo $product['articul']; ?>"
           data-price = "<? echo $product['price']; ?>"
           data-name = "<? echo $product['name']; ?>"
           data-user-id="<? echo $_SESSION['id']; ?>"
           class="add_to_cart"
           value="Добавить в корзину">
    <?  endif; ?>
</form>

<script src="/static/js/product.js" ></script>

