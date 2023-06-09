<div class="container mt-40">
    <h2>Заказы клиента</h2>
    <p></p>
    <p></p>
    <h5>Ваши заказы:</h5>
    <p></p>
    <p></p>
    <?php if (!empty($orders)) :
        foreach ($orders as $order) :
            //debug($contract);
         ?>
            <section class="card-">
                <div class="card-header">
                    <h3>Заказ №

                        <?php echo $order['id']; ?>

                    </h3>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (!empty($order)) :  ?>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">

                                                <tbody>


                                                    <tr>
                                                        <th>Сумма заказа</th>
                                                        <td><?= $order['sum']; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Дата заказа</th>
                                                        <td><?= $order['date']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Время приготовления</th>
                                                        <td><?= $order['date_read']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Статус</th>
                                                        <td><?=$order['st_content']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Оплата</th>
                                                        <td><?=$order['pay']?'Оплачен':'Не оплачен' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Место забирать заказ</th>
                                                        <td><?=$order['descriptions'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Комментарий</th>
                                                        <td><?= $order['comment'] ?></td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <h3>Детали заказа</h3>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>№</th>

                                                        <th>Наименование</th>
                                                        <th>Стоимость</th>
                                                        <th>Количество </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($order_products)) :
                                                        $i = 0;
                                                        foreach ($order_products  as $list ) : $i++ ?>
                                                            <tr>
                                                                <td><?= $i ?></td>
                                                                <td><?= $list['title']; ?></td>
                                                                <td><?= $list['price']; ?></td>
                                                                <td>
                                                                <?= $list['qty']; ?>
                                                                </td>

                                                            </tr>
                                                            
                                                            
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            </section>
    <?php endforeach;
    endif;
    ?>
</div>
<!-- /.content -->