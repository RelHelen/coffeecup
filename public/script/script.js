import createArticle from './modules/createArticle.js';
import createArticleEats from './modules/creatArticleEats.js';
import { creatDrinks, creatEats } from './display.js';
import { mapView } from './mapView.js';
mapView();
//меню tab
const tabDrinks = document.getElementById("tab-drinks");
const tabEats = document.getElementById("tab-eats");

const orderDrinkAdd = document.getElementById("order-drink-add");
const orderEatAdd = document.getElementById("order-eat-add");



const orderResult = document.getElementById("order-result");
const captionCoffe = ["Эспрессо", "Американо", "Капучино", "Латте", "Маккиато", "Моккачино", "Мокко"];
const capionOrderCoffe = ["Наименование", "Размер", "Сахар", "Сироп", "Количество кружек "];
let orderDetRemoveBTN, orderDetAddBTN, orderDetChangeBTN;

//order-result-article
let orderArticles = document.querySelectorAll(".order-result-article");
let orderDetAdds = document.querySelectorAll(".order-result-article .btn.btn-submit");
let orderDetRemove = document.querySelectorAll(".order-result-article .btn.btn-remove");

let orderDetSort = document.querySelectorAll('.order-det_sort');
let orderDetCost = document.querySelectorAll('.order-det_cost');
let orderDetPrice = document.querySelectorAll('.order-det_price');
let orderDetSize = document.querySelectorAll('.order-det_size');
let orderDetSugar = document.querySelectorAll('.order-det_sugar');
let orderDetSyrup = document.querySelectorAll('.order-det_syrup');
let orderDetCount = document.querySelectorAll('.order-det_count');
let price = orderDetPrice.innerText;

// формируем заказ coffee

let coffeeName = document.querySelector(".coffee_name");
let coffeeFilling = document.querySelector(".filling");
let btnOpt = document.querySelectorAll(".order_options input");
let btnSize = document.querySelectorAll(".order_size input");
let btnSugar = document.querySelectorAll(".order_sugar input");
let btnSyrup = document.querySelectorAll(".order_syrup input");
let cupSize = document.querySelector(".cup");

let addSugar = document.getElementById("addSugar");
let removeSugar = document.getElementById("removeSugar");
let addCount = document.getElementById("addCount");
let removeCount = document.getElementById("removeCount");
let countCup = document.getElementById("countCup");
let orderForm = document.getElementById('orderForm');



// конец формируем заказ coffee
//формируем заказ еды
let orderFormEats = document.getElementById('orderFormEats');
let orderOptionsEats = document.querySelectorAll(".order-options-eats-item");
let orderOptionsEatsSelect = document.querySelectorAll(".order-options-eats-item.select");
let orderCountInner = document.querySelectorAll(".order_count-inner");
let orderArticleEats = document.querySelectorAll("#order-article-eats");
//массив для еды
let dataOrderEats = JSON.parse(localStorage.getItem('dataOrderEatsListKey')) || [];
let optCaptionEats, optCountEats;
let resultCost = document.querySelector('#resultCost');
const menuOrder = document.getElementById("menuOrder");

const btnReadOrder = document.querySelector('#btn-readOrder');
creatDrinks();
tabDrinks.addEventListener('click', function(event) {
    creatDrinks();
    // изменяем заказ coffee

    coffeeName = document.querySelector(".coffee_name");
    coffeeFilling = document.querySelector(".filling");
    btnOpt = document.querySelectorAll(".order_options input");
    btnSize = document.querySelectorAll(".order_size input");
    btnSugar = document.querySelectorAll(".order_sugar input");
    btnSyrup = document.querySelectorAll(".order_syrup input");
    cupSize = document.querySelector(".cup");

    addSugar = document.getElementById("addSugar");
    removeSugar = document.getElementById("removeSugar");
    addCount = document.getElementById("addCount");
    removeCount = document.getElementById("removeCount");
    countCup = document.getElementById("countCup");
    orderForm = document.getElementById('orderForm');
    // конец изменяем заказ coffee

    //обновяем коллекции кнопок настроек
    btnOptDefined(btnOpt);
    btnSyrupDefined(btnSyrup);
    btnSizeDefined(btnSize);
    btnSugarDefined(btnSugar);
    //добавить сахар
    addSugar.addEventListener("click", () => {
        addCubicSugar(addSugar);
    });
    //удалить  сахар
    removeSugar.addEventListener("click", () => {
        removeCubicSugar(removeSugar);
    });

    //добавить количество кружек
    addCount.addEventListener("click", () => {
            addCountCup(addCount);
        })
        //удалить количество
    removeCount.addEventListener("click", () => {
        removeCountCup(removeCount);
    });

    //определяем элементы заказа
    orderArticles = document.querySelectorAll(".order-result-article");

    orderArticlesClick(orderArticles);
    // clearSelect(orderArticles, 'toogleArticle');


    //настройка кнопок   напитки/еда
    if (tabEats.classList.contains('select')) {
        tabEats.classList.remove('select');
    }
    //настройка кнопок добавить напитки/еды
    orderEatAdd.style.display = "none";
    orderDrinkAdd.style.display = "flex";

    tabDrinks.classList.add('select');
    //пересчет стоимости заказа
    calcResultContOrder();
});

