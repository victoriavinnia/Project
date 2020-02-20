<p id="error"></p>
<form method="post" action="/cabinet" name="cabinet">
    <h1>Вход в личный кабинет</h1>
    <span class="message">Хочу<a href="/registration"> зарегистрироваться</a></span>

    <fieldset>
        <div>
            <label for="login">Введите логин</label>
            <input name="login" id="login" type="text" required>
            <span class="info-block">
                Логин должен содержать минимум 4 символа
                </span>
        </div>
        <div>
            <label for="pwd">Введите пароль</label>
            <input name="pwd" id="pwd" type="password" required>
            <span class="info-block">
                Пароль должен содержать минимум 6 символов
                </span>
        </div>
    </fieldset>

    <input type="submit" value="Отправить">
    <input type="reset" value="Очистить">
</form>
</div>
<script src="/static/js/cabinet.js"></script>