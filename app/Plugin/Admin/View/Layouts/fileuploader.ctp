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
        <?php echo $this->Html->script('/Admin/js/jquery.form.js'); ?>
        <style>
            #form-upload { padding: 10px; background: #A5CCFF; border-radius: 5px;}
            #progress { border: 1px solid #ccc; width: 100%; height: 20px; margin-top: 10px;text-align: center;position: relative;}
            #bar { background: #F39A3A; height: 20px; width: 0px;}
            #percent { position: absolute; left: 50%; top: 0px;}
        </style>
    </head>
    <body>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>
