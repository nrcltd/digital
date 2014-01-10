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
            <form method="Get" id="SearchForm" name="SearchForm" action="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'index')); ?>">
                <div class="right-inner-addon">
                    <i class="glyphicon glyphicon-search" style="cursor: pointer" onclick="search();"></i>
                    <input class="form-control" id="focusedInput" type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="Search by product name" style="font-size:12px;">
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-4"><a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'add')); ?>">
                <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;"><b>Add new product </b><i class="glyphicon glyphicon-plus"></i></button>
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
                        <td><a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'products', 'action' => 'view', $products[$index]['Product']['id']), true); ?>"><?php echo $this->Html->url(array('plugin' => '', 'controller' => 'products', 'action' => 'view', $products[$index]['Product']['id']), true); ?></a>
                            <!--<button type="button" class="btn btn-success btn-xs">copy</button>-->
                        </td>
                    </tr>
                <?php } ?>
            <?php endif; ?>

        </table>
    </div><div class="pull-right" style="visibility: hidden">Iphone Ipad</div>

</div>
<div class="row" style="visibility: hidden;">
    wer dsfa sdf ertwet  ads rdt wer sad as dgsdf g ert asf asdkfhaksjdfhajsdhfashdfkjahsdf ajskdfhk asdfkjahs dfk akjsdfh asdfhakjsfjashdfkjah sdfakjshdf asjdfh as df ew wer ds gsdfhg sdhw ert dfghsdgf
</div>
<script type="text/javascript">
    function search() {
        $("#SearchForm").submit();
    }
</script>