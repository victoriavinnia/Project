<div>
<h2 style="text-align: center">Форма для информации по товарам</h2>
<form action="/admin" name="admin" method="post" enctype="multipart/form-data">
    <p id="error"></p>
     <fieldset>
        <label for="text">Введите название товара</label>
        <input id="text" type="text" name="name" placeholder="Название товара">
     </fieldset>
     <fieldset>
        <legend>Введите артикул товара</legend>
        <input type="number" name="articul" minlength="5" step="1">
    </fieldset>
        <legend>Введите цену товара</legend>
        <input type="number" name="price" min="10" step="0,01">
    <fieldset>
        <legend>Загрузка фото товара</legend>
        <input type="file" name="photo_product"  multiple accept="image/*">
    </fieldset>
        <legend>Описание краткое товара</legend>
        <textarea cols="40" rows="10" name="description" autofocus required placeholder="Подсказка"></textarea>
         <legend>Описание товара</legend>
         <textarea cols="40" rows="10" name="full_description" autofocus required placeholder="Подсказка"></textarea>
    <fieldset>
    <button type="submit" name="submit" class="btn btn-primary">Отправить данные</button>
    <button type="reset" name="reset" class="btn btn-secondary">Очистить данные</button>
    </fieldset>
</form>
    <p>eraetsrydtf</p>

<script src="/static/js/admin.js"></script>
</div>