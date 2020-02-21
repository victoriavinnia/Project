// import countProduct from "./countProduct";

let minus = document.querySelectorAll(".minus");
// console.log(minus);
for (let min of minus) {
    min.addEventListener("click", minusProduct);
}

function minusProduct(event) {
    event.preventDefault();
    let articul = this.dataset.art;
    console.log(articul); // полчаем артикул товара
    let count = document.getElementById('total-count-' + articul);
    if (count.innerText <= 0) {
        count.innerText = 0;
        let total_currency = document.getElementById('total-currency-' + articul); //получили стоимость,
        // цена добавляется в свойство стоимости динамически
        total_currency.innerText = 0;
        console.log(total_currency);
    } else {
        count.innerText--;
    }
}

let plus = document.querySelectorAll(".plus");
// console.log(plus);
for (let pl of plus) {
    pl.addEventListener("click", plusProduct);
}

function plusProduct(event) {
    event.preventDefault();
    let articul = this.dataset.art;
    console.log(articul);
    let count = document.getElementById('total-count-' + articul);
    count.innerText++;
}

let button = document.querySelector(".add_to_cart");
// console.log(button);


const SUCCESS = "Товар добавлен";
const ERROR = "Ошибка при добавлении товара";

let makeOrder = document.forms.testTest;
makeOrder.addEventListener('submit', makeOrderHandler);

function makeOrderHandler(event) {
    event.preventDefault();

    let data = orderDataHandler();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(data);

    xhr.onload = function () {
        console.log(xhr.responseText);
        if (xhr.status === 200 && xhr.responseText === 'success') {
            console.log('rjneago');
        }
    };
}

function responseHandler(response) {
    // console.log(response);
    if (response == SUCCESS) {
        window.location.replace("/cart");
    } else if (response == ERROR) {
        let elem = document.getElementById("error");
        elem.innerText = ERROR;
    }
}

function orderDataHandler() {
    let inputData = document.getElementById('submitProduct');
    let div = document.getElementById('total-count-' + inputData.dataset.art);
    let count = div.innerHTML;

    let data = new FormData();
    data.append('articul', inputData.dataset.art);
    data.append('price', inputData.dataset.price);
    data.append('name', inputData.dataset.name);
    data.append('userId', inputData.dataset.userId);
    data.append('count', count);

    return data;
}