tabEats.addEventListener('click', function(event) {
    creatEats();
    orderArticles = document.querySelectorAll(".order-result-article");
    orderOptionsEats = document.querySelectorAll(".order-options-eats-item");
    resultCost = document.querySelector('#resultCost');
    orderOptionsEatsDefined(orderOptionsEats);
    if (orderArticles) {
        // console.log('orderArticles->creatEats ', orderArticles);
        clearSelect(orderArticles, 'toogleArticle');
    }
    //настройка кнопок добавить напитки/еды
    //  orderEatAdd.style.display = "flex";
    orderEatAdd.style.display = "none";
    orderDrinkAdd.style.display = "none";
    //настройка кнопок   напитки/еда
    if (tabDrinks.classList.contains('select')) {
        tabDrinks.classList.remove('select');
    }
    tabEats.classList.add('select');
    showListoderEats(dataOrderEats);
    setListoderEats();
    // setOrderList();
});
//для опредления элементов заказа еды
const setListoderEats = function() {
    dataOrderEats = [];
    let orderOptionsEats = document.querySelectorAll(".order-options-eats-item");
    let orderEatsCost = document.querySelector('#order-eats-cost');
    let orderOptionsEatsSelect = document.querySelectorAll(".order-options-eats-item.select");
    // console.log('orderOptionsEatsSelect----', orderOptionsEatsSelect[0]);
    for (let order of orderOptionsEatsSelect) {
        // console.log('orderOptionsEatsSelect ID----', order.querySelector('.checkcake').getAttribute('id'));
        // console.log('***', parseInt(order.querySelector('.centerp').textContent));
        //  console.log('***', parseInt(order.querySelector('.order_count-inner .countcake').value));
        dataOrderEats.push({
            id: order.getAttribute('data-id'),
            inpId: order.querySelector('.checkcake').getAttribute('id'),
            caption: order.querySelector('.checkcake').getAttribute('data-caption'),
            title: order.querySelector('.checkcake+label').textContent,
            count: order.querySelector('.order_count-inner .countcake').value,
            price: order.querySelector('.centerp').textContent,
            cost: parseInt(order.querySelector('.centerp').textContent) * parseInt(order.querySelector('.order_count-inner .countcake').value),
        });
    }

    if (localStorage.dataOrderEatsListKey) {
        localStorage.removeItem('dataOrderEatsListKey');
        localStorage.setItem('dataOrderEatsListKey', JSON.stringify(dataOrderEats));

        //вывод внизу в меню
        orderArticleEats = document.querySelector("#order-article-eats");
        console.log("orderArticleEats", orderArticleEats);
        orderArticleEats.remove();

        //создали пункты в заказе
        orderArticleEats = createArticleEats(dataOrderEats);
        console.log("orderesEats", orderArticleEats);
        orderResult.prepend(orderArticleEats);


        ////пересчет стоимости заказа
        calcResultContOrder();
    } else {
        localStorage.setItem('dataOrderEatsListKey', JSON.stringify(dataOrderEats));
    }

};
//одсчет итоговой стоимости
function calcResultContOrder() {
    let eats = JSON.parse(localStorage.getItem('dataOrderEatsListKey'));
    let drinks = JSON.parse(localStorage.getItem('dataOrderListKey'));
    let eatsC = eats.reduce(function(currentSum, currentObj) {
        return currentSum + parseInt(currentObj.cost)
    }, 0);
    let drinkC = drinks.reduce(function(currentSum, currentObj) {
        return currentSum + parseInt(currentObj.cost)
    }, 0);
    console.log("eatsC==", eatsC);
    console.log("drinkC==", drinkC);
    let sum = eatsC + drinkC;
    resultCost.textContent = sum;
    //let order = [...eats, ...drinks, sum];
    let order = [];

    order.push(drinks);
    order.push(eats);
    order.push(sum)
        //console.log('order=====', order);
    if (localStorage.dataOrderKey) {
        localStorage.removeItem('dataOrderKey');
        localStorage.setItem('dataOrderKey', JSON.stringify(order));
    }
}
//для вывода элементов заказа еды на display
const showListoderEats = function(dataOrderEats) {
    orderOptionsEats = document.querySelectorAll(".order-options-eats-item");
    [...dataOrderEats].forEach(order => {
        let searchEl = document.querySelector('[data-caption=' + order.caption + ']');
        let searchElParent = searchEl.closest("div.order-options-eats-item");
        toggleOptionsEats(searchElParent, 'select', 1);
        searchElParent.setAttribute('data-id', order.id);
        searchElParent.querySelector(".countcake").value = order.count;
    })
}
orderFormEats.addEventListener('change', function() {
    setListoderEats();
});
orderForm.addEventListener('click', function() {
    ////пересчет стоимости заказа
    calcResultContOrder();
})

