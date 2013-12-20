<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');
        echo $this->Html->css('main/errors.css');
        echo $this->Html->script('jquery-1.8.3.min.js');
//        echo $this->Html->script('business_ltd_1.0.js');
        echo $this->Html->script('bootstrap.js');
        echo $this->Html->script('jqBootstrapValidation.js');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <style type="text/css" id="enject"></style>
    </head>
    <body>
        <?php echo $this->fetch('content'); ?>
        <script type="text/javascript">
            $(function() {
                // Setup drop down menu
                $('.dropdown-toggle').dropdown();

                // Fix input element click problem
                $('.dropdown input, .dropdown label').click(function(e) {
                    e.stopPropagation();
                });

//                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            });


        </script>
        <script type="text/javascript">
            $(function() {
                $("input,textarea,select").not("[type=submit]").jqBootstrapValidation();
            });
        </script>
    </body>
</html>
