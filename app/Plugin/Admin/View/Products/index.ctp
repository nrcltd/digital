<?php
/**
 * Admin Index
 *
 */
?>
<!-- Tab Product  -->
<div class="tab-pane fade in active" id="Product"><br>
    <div class="">
        <div class="col-sm-5">
            <div class="right-inner-addon">
                <i class="glyphicon glyphicon-search"></i>
                <input class="form-control" id="focusedInput" type="text" placeholder="Search by product name" style="font-size:12px;">
            </div>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-4"><a href="#add-product" data-toggle="tab">
                <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;"><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'add')); ?>" style="color:white"><b>Add new product </b></a><i class="glyphicon glyphicon-plus"></i></button>
                <br>
            </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered">
            <tr  style="background-color:#acacac;color:white;">
                <td style="border-right: 2px solid white;">Product name</td>
                <td style="border-right: 2px solid white;">Sale Volumn</td>
                <td style="border-right: 2px solid white;">Sale $</td>
                <td>Product page link</td>
            </tr>
            <?php if (!empty($products)):?>
            <tr>
                <td>Power ABC</td>
                <td>2</td>
                <td>200</td>
                <td>http://webproduct.com <button type="button" class="btn btn-success btn-xs">copy</button></td>
            </tr>
            <?php endif;?>
            <tr >
                <td>Power ABC</td>
                <td>2</td>
                <td>200</td>
                <td>http://webproduct.com</td>
            </tr>
            <tr >
                <td>Power ABC</td>
                <td>2</td>
                <td>200</td>
                <td>http://webproduct.com</td>
            </tr>
            <tr >             
                <td>Power ABC</td>
                <td>2</td>
                <td>200</td>
                <td>http://webproduct.com</td>
            </tr>
        </table>

    </div><div class="pull-right">Iphone Ipad</div>

</div>