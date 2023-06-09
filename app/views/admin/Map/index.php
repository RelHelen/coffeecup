<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список адресов
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Список адресов</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                    <th>id</th>
                                    <th>Фото</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Телефон</th>                                    
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                            <tbody>
                            <?php foreach($points as $point): ?>
                                <?php $class = $point['view'] ? '' : 'success'; ?>
                                
                                <tr class="<?=$class;?>">
                                <td><?=$point['id']; ?></td>
                                        <td><img style="width: 80px" src="<?=PATH.'/img/images/'.$point['foto'];?>"></td>
                                        <td><?=$point['name']; ?></td>
                                        <td><?=$point['descriptions'];?></td>
                                        <td><?=$point['tel'];?></td>
                                        <td><?=$point['view']? 'Работает':'Выходной' ?></td>
                                    <td>
                                        <a href="<?=ADMIN;?>/map/view?id=<?=$point['id'];?>"><i class="fa fa-fw fa-eye"></i></a> 

                                        <a  class="text-success" href="<?=ADMIN;?>/map/edit?id=<?=$point['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                        <a  class="text-warning" href="<?=ADMIN;?>/map/orderpoint?id=<?=$point['id'];?>"><i class="fa fa-coffee" aria-hidden="true"></i></a>                                        
                                        

                                    <a class="delete" href="<?=ADMIN;?>/map/delete?id=<?=$point['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($points);?> адресов(ов) из <?=$count;?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->