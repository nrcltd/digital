<?php
/**
 * Admin Index
 *
 */
?>

<!-- Tab coupons  -->  
<div class="tab-pane fade in active" id="coupons">

    <div class="">

        <div class="col-sm-4" style="margin-bottom:5px;">
            <div class="btn-group"  style="margin-bottom:5px;">
                <button type="button" class="btn btn-default btn-block" style="width:85%;">Product filter</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:15%;">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <?php for ($index1 = 0; $index1 < count($products); $index1++) { ?>
                        <li><a href="#"><?php echo $products[$index1]['Product']['product_name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div><div style="visibility: hidden;">.</div>
        </div>

        <div class="col-sm-4" style="margin-bottom:5px;">
            <div class="right-inner-addon">
                <i class="glyphicon glyphicon-search"></i>
                <input class="form-control" id="focusedInput" type="text" placeholder="Search by coupons" style="font-size:12px;">
            </div>
        </div>
        <div class="col-sm-4" style="margin-bottom:5px;">
            <a a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'coupons', 'action' => 'add')); ?>">
                <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;">
                    <b>add coupons </b><i class="glyphicon glyphicon-plus"></i></button></a>
            <br>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr  style="background-color:#acacac;color:white;">
                <td style="border-right: 2px solid white;">Coupons code</td>
                <td style="border-right: 2px solid white;">Amount off</td>
                <td style="border-right: 2px solid white;">Quantity</td>
                <td>Actions</td>
            </tr>
            <?php for ($index = 0; $index < count($coupons); $index++) { ?>
                <tr>
                    <td><?php echo $coupons[$index]['Coupon']['coupon_code'] ?></td>
                    <td><?php echo $coupons[$index]['Coupon']['coupon_amount'] ?></td>
                    <td><?php echo $coupons[$index]['Coupon']['coupon_quantity'] ?></td>
                    <td><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'coupons', 'action' => 'delete', $coupons[$index]['Coupon']['id'])); ?>"><button type="button" class="btn btn-warning btn-xs">Delete</button></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>
