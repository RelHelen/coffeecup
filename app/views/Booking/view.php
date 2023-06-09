<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Главная</a></li>
                <li>Корзина</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                    <div class="register-top heading">
                        <h2>Оформление заказа</h2>
                    </div>
                    <br><br>
                    <?php if(!empty($_SESSION['cart'])):?>
                        <div class="table-responsive">
                            <table class="table table-hover _table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 150px">Фото</th>
                                    <th style="width: 80%">Наименование</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                    <th> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                                    <tr>
                                        <td><a href="<?=PATH?>/product/<?=$item['alias'] ?>"><img src="<?=PATH?>/images/<?= $item['img'] ?>" alt="<?=$item['title'] ?>"></a></td>
                                        <td><a href="<?=PATH?>/product/<?=$item['alias'] ?>"><?=$item['title'] ?></a></td>
                                        <td><input type="number" value="<?=$item['qty'];?>" min="0" max="10"> </td>
                                        <td><?=$item['price'] ?></td>
                                        <td><a href="<?=PATH?>/cart/delete/?id=<?=$id ?>"><span data-id="<?=$id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                                    </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td>Итого:</td>
                                    <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'] ?></td>
                                </tr>
                                <tr>
                                    <td class="white-space bold">На сумму:</td>
                                    <td colspan="4" class="text-right cart-sum"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . " {$_SESSION['cart.currency']['symbol_right']}" ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Оформить заказ</button>
                            <br><br><br><br>
                        </div>
                        <div class="col-md-8 account-left">
                           
                            <form method="post" action="<?=PATH?>/cart/checkout" role="form" data-toggle="validator">
                                <?php if(!isset($_SESSION['user'])): ?>
                                    <h4>Для оформления заказа необходима авторизация</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                        <label for="login">Логин</label>
                                        <input type="text" name="login" class="form-control" id="login" placeholder="Логин" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="pasword">Пароль</label>
                                        <input type="password" name="password" class="form-control" id="pasword" placeholder="Пароль" value="<?= isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '' ?>" data-minlength="6" data-error="Пароль должен включать не менее 6 символов" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="name">Имя</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="email">Телефон</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Телефон" value="<?= isset($_SESSION['form_data']['tel']) ? $_SESSION['form_data']['tel'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Адрес</label>
                                        
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Адрес" value="<?= isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                        </div>
                                    </div>
                                    

                                   
                                <?php endif; ?>

                               
                                <div class="form-group">
                                 <h5>Выберите способ доставки</h5>
                                    <input type = "radio" id="delivery_1" name="delivery" value="0" >
                                    <label for="delivery_1"> Курьер </label>                                                   
                                    <br>
                                    <input type = "radio" id="delivery_2" name="delivery" value="1">
                                    <label for="delivery_2">Самовывоз</label>    
                                </div>
                                <div class="form-group">
                                 <h5>Выберите способ оплаты</h5>
                                    <input type = "radio" id="pay" name="pay" >
                                    <label for="pay"> Банковской картой онлайн</label>

                                                      
                                    <br>
                                    <input type = "radio" id="payof" name="pay" >
                                    <label for="payof">Наличными курьеру</label>    
                                </div>

                                <div class="form-group">
                                     <label for="address">Сообщение</label>
                                    <textarea name="note" class="form-control"></textarea>
                                   
                                </div>
                               
                                <button type="submit" class="btn btn-primary">Оформить заказ</button>
                                <div class="form-group">
                                    
 </label>
                                     <input type = "checkbox" id="check" name="check" >
                                     <label for="check">Согласие на обработку персональных данных
                                   
                                </div>
                            </form>
                            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                        </div>
                    <?php else: ?>
                        <h3>Корзина пуста</h3>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->