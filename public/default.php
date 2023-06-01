<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>   
    <link rel="stylesheet" href="<?= PATH ?>/css/style.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="nav_top">
        <ul class="nav_menu">
            <li class="nav_menu_item" data-tab-number="1">
                <div class="btn select" id="tab-drinks">Напитки </div>
            </li>
            <li class="nav_menu_item" data-tab-number="2">
                <div class="btn" id="tab-eats">Еда</div>
            </li>


        </ul>
    </div>
    <form method="POST" id="orderForm">
        <section id="drinks"></section>
    </form>
    <form method="POST" id="orderFormEats">
        <section id="eats"></section>
    </form>
    <div class="container">
        <form action="" id="orderReultForm">
            <section class="section-order">
                <article class="order-result-bts">
                    <div class="order-btns">
                        <div class="btn" id="order-drink-add">Добавить напиток</div>
                        <div class="btn" id="order-eat-add">Добавить еды</div>
                    </div>
                </article>
                <h3 class="caption-order-h3">Ваш заказ</h3>
                <section id="order-result"></section>
            </section>
        </form>
    </div>
    
        <!-- Footer Area End -->
        <script>
        path = '<?= PATH ?>';
    </script>
   <script src="<?= PATH ?>/assets/js/jquery.min.js"></script>
   <script src="<?= PATH ?>/assets/js/popper.min.js"></script>
    <script src="<?= PATH ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= PATH ?>/assets/js/akame.bundle.js"></script>
    <script src="<?= PATH ?>/assets/js/default-assets/active.js"></script>
    <script type="module" src="<?= PATH ?>/scriptscript.js"></script>
    <?php
    foreach ($scripts as $script) {
        echo $script;
    }
    ?>
</body>

</html>