<? if (isset($result)): ?>
    <p><? echo $result; ?></p>
<? endif; ?>
<p id="error"></p>
    <form method="post" action="/registration" name="registration" >
        <h1>Регистрация</h1>
        <fieldset>
            <div>
                <label for="username">Введите Ваше имя</label>
                <input name="username" id="username" type="text" required>
                <span class="info-block">
                Например, Иван
                </span>
            </div>
            <div>
                <label for="email">Введите адрес элекстронной почты</label>
                <input name="email" id="email" type="text" required>
                <span class="info-block">
                Введите корректный e-mail
                </span>
            </div>
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
<script src="/static/js/registration.js"></script>