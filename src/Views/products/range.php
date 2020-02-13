        <h1>Ассортимент</h1>
        <section>
            <div class="cards xs xm">
<? foreach ($range as $good) : ?>
                <div class="card">
                    <img src="/static/img/<? echo $good['photo_product']; ?>">
                    <p><? echo $good['name']; ?></p>
                    <p class="word"><? echo $good['description']; ?></p>
                    <p><strong><? echo $good['price']; ?> ₽</strong></p>
                    <a href="/range/<? echo $good['articul']; ?>" class="add_to_cart">Подробнее о товаре...</a>
                </div>
<? endforeach; ?>
            </div>
        </section>



