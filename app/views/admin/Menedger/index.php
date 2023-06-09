<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список менеджеров
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Список менеджеров</li>
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
                                <th>Логин</th>
                                <th>Email</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Роль</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                    <td><?=$user->id;?></td>
                                    <td><?=$user->login;?></td>
                                    <td><?=$user->mail;?></td>
                                    <td><?=$user->fio;?></td>
                                    <td><?=$user->phone;?></td>
                                    <td><?=$user->role;?></td>
                                    <td><a href="<?=ADMIN;?>/menedger/edit?id=<?=$user->id;?>"><i class="fa fa-fw fa-eye"></i></a></td>
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