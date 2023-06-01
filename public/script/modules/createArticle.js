import createMyElement from './createElement.js';
//создаем h1
const createTitle = (title) => {
    const h1 = createMyElement('h1', {
        className: 'title',
        textContent: title,
    });
    return h1;
};
//создаем article
const createArticle = (capionOrderCoffe, orderes) => {
    const article = createMyElement('article', {
        className: 'order-result-article',
        id: 'order-det',
    });
    article.dataset.id = orderes['id'] || '';
    //console.log('element', element);

    //  <div class="order-details">
    const divOrDet = createMyElement('div', {
        className: 'order-details',
    });
    //<div class=" order-det-img "><img src="img/cup0.png" alt=" "></div>

    const divOrImg = createMyElement('div', {
        className: 'order-det-img',
    });
    const img = createMyElement('img', {
        src: './img/product/cup0.png',
    });
    // divOrImg.append(img);
    divOrImg.appendChild(img);
    /*
    <div>
      <h6></h6>
      <p id="order-det_sort" class="order-det-item caption-txt"> </p>
    </div>
     */
    const divsort = createMyElement('div', {});
    const h6s = createMyElement('h6', {});
    const psort = createMyElement('p', {
        className: 'order-det-item order-det_sort caption-txt',
        id: 'order-det_sort',
        textContent: orderes['title']
    });
    //divsort.append(h6s, psort);
    divsort.appendChild(h6s);
    divsort.appendChild(psort);
    /**
     *  <div>
                    <h6> </h6>
                    <p id="order-det_size" class="order-det-item"> </p>
                </div>
     */
    const divsize = createMyElement('div', {});
    const h6ss = createMyElement('h6', {
        textContent: capionOrderCoffe[1]
    });
    const psize = createMyElement('p', {
        className: 'order-det-item order-det_size caption-txt',
        id: 'order-det_size',
        textContent: orderes['size']
    });
    // divsize.append(h6ss, psize);
    divsize.appendChild(h6ss);
    divsize.appendChild(psize);

    /**
    *   <div>
                    <h6> </h6>
                    <p id="order-det_sugar" class="order-det-item"> </p>
                </div>
    */
    const divsugar = createMyElement('div', {

    });
    const h6su = createMyElement('h6', {
        textContent: capionOrderCoffe[2]
    });
    const psugar = createMyElement('p', {
        className: 'order-det-item order-det_sugar caption-txt',
        id: 'order-det_sugar',
        textContent: orderes['sugar']
    });
    //divsugar.append(h6su, psugar);
    divsugar.appendChild(h6su);
    divsugar.appendChild(psugar);

    /**
    *   <div>
                    <h6> </h6>
                    <p id="order-det_syrup" class="order-det-item"> </p>
                </div>
    */
    const divsyrup = createMyElement('div', {});
    const h6sy = createMyElement('h6', {
        textContent: capionOrderCoffe[3]

    });
    const psyrup = createMyElement('p', {
        className: 'order-det-item order-det_syrup caption-txt',
        id: 'order-det_syrup',
        textContent: orderes['syrup']
    });
    divsyrup.append(h6sy, psyrup);
    /**
    *    <div>
                    <h6> </h6>
                    <p id="order-det_count" class="order-det-item"> </p>
                </div>
    */
    const divcount = createMyElement('div', {});
    const h6cs = createMyElement('h6', {
        textContent: capionOrderCoffe[4]

    });
    const pcount = createMyElement('p', {
        className: 'order-det-item order-det_count caption-txt',
        id: 'order-det_count',
        textContent: orderes['count']
    });
    divcount.append(h6cs, pcount);
    divOrDet.append(divOrImg, divsort, divsize, divsugar, divsyrup, divcount);
    /* <div class="order-price"></div>*/

    const divOrPrice = createMyElement('div', {
        className: 'order-price',
    });
    //стоимотc
    const h6cost = createMyElement('h6', {
        className: 'order-det-item order-det_cost',
        textContent: orderes['cost']

    });
    const spancost = createMyElement('span', {
        className: 'order-det-item order-det_price',
        textContent: orderes['price']
    });

    divOrPrice.append(spancost, h6cost);
    /**    <div class="order-btns">
                            <div class="btn btn-submit" id="order-det-add">Добавить
                                <span></span>
                            </div>
                            <div class="btn btn-change" id="order-det-add">Изменить
                                <span></span>
                            </div>
                            <div class="btn btn-reset" id="order-det-remove">Отменить
                                <span></span>
                            </div>
            </div> */
    const divOrdBtns = createMyElement('div', {
        className: 'order-btns',
    });
    const divBtnSubmit = createMyElement('div', {
        className: 'btn btn-submit',
        textContent: 'Добавить',
    });
    const divBtnChange = createMyElement('div', {
        className: 'btn btn-change',
        textContent: 'Изменить',
    });
    const divBtnRemove = createMyElement('div', {
        className: 'btn btn-remove',

        textContent: 'Отменить',
    });
    // const divResult = createMyElement('div', {
    //     id: 'resultCost',
    //     className: 'resultCost',
    // });
    //divOrdBtns.append(divBtnSubmit, divBtnChange, divBtnRemove);
    divOrdBtns.appendChild(divBtnSubmit);
    divOrdBtns.appendChild(divBtnChange);
    divOrdBtns.appendChild(divBtnRemove);
    article.append(divOrDet, divOrPrice, divOrdBtns);
    //
    //   console.log(' article ', article);
    return article;
};
//start  выводит элемент
// const startCreateArticle = () => {

//     const articleDet = createArticle();

//     return articleDet;
// };
export default createArticle;