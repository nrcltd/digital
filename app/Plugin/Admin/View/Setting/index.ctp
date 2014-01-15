<?php
/**
 * Admin Index
 *
 */
//echo $this->Html->css('/Admin/css/upload.css');
//echo $this->Html->script('/Admin/js/jquery-1.8.3.min.js');
//echo $this->Html->script('/Admin/js/jquery.imgareaselect.min.js');
//echo $this->Html->script('/Admin/js/effects.js');
?>
<!-- Tab settings  -->  
<div class="tab-pane fade in active" id="settings">

    <?php
    echo $this->Form->create('Setting', array('url' => array('controller' => 'setting', 'action' => 'index')));
    ?>

    <div class="row">

        <H4 style="margin-top:0px;">Seller information</H4>
        <div class="col-sm-3" style="float:left;text-align:center;">
            <button type="submit" class="btn btn-circle btn-lg btn-success btn-md btn-block" data-toggle="modal" data-target="#myModal">
                <i style="font-size:50px;" class="glyphicon glyphicon-plus"></i><br></button><b>Upload photos</b>
        </div>
        <div class="col-sm-9" style="float:right;">

            <div style="clear:both;">
                <div class="col-sm-6" style="margin-bottom:5px;">
<!--                    <input class="form-control" id="focusedInput" type="text" placeholder="Name" style="font-size:12px;">-->

                    <?php
                    echo $this->Form->input('seller_name', array(
                        'type' => 'text',
                        'label' => false,
                        'value' => $seller_name,
                        'class' => 'form-control',
                        'style' => 'font-size:12px',
                        'placeholder' => 'Name'
                    ));
                    ?>
                </div>
                <div class="col-sm-6"></div>
            </div>

            <div style="clear:both;">
                <div class="col-sm-12" style="margin-bottom:5px;">
                    <!--<textarea class="form-control" rows="6" style="width:100%;font-size:12px;" placeholder="Product description"></textarea>-->
                    <?php
                    echo $this->Form->input('seller_description', array(
                        'type' => 'textarea',
                        'label' => false,
                        'rows' => '6',
                        'value' => $seller_description,
                        'class' => 'form-control',
                        'style' => 'width:100%;font-size:12px;',
                        'placeholder' => 'Product description'
                    ));
                    ?>
                </div>
            </div>

            <div>
                <div class="col-sm-6" style="margin-bottom:5px;">
                    <div  class="right-inner-addon left-inner-addon">
                        <i class="glyphicon glyphicon-link"></i>
                        <!--<input class="form-control" id="focusedInput" type="text" placeholder="" style="font-size:12px;">-->
                        <?php
                        echo $this->Form->input('seller_facebook_url', array(
                            'type' => 'text',
                            'label' => false,
                            'value' => $seller_facebook_url,
                            'class' => 'form-control',
                            'style' => 'font-size:12px',
                            'placeholder' => 'facebook url'
                        ));
                        ?>
                    </div>
                    <i class="left-inner-addon"><img src="<?php echo $this->Html->url('/admin/img/facebook.png', true) ?>"></i>
                </div>
                <div class="col-sm-6" style="margin-bottom:5px;">
                    <div  class="right-inner-addon left-inner-addon">
                        <i class="glyphicon glyphicon-link"></i>
                        <!--<input class="form-control" id="focusedInput" type="text" placeholder="" style="font-size:12px;">-->
                        <?php
                        echo $this->Form->input('seller_twitter_url', array(
                            'type' => 'text',
                            'label' => false,
                            'value' => $seller_twitter_url,
                            'class' => 'form-control',
                            'style' => 'font-size:12px',
                            'placeholder' => 'twitter url'
                        ));
                        ?>
                    </div>
                    <i class="left-inner-addon"><img src="<?php echo $this->Html->url('/admin/img/twitter.png', true) ?>"></i>
                </div>
            </div>
        </div>
    </div>



    <div class="" style="clear:both;">          
        <div class="col-sm-5">
            <H4>Merchant PayPal account</H4>
            <div>
                <!--<input class="form-control" id="focusedInput" type="text" placeholder="PayPal account ID" style="font-size:12px;">-->
                <?php
                echo $this->Form->input('seller_paypal_account', array(
                    'type' => 'text',
                    'label' => false,
                    'value' => $seller_paypal_account,
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'PayPal account ID'
                ));
                ?>
            </div>
        </div>
        <div class="col-sm-7"></div>
    </div>


    <div class="" style="clear:both;">
        <div class="col-sm-5">
            <H4>Change password</H4>
            <div class="right-inner-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <!--<input class="form-control" id="focusedInput" type="text" placeholder="New password" style="font-size:12px;">-->

                <!--<input class="form-control" id="seller_password" type="password" placeholder="New password" style="font-size:12px;">-->

                <?php
                echo $this->Form->input('seller_password', array(
                    'type' => 'password',
                    'label' => false,
                    'id' => 'seller_password',
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'New password'
                ));
                ?>
            </div>
        </div>
        <div class="col-sm-5">
            <H4 style="visibility: hidden;">Confirm password</H4>
            <div class="right-inner-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <!--<input class="form-control" id="confirm_seller_password" type="password" placeholder="Confirm password" style="font-size:12px;">-->


                <?php
                echo $this->Form->input('confirm_seller_password', array(
                    'type' => 'password',
                    'label' => false,
                    'id' => 'confirm_seller_password',
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'Confirm password'
                ));
                ?>
            </div>
        </div>
        <!--        <div class="col-sm-2">
                    <H4 style="visibility: hidden;">OK</H4>
                    <button type="button" class="btn-circle btn-green" onclick="updatepassword();"><span class="glyphicon glyphicon-ok"></span></button>
                    <button type="button" class="btn-circle btn-red" onclick="resetpassword();"><span class="glyphicon glyphicon-remove"></span></button>
                </div>-->
    </div>


    <div class="" style="clear:both;">
        <div class="col-sm-5">
            <H4>SMTP/PHP mail</H4>
            <div class="right-inner-addon" style="margin-bottom:5px;">
                <!--<input class="form-control" id="focusedInput" type="text" placeholder="Smtp host" style="font-size:12px;">-->
                <?php
                echo $this->Form->input('smtp_host', array(
                    'type' => 'text',
                    'label' => false,
                    'value' => $smtp_host,
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'Smtp host'
                ));
                ?>
            </div>
        </div>
        <div class="col-sm-5">
            <H4 style="visibility: hidden;">User PHP mail</H4>
            <div class="input-group input text">
                <span class="input-group-addon">
                    <!--<input type="checkbox">-->
                    <!--<input name="data[Setting][use_php_email]" type="checkbox" id="SettingUsePhpEmail">-->
                    <?php
                    if ($use_php_email == 1) {
                        echo $this->Form->input('use_php_email', array(
                            'type' => 'checkbox',
                            'label' => false,
                            'checked' => 'checked'
                        ));
                    } else {
                        echo $this->Form->input('use_php_email', array(
                            'type' => 'checkbox',
                            'label' => false
                        ));
                    }
                    ?>
                </span>
                <input class="form-control" id="focusedInput" type="text" placeholder="User PHP mail" style="font-size:12px;">
            </div><!-- /input-group -->
            <!--<div class="right-inner-addon">-->

