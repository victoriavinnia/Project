<h2>Ваша корзина</h2>
<p id="message"></p>
<form action="/cart" name="cart" method="post">
<? foreach ($order as $good) : ?>
        <section class="section" id="section-<? echo $good['articul']; ?>"
                 data-art="<? echo $good['articul']; ?>"
                 data-currency='<? echo $good['cost']; ?>'
                 data-count="<? echo $good['count']; ?>"
            data-id="<? echo $_SESSION['id']; ?>">
        <div class="img">
            <button data-art="<? echo $good['articul']; ?>" class="delete">Удалить</button>
<!--            <img src="/static/img/--><?// echo $good['photo_product']; ?><!--">-->
        </div>
        <div class="descr">
            <h3><? echo $good['name_product']; ?></h3>
<!--            <button data-art="--><?// echo $good['articul']; ?><!--" class="delete">Удалить</button>-->
        </div>
        <div class="prices">
            <div class="price">
                <p>Цена</p>
                <div id='currency-<? echo $good['articul']; ?>' class="value" style="text-align: center"><? echo $good['cost']/$good['count']; ?></div>
            </div>
            <div class="count">
                <p>Количество</p>
                <div style="text-align: center">
                    <button data-art="<? echo $good['articul']; ?>" class="minus">-</button>
                    <div data-art="<? echo $good['articul']; ?>" id="total-count-<? echo $good['articul']; ?>" class="count_item"><? echo $good['count']; ?></div>
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

            <input type="submit"
                   id="submitOrder"
                   data-user-id="<? echo $_SESSION['id']; ?>"
                   value="Оформить заказ">
        </form>

<script src="/static/js/cart.js"></script>
