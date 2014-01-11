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
$purchased_date = $content1[1];
$productid = $content1[2];
$product_name = $content1[3];
$product_price = $content1[4];
$customer_name = $content1[5];
$customer_email = $content1[6];

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
                                <span class="invoice-info-label">Invoice:</span>
                                <span class="red">#<?php echo $orderid; ?></span>

                                <br>
                                <span class="invoice-info-label">Date:</span>
                                <span class="blue"><?php echo date_format(date_create($purchased_date), 'd-m-Y'); ?></span>
                            </div>

                        </div>
                    </div>

                    <br>
                    <!-- Sectionone ends ======================================== -->            

                    <div class="col-md-7 pad_left_right">
                        <div>
                            <div class="panel-heading">
                                <b><span style="font-size: 26.3px;">Product Info</span></b>
                                <span style="font-size:18px; color:#ebedee;"><STRIKE><sub></sub></STRIKE></span>
                            </div>
                            <table style="border: solid 2px; width: 100%">
                                <thead style="border: solid 2px">
                                    <tr>
                                        <th class="center" style="border: solid 2px">#</th>
                                        <th style="border: solid 2px">Product</th>
                                        <th style="border: solid 2px">Discount</th>
                                        <th style="border: solid 2px">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr style="border: solid 2px">
                                        <td class="center" style="width: 10; border: solid 2px" align="center">1</td>

                                        <td style="width: 60%; border: solid 2px" align="center">
                                            <a href="<?php
                                            echo $this->Html->url(array('plugin' => '', 'controller' => 'products',
                                                'action' => 'view', $productid), true)
                                            ?>"><?php echo $product_name; ?></a>
                                        </td>
                                        <td style="width: 20%; border: solid 2px" align="center"> --- </td>
                                        <td style="width: 10%; border: solid 2px" align="center"><?php echo '$'; ?><?php echo $product_price ?></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="col-md-5 pad_left_right">

                        <div class="panel panel-warning" style="font-size:0.9em;">
                            <div class="panel-heading">
                                <b><span style="font-size: 26.3px;">Customer Info</span></b>
                                <span style="font-size:18px; color:#ebedee;"><STRIKE><sub></sub></STRIKE></span>
                            </div>

                            <div>
                                <table style="border: solid 2px; width: 100%">
                                    <thead style="border: solid 2px">
                                        <tr>
                                            <th style="border: solid 2px">Customer Name</th>
                                            <th style="border: solid 2px">Customer Email</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr style="border: solid 2px">

                                            <td style="width: 50%; border: solid 2px" align="center"><?php echo $customer_name ?></td>
                                            <td style="width: 50%; border: solid 2px" align="center"><?php echo $customer_email ?></td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                </div>
            </body>
            <!-- Footer content end ======================================== -->
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>