mapView();

function mapView() {
    ymaps.ready(init);
    let map, geoResult;
    let tx_description = "Адрес:",
        tx_tel = "Телефон:",
        tx_dop = "Описание:",
        tx_prise = "Цена (р/ч):";
    const mapPlase = document.querySelector('#mapPlase');
    const resultPlase = document.querySelector('#resultPlase');
    var path = 'http://localhost/coffeecup';
    var adminpath = 'http://localhost/coffeecup/admin';
    // console.log(path + '/catalog/map');
    let centerX = 39.72,
        centerY = 47.23;
    let point = [47.22318327289756, 39.71379659611505]
    let res, xhttp;

    //var a = fetch(path + '/catalog/map')
    function init() {
        var a = fetch(path + '/catalog/map')
            .then(function(response) {
                return response.json()
            }).then(function(data) {
                // makePlase(data);
                mapRes(data);
                console.log('data', data)
            }).catch(function(error) {
                console.log('error', error)
            });

        function mapRes(res) {
            let map = new ymaps.Map("mapYa", {
                // center: [48.8866527839977, 2.34310679732974],
                center: point,
                zoom: 14,
                //controls: ['routePanelControl'],
            });

            res.forEach(item => {
                let point = [item['cx'], item['cy']];

                //  console.log(point);
                let placemark = new ymaps.Placemark([item['cy'], item['cx']], {
                    // balloonContentHeader: 'Хедер балуна',
                    // balloonContentBody: 'Боди балуна',
                    // balloonContentFooter: 'Подвал',
                    balloonContent: `
            
                    <div class="balloon">
                    <div class="balloon__foto">
                        <img src="./img/images/${item['foto']}">
                    </div>              
                    <div class="balloon__contacts">
                        <div class="balloon__name">${item['name']}</div>
                        <div class="balloon__address"><i class="fa fa-location-arrow" aria-hidden="true"></i>${item['descriptions']}</div>
                        <div class="balloon__link"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+7999999999">${item['tel']}</a>
                        </div>
                    </div>
                    </div>
        
                `
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: path + './img/core-img/geo.png',
                    //  iconImageSize: [12, 20],
                    iconImageOffset: [-19, -54]
                });


                //добавляем метку на карту
                map.geoObjects.add(placemark);
                // map.geoObjects.add(placemark1);

            });
            //настройки отображения интерфейса

            //map.controls.remove('geolocationControl'); // удаляем геолокацию
            //map.controls.remove('searchControl'); // удаляем поиск
            map.controls.remove('trafficControl'); // удаляем контроль трафика
            map.controls.remove('typeSelector'); // удаляем тип
            map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
            map.controls.remove('zoomControl'); // удаляем контрол зуммирования
            // map.controls.remove('rulerControl'); // удаляем контрол правил
            //map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
            //console.log('dspsd. ');

        }

        map.events.add('click', function(e) {
            // Получение координат щелчка
            var coords = e.get('coords');

            //alert(coords.join(', '));
        });




    }

}