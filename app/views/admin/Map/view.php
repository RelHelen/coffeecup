
<section class="content-header">
<ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/map">Список адресов</a></li>
        <li class="active"> <?=$point['name'];?></li>
    </ol>
    <h1 class="text-uppercase"><?=$point['name'] ?></h1>
    <br>
    <h1>    
        
            <a href="<?=ADMIN;?>/map/change?id=<?=$point['id'];?>" class="btn btn btn-primary btn-xs">Изменить</a>
           
            <a href="<?=ADMIN;?>/map/change?id=<?=$point['id'];?>" class="btn btn btn-primary btn-xs">Посмотреть заказы</a>      
    </h1>
    
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
  
                                    <td>Номер точки</td>
                                    <td><?=$point['id'];?></td>
                                </tr>
                                
                                <tr>
                                    <td>Наименование</td>
                                    <td><?=$point['name'];?></td>
                                </tr>
                                <tr>
                                    <td>Описание</td>
                                    <td><?=$point['descriptions'];?></td>
                                </tr>
                                <tr>
                                    <td>Телефон</td>
                                    <td><?=$point['tel'];?></td>
                                </tr>
                                <tr>
                                    <td>Статус</td>
                                    <td><?=$point['view']? 'Работает':'Выходной'?></td>
                                </tr>
                                 
                                
                                 
                                <tr>
                                    <td>Кол-во позиций в заказе</td>
                                    <td><?=count($orders);?></td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

          
            
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                 
                 <p>Фото</p>
                  <p><img style="height:200px" src="<?=PATH.'/img/images/'.$point['foto'];?>"></p>
                                
                </div>
             </div>
        </div>
    </div>

</section>
<!-- /.content -->
<!-- Main content -->
<section class="content">
<h3>Заказы на точке  <?=$point['name'];?></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Покупатель</th>
                                    <th>Статус</th>
                                    <th>Сумма</th>
                                    <th>Дата поступления</th>
                                    <th>Срок выполения</th>
                                    <th>Дата изменения</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <?php $class = $order['status'] ? 'success' : ''; ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order['id'];?></td>
                                    <td><?=$order['fio'];?></td>
                                    <td><?=$order['st_content']?></td>
                                    <td><?=$order['sum'];?> </td>
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
    </div>

</section>
<!-- /.content -->