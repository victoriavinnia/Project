let form = document.forms.admin;
console.log(form);
let button = form.elements.submit;
console.log(button);
button.addEventListener("submit", sendRequest);

const SUCCESS = "Товар добавлен";
const ERROR = "Ошибка при добавлении товара";

function responseHandler(response) {
    console.log(response);
    if (response == SUCCESS) {
        window.location.replace("/admin");
    } else if (response == ERROR) {
        let elem = document.getElementById("error");
        elem.innerText = ERROR;
    }
}

function sendRequest(event) {
    event.preventDefault();
    let form = new FormData();
    let request = new XMLHttpRequest();
    request.open("POST", "/admin", true);
    request.send(form); // отправка данных
    request.onload = function () {
        if(request.status === 200) {
            responseHandler(request.responseText);
        }
    }
}