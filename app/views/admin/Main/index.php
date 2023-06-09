<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Панель управления
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
<div class="row">
 <?php

foreach($points as $point):
    $ordersCount=0;
    $ordersNewCount=0; 
    $orderreadyCount=0;
    $orderCloseCount=0;
    foreach($orders as $order){
        if($order['id_adres']==$point['id']){$ordersCount++;}
    }
    foreach($ordersNew as $orderNew){
        if($orderNew['id_adres']==$point['id']){$ordersNewCount++;}
    }
    foreach($ordersready as $orderready){
        if($orderready['id_adres']==$point['id']){$orderreadyCount++;}
    }
  
    foreach($ordersClose as $orderClose){
        if($orderClose['id_adres']==$point['id']){$orderCloseCount++;}
    }
    
    
    
?>
    <div class="col-md-3">
    <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning">
                <div class="widget-user-image">
                  
                   <img class="img-circle elevation-2" style="width: 50px;height: 50px" src="<?=PATH.'/img/images/'.$point['foto'];?>">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?=$point['name']?></h3>
                <h5 class="widget-user-desc"><?=$point['descriptions']?></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Всего заказов <span class="float-right badge bg-primary">
                        <?=$ordersCount;?>
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Новые заказы <span class="float-right badge bg-danger">
                      
                      <?=$ordersNewCount;?>
                    </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Заказы готовяться <span class="float-right badge bg-success"><?=$orderreadyCount?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Заказ отдан <span class="float-right badge bg-default">
                      <?=$orderCloseCount;?>
                        
                    </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
    </div>
    <?php 
endforeach;
?>

</div>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$countNewOrders;?></h3>
                    <p>Менеджеры</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?=ADMIN;?>/order" class="small-box-footer">Смотреть <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box  bg-green">
                <div class="inner">
                    <h3><?=$countUsers;?></h3>
                    <p>Пользователи</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?=ADMIN;?>/user" class="small-box-footer">Смотреть <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$countProducts?></h3>
                    <p>Продукция</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?=ADMIN;?>/product" class="small-box-footer">Смотреть<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box  bg-green">
                <div class="inner">
                    <h3><?=$countCategories;?></h3>
                    <p>Категории</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?=ADMIN;?>/category" class="small-box-footer">Смотреть <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

</section>
<!-- /.content -->