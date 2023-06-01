<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta  -->
    <?php echo $this->getMeta(); ?> 
    <link rel="stylesheet" href="<?= PATH ?>/css/style.css">
 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" charset="utf-8" ></script>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=8e84548a-c963-440e-92a6-f738b5905bcd&lang=ru_RU"
   ></script>
 
  
</head>

<body>
    <div id="error"></div>
     <!--  header -->
     <header>    
    <?php  $this->getPart('menu');  ?>
    </header> 
    <main>
       
    <!--  menu -->
    <section class="menuOrder" id="menuOrder">
        <div class="nav_top" id="linkTop">
            <ul class="nav_menu">
                <li class="nav_menu_item " data-tab-number="1">
                    <div class="btn btn_main select" id="tab-drinks">Напитки </div>
                </li>
                <li class="nav_menu_item" data-tab-number="2">
                    <div class="btn btn_main " id="tab-eats">Еда</div>
                </li>
            </ul>
        </div>
    <!-- content view -->
        <form method="POST" id="orderForm">
            <section id="drinks"></section>
        </form>
        <form method="POST" id="orderFormEats">
            <section id="eats"></section>
        </form>
    </section>
    <div class="container_">
    <section class="section-map">
        <h2>Выберите место получение заказа</h2>
        <div class="section-map-inner">
            <section id="mapYa" class="map"></section>
            <section id="mapPlase" class="map-plase"></section>
       </div>
       <section id="sectionOrderPlase" class="section-order-plase"> 
                    <div class="resultPlase_caption ">Место получения заказа: </div>
                    <div id="resultPlase" class="resultPlase"></div>
                </section>
    </section>
    </div>
    <div class="container">
        <form action="" id="orderReultForm">
            <section class="section-order">
                <article class="order-result-bts">
                    <div class="order-btns">
                        <div class="btn" id="order-drink-add" style="display:none">Добавить напиток</div>
                        <div class="btn" id="order-eat-add" style="display:none">Добавить еды</div>
                    </div>
                </article>
                <h3 class="caption-order-h3">Ваш заказ</h3>
                <section id="order-result">                
                </section>
                <section class="section-cost"> 
                    <div class="resultCost_caption">Итого по заказу</div>
                    <div id="resultCost" class="resultCost"></div>
                </section>
                <!-- <section id="sectionOrderPlase" class="section-order-plase"> 
                    <div class="resultPlase_caption ">Место получения заказа</div>
                    <div id="resultPlase" class="resultPlase"></div>
                </section> -->
                <section class="section-readOrder" id="section-readOrder">
                <div class="btn btn_main" id="btn-readOrder">Оформить заказ</div>
                </section>
            </section>
        </form>

    </div> 
    </main>  
    <!-- /content view -->
    <!-- footer -->
    <script>
        path = '<?= PATH ?>';
    </script>
   <script src="<?= PATH ?>/assets/js/jquery.min.js"></script>
   <script src="<?= PATH ?>/assets/js/popper.min.js"></script>
    <script src="<?= PATH ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= PATH ?>/assets/js/akame.bundle.js"></script>
    <script src="<?= PATH ?>/assets/js/default-assets/active.js"></script>
    <script type="module" src="<?= PATH ?>/script/script.js"></script>
    <?php
    foreach ($scripts as $script) {
        echo $script;
    }
    ?>
</body>

</html>