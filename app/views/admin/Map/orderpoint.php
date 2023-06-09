
<section class="content-header">
<ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/map">Список адресов</a></li>
        <li class="active"> <?=$point['name'];?></li>
    </ol>
<h1 class="text-uppercase">
    <span>№<?=$point['id'];?></span>
    <span><?=$point['name'] ?></span>
    
</h1> 
<h3>
<span><?=$point['descriptions'];?> </span>
<span><?=$point['tel'];?></span></h3>
    <br> 
    
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody<tr>
                                    <td>Новых заказов</td>
                                    <td>Готовяться</td>
                                    
                                    <td>Готовы к выдаче</td>
                                    <td>Заказ выполнен</td>
                                    
                                    <td>Кол-во позиций в заказе</td>
                                     
                                </tr> 
                                <tr>                                 
                                    
                                    <td><?=count($ordersNew);?></td>                                    
                                    <td><?=count($ordersready);?></td>                                    
                                    <td><?=count($ordersready);?></td> 
                                    <td><?=count($ordersClose);?></td>                                   
                                    <td><?=count($orders);?></td>
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
<!-- Main content -->

<section class="content">
<h3>Заказы на точке  <?=$point['name'];?></h3>

<div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                 
                <li class="nav-item   ">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Все заказы</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Новые</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Готовяться</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Выполнены</a>
                  </li>
                </ul>
              </div>


            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane    active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Покупатель</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Оплачен</th>
                                        <th>Дата поступления</th>
                                        <th>Срок выполения</th>
                                        <th>Дата изменения</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($orders as $order): ?>
                                    <?php $class = $order['status'] ? 'success' : ''; ?>
                                    <?php $classPay = $order['pay'] ? '' : 'danger'; ?>
                                    <tr class="<?=$class;?>">
                                        <td><?=$order['id'];?></td>
                                        <td><?=$order['fio'];?></td>
                                        <td><?=$order['st_content']?></td>
                                        <td><?=$order['sum'];?> </td>
                                        <td class="<?=$classPay;?>"><?=$order['pay']?"Оплачен":"Не оплачен";?> </td>
                                        <td><?=$order['date'];?></td>
                                        <td><?=$order['date_read'];?></td>
                                        <td><?=$order['date_update'];?></td>
                                        <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Покупатель</th>
                                    <th>Статус</th>
                                    <th>Сумма</th>
                                    <th>Оплачен</th>
                                    <th>Дата поступления</th>
                                    <th>Срок выполения</th>
                                    <th>Дата изменения</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($ordersNew as $order): ?>
                                <?php $class = $order['status'] ? 'success' : ''; ?>
                                <?php $classPay = $order['pay'] ? '' : 'danger'; ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order['id'];?></td>
                                    <td><?=$order['fio'];?></td>
                                    <td><?=$order['st_content']?></td>
                                    <td><?=$order['sum'];?> </td>
                                    <td class="<?=$classPay;?>"><?=$order['pay']?"Оплачен":"Не оплачен";?> </td>
                                    <td><?=$order['date'];?></td>
                                    <td><?=$order['date_read'];?></td>
                                    <td><?=$order['date_update'];?></td>
                                    <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                     </div>
                   </div>


                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Покупатель</th>
                                    <th>Статус</th>
                                    <th>Сумма</th>
                                    <th>Оплачен</th>
                                    <th>Дата поступления</th>
                                    <th>Срок выполения</th>
                                    <th>Дата изменения</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($ordersready as $order): ?>
                                <?php $class = $order['status'] ? 'success' : ''; ?>
                                <?php $classPay = $order['pay'] ? '' : 'danger'; ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order['id'];?></td>
                                    <td><?=$order['fio'];?></td>
                                    <td><?=$order['st_content']?></td>
                                    <td><?=$order['sum'];?> </td>
                                    <td class="<?=$classPay;?>"><?=$order['pay']?"Оплачен":"Не оплачен";?> </td>
                                    <td><?=$order['date'];?></td>
                                    <td><?=$order['date_read'];?></td>
                                    <td><?=$order['date_update'];?></td>
                                    <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                  </div>


                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                  <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Покупатель</th>
                                    <th>Статус</th>
                                    <th>Сумма</th>
                                    <th>Оплачен</th>
                                    <th>Дата поступления</th>
                                    <th>Срок выполения</th>
                                    <th>Дата изменения</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($ordersClose as $order): ?>
                                <?php $class = $order['status'] ? 'success' : ''; ?>
                                <?php $classPay = $order['pay'] ? '' : 'danger'; ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order['id'];?></td>
                                    <td><?=$order['fio'];?></td>
                                    <td><?=$order['st_content']?></td>
                                    <td><?=$order['sum'];?> </td>
                                    <td class="<?=$classPay;?>"><?=$order['pay']?"Оплачен":"Не оплачен";?> </td>
                                    <td><?=$order['date'];?></td>
                                    <td><?=$order['date_read'];?></td>
                                    <td><?=$order['date_update'];?></td>
                                    <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                  </div>


                </div>
              </div>
              <!-- /.card -->
            </div>
</section>
    