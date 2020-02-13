<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><? echo $page_title; ?></title>
    <link rel="stylesheet" href="/static/css/template.css">
    <? echo $stylesheet; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <div class="contacts flex mobile ">
        <span class="flex-3 tel mobile">8 (800)-000-77-11</span>
        <span class="flex-9 size-1 name mobile">Raspberry</span>
    </div>
    <div class="clients flex">
        <span class="flex-3 registration"><a href="/registration">Регистрация</a></span>
        <? if(isset ($_SESSION['login'])): ?>
        <span class="flex-3 buy"><a href="/logout" >Выйти</a></span>
        <? else: ?>
        <span class="flex-3 buy"><a href="/cabinet">Войти</a></span>
        <? endif; ?>
    </div>
</header>
<main>
    <aside class="menu flex-5">
        <nav>
            <ul>
                <li><a href="/"> Главная страница</a></li>
                <li><a href="/range">Ассортимент</a></li>
                <li><a href="/cart">Корзина</a></li>
            </ul>
        </nav>
    </aside>
    <div>
        <? include_once $content; ?>
    </div>
</main>

</body>
</html>