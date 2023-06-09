<!-- Content Header (Page header) -->
<?php $order['currency']='руб.';  ?>
<section class="content-header">
<ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/order">Список заказов</a></li>
        <li class="active">Заказ №<?=$order['id'];?></li>
    </ol>
    <h1 class="text-uppercase">Просмотр заказа №<?=$order['id'] ?></h1>
    <br>
    <h1>   
       
        <!-- если статус НОВЫЙ -->
        <?php if($order['status']==1):            
            ?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=2&pay=<?=$order['pay']?>" class="btn btn-success btn-xs">Одобрить</a>
           
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=3&pay=<?=$order['pay']?>" class="btn btn-danger btn-xs">Отменить</a>         
        <?php endif; ?>
        <!-- если статус ГОТОВИТЬСЯ -->
            <?php if($order['status']==2 && $order['pay']==0): ?>
                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=2&pay=1" class="btn btn-default btn-xs">Оплатить</a>
                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=4&pay=<?=$order['pay']?>" class="btn btn-default btn-xs">Завершить</a>
                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=3&pay=<?=$order['pay']?>" class="btn btn-danger btn-xs">Отменить</a>
            <?php endif; ?>
             <!-- если Оплачено -->
             <?php if($order['status']==2 && $order['pay']==1): ?>
                 
                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=4&pay=<?=$order['pay']?>" class="btn btn-default btn-xs">Завершить</a>
                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=3&pay=<?=$order['pay']?>" class="btn btn-danger btn-xs">Отменить</a>
            <?php endif; ?>
            <!-- если статус Звыполнено -->
            <?php if($order['status']==4): ?>
                  <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn btn-danger btn-xs delete">Удалить</a>  
               
            <?php endif; ?>

       
    </h1>
    
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td>Номер заказа</td>
                                    <td><?=$order['id'];?></td>
                                </tr>
                                <tr>
                                    <td>Имя заказчика</td>
                                    <td><?=$order['fio'];?></td>
                                </tr>
                                <tr>
                                    <td>Телефон заказчика</td>
                                    <td><?=$order['phone'];?></td>
                                </tr>
                                <tr>
                                    <td>Дата приема  заказа</td>
                                    <td><?=date("d.m.Y H:i",strtotime($order['date']));?></td>
                                </tr>
                                <tr>
                                    <td>Срок выполнения заказа</td>
                                    <!-- $premium_date = date("d.m.Y H:i:s", strtotime("+1 days", strtotime($reg_date))); --> 
                                    <td><?=!$order['date_read']=='0000-00-00' ? date("d.m.Y H:i", strtotime(strtotime($order['date_read']))) : date("d.m.Y H:i", strtotime("+20 minute", strtotime($order['date'])))?></td>
                                </tr>
                                <tr>
                                    <td>Дата изменения статуса заказа</td>
                                    <td><?=$order['date_update'];?></td>
                                </tr>
                                <tr>
                                    <td>Кол-во позиций в заказе</td>
                                    <td><?=count($order_products);?></td>
                                </tr>
                                <tr>
                                    <td>Сумма заказа</td>
                                    <td><?=$order['sum'];?> руб.</td>
                                </tr>
                               
                                <tr>
                                    <td>Статус</td>
                                    <td>
                                   <?=$status;
?>
                                     </td>
                                </tr>
                                <tr>
                                    <td>Оплачено</td>
                                    <td>
                                    <?=$order['pay'] ? 'Оплачен' : 'Не оплачен';?>
                                     </td>
                                </tr>
                                <tr>
                                    <td>Комментарии клиента</td>
                                    <td><?=$order['comment'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h3>Детали заказа</h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Кол-во</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty = 0; foreach($order_products as $product): ?>
                                <tr>
                                    <td><?=$product->id;?></td>
                                    <td><?=$product->title;?></td>
                                    <td><?=$product->qty; $qty += $product->qty?></td>
                                    <td><?=$product->price;?></td>
                                </tr>
                            <?php endforeach; ?>
                                <tr class="active">
                                    <td colspan="2">
                                        <b>Итого:</b>
                                    </td>
                                    <td><b><?=$qty;?></b></td>
                                    <td><b><?=$order['sum'];?> <?=$order['currency'];?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->