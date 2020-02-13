        <h2>Ваша корзина</h2>
<? foreach ($order as $good) : ?>
        <section class="section" id="section-<? echo $good['articul']; ?>" data-art="<? echo $good['articul']; ?>">
        <div class="img">
            <img src="/static/img/<? echo $good['photo_product']; ?>">
        </div>
        <div class="descr">
            <h3><? echo $good['name']; ?></h3>
            <button data-art="<? echo $good['articul']; ?>" class="delete">Удалить</button>
        </div>
        <div class="prices">
            <div class="price">
                <p>Цена</p>
                <div id='currency-<? echo $good['articul']; ?>' class="value" style="text-align: center"><? echo $good['cost']; ?></div>
            </div>
            <div class="count">
                <p>Количество</p>
                <div style="text-align: center">
                    <button data-art="<? echo $good['articul']; ?>" class="minus">-</button>
                    <div id="total-count-<? echo $good['articul']; ?>" class="count_item">1</div>
                    <button data-art="<? echo $good['articul']; ?>" class="plus">+</button>
                </div>
            </div>
            <div class="price">
                <p>Стоимость</p>
                <div id='total-currency-<? echo $good['articul']; ?>' class="value1"  data-currency='<? echo $good['cost']; ?>' style="text-align: center"><? echo $good['cost']; ?></div>
            </div>
         </div>
        </section>
<? endforeach; ?>

<script src="../../../public/static/js/cart.js"></script>