//виды еды
const orderOptionsEatsDefined = (btnOpt) => {
    [...btnOpt].forEach((button) => {
        button.addEventListener("click", (e) => {
            toggleOptionsEats(button, 'select');
        });
    });
};
//при клике на карточке еды
const toggleOptionsEats = function(button, select, vid) {
    //vid==1  для вывода на дисплей из сохранения
    optCaptionEats = button.querySelector(".checkcake");
    orderCountInner = button.querySelector(".order_count-inner");
    optCountEats = orderCountInner.querySelector(".countcake");
    let optAddCountEats = orderCountInner.querySelector("#addCount");
    let optRemoveCountEats = orderCountInner.querySelector("#removeCount");
    let t = new Date().getTime();
    if (!vid) {
        if (optCaptionEats.checked) {
            console.log('нажата', orderCountInner);
            button.classList.add('select');
            button.setAttribute('data-id', t);
            optCountEats.classList.add('select');
            addCountCake(orderCountInner);
        } else {
            console.log('ненажата');
            button.classList.remove('select');
            button.removeAttribute('data-id');
            optCountEats.classList.remove('select');
            // addCountCake(optCountEats);
        }
    } else {
        if (optCaptionEats.checked == false) {
            console.log('определно как ненажата поэтому устанавливаем нажато', button);
            button.classList.add('select');
            optCountEats.classList.add('select');
            optCaptionEats.checked = true;
        }
    }


    //console.log(optCaptionEats);
    // console.log(optCountEats);
}
const addCountCake = (btn) => {
    //console.log('````````````````btn``````````````', btn);
    let optCountEats = btn.querySelector(".countcake");
    let optAddCountEats = btn.querySelector(".addCount");
    let optRemoveCountEats = btn.querySelector(".removeCount");
    let val = parseInt(optCountEats.getAttribute('value'));
    // console.log('val --val ---val', val);
    optAddCountEats.addEventListener('click', function(e) {
        if ((val >= 0) && (val < 20)) {
            ++val;
            optCountEats.setAttribute('value', val);
            // console.log('val +val +val', optCountEats.getAttribute('value'));
            setListoderEats(optCountEats.getAttribute('value'));
        };

    })
    optRemoveCountEats.addEventListener('click', function(e) {
        // console.log('val --val ---val', val);
        if ((val >= 1) && (val < 20)) {
            --val;
            optCountEats.setAttribute('value', val);
            setListoderEats();
        };

    })


};
//описать детали заказа заказа
setOrderList();

