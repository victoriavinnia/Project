let section  = document.querySelectorAll("section");
let minus = document.querySelectorAll(".minus");
console.log(minus);
for (let min of minus){
    min.addEventListener("click", minusProduct);
}

function minusProduct(event) {
    event.preventDefault();
    let articul = this.dataset.art;
    console.log(articul); // полчаем артикул товара
    let count = document.getElementById('total-count-' + articul);
    if((count.innerText) <= 0) {
        count.innerText = 0;
        let total_currency = document.getElementById('total-currency-'+ articul); //получили стоимость,
                                                                        // цена добавляется в свойство стоимости динамически
        total_currency.innerText = 0;
        console.log(total_currency);
    } else {
        count.innerText --;
        let total_currency = document.getElementById('total-currency-'+ articul);
        total_currency.innerText = total_currency.dataset.currency * count.innerText;
    }
}

let plus = document.querySelectorAll(".plus");
console.log(plus);
for (let pl of plus){
    pl.addEventListener("click", plusProduct);
}
function plusProduct(event) {
    event.preventDefault();
    let articul = this.dataset.art;
    console.log(articul);
    let count = document.getElementById('total-count-'+ articul);
    count.innerText ++;
    let total_currency = document.getElementById('total-currency-' + articul);
    console.log(total_currency);
    total_currency.innerText = total_currency.dataset.currency * count.innerText;
    //console.log(total_currency);
}

let delet = document.querySelectorAll(".delete");
for(let del of delet) {
    del.addEventListener('click', deleteProduct)
}
function deleteProduct(event) {
    event.preventDefault();
    let articul = this.dataset.art;
    console.log(articul);
    document.getElementById('section-' + articul).remove();

}

