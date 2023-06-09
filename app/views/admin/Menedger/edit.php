<!-- Content Header (Page header) -->
 
<section class="content-header">
    <h1>
        Редактирование менеджера
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/user"> Список менеджеров</a></li>
        <li class="active">Редактирование менеджера</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/user/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control" name="login" id="login" value="<?=($user->login);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль, если хотите его изменить">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?=($user->fio);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="<?=hsc($user->mail);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Адрес</label>
                            <?php new \app\widgets\menumap\Menumap([
                                'tpl' => WWW . '/menu/selectmap.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'table' => 'mappoint',
                               
                                'attrs' => [
                                    'name' => 'id_adres',
                                    'id' => 'id_adres',
                                ],
                            ]) ?>
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <select name="role" id="role" class="form-control">
                                <option value="user"<?php if($user->role == 'user') echo ' selected'; ?>>Пользователь</option>
                                <option value="admin"<?php if($user->role == 'admin') echo ' selected'; ?>>Администратор</option>
                                <option value="menedger"<?php if($user->role == 'menedger') echo ' selected'; ?>>Менеджер</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$user->id;?>">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>

            <h3>Точка менеджера</h3>
            
            <div class="box">
                <div class="box-body">
                    <?php if(!empty($points)): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
     
                                <tr>
                                    <th>Фото</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Телефон</th>                                    
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($points as $point): ?>
                                    <?php 
                                       //debug($point); 
                                        $class = $point['view']==1 ? 'success' : ''; ?>
                                    <tr class="<?=$class;?>">
                                        <td><img style="height:80px" src="<?=PATH.'/img/images/'.$point['foto'];?>"></td>
                                        <td><?=$point['name']; ?></td>
                                        <td><?=$point['descriptions'];?></td>
                                        <td><?=$point['tel'];?></td>
                                        <td><?=$point['view']?'Работает':'Выходной';?></td>
                                        
                                        <td>
                                            <a href="<?=ADMIN;?>/map/view?id=<?=$point['id'];?>"><i class="fa fa-fw fa-eye"></i></a>
                                          
                                            <a class="delete" href="<?=ADMIN;?>/map/delete?id=<?=$point['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-danger">Пока менеджер не привязан к точке</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- /.content -->