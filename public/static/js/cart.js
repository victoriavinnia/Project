let minus = document.querySelectorAll(".minus");
console.log(minus);
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
        let total_currency = document.getElementById('total-currency-' + articul); //стоимость
        total_currency.innerText = 0;
        console.log(total_currency);
    } else {
        count.innerText--;
        let total_currency = document.getElementById('total-currency-' + articul);
        let price = document.getElementById('currency-'+ articul);
        total_currency.innerText = price.innerText * count.innerText;
    }
}

let plus = document.querySelectorAll(".plus");
console.log(plus);
for (let pl of plus) {
    pl.addEventListener("click", plusProduct);
}

function plusProduct(event) {
    event.preventDefault();
    let articul = this.dataset.art;
    console.log(articul);
    let count = document.getElementById('total-count-' + articul);
    count.innerText++;
    let total_currency = document.getElementById('total-currency-' + articul);
    //console.log(total_currency);
    let price = document.getElementById('currency-'+ articul);
    total_currency.innerText = price.innerText * count.innerText;
    //console.log(total_currency);
}

let delet = document.querySelectorAll(".delete");
for (let del of delet) {
    del.addEventListener('click', deleteProduct)
}

function deleteProduct(event) {
    event.preventDefault();
    let articul = this.dataset.art;
    console.log(articul);
    document.getElementById('section-' + articul).remove();

}

const ADD = "Заказ оформлен";
const ERR = "Ошибка при оформлении заказа";

let input = document.getElementById('submitOrder');
input.addEventListener('click', makeOrderHandler);

function makeOrderHandler(event) {
    event.preventDefault();

    let data = orderDataHandler();
    console.log(data);
    let formData = new FormData();
    // console.log(formData);
    formData.append("order", JSON.stringify(data));
    console.log(formData);
    let request = new XMLHttpRequest();
    request.open("POST", "/cart", true);
    request.send(formData);

    request.onload = function () {
        if (request.status === 200) {
            console.log(request.responseText);
            let elem = document.getElementById("message");
            elem.innerHTML = ADD;
            alert(ADD);
        } else {
            let elem = document.getElementById("message");
            elem.innerHTML = ERR;
        }
    };
}

function orderDataHandler() {
    let section = document.getElementsByTagName('section');
 console.log(section);
    let data = [];
    let i = 0;
    for(let articul of section){
        let arr = {};
        let art = articul.dataset.art;
        let count = document.getElementById('total-count-' + art).innerHTML;
        let cost = document.getElementById('total-currency-' + art).innerHTML;
        let id = articul.dataset.id;
        arr['articul'] = art;
        arr['cost'] = cost;
        arr['count'] = count;
        arr['id'] = id;
        data[i] = arr;
        i++;
    }
    return data;
}