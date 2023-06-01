<div class="container mt-40">
    <h2>Заказы клиента</h2>
    <p></p>
    <p></p>
    <h5><?= $customer['FIO'] ?>, ваши заказы:</h5>
    <p></p>
    <p></p>
    <?php if (!empty($contracts)) :
        foreach ($contracts as $contract) :
            //debug($contract);
         ?>
            <section class="card-">
                <div class="card-header">
                    <h3>Заказ №

                        <?php echo $contract['num']; ?>

                    </h3>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (!empty($contract)) :  ?>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">

                                                <tbody>


                                                    <tr>
                                                        <th>Сумма заказа</th>
                                                        <td><?= $contract['COST']; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Дата визита </th>
                                                        <td><?= $contract['DATA_VISIT']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Статус</th>
                                                        <td><?php
                                                            if ($contract['status'] == 1) {
                                                                echo 'Новый';
                                                            };
                                                            if ($contract['status'] == 2) {
                                                                echo 'Обработан';
                                                            };
                                                            if ($contract['status'] == 3) {
                                                                echo 'Отменен';
                                                            };
                                                            if ($contract['status'] == 4) {
                                                                echo 'Исполнен';
                                                            }; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Комментарий</th>
                                                        <td><?= $contract['COMMENT'] ?></td>
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

                                                        <th>Услуга</th>
                                                        <th>Стоимость</th>

                                                        <th>Мастер </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($detals)) :
                                                        $i = 0;
                                                        foreach ($detals  as $detal ) :
                                                            //debug($detal);
                                                            foreach ($detal  as $list ) :
                                                                if( $contract['ID_O'] == $list['ID_O']):
                                                            $i++ ?>
                                                            <tr>
                                                                <td><?= $i ?></td>
                                                                <td><?= $list['USLUGA']; ?></td>
                                                                <td><?= $list['PRICE']; ?></td>
                                                                <td>

                                                                </td>

                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php endforeach; ?>
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