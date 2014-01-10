<?php
/**
 * Admin Index
 *
 */
?>
<!-- Tab Customers  -->  
<div class="tab-pane fade in active" id="Customers">

    <div class="">
        <div class="col-sm-4" style="margin-bottom:5px;">
            <div class="btn-group"  style="margin-bottom:5px;">
                <button type="button" class="btn btn-default btn-block" data-toggle="dropdown" style="width:85%;"><?php echo $productname; ?></button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:15%;">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <?php for ($index1 = 0; $index1 < count($products); $index1++) { ?>
                        <li><a href="<?php
                            echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'customers',
                                'action' => 'index',
                                '?' => array('product' => $products[$index1]['Product']['id'],
                                    'email' => $email)));
                            ?>"><?php echo $products[$index1]['Product']['product_name'] ?></a></li>
                        <?php } ?>
                </ul>
            </div><div style="visibility: hidden;">.</div>
        </div>


        <div class="col-sm-4"  style="margin-bottom:5px;">
            <form method="Get" id="SearchForm" name="SearchForm" action="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'customers', 'action' => 'index')); ?>">
                <div class="right-inner-addon">
                    <i class="glyphicon glyphicon-search" style="cursor: pointer" onclick="search();"></i>
                    <input type="hidden" name="product" value="<?php echo $product; ?>" />
                    <input class="form-control" name="email" value="<?php echo $email; ?>" id="focusedInput" type="text" placeholder="Search by email" style="font-size:12px;">
                </div>
            </form>
        </div>
        <div class="col-sm-4" style="margin-bottom:5px;">
            <form method="Get" id="SearchForm" name="SearchForm" action="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'customers', 'action' => 'export')); ?>">
                <input type="hidden" name="product" value="<?php echo $product; ?>" />
                <input name="email" value="<?php echo $email; ?>" type="hidden">
                <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;">
                    <b>Export customer list </b></button>
                <br>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr  style="background-color:#acacac;color:white;">
                <td style="border-right: 2px solid white;">Name</td>
                <td style="border-right: 2px solid white;">Email</td>
                <td style="border-right: 2px solid white;">Purchased date</td>
                <td>Actions</td>
            </tr>

            <?php for ($index = 0; $index < count($orders); $index++) { ?>
                <tr>
                    <td><?php echo $orders[$index]['Order']['customer_name'] ?></td>
                    <td><?php echo $orders[$index]['Order']['customer_email'] ?></td>
                    <td><?php echo date_format(date_create($orders[$index]["Order"]['purchased_date']), 'jS M Y'); ?></td>
                    <td><button type="button" class="btn btn-warning btn-xs">Resend invoice</button></td>
                </tr>
            <?php } ?>

        </table>
    </div>

</div>
<div class="row" style="visibility: hidden;">
    wer dsfa sdf ertwet  ads rdt wer sad as dgsdf g ert asf asdkfhaksjdfhajsdhfashdfkjahsdf ajskdfhk asdfkjahs dfk akjsdfh asdfhakjsfjashdfkjah sdfakjshdf asjdfh as df ew wer ds gsdfhg sdhw ert dfghsdgf
</div>
<script type="text/javascript">
    function search() {
        $("#SearchForm").submit();
    }
</script>