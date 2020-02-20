<h2 style="text-align: center">Форма для добавления товаров</h2>
<form action="/admin" name="admin" method="post" enctype="multipart/form-data">
    <p id="error"></p>
    <fieldset>
        <label for="text">Введите название товара</label>
        <input id="text" type="text" name="name" placeholder="Название товара">
    </fieldset>
    <fieldset>
        <label>Введите артикул товара</label>
        <input type="number" name="articul" minlength="5" step="1">
    </fieldset>
    <fieldset>
        <label>Введите цену товара</label>
        <input type="number" name="price" min="10" step="0,01">
    </fieldset>
    <fieldset>
        <label>Загрузка фото товара</label>
        <input type="file" name="photo_product"  multiple accept="image/*">
    </fieldset>
    <label class="field">Краткое описание товара:</label>
    <textarea cols="40" rows="10" name="description" autofocus required></textarea>
    <label class="field">Описание товара:</label>
    <textarea cols="40" rows="10" name="full_description" autofocus required></textarea>
    <fieldset>
        <button type="submit" name="submit" class="btn btn-primary">Отправить данные</button>
        <button type="reset" name="reset" class="btn btn-secondary">Очистить данные</button>
    </fieldset>
</form>

