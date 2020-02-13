<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../public/static/css/admin.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Панель управления</title>
</head>
<body>
<h2 style="text-align: center">Форма для информации по товарам</h2>
<form action="/admin" name="admin" method="post" enctype="multipart/form-data">
    <p id="error"></p>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

<script src="/static/js/admin.js"></script>

</body>
</html>