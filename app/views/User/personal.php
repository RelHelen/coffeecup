
<?php 
//debug($_SESSION); 
if(!empty($customer)) :?>
<div class="container mt-40">
    <h2>Личный кабинет</h2>
    <p></p>
    <!-- <p>Добро пожаловать,<?= $customer['fio'] ?></p> -->
    <h5><br>Ваши данные:</h5>
    <p></p>
    <p></p>


    <section class="card-">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ФИО</th>
                                            <td><?= $customer['fio']; ?></td>
                                            <td width="30px"><a href=""><i class="fa fa-pencil text-success mr-3"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Почта</th>
                                            <td><?= $customer['mail']; ?> </td>
                                            <td width="30px"><a href=""><i class="fa fa-pencil text-success mr-3"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Телефон</th>
                                            <td><?= $customer['phone'] ?></td>
                                            <td width="30px"><a href=""><i class="fa fa-pencil text-success mr-3"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Логин</th>
                                            <td><?= $user['login'] ?></td>
                                            <td width="30px"><a href=""><i class="fa fa-pencil text-success mr-3"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Пароль</th>
                                            <td>******</td>
                                            <td width="30px"><a href=""><i class="fa fa-pencil text-success mr-3"></i></a>
                                            </td>
                                        </tr>


                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>


                </div>
            </div>
    </section>

</div>
<?php endif;?>
<!-- /.content -->