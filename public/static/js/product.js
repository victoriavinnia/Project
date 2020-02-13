let button = document.querySelector(".add_to_cart");
console.log(button);

button.addEventListener('click', addToCart);
// добавления товара в корзину
// let cart = {}; // корзина
function addToCart() {
    let articul = this.dataset.art;
    // if (cart[articul] !== null) {
    //     cart[articul]++;
    // }
    // else {
    //     cart[articul] = 1;
    // }
    // console.log(cart);
    console.log(articul);
}
function buttonClick() {
    let span = document.getElementById('elem');
    span.innerHTML ++;
}

const SUCCESS = "Товар добавлен";
const ERROR = "Ошибка при добавлении товара";

function responseHandler(response) {
    console.log(response);
    if (response == SUCCESS) {
        window.location.replace("/cart");
    } else if (response == ERROR) {
        let elem = document.getElementById("error");
        elem.innerText = ERROR;
    }
}

function sendRequest(event) {
    event.preventDefault();
    let art = this.dataset.art;
    let request = new XMLHttpRequest();
    request.open("POST", "/product", true);
    request.send(art); // отправка данных
    request.onload = function () {
        if(request.status === 200) {
            responseHandler(request.responseText);
        }
    }
}