function setOrderList() {
    console.log('определение заказа: ');
    let orderes = [];
    let orderesDrinks = [];
    let orderesEats = [];
    let createOrd, createOrders, createOrdEats;

    if (localStorage.dataOrderListKey) {
        orderesDrinks = JSON.parse(localStorage.getItem('dataOrderListKey'));
        //создали пункты в заказе       
        orderesDrinks.forEach(item => {
            createOrd = createArticle(capionOrderCoffe, item);
            orderResult.append(createOrd);
            createOrd.querySelector('.btn.btn-submit').style.backgroundColor = "var(--button-select-color)";
            createOrd.querySelector('.btn.btn-submit').textContent = "Добавлено";
        })
    }
    createOrders = orderResult.querySelectorAll('.order-result-article');
    if (localStorage.dataOrderEatsListKey) {
        orderesEats = JSON.parse(localStorage.getItem('dataOrderEatsListKey'));
        //создали пункты в заказе 
        createOrdEats = createArticleEats(orderesEats);
        //  console.log("orderesEats", orderesEats);
        orderResult.prepend(createOrdEats);
    }
    //  console.log("createOrdEats", createOrdEats);
    //  console.log("orderesDrinks", orderesDrinks);
    ////пересчет стоимости заказа
    calcResultContOrder();
};

//добавить напиток в заказ
orderDrinkAdd.addEventListener("click", function() {

    let orderes = [{
        count: "",
        size: "",
        sugar: "",
        syrup: "",
        title: "",
        price: "",
        cost: ""
    }];
    const createOrd = createArticle(capionOrderCoffe, orderes);
    orderResult.prepend(createOrd);
    orderArticles = orderResult.children;
    orderDetAdds = document.querySelectorAll(".order-result-article .btn.btn-submit");
    orderDetRemove = document.querySelectorAll(".order-result-article .btn.btn-remove");
    orderDetAdds = [...orderDetAdds];
    orderDetRemove = [...orderDetRemove];
    orderArticlesClick(orderArticles);
    ////пересчет стоимости заказа
    calcResultContOrder();
    return orderArticles;
});

let current_element = null;
let current_element2 = null;
let current_element3 = null;


const setCaptionDiv = function(element, ind) {
    // console.log('setCaptionDiv element', element);
    let parentOrdDiv = element.closest("div");
    let captionOrdDiv = parentOrdDiv.querySelector("h6");
    if (ind >= 0) return captionOrdDiv.innerText = capionOrderCoffe[ind] + ":"
    else return captionOrdDiv.innerText = "";
};

const changeCoffeeType = (selected) => {
    if (current_element) {
        current_element.classList.remove("selected");
        coffeeFilling.classList.remove(current_element.id);
    }
    current_element = selected;
    // console.log('current_element', current_element);
    //console.log(coffee_filling);
    coffeeName.innerText = selected.dataset.caption;
    coffeeFilling.classList.add(current_element.id);
    current_element.classList.add("selected");
    console.log('orderDetSort: ', orderDetSort);

    // setCaptionDiv(orderDetSort, 0);
    orderDetSort.innerText = selected.dataset.caption;
    console.log('selected.dataset.price: ', selected.dataset.price);

    orderDetPrice.innerText = selected.dataset.price;
    // console.log('orderDetPrice: ', orderDetPrice.innerText);

};

const setActiveType = (element) => {
    element.toggleClass("selected");
};

