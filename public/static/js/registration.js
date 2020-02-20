let form = document.forms.registration;
console.log(form);
let login = form.elements.login;
let pwd = form.elements.pwd;
let username = form.elements.username;
let email = form.elements.email;

username.addEventListener("focus", focusOnElem);
email.addEventListener("focus", focusOnElem);
login.addEventListener("focus", focusOnElem);
pwd.addEventListener("focus", focusOnElem);

function focusOnElem() {
    console.log("фокус на элементе");
    this.nextElementSibling.classList.add("error");
}

username.addEventListener("blur", focusOnUsername);
email.addEventListener("blur", focusOnEmail);
login.addEventListener("blur", focusOutLogin);
pwd.addEventListener("blur", focusOutPwd);

function focusOnUsername() {
    if(this.value.length <= 0) {
        this.nextElementSibling.classList.add("error");
    } else {
        this.nextElementSibling.classList.remove("error");
        this.nextElementSibling.classList.add("success");
    }
}

function focusOnEmail() { //!!!!!!!!!! не работает
   // let reg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/i;
    let regExp =  /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/;
     //   /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
    // let form = document.forms.registration;
    let address = form.email.value;

    // console.log((address));
    // console.log((regExp.test(address)));

    if(regExp.test(address) === false) {
        this.nextElementSibling.classList.add("error");
    } else {
        this.nextElementSibling.classList.remove("error");
        this.nextElementSibling.classList.add("success");
    }
}

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
    username.value = null;
    email.value = null;
    login.value = null;
    pwd.value = null;
    console.log(span);
    for (let elem of span) {
        elem.classList.add("error");
        elem.classList.remove("success");
    }
}


const USER_EXISTS = "Пользователь с таким логином уже существует";
const REGISTRATION_SUCCESS = "Регистрация прошла успешно";
form.addEventListener('submit', sendRequest);
//
// function responseHandler(response) {
//     console.log(response);
//     if (response == REGISTRATION_SUCCESS) {
//         window.location.replace("/cabinet");// если все успешно перенаправляем на страницу войти
//     } else if (response == USER_EXISTS) {
//         let elem = document.getElementById("error");
//         elem.innerText = USER_EXISTS;
//     }
// }

function sendRequest(event) {
    event.preventDefault(); // отменили отправку формы
    let data = new FormData(this); // здесь собираем все данные формы в объект для дальнейшей отправки
    let request = new XMLHttpRequest(); // здесь обозначаем каким методом будет отправлен запрос
    request.open("POST", "/registration", true); // метод и путь смотрим в файле конфиг autorisation
    request.send(data); // отправка данных
    request.onload = function () {
        if(request.status === 200) {
            window.location.replace("/cabinet");
            // let elem = document.getElementById("error");
            // elem.innerText = REGISTRATION_SUCCESS;
        } else if (response == USER_EXISTS) {
            let elem = document.getElementById("error");
            elem.innerText = USER_EXISTS;
        }
    }
}