<!--                <input class="form-control" id="focusedInput" type="text" placeholder="User PHP mail" style="font-size:12px;">-->
            <!--</div>-->
        </div>
        <div class="col-sm-2"></div>
    </div>

    <div class="" style="clear:both;">
        <div class="col-sm-5">
            <div class="right-inner-addon" style="margin-bottom:5px;">
                <!--<input class="form-control" id="focusedInput" type="text" placeholder="Smtp user" style="font-size:12px;">-->
                <?php
                echo $this->Form->input('smtp_port', array(
                    'type' => 'text',
                    'label' => false,
                    'value' => $smtp_port,
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'Smtp port'
                ));
                ?>
            </div>
        </div>
        <div class="col-sm-7"></div>
    </div>

    <div class="" style="clear:both;">
        <div class="col-sm-5">
            <div class="right-inner-addon" style="margin-bottom:5px;">
                <!--<input class="form-control" id="focusedInput" type="text" placeholder="Smtp user" style="font-size:12px;">-->
                <?php
                echo $this->Form->input('smtp_user', array(
                    'type' => 'text',
                    'label' => false,
                    'value' => $smtp_user,
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'Smtp user'
                ));
                ?>
            </div>
        </div>
        <div class="col-sm-7"></div>
    </div>

    <div class="" style="clear:both;">
        <div class="col-sm-5">
            <div class="right-inner-addon" style="margin-bottom:5px;">
                <!--<input class="form-control" id="focusedInput" type="text" placeholder="Smtp password" style="font-size:12px;">-->

                <?php
                echo $this->Form->input('smtp_password', array(
                    'type' => 'password',
                    'label' => false,
                    'value' => $smtp_password,
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'Smtp password'
                ));
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="right-inner-addon">
                <button id="btnsendemail" type="button" data-loading-text="Sending..." class="btn btn-success btn-md btn-block" onclick="sendemail();"><b>Send a test mail</b></button>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="" style="clear:both;">
        <div class="col-sm-5">
            <div class="right-inner-addon" style="margin-bottom:5px;">
                <!--<input class="form-control" id="focusedInput" type="text" placeholder="Smtp user" style="font-size:12px;">-->
                <?php
                echo $this->Form->input('smtp_test_user', array(
                    'type' => 'text',
                    'label' => false,
                    'value' => $smtp_test_user,
                    'class' => 'form-control',
                    'style' => 'font-size:12px',
                    'placeholder' => 'Test user'
                ));
                ?>
            </div>
        </div>
        <div class="col-sm-7"></div>
    </div>


    <div class="" style="clear:both;">          
        <div class="col-sm-5" style="margin-bottom:5px;">
            <H4>Themes</H4>

            <div class="btn-group" style="margin-bottom:5px;">
                <?php
                echo $this->Form->input('frontend_theme', array(
                    'type' => 'hidden',
                    'label' => false,
                    'value' => $frontend_theme,
                    'id' => 'frontend_theme'
                ));
                ?>
                <button type="button" class="btn btn-default btn-block" data-toggle="dropdown" style="width:85%;" id="theme_value_selector"><?php echo $theme_selector; ?></button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:15%;">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <?php for ($index = 0; $index < count($themes); $index++) { ?>
                        <li><a href="javascript:updatetheme(<?php echo $themes[$index]['Theme']['id'] ?>, '<?php echo $themes[$index]['Theme']['theme_name'] ?>');"><?php echo $themes[$index]['Theme']['theme_name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>  


        </div>

        <div class="col-sm-7" style="margin-top:5px;"></div>
    </div>

    <div class="" style="clear:both;">          

        <div class="col-sm-2" style="margin-bottom:5px;">
            <button type="submit" class="btn btn-success btn-md btn-block"><b>Save</b></button>
        </div> 
        <div class="col-sm-3">
            <button type="submit" class="btn btn-success btn-md btn-block"><b>Cancel</b></button>
        </div> 

        <div class="col-sm-7"></div>
    </div>

    <?php echo $this->Form->end(); ?>
</div>
<div class="row" style="visibility: hidden;">
    wer dsfa sdf ertwet  ads rdt wer sad as dgsdf g ert asf asdkfhaksjdfhajsdhfashdfkjahsdf ajskdfhk asdfkjahs dfk akjsdfh asdfhakjsfjashdfkjah sdfakjshdf asjdfh as df ew wer ds gsdfhg sdhw ert dfghsdgf
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
            </div>
            <div class="modal-body">
                <iframe id="upload_target" class="container-fluid" height="500" width="100%" name="upload_target" src="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'uploader', 'action' => 'index', 'mode' => 1)); ?>"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    function resetpassword() {
        $("#seller_password").val("");
        $("#confirm_seller_password").val("");
    }

    function updatepassword() {
        var password = $("#seller_password").val();
        var confirm_seller_password = $("#confirm_seller_password").val();
        if (password.length === 0)
            return;
        if (confirm_seller_password.length === 0)
            return;
        if (password.length < 6)
            return;
        if (password !== confirm_seller_password)
            return;
        var data = {password: password};
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'setting', 'action' => 'updatepassword')); ?>",
            data: data,
            success: function(data) {
//                alert(data);
                resetpassword();
            }

        });
    }


    function updatetheme(id, theme_name) {
        $("#frontend_theme").val(id);
        $("#theme_value_selector").html(theme_name);
    }

    $(function() {
        $('.checkbox').removeClass('checkbox');


        $("#SettingIndexForm").submit(function(event) {
            var password = $("#seller_password").val();
            var confirm_seller_password = $("#confirm_seller_password").val();
            if ((password.length === 0) && (confirm_seller_password.length === 0))
                return;
            else if ((password.length === 0)) {
                event.preventDefault();
            } else if (confirm_seller_password.length === 0) {
                event.preventDefault();
            }
            if (password.length < 6)
                event.preventDefault();
            if (confirm_seller_password.length < 6)
                event.preventDefault();
            if (password !== confirm_seller_password)
                event.preventDefault();

            return;
        });
    })

    function updateimage(imageid) {
        var data = {imageid: imageid};
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'setting', 'action' => 'updateavatar')); ?>",
            data: data,
            success: function(data) {

            }

        });
    }

    function sendemail() {
        $("#btnsendemail").html("<b>Sending...</b>");
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'setting', 'action' => 'sendemail')); ?>",
            success: function(data) {
                $("#btnsendemail").html("<b>Send a test mail</b>");
                var obj = $.parseJSON(data);
                if (obj.result_code === "1") {
                    alert("Send email successfully!");
                } else {
                    alert("Send email fail!");
                }
            }

        });
    }
</script>
