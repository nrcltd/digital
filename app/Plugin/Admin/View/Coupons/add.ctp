<?php
/**
 * Admin Index
 *
 */
?>
<!-- Tab add coupons  -->  
<div class="tab-pane fade in active" id="add-coupons">
    <?php
    echo $this->Form->create('Coupon', array('url' => array('controller' => 'coupons', 'action' => 'add')));
    ?>
    <div class="">
        <!--        <div class="col-sm-6" style="margin-bottom:5px;">
                    <input class="form-control" id="focusedInput" type="text" placeholder="Coupons code" style="font-size:12px;">
                </div>-->
        <div class="col-sm-3" style="margin-bottom:5px;">
            <!--<input class="form-control" id="focusedInput" type="text" placeholder="Quantity" style="font-size:12px;">-->
            <?php
            echo $this->Form->input('coupon_quantity', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'style' => 'font-size:12px',
                'placeholder' => 'Quantity'
            ));
            ?>
        </div>
        <div class="col-sm-3" style="margin-bottom:5px;">
            <!--<input class="form-control" id="focusedInput" type="text" placeholder="Amount" style="font-size:12px;">-->

            <?php
            echo $this->Form->input('coupon_amount', array(
                'type' => 'text',
                'label' => false,
                'class' => 'form-control',
                'style' => 'font-size:12px',
                'placeholder' => 'Amount'
            ));
            ?>
            <br>
        </div>
        <?php
        echo $this->Form->input('product_id', array(
            'type' => 'hidden',
            'label' => false,
            'value' => $product,
            'class' => 'form-control',
            'style' => 'font-size:12px',
            'placeholder' => 'Amount'
        ));
        ?>
    </div>

    <div>
        <div class="col-sm-3" style="margin-bottom:5px;">
            <button type="submit" class="btn btn-success btn-md btn-block"><b>Add</b></button>
        </div>
        <div class="col-sm-3" style="margin-bottom:5px;">
            <button type="button" id="btncancel" class="btn btn-success btn-md btn-block" onclick="cancel();"><b>Cancel</b></button>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<div class="row" style="visibility: hidden;">
    wer dsfa sdf ertwet  ads rdt wer sad as dgsdf g ert asf asdkfhaksjdfhajsdhfashdfkjahsdf ajskdfhk asdfkjahs dfk akjsdfh asdfhakjsfjashdfkjah sdfakjshdf asjdfh as df ew wer ds gsdfhg sdhw ert dfghsdgf
</div>
<script type="text/javascript">
    function cancel() {
        window.location = '<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'coupons', 'action' => 'index')); ?>';
        ;
    }
</script>