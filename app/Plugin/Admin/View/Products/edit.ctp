<?php
/**
 * Admin Index
 *
 */
?>
<!-- Tab add-product  -->        

<div class="tab-pane fade in active" style="clear:both;" id="add-product"><br>
    <?php echo $this->Session->flash(); ?>
    <div class="">
        <div class="col-sm-4">
            <button type="submit" class="btn btn-success btn-md btn-block"><i  style="font-size:50px;" class="glyphicon glyphicon-plus"></i><br><b>Upload photos</b></button>
            <br>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;" onclick="productlist();"><b>Product list  </b><i class="glyphicon glyphicon-list"></i></button>
        </div>



        <!--        <form class="form-inline" role="form">-->
        <?php
        echo $this->Form->create('Product', array('url' => array('controller' => 'products', 'action' => 'edit', $products['Product']['id']), 'class' => 'form-inline', 'role' => 'form'));
        ?>
        <table class="table table-bordered">
            <tr style="visibility: hidden;">
                <td >
                    <?php
                    echo $this->Form->input('id', array(
                        'type' => 'hidden',
                        'label' => false,
                        'value' => $products['Product']['id']
                    ));
                    ?></td>
                <td><input type="text" class="form-control" id="" placeholder="" style=""></td>
                <td><input type="text" class="form-control" id="" placeholder="" style=""></td>
            <tr>
                <td colspan="2">
<!--                    <input type="text" class="form-control no-border" id="" placeholder="Product name" style="">-->
                    <?php
                    echo $this->Form->input('product_name', array(
                        'type' => 'text',
                        'label' => false,
                        'value' => $products['Product']['product_name'],
                        'class' => 'form-control no-border',
                        'placeholder' => 'Product name'
                    ));
                    ?>
                </td>
                <td>
<!--                    <input type="text" class="form-control no-border" id="" placeholder="Price" style="">-->


                    <?php
                    echo $this->Form->input('product_price', array(
                        'type' => 'text',
                        'label' => false,
                        'value' => $products['Product']['product_price'],
                        'class' => 'form-control no-border',
                        'placeholder' => 'Price'
                    ));
                    ?>

                </td>
            </tr>
            <tr>
                <td colspan="3">
<!--                    <textarea class="form-control no-border" rows="10" style="width:100%;" placeholder="Product description"></textarea>-->

                    <?php
                    echo $this->Form->input('product_description', array(
                        'type' => 'textarea',
                        'label' => false,
                        'escape' => false,
                        'value' => $products['Product']['product_description'],
                        'class' => 'form-control no-border',
                        'rows' => '10',
                        'style' => 'width:100%',
                        'placeholder' => 'Product description'
                    ));
                    ?>
                </td>
            </tr>
            </tr>
        </table>

        <div class="">
            <div class="col-sm-3"></div>
            <div class="col-sm-3"><button type="submit" class="btn btn-success btn-md btn-block"><b>Save</b></i></button><br></div>
            <div class="col-sm-3"><button type="submit" class="btn btn-warning btn-md btn-block"><b>Pause</b></i></button><br></div>
            <div class="col-sm-3"></div>
        </div>
        <!--        </form>-->
        <?php echo $this->Form->end(); ?>
        <br>



    </div>
</div><br>
<script type="text/javascript">
    function productlist() {
        window.location = '<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'index')); ?>';
    }
</script>