let form = document.forms.cabinet;
console.log(form);
let login = form.elements.login;
let pwd = form.elements.pwd;


login.addEventListener("focus", focusOnElem);
pwd.addEventListener("focus", focusOnElem);

function focusOnElem() {
    console.log("фокус на элементе");
    this.nextElementSibling.classList.add("error");
}

login.addEventListener("blur", focusOutLogin);
pwd.addEventListener("blur", focusOutPwd);

function focusOutLogin() {
    if(this.value.length < 4 || this.value.length > 10) {
        this.nextElementSibling.classList.add("error");
    } else {
        this.nextElementSibling.classList.remove("error");
        this.nextElementSibling.classList.add("success");
    }
}
function focusOutPwd() {
    if(this.value.length < 6) {
        this.nextElementSibling.classList.add("error");
    } else {
        this.nextElementSibling.classList.remove("error");
        this.nextElementSibling.classList.add("success");
    }
}
let span = document.getElementsByClassName("info-block");
form.addEventListener("reset", outForm);
function outForm(event) {
    event.preventDefault();
    login.value = null;
    pwd.value = null;
    console.log(span);
    for (let elem of span) {
        elem.classList.add("error");
        elem.classList.remove("success");
    }
}

const SUCCESS = "Авторизация прошла успешно";
const ERROR = "Ошибка авторизации";
form.addEventListener('submit', sendRequest);

function responseHandler(response) {
    console.log(response);
    if (response == SUCCESS) {
        window.location.replace("/range");// если все успешно перенаправляем в range
    } else if (response == ERROR) {
        let elem = document.getElementById("error");
        elem.innerText = ERROR;
    }
}

function sendRequest(event) {
    event.preventDefault(); // отменили отправку формы
    let data = new FormData(this); // здесь собираем все данные формы в объект для дальнейшей отправки
    let request = new XMLHttpRequest(); // здесь обозначаем каким методом будет отправлен запрос
    request.open("POST", "/cabinet", true); // метод и путь смотрим в файле конфиг autorisation
    request.send(data); // отправка данных
    request.onload = function () {
        if(request.status === 200) {
            responseHandler(request.responseText);
        }
    }
}