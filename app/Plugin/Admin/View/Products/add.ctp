<?php
/**
 * Admin Index
 *
 */
?>
<!-- Tab add-product  -->        

<div class="tab-pane fade in active" style="clear:both;" id="add-product"><br>

    <div class="">
        <div class="col-sm-4">
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-md btn-block"><i  style="font-size:50px;" class="glyphicon glyphicon-plus"></i><br><b>Upload photos</b></button>
            <br>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;" onclick="productlist();"><b>Product list  </b><i class="glyphicon glyphicon-list"></i></button>
        </div>



        <!--<form class="form-inline" role="form">-->
        <?php
        echo $this->Form->create('Product', array('url' => array('controller' => 'products', 'action' => 'add'), 'class' => 'form-inline', 'role' => 'form'));
        ?>
        <table class="table table-bordered">
            <tr style="visibility: hidden;">
                <td ><input type="text" class="form-control" id="" placeholder="" style=""></td>
                <td><input type="text" class="form-control" id="" placeholder="" style=""></td>
                <td><input type="text" class="form-control" id="" placeholder="" style=""></td>
            <tr>
                <td colspan="2">
                    <!--<input type="text" class="form-control no-border" id="" placeholder="Product name" style="">-->
                    <?php
                    echo $this->Form->input('product_name', array(
                        'type' => 'text',
                        'label' => false,
                        'class' => 'form-control no-border',
                        'placeholder' => 'Product name'
                    ));
                    ?>
                </td>
                <td>
                    <!--<input type="text" class="form-control no-border" id="" placeholder="Price" style="">-->
                    <?php
                    echo $this->Form->input('product_price', array(
                        'type' => 'text',
                        'label' => false,
                        'class' => 'form-control no-border',
                        'placeholder' => 'Price'
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <!--<textarea class="form-control no-border" rows="10" style="width:100%;" placeholder="Product description"></textarea>-->
                    <?php
                    echo $this->Form->input('product_description', array(
                        'type' => 'textarea',
                        'label' => false,
                        'escape' => false,
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
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><button type="submit" class="btn btn-success btn-md btn-block"><b>Save</b></i></button><br></div>
            <div class="col-sm-4"></div>
        </div>

        <!--</form>-->
        <?php echo $this->Form->end(); ?>
        <br>



    </div>
</div><br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
            </div>
            <div class="modal-body">
                <iframe id="upload_target" class="container-fluid" height="500" width="100%" name="upload_target" src="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'uploader', 'action' => 'index')); ?>"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    function productlist() {
        window.location = '<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'index')); ?>';
    }
</script>