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
            <?php if (!empty($products)): ?>
                <?php for ($index = 0; $index < count($products); $index++) { ?>
                    <tr>
                        <td><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'edit', $products[$index]['Product']['id'])); ?>"><?php echo $products[$index]['Product']['product_name']; ?></a></td>
                        <?php if (!empty($products)): ?>
                            <td><?php echo count($products[$index]['Order']); ?></td>
                        <?php else : ?>
                            <td>0</td>
                        <?php endif; ?>
                        <td><?php echo $products[$index]['Product']['product_price']; ?></td>
                        <td><?php echo $this->Html->url(array('plugin' => '', 'controller' => 'products', 'action' => 'view', $products[$index]['Product']['id']), true); ?> <button type="button" class="btn btn-success btn-xs">copy</button></td>
                    </tr>
                <?php } ?>
            <?php endif; ?>

        </table>
    </div><div class="pull-right" style="visibility: hidden">Iphone Ipad</div>

</div>

<script type="text/javascript">

</script>