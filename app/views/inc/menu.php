    
        <div class="header header-inner">
            <div class="header-area">
            <div class="container">
                <div class="row"> 
                    <div class="w_50"></div>                  
                    <div class="top-header-content d-flex align-items-center">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="mx-2">Часы работы: 9:00 - 24:00</span> 
                                <span class="mx-2"></span> | 
                                <span class="mx-2"></span> 
                                <i class="fa fa-phone" aria-hidden="true"></i> <span class="mx-2">Телефон: +7 (863) 123-45-76</span>
                    </div>                   
                    <div class="top-header-nav">
                        <ul class="top-header-menu">

                                <?php if (!empty($_SESSION['user'])) : 
                                    //   debug($_SESSION['user']);die;
                                    ?>
<!-- если зарегестрирован -->

                                    <li class="dropdown">
                                        <a href="#" class="text-white dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="fa  fa-user"></i>
                                            <?php
                                            echo hsc($_SESSION['user']['fio'])  ?>

                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?= PATH ?>/user/personal" class=" " role="button">
                                                    <i class="fas fa-sign-out-alt mr-1"></i> Личный кабинет

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= PATH ?>/user/booking" class=" " role="button">
                                                    <i class="fas fa-sign-out-alt mr-1"></i>Заказы

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= PATH ?>/user/logout" class=" " role="button">
                                                    <i class="fas fa-sign-out-alt mr-1"></i> Выйти

                                                </a>
                                            </li>

                                        </ul>
                                    </li>
<!-- если не зарегестрирован -->
                                <?php else : ?>
                                    <li class="">
                                        <a href="<?= PATH ?>/user/login" class="text-white" role="button">
                                            <i class="fa  fa-user"></i>
                                            Войти </a> /
                                    </li>
                                    <li class="">
                                        <a href="<?= PATH ?>/user/singup" class="text-white" role="button">

                                            Регистрация
                                        </a>
                                    </li>
                                <?php endif  ?>
                        </ul>
                    </div>
                    </div> 
                </div>
            </div>
            <div class="top-area">
            <div class="container">
            <div class="row">                
                <div class="logo">
                   <img class="logo-img" src="./img/coffee_logo.png" alt="">
                </div>
                <nav class="header-nav">
                    <ul class="header-menu">
                        <li><a href="<?= PATH ?>">О нас</a></li> 
                        <li><a href="<?= PATH ?>/catalog#linkTop">Меню</a></li>
                        <li><a href="<?= PATH ?>/catalog">Наши точки</a></li>
                        <li><a href="<?= PATH ?>/catalog">Акции</a></li>
                                              
                    </ul>            
                </nav>
            </div></div> 
        </div>
        </div>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger alert-close">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-close">
                <?= $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>  
 