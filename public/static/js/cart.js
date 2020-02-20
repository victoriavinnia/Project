// import countProduct from "/static/js/countProduct";
//
// // let section = document.querySelectorAll("section");
//
// countProduct();
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
        let total_currency = document.getElementById('total-currency-' + articul); //получили стоимость,
        // цена добавляется в свойство стоимости динамически
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

// let form = document.forms.cart;
// form.addEventListener('submit', makeOrderHandler);
//
// function makeOrderHandler(event) {
//     event.preventDefault();
//
//     let data = orderDataHandler();
//
//     let request = new XMLHttpRequest();
//     request.open("POST", this.action, true);
//     request.send(data);
//
//     request.onload = function () {
//      //   console.log(xhr.responseText);
//         if (request.status === 200) {
//             let elem = document.getElementById("message");
//             elem.innerHTML = ADD;
//             alert(ADD);
//             form.remove();
//         } else {
//             let elem = document.getElementById("message");
//             elem.innerHTML = ERR;
//         }
//     };
// }
//
// function orderDataHandler() {
//     let inputData = document.getElementById('submitOrder');
//     let div = document.getElementById('total-count-' + inputData.dataset.art);
//     let count = div.innerHTML;
//
//     let data = new FormData();
//     data.append('articul', inputData.dataset.art);
//     data.append('price', inputData.dataset.price);
//     data.append('name', inputData.dataset.name);
//     data.append('userId', inputData.dataset.userId);
//     data.append('count', count);
//
//     return data;
// }

let input = document.getElementById('submitOrder');
input.addEventListener('click', makeOrderHandler);

function makeOrderHandler(event) {
    event.preventDefault();

    let data = orderDataHandler();
    console.log(data);
    let formData = new FormData();
    formData.append("order", JSON.stringify(data));
    let request = new XMLHttpRequest();
    request.open("POST", "/cart", true);
    request.send(formData);

    request.onload = function () {
        if (request.status === 200) {
            console.log(request.responseText);
            let elem = document.getElementById("message");
            elem.innerHTML = ADD;
            alert(ADD);
            // let section = document.getElementsByTagName('section');
            // console.log(section);
            // section.remove();
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
        let cost = articul.dataset.currency;
        let count = articul.dataset.count;
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