const setSizeType = (element) => {
    if (current_element2) {
        current_element2.classList.remove("selected");
        cupSize.classList.remove(current_element2.id);
    }
    current_element2 = element;
    current_element2.classList.add("selected");
    cupSize.classList.add(current_element2.id);

    setCaptionDiv(orderDetSize, 1);
    orderDetSize.innerText = element.dataset.caption + 'мл';
    calCost(element);
};
const setCubicSugar = (element, length) => {
    let kolCubic = element.getAttribute('id').slice(-1);
    let kolCubicR = +kolCubic;
    length = length - 2;

    let idEl = element.getAttribute('id');
    current_element3 = element;

    setCaptionDiv(orderDetSugar, 2);
    orderDetSugar.innerText = kolCubic + "шт";

    // console.log(kolCubicR);
    while (kolCubicR <= length) {
        if (document.getElementById(`sugar_${kolCubicR}`)) {
            document.getElementById(`sugar_${kolCubicR}`).classList.remove("selected");
            //console.log(document.getElementById(`sugar_${kolCubicR}`));
        }
        ++kolCubicR;
    }

    while (kolCubic) {
        if (document.getElementById(`sugar_${kolCubic}`)) {
            document.getElementById(`sugar_${kolCubic}`).classList.add("selected");
            //console.log(document.getElementById(`sugar_${kolCubic}`));
        }
        --kolCubic;
    }

};
const addCubicSugar = (btn) => {
    const btnSugarSel = document.querySelectorAll(".order_sugar input.selected");
    let leng = [...btnSugarSel].length + 1;
    if (document.getElementById(`sugar_${leng}`)) {
        document.getElementById(`sugar_${leng}`).classList.add("selected");
    }
    setCaptionDiv(orderDetSugar, 2);
    orderDetSugar.innerText = leng;

};
const removeCubicSugar = (btn) => {
    const btnSugarSel = document.querySelectorAll(".order_sugar input.selected");
    let leng = [...btnSugarSel].length;
    if (document.getElementById(`sugar_${leng}`)) {
        document.getElementById(`sugar_${leng}`).classList.remove("selected");
    }
    if ((leng - 1) > 0) {

        setCaptionDiv(orderDetSugar, 2);
        orderDetSugar.innerText = leng - 1;
    } else {
        setCaptionDiv(orderDetSugar, -1);
        orderDetSugar.innerText = '';
    }

};
const addCountCup = (btn) => {
    let val = parseInt(countCup.getAttribute('value'));
    if ((val >= 0) && (val < 20)) {
        val++;
        countCup.setAttribute('value', val);
    };
    setCaptionDiv(orderDetCount, 4);
    orderDetCount.innerText = val;
    calCost(orderDetCount);
};
const removeCountCup = (btn) => {
    let val = parseInt(countCup.getAttribute('value'));
    if (val > 0) {
        val--
        countCup.setAttribute('value', val);
    };
    if ((val) > 0) {
        setCaptionDiv(orderDetCount, 4);
        orderDetCount.innerText = val;

    } else {
        setCaptionDiv(orderDetCount, -1);
        orderDetCount.innerText = "";
        resetOrder();
    }
    calCost(orderDetCount);
};

//сорт
const btnOptDefined = (btnOpt) => {
    [...btnOpt].forEach((button) => {
        current_element = null;
        cupSize.style.backgroundColor = "#48b19f";
        button.addEventListener("click", () => {
            cupSize.style.backgroundColor = "#fff";
            changeCoffeeType(button);
        });
    });
};

function calCost(element) {
    //  orderDetPrice = document.querySelector('.order-det_price');
    let price = parseInt(orderDetPrice.innerText);
    let cost = price;
    let k = 1;

    //   console.log('orderDetPrice: ', price);
    //  console.log('typeof element ==: ', element.length);
    console.log('-- element ==: ', element);

    //какой  размер стакана
    if (element.localName && element.getAttribute('name') == 'coffee_size') {
        console.log('order element ==: ', element.getAttribute('name'));
        if (element.dataset.caption == '250') {
            //orderDetCost.innerText = price;
            cost = price;
            console.log("!");
        }
        if (element.dataset.caption == '350') {
            // orderDetCost.innerText = Math.ceil(price * 1.1);
            cost = Math.ceil(price * 1.1);
            console.log("!!");
        }
        if (element.dataset.caption == '450') {
            //orderDetCost.innerText = Math.ceil(price * 1.4);
            cost = Math.ceil(price * 1.4);
            console.log("!!!");
        }
    }
    //сколько сиропа
    if (element.localName == undefined) {
        cost = 20 * element.length + cost;
        // orderDetCost.innerText = 20 * arr.length + parseInt(orderDetCost.innerText);
    }
    //количество кружек
    if (element.localName && (element.id == 'order-det_count')) {

        k = parseInt(element.innerText);
        let val = parseInt(countCup.getAttribute('value'));
        console.log("k=", k);
        console.log("val=", val);
    }
    //
    orderDetCost.innerText = cost * k;
}


//сироп
const btnSyrupDefined = (btnSyrup) => {
    [...btnSyrup].forEach((button) => {
        button.addEventListener("change", (e) => {
            let arr = [];
            [...btnSyrup].forEach(btn => {
                if (btn.checked) {
                    arr.push(btn)
                }
            });
            // console.log(arr);
            // if (e.target.matches(":checked")) {
            //     orderDetSize.innerText = e.target.dataset.caption;
            // }
            if (arr.length > 0) {
                setCaptionDiv(orderDetSyrup, 3);
            } else {
                setCaptionDiv(orderDetSyrup, -1);
            }

            orderDetSyrup.innerText = '';

            // orderDetCost.innerText = 20 * arr.length + parseInt(orderDetCost.innerText);

            calCost([...arr]);
            // console.log(" orderDetCost.innerText", orderDetCost.innerText);
            arr.forEach(btnCap => {
                orderDetSyrup.innerText += "  " + btnCap.dataset.caption + ',';
            })

        });
    });
};
//размер
const btnSizeDefined = (btnSize) => {
    [...btnSize].forEach((button) => {
        current_element2 = null;
        // if (button.matches('#ml450')) {
        //     button.classList.add("selected");
        // }
        button.addEventListener("click", () => {
            document.getElementById('ml450').classList.remove("selected");
            setSizeType(button);
        });
    });
};
// сахар
const btnSugarDefined = (btnSugar) => {
    [...btnSugar].forEach((button) => {
        current_element3 = null;
        let arr = [];
        //arr.push(button);
        //arr = [...btnSugar];
        let leng = [...btnSugar].length;
        //console.log(leng);
        button.addEventListener("click", () => {
            setCubicSugar(button, leng);
        });
    })
};



