<?php
/**
 * Default Layout
 *
 * PHP 5
 */
$cakeDescription = __d('digital_shop', 'Digital Sell');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php
        echo $this->Html->meta('icon');
        ?>
        <?php echo $this->Html->script('/Admin/js/jquery-1.8.3.min.js'); ?>
        <?php echo $this->Html->script('/Admin/js/jquery.imgareaselect.min.js'); ?>
    </head>
    <body style="margin: 0px">
        <?php echo $this->fetch('content'); ?>
    </body>
</html>
