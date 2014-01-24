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
        <!--        <form class="form-inline" role="form">-->
        <?php
        echo $this->Form->create('Product', array('url' => array('controller' => 'products', 'action' => 'edit', $products['Product']['id']), 'class' => 'form-inline', 'role' => 'form'));
        ?>
        <div class="col-sm-4">
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-md btn-block"><i  style="font-size:50px;" class="glyphicon glyphicon-plus"></i><br><b>Upload photos</b></button>
            <?php
            echo $this->Form->input('product_image_id', array(
                'type' => 'hidden',
                'label' => false,
                'value' => $products['Product']['product_image_id'],
                'class' => 'form-control no-border'
            ));
            ?>
            <br>
        </div>
        <div class="col-sm-4">
            <div id="thumbnail_user_containner" style="display: <?php echo $hidephoto; ?>">
                <img id="thumbnail_user_photo" class="media-object img-thumbnail img-responsive center" style="height: 90px" src="<?php echo $this->Html->url('/img/' . 'upload/' . $image_user_url, true) ?>" alt="...">
            </div>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-md btn-block" style="background-color:black;color:white;" onclick="productlist();"><b>Product list  </b><i class="glyphicon glyphicon-list"></i></button>
        </div>




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
            <tr>
                <td colspan="2"><label class="form-control no-border" id="filename_product"><?php echo $filename_product; ?></label></td>
                <td><label class="form-control no-border" id="filesize_product"><?php echo $filesize_product; ?></label></td>
            </tr>
        </table>

        <?php
        echo $this->Form->input('product_file_id', array(
            'type' => 'hidden',
            'label' => false,
            'value' => $products['Product']['product_file_id'],
            'class' => 'form-control no-border'
        ));
        ?>

        <div class="">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><button type="submit" name="saveproduct" class="btn btn-success btn-md btn-block"><b>Save</b></i></button><br></div>
            <div class="col-sm-3"><button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-success btn-md btn-block"><b>Add File</b</i></button><br></div>
            <div class="col-sm-3"><button type="button" class="btn btn-warning btn-md btn-block" onclick="pauseproduct();" id="btnpause"><b><?php echo $activelabel; ?></b></i></button><br></div>
            <div class="col-sm-1"></div>
        </div>
        <!--        </form>-->
        <?php echo $this->Form->end(); ?>
        <br>

        <input type="hidden" id="pausedprodcut" value="<?php echo $activelabelvalue; ?>"/>
    </div>
</div><br>
<div class="row" style="visibility: hidden;">
    wer dsfa sdf ertwet  ads rdt wer sad as dgsdf g ert asf asdkfhaksjdfhajsdhfashdfkjahsdf ajskdfhk asdfkjahs dfk akjsdfh asdfhakjsfjashdfkjah sdfakjshdf asjdfh as df ew wer ds gsdfhg sdhw ert dfghsdgf
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 1100px">
        <div class="modal-content" style="width: 1100px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
            </div>
            <div class="modal-body">
                <iframe id="upload_target" class="container-fluid" height="500" width="100%" name="upload_target" src="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'uploader', 'action' => 'index', $products['Product']['product_image_id'], 'mode' => 0)); ?>"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload File</h4>
            </div>
            <div class="modal-body">
                <iframe id="upload_target" class="container-fluid" height="150" width="100%" name="upload_target" src="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'file_uploader', 'action' => 'index')); ?>"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<input type="hidden" id="oldimagefile" value="<?php echo $products['Product']['product_image_id']; ?>">
<input type="hidden" id="oldimagefilename" value="">
<input type="hidden" id="oldproductfile" value="<?php echo $products['Product']['product_file_id']; ?>">
<script type="text/javascript">
    function productlist() {
        window.location = '<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'index')); ?>';
    }

    function updateimage(imageid, imagepath, oldname) {

        var oldimagefile = $("#oldimagefile").val();
        var oldimagefilename = $("#oldimagefilename").val();
        if (oldimagefile.length > 0) {
            if (oldimagefilename != oldname) {
                var olddata = {imageid: oldimagefile};
                $.ajax({
                    type: "POST",
                    url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'admin_app', 'action' => 'deleteimagefiles')); ?>",
                    data: olddata,
                    success: function(data) {

                    }

                });
            }
        }
        $("#oldimagefile").val(imageid);
        $("#oldimagefilename").val(oldname);

        $("#ProductProductImageId").val(imageid);
        var productid = $("#ProductId").val();
        var data = {imageid: imageid, productid: productid};
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'updateavatar')); ?>",
            data: data,
            success: function(data) {

            }

        });
        $("#thumbnail_user_containner").css('display', 'block');
        $("#thumbnail_user_photo").attr('src', '<?php echo $this->Html->url('/img/' . 'upload/', true) ?>' + imagepath);
        $('#myModal').modal('hide');
    }

    function updateproductfile(productfileid, filename, filesize) {
        $("#ProductProductFileId").val(productfileid);
        $("#filename_product").html(filename);
        $("#filesize_product").html(filesize);
        $('#myModal1').modal('hide');

        var oldproductfile = $("#oldproductfile").val();
        if (oldproductfile.length > 0) {
            var olddata = {imageid: oldproductfile};
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'admin_app', 'action' => 'deleteproductfiles')); ?>",
                data: olddata,
                success: function(data) {

                }

            });
        }
        $("#oldproductfile").val(productfileid);
    }

    function pauseproduct() {

        var productid = $("#ProductId").val();
        var paused = $("#pausedprodcut").val();
        var data = {paused: paused, productid: productid};
        $("#btnpause").html("<b>Submit...</b></i>");
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'products', 'action' => 'pauseproduct')); ?>",
            data: data,
            success: function(data) {
                $("#btnpause").html("<b>Pause</b></i>");
                var obj = $.parseJSON(data);
                $("#pausedprodcut").val(obj.result_code);
                if (obj.result_code === "1") {
                    $("#btnpause").html("<b>Pause</b></i>");
                } else {
                    $("#btnpause").html("<b>Active</b></i>");
                }
            }

        });
    }
</script>