//детали заказа
orderForm.addEventListener("change", (e) => {
    // dataOrderEats = [];
    // dataOrderEats.push({});

    /*
    orderDetCount.innerText = parseInt(countCup.getAttribute('value'));

    //  setCaptionDiv(orderDetCount, 4);
    // var vidNomer = $(this).val();
    //const capionOrderCoffe = ["Наименование", "Размер", "Сахар", "Сироп", "Количество кружек "];
    let dataOrder = [];
    // if (orderDetSort || orderDetSize || orderDetSugar || orderDetSyrup || orderDetCount) {}

    dataOrder.push({
        title: orderDetSort.innerText,
        size: orderDetSize.innerText,
        sugar: orderDetSugar.innerText,
        syrup: orderDetSyrup.innerText,
        count: orderDetCount.innerText,
    });
    //  console.log(dataOrder);
*/

});

orderArticlesClick(orderArticles);

//очистка формы coffe
function clearFormCoffee() {
    let orderFormItem = orderForm.querySelectorAll('input');
    let filling = orderForm.querySelector('.filling.reset');
    filling.setAttribute('class', 'filling reset');
    cupSize.style.backgroundColor = "var( --cup-color)";
    countCup.setAttribute('value', '1');
    if (orderFormItem) {
        [...orderFormItem].forEach(e => {
            e.classList.remove('selected');
            e.checked = false;
        })

    }
}
//отмена выделения элемнта  
//elements- коллекция
//classElement - название класса
function clearSelect(elements, classElement) {

    [...elements].forEach((element) => {
        if (element.classList.contains(classElement)) {
            element.classList.remove(classElement);
        }
    })
}
//добавляем выделения элемнта  
//elements- коллекция
//classElement - название класса
function addSelect(element, classElement) {
    if (!element.classList.contains(classElement)) {
        element.classList.add(classElement);
    }
}

function orderArticlesClick(orderArticles) {

    [...orderArticles].forEach((element) => {
        element.addEventListener("click", () => {
            //очистка формы coffe
            clearFormCoffee();
            //отмена выделенияэлемнта article
            clearSelect(orderArticles, 'toogleArticle');
            //определение  элементов в текущем article

            //детализация заказа
            orderDetSort = element.querySelector('.order-det_sort');
            orderDetSize = element.querySelector('.order-det_size');
            orderDetSugar = element.querySelector('.order-det_sugar');
            orderDetSyrup = element.querySelector('.order-det_syrup');
            orderDetCount = element.querySelector('.order-det_count');
            orderDetPrice = document.querySelector('.order-det_price');
            orderDetCost = document.querySelector('.order-det_cost');
            price = orderDetPrice.innerText;
            //кнопки заказа
            orderDetRemoveBTN = element.querySelector(".btn.btn-remove");
            orderDetAddBTN = element.querySelector(".btn.btn-submit");
            orderDetChangeBTN = element.querySelector(".btn.btn-change");
            orderDetChangeBTN.addEventListener("mouseout", (e) => {
                orderDetChangeBTN.style.backgroundColor = "var(--button-selec-default)";
            });
            //  console.log('текущий артикл ', element);
            //  console.log('текущий orderDetSort ', orderDetSort);
            element.classList.toggle('toogleArticle');
            //  console.log('Выбран заказ', element.getAttribute('data-id'));;

            orderDetRemoveClick(orderDetRemoveBTN);
            orderDetAddsClick(orderDetAddBTN);
            orderDetChangeClick(orderDetChangeBTN);
        });

    });
}


//при клике на кнопку добавить  в заказ пункт
function orderDetAddsClick(button) {
    // [...orderDetAdds].forEach((button) => {})
    button.addEventListener("click", (e) => {
        //  console.log('добавить  в заказ пункт', button);
        if (e.target.matches('.btn.btn-submit')) {
            // console.log(e.target);
            let dataOrderList = [];
            const parentOrderDetails = e.target.closest(".order-result-article");
            // console.log(parentOrderDetails);
            const orderDetails = parentOrderDetails.querySelectorAll(".order-det-item");
            // console.log(orderDetails);
            [...orderDetails].forEach((item) => {
                // console.log(item);
                dataOrderList.push(item.innerText);
            });
            // console.log(dataOrderList);
            let t = new Date().getTime();

            let dataOrderListKey = JSON.parse(localStorage.getItem('dataOrderListKey')) || [];
            parentOrderDetails.setAttribute('data-id', t);
            dataOrderListKey.push({
                id: t,
                title: dataOrderList[0],
                size: dataOrderList[1],
                sugar: dataOrderList[2],
                syrup: dataOrderList[3],
                count: dataOrderList[4],
                price: dataOrderList[5],
                cost: dataOrderList[6],

            });
            //  console.log(dataOrderListKey);
            e.target.style.backgroundColor = "var(--button-select-color)";
            e.target.textContent = "Добавлено";
            localStorage.setItem('dataOrderListKey', JSON.stringify(dataOrderListKey));
        }

    })

};



//при клике на кнопку отмена пункт   заказа
function orderDetRemoveClick(button) {
    //[...orderDetRemove].forEach((button) => {})
    button.addEventListener("click", (e) => {
        //  console.log('---отмена пункт----', e.target);
        if (e.target.matches('.btn.btn-remove')) {
            // console.log(e.target);
            const parentOrderDetails = e.target.closest(".order-result-article");
            //console.log('parentOrderDetails', parentOrderDetails);
            let key = parentOrderDetails.getAttribute('data-id');
            //   e.target.style.backgroundColor = "#fdfd00";

            let data = JSON.parse(localStorage.getItem('dataOrderListKey'));
            // console.log('data:', data);
            let objOrder = data.filter((obj) => {
                if (obj['id'] != key) {
                    return obj
                }
            });
            // console.log('objOrder', objOrder);
            localStorage.setItem('dataOrderListKey', JSON.stringify(objOrder));
            parentOrderDetails.remove();

        }

    })

}
//при клике на кнопку изменить пункт   заказа
function orderDetChangeClick(button) {
    //[...orderDetRemove].forEach((button) => {})
    button.addEventListener("click", (e) => {
        // console.log('---изменить пункт----', e.target);
        if (e.target.matches('.btn.btn-change')) {
            // console.log(e.target);
            const parentOrderDetails = e.target.closest(".order-result-article");
            //   console.log('parentOrderDetails', parentOrderDetails);
            let key = parentOrderDetails.getAttribute('data-id');

            let data = JSON.parse(localStorage.getItem('dataOrderListKey'));
            // console.log('data:', data);

            // console.log('key', key);

            let dataOrderList = [];
            const orderDetails = parentOrderDetails.querySelectorAll(".order-det-item");
            [...orderDetails].forEach((item) => {
                // console.log(item);
                dataOrderList.push(item.innerText);
            });
            // console.log(dataOrderList);


            let dataOrderListKey = []

            dataOrderListKey.push({
                // id: t,
                title: dataOrderList[0],
                size: dataOrderList[1],
                sugar: dataOrderList[2],
                syrup: dataOrderList[3],
                count: dataOrderList[4],
                price: dataOrderList[5],
                cost: dataOrderList[6],
            });
            //  console.log(dataOrderListKey);
            let objOrder = [];
            objOrder = data.map((obj) => {
                if (obj['id'] == key) {
                    // console.log('dataOrderListKey', dataOrderListKey);
                    return dataOrderListKey[0]

                } else return obj
            });
            e.target.style.backgroundColor = "var(--button-select-color)";
            localStorage.setItem('dataOrderListKey', JSON.stringify(objOrder));

        }

    })

}
//}
//}
//}
function onVisibleMenu() {
    menuOrder.classList.add('onVisibleMenu');
}

btnReadOrder.addEventListener('click', onVisibleMenu);
//   localStorage.setItem('dataOrderKey', JSON.stringify(order));