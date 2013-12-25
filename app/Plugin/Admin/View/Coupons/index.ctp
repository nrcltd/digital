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
                    <li><a href="#">Name</a></li>
                    <li><a href="#">Email</a></li>
                    <li><a href="#">...</a></li>
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
            <a a href="#add-coupons" data-toggle="tab">
                <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;">
                    <a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'coupons', 'action' => 'add')); ?>" style="color:white"><b>add coupons </b></a><i class="glyphicon glyphicon-plus"></i></button></a>
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
            <tr>
                <td>Test Coupons code</td>
                <td>2</td>
                <td>100</td>
                <td><button type="button" class="btn btn-warning btn-xs">Delete</button></td>
            </tr>
            <tr >
                <td>Test Coupons code</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr >
                <td>Test Coupons code</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr >            
                <td>Test Coupons code</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

</div>
