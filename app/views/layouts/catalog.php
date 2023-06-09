<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
    <link rel="shortcut icon" href="<?= PATH ?>/img/star.png" type="image/png" />
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
    <h1 class="text-center">Меню</h1>
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

    <section class="container" id="orderResContainer">
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
                <div class="btn btn_main" id="btn-readOrder">Продолжить </div>
                </section>
            </section>
        </form>

</section>
    
   
        <section id="sectionMap" class="onVisibleMap" >
            <section class="section-map">
           
            <!-- <h2>Выберите место получение заказа</h2> -->
            <h2>Наши мобильные кафе вас уже ожидают. <br>
            Выберите удобное мсто для себя и закажите у нас чашечку ароматного кофе</h2>
            <div class="section-map-inner">
                <section id="mapYa" class="map"></section>
                <section id="mapPlase" class="map-plase"></section>
        </div>
        <section id="sectionOrderPlase" class="section-order-plase"> 
                        <div class="resultPlase_caption ">Место получения заказа: </div>
                        <div id="resultPlase" class="resultPlase"></div>
                         
            </section>
            <section class="section-map-readOrder" id="section-map-readOrder">
                    <div class="btn btn_main" id="btn-readOrderMap">Продолжить2 </div>
            </section>
        </section>

    
</section>
<div class="container">
<h3 class="caption-order-h3">Оформление заказа</h3>
        <section id="allReadyOrder" class="row align-items-start">
        
       
        <div class="col-md-6" id="allReadyOrderItem1">
    
       </div>
    
        <div class="col-md-6 account-left">
        <h4>Для оформления заказа необходима авторизация</h4>
                            <form method="post" action="<?=PATH?>/booking/checkout" role="form" data-toggle="validator">
                                <?php if(!isset($_SESSION['user'])): ?>
                                    <div class="form-group has-feedback">
                                        <label for="fio">Имя</label>
                                        <input type="text" name="fio" class="form-control" id="fio" placeholder="Имя" value="<?= isset($_SESSION['form_data']['fio']) ? $_SESSION['form_data']['fio'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                    <div class="form-group w-100 mr-2 has-feedback">
                                        <label for="login">Логин</label>
                                        <input type="text" name="login" class="form-control" id="login" placeholder="Логин" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  w-100  has-feedback">
                                        <label for="pasword">Пароль</label>
                                        <input type="password" name="password" class="form-control" id="pasword" placeholder="Пароль" value="<?= isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '' ?>" data-minlength="6" data-error="Пароль должен включать не менее 6 символов" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    </div>
                                    <div class="d-flex   justify-content-between ">
                                    <div class="form-group  w-100 mr-2  has-feedback">
                                        <label for="mail">Email</label>
                                        <input type="email" name="mail" class="form-control" id="mail" placeholder="Email" value="<?= isset($_SESSION['form_data']['mail']) ? $_SESSION['form_data']['mail'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group  w-100 has-feedback">
                                        <label for="phone">Телефон</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон" value="<?= isset($_SESSION['form_data']['phone']) ? $_SESSION['form_data']['phone'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                     <label for="address">Сообщение</label>
                                    <textarea name="note" class="form-control"></textarea>
                                   
                                </div>
                                <div class="form-group">
                                 
                                <input type="time" id="appt" name="appt"
       min="09:00" max="22:00" required>
                                    <label for="appt">Укажите к какому времени сделать заказ (минимальное время 20 минут)</label>                                      
                                       

                                </div>
                                <div class="form-group">
                                 
                                    <input type = "radio" id="pay" name="pay" >
                                    <label for="pay">Оплатить онлайн</label>                                                      
                                    <br>
                                    <input type = "radio" id="payof" name="pay1" >
                                    <label for="payof">Оплатить при получении заказа </label>    
                                </div>
                                <div >
                                <button type="submit" class="btn  btn-submit" style="width: 100%">Оформить</button>
                                <div class="form-group">
                                    
 </label>
                                     <input type = "checkbox" id="check" name="check" >
                                     <label for="check">Согласие на обработку персональных данных
                                   
                                </div>
                                <br>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-default" style="flex: 1 1 auto">Вернуться к меню</button>
                                    <button type="reset" class="btn btn-default" style="flex: 1 1 auto">Отменить</button> 
                                </div>                                
                                </div>                                 
                            </form>
                            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                          




        </div>
                     
        </section> 
    </div>


<div class="container">
    <br><br><br><br>
    <section class="">
<h3>
    Ваш заказ № 21 успешно отправлен!<br>
    Время приготовления:  17.20 <br>
    Место получения : Ростов-на-Дону, Театральная площадь 1
</h3>  
    
    </section>
</div>
<br><br><br><br><br><br><br><br>
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