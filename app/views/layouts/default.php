<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Meta  -->
   <?php echo $this->getMeta(); ?>
    <link rel="stylesheet" href="<?= PATH ?>/css/style.css">
</head>

<body>
    <!--  header -->
    <header>    
    <?php  $this->getPart('menu');  ?>
    </header>    
    
   <main>
   <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger alert-close">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-close">
                <?= $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
   <!-- content view -->
   <div class="container">
      <?php echo $content;?>
   </div>
   
    <!-- /content view -->
   </main>
    <!-- footer -->
    <script>
        path = '<?= PATH ?>';
    </script>
   <script src="<?= PATH ?>/assets/js/jquery.min.js"></script>
   <script src="<?= PATH ?>/assets/js/popper.min.js"></script>
    <script src="<?= PATH ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= PATH ?>/assets/js/akame.bundle.js"></script>
    <script src="<?= PATH ?>/assets/js/default-assets/active.js"></script>
    <script src="<?= PATH ?>/assets/js/validator.min.js"></script>
   
    <script type="module" src="<?= PATH ?>/script/script.js"></script>
    <?php
    foreach ($scripts as $script) {
        echo $script;
    }
    ?>
</body>

</html>