import createMyElement from './createElement.js';
//dataOrderEats,dataOrderList,dataAdres 
//создаем article
const createOrderFinal = (dataOrderEats, dataOrderList, dataAdres) => {
    // console.log(dataOrderList);
    // console.log(dataOrderEats);

    const article = createMyElement('article', {
        className: 'order-final-result',
        id: 'orderFinal',
    });

    // const h5 = createMyElement('h5', {
    //     className: ' coffee_name',
    //     textContent: 'Оформление заказа',
    // });

    //  <ul class=" mt-20 mb-40" id="order-det">

    const ul = createMyElement('ul', {
        className: 'order-final-list',
        id: 'orderFinalList'
    });

    //<li id="t18" class="prices-order-item">Брови мягкая растушевка<span class="order-final-price">3000₽
    //</span></li >
    // for (let i = 0; i < dataOrderEats.length; i++) {
    let costResult = 0;
    dataOrderEats.forEach(data => {
        //console.log(data)
        costResult += parseInt(data['cost']);
        const li = createMyElement('li', {
            className: 'prices-order-item',
            textContent: data['title'],
        });
        const spanCount = createMyElement('span', {
            className: 'order-final-count',
            textContent: data['count'] + 'шт  ',
        });
        const span = createMyElement('span', {
            className: 'order-final-cost',
            textContent: data['cost'] + 'руб.',
        });
        const sp = createMyElement('span', {
            className: 'prices-order-det',
        });
        sp.append(spanCount, span);
        li.append(sp);

        ul.append(li);
    });

    dataOrderList.forEach(data => {
        // console.log(data)
        costResult += parseInt(data['cost']);
        const li = createMyElement('li', {
            className: 'prices-order-item',
            textContent: data['title'] + ',' + data['size'],
        });
        const spanCount = createMyElement('span', {
            className: 'order-final-count',
            textContent: data['count'] + 'шт  ',
        });
        const span = createMyElement('span', {
            className: 'order-final-cost',
            textContent: data['cost'] + 'руб.',

        });
        const sp = createMyElement('span', {
            className: 'prices-order-det',
        });
        sp.append(spanCount, span);
        li.append(sp);
        ul.append(li);
    });
    const p = createMyElement('p', {
        className: 'prices-order-total',

    });
    const spanCost = createMyElement('span', {
        className: 'cost',
        id: 'order-total',
        textContent: costResult + 'руб.',
    });
    const spantx = createMyElement('span', {

        textContent: 'Стоимость заказа:',
    });
    spantx.append(spanCost);
    p.append(spantx);

    const padres = createMyElement('p', {
        className: 'prices-order-adres',

    });
    const spanadres = createMyElement('span', {
        id: dataAdres[0]['id'],
        textContent: dataAdres[0]['adres'],
    });
    const spanadrtx = createMyElement('span', {
        textContent: 'Наш адрес: ',
    });

    padres.append(spanadrtx, spanadres);

    article.append(ul, p, padres);
    return article;
};

export default createOrderFinal;