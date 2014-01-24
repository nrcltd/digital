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
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php
$content1 = explode('\n', $content);

$orderid = $content1[0];
$token = trim($content1[1]);

//foreach ($content as $line):
//    echo '<p> ' . $line . "</p>\n";
//endforeach;
?>
<div class="container-fluid" style="background:rgba(34, 34, 34, 0);">
    <div class="container-fluid">
        <div class="col-sm-3"></div>

        <!-- Body content begin ======================================== -->

        <div class="col-sm-6">  
            <body style="background-image:url('<?php echo $this->Html->url('/img/pattern/winter' . '.png', true) ?>'); center;">
                <!-- Body content begin -->
                <div class="container-fluid">
                    <!-- Sectionone begin ======================================== -->
                    <div style="color:white; background:rgba(54, 57, 59, 1);border-bottom: 1px solid #ffffff;">
                        <div class="widget-header widget-header-large">
                            <div class="widget-toolbar no-border invoice-info">
                                <span class="invoice-info-label">Thanks for your downloading our product.</span>
                                <br>
                                <span class="red">Please click link below to download your file.</span>
                            </div>

                        </div>
                    </div>

                    <br>
                    <!-- Sectionone ends ======================================== -->            

                    <div class="col-md-7 pad_left_right">
                        <div>

                            <a href="<?php
                            echo $this->Html->url(array('plugin' => '', 'controller' => 'orders',
                                'action' => 'download',
                                '?' => array(
                                    'id' => $orderid,
                                    'token' => $token)), true);
                            ?>"><?php
                                   echo $this->Html->url(array('plugin' => '', 'controller' => 'orders',
                                       'action' => 'download',
                                       '?' => array(
                                           'id' => $orderid,
                                           'token' => $token)), true);
                                   ?></a>


                        </div>
                    </div>
                </div>
            </body>
            <!-- Footer content end ======================================== -->
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>