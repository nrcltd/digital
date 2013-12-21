<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
echo $this->Html->css('main/font-awesome');
echo $this->Html->css($theme . '/bootstrap.css');
echo $this->Html->css('main/base.css', array('id' => 'callCss', 'media' => 'screen'));
?>
<div class="container-fluid" style="background:rgba(34, 34, 34, 0);">
    <div class="container-fluid">
        <div class="col-sm-3"></div>

        <!-- Body content begin ======================================== -->

        <div class="col-sm-6">  
            <body style="background-image:url('<?php echo $this->Html->url('/img/pattern/' . $theme . '.png', true) ?>'); center;">
                <!-- Body content begin -->
                <div class="container-fluid">
                    <!-- Sectionone begin ======================================== -->
                    <div style="color:white; background:rgba(54, 57, 59, 1);border-bottom: 1px solid #ffffff;">
                        <div class="widget-header widget-header-large">
                            <div class="widget-toolbar no-border invoice-info">
                                <span class="invoice-info-label">Invoice:</span>
                                <span class="red">#<?php echo $order["Order"]['id']; ?></span>

                                <br>
                                <span class="invoice-info-label">Date:</span>
                                <span class="blue"><?php echo date_format(date_create($order["Order"]['purchased_date']), 'd-m-Y'); ?></span>
                            </div>

                        </div>
                    </div>

                    <br>
                    <!-- Sectionone ends ======================================== -->            

                    <div class="col-md-7 pad_left_right">
                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Product</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="center">1</td>

                                        <td>
                                            <a href="<?php echo $this->Html->url(array('controller' => 'shop',
                                                'action'=>'view', $product["Product"]['id'])) ?>"><?php echo $product["Product"]['product_name'] ?></a>
                                        </td>
                                        <td> --- </td>
                                        <td><?php echo $currencyccode;?><?php echo $product["Product"]['product_price'] ?></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="col-md-5 pad_left_right">

                        <div class="panel panel-warning" style="font-size:0.9em;">
                            <i class="left-inner-addon"><img id="callcorner" src="<?php echo $this->Html->url('/img/corner/winter.png', true) ?>" alt="..."></i>
                            <div class="panel-heading">
                                <b><span style="font-size: 26.3px;">Customer Info</span></b>
                                <span style="font-size:18px; color:#ebedee;"><STRIKE><sub></sub></STRIKE></span>
                            </div>
                            <div class="panel-body" >

                                <i class="left-addon" style="position: relative; z-index: -1;"></i>


                                <div  role="form" >

                                <div class="form-group" style="font-size: 14px;">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="btn-circle btn-customize"><span class="glyphicon glyphicon-ok"></span></button>
                                            <span>Customer Name</span><span class="pull-right"></span>
                                            <p style="color: rgba(0, 0, 0, 0.4);margin-left:24px; font-size:12px;">
                                                <i>Truong Ba Phuong</i></p>
                                        </li>
                                        <li>
                                            <button class="btn-circle btn-customize"><span class="glyphicon glyphicon-ok"></span></button>
                                            <span>Customer Email</span><span class="pull-right"></span>
                                            <p style="color: rgba(0, 0, 0, 0.4);margin-left:24px; font-size:12px;">
                                                <i>truong.ba.phuong@gmail.com</i></p>                 
                                        </li>
                                    </ul>


                                    <div class="right-inner-addon control-group">

                                    </div><br>
                                    <div class="right-inner-addon control-group">

                                    </div><br>
                                    <div class="control-group">

                                    </div><br>
                                    <div id="demo" class="collapse out">
                                        <input class="form-control" type="text" placeholder="Coupon code"> 
                                    </div>

                                    <!-- <hr style="border-top: 1.5px dotted green; width:150px" /> -->
                                    <!--<button type="submit" class="btn btn-primary btn-lg btn-block" style="font-size: 24px;"><b>Buy</b></button>-->
                                    <?php 
                                         echo $this->Paypal->button('Pay Now', array('amount' => '12.00', 'item_name' => 'test item',
                                             'class' => 'btn btn-primary btn-lg btn-block',
                                             'style' => 'font-size: 24px;'));
                                    ?>
                                    
                                </div>
                                </div>
                            </div></div>

                    </div>





                </div>
            </body>
            <!-- Footer content end ======================================== -->
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>