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
        echo $this->Html->css('/Admin/css/font-awesome.css');
        echo $this->Html->css('/Admin/css/bootstrap.css', array('id' => 'callCss', 'media' => 'screen'));
        echo $this->Html->css('/Admin/css/base.css');
        echo $this->Html->meta('icon');
        ?>
        <style type="text/css" id="enject"></style>

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">        
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'Users', 'action' => 'logout')); ?>"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
            </ul>     
        </nav>  



        <div class="container-fuild">
            <div class="container-fuild">
                <div class="col-sm-3" style="display: inline-block;position: relative;"></div>
                <div class="col-md-6 well" style="">
                    <div class="row">

                        <nav class="nav navbar navbar-wrapper nav-tabs navbar-inverse" role="navigation">
                            <div class="">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div> 


                                <!-- Nav tabs -->
                                <div class="collapse navbar-collapse navbar-ex1-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="<?php echo $menu[0];?>"><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'dashboard', 'action' => 'index')); ?>">Dashboard</a></li>
                                        <li class="<?php echo $menu[1];?>"><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'index')); ?>">Product</a></li>
                                        <li class="<?php echo $menu[2];?>"><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'customers', 'action' => 'index')); ?>">Customers</a></li>
                                        <li class="<?php echo $menu[3];?>"><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'coupons', 'action' => 'index')); ?>">Coupons</a></li>
                                        <li class="<?php echo $menu[4];?>"><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'setting', 'action' => 'index')); ?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>






                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php echo $this->fetch('content'); ?>
                            <!-- End tab panes -->
                            <div class="row" style="visibility: hidden;">
                                wer dsfa sdf ertwet  ads rdt wer sad as dgsdf g ert asf asdkfhaksjdfhajsdhfashdfkjahsdf ajskdfhk asdfkjahs dfk akjsdfh asdfhakjsfjashdfkjah sdfakjshdf asjdfh as df ew wer ds gsdfhg sdhw ert dfghsdgf
                            </div>
                        </div>
                        <!-- End Nav Tab -->
                    </div>


                </div>
                <div class="col-sm-3" style="display: inline-block;position: relative;"></div>
            </div>
        </div>

        <?php echo $this->Html->script('/Admin/js/jquery.js'); ?>
        <?php echo $this->Html->script('/Admin/js/bootstrap.js'); ?>
        <script>
            $(function() {
                $('#myTab a:last').tab('show')
            })
        </script>

    </body>
</html>
