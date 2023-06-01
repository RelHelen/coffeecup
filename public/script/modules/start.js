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
const createArticle = () => {
    const article = createMyElement('article', {
        className: 'order-result-article',
        id: 'order-det',
    });



    //  <div class="order-details">
    const divOrDet = createMyElement('div', {
        className: 'order-details',
    });
    //<div class=" order-det-img "><img src="img/cup0.png" alt=" "></div>

    const divOrImg = createMyElement('div', {
        className: 'order-det-img',
    });
    const img = createMyElement('img', {
        src: 'img/cup0.png',
    });
    divOrImg.append(img);
    /*
    <div>
      <h6></h6>
      <p id="order-det_sort" class="order-det-item caption-txt"> </p>
    </div>
     */
    const divsort = createMyElement('div', {});
    const h6 = createMyElement('h6', {});
    const psort = createMyElement('p', {
        className: 'order-det-item order-det_sort caption-txt',
        id: 'order-det_sort',
    });
    divsort.append(h6, psort);
    /**
     *  <div>
                    <h6> </h6>
                    <p id="order-det_size" class="order-det-item"> </p>
                </div>
     */
    const divsize = createMyElement('div', {});
    const psize = createMyElement('p', {
        className: 'order-det-item order-det_size caption-txt',
        id: 'order-det_size',
    });
    divsize.append(h6, psize);
    /**
    *   <div>
                    <h6> </h6>
                    <p id="order-det_sugar" class="order-det-item"> </p>
                </div>
    */
    const divsugar = createMyElement('div', {});
    const psugar = createMyElement('p', {
        className: 'order-det-item order-det_sugar caption-txt',
        id: 'order-det_sugar',
    });
    divsugar.append(h6, psugar);
    /**
    *   <div>
                    <h6> </h6>
                    <p id="order-det_syrup" class="order-det-item"> </p>
                </div>
    */
    const divsyrup = createMyElement('div', {});
    const psyrup = createMyElement('p', {
        className: 'order-det-item order-det_syrup caption-txt',
        id: 'order-det_syrup',
    });
    divsyrup.append(h6, psyrup);
    /**
    *    <div>
                    <h6> </h6>
                    <p id="order-det_count" class="order-det-item"> </p>
                </div>
    */
    const divcount = createMyElement('div', {});
    const pcount = createMyElement('p', {
        className: 'order-det-item order-det_count caption-txt',
        id: 'order-det_count',
    });
    divcount.append(h6, pcount);
    divOrDet.append(divOrImg, divsort, divsize, divsugar, divsyrup, divcount);
    /* <div class="order-price"></div>*/
    const divOrPrice = createMyElement('div', {
        className: 'order-price',
    });
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
        id: 'order-det-add',
        textContent: 'Добавить',
    });
    const divBtnChange = createMyElement('div', {
        className: 'btn btn-change',
        id: 'order-det-change',
        textContent: 'Изменить',
    });
    const divBtnRemove = createMyElement('div', {
        className: 'btn btn-remove',
        id: 'order-det-remove',
        textContent: 'Отменить',
    });
    divOrdBtns.append(divBtnSubmit, divBtnChange, divBtnRemove);
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