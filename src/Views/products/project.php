        <h1>Новинки</h1>
        <section>
            <div class="cards xs xm">
<?php foreach ($new_goods as $good) : ?>
                <div class="card">
                    <img src="/static/img/<? echo $good['photo_product']; ?>">
                    <p><? echo $good['name']; ?></p>
                    <p><strong><? echo $good['price']; ?> ₽</strong></p>
                </div>
<?php endforeach; ?>
            </div>
        </section>

        <h1>Хит продаж</h1>
        <section>
            <div class="cards xs xm">
<?php foreach ($hit as $product) : ?>
                <div class="card">
                    <img src="/static/img/<? echo $product['photo_product']; ?>">
                    <p><? echo $product['name']; ?></p>
                    <p><strong><? echo $product['price']; ?> ₽</strong></p>
                </div>
<?php endforeach; ?>
            </div>
        </section>
        <h1>Оформление и получение заказа</h1>
        <p class="span">1.Войти или зарегистрироваться. Оформить заказ могут только зарегистрированные пользователи. Войдите в Личный кабинет под своим логином или зарегистрируйтесь, если Вы у нас впервые.</p>
        <p class="span">2. Добавить товар в «Корзину».</p>
        <p class="span">3. Перейти в корзину.</p>
        <p class="span">4. Проверить заказ и подтвердить его.</p>
        <p class="span">5. Когда заказ будет готов, Вы можете его забрать по адресу: Санкт-Петербург, Невский пр., д.139.</p>
        <p class="span">6. Оплата заказа производится в пункте самовывоза.</p>

