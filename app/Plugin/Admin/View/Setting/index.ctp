<?php
/**
 * Admin Index
 *
 */
?>
<!-- Tab settings  -->  
<div class="tab-pane fade in active" id="settings">

    <?php
    echo $this->Form->create('Setting', array('url' => array('controller' => 'setting', 'action' => 'index')));
    ?>

    <div class="row">

        <H4 style="margin-top:0px;">Seller information</H4>
        <div class="col-sm-3" style="float:left;text-align:center;">
            <button type="submit" class="btn btn-circle btn-lg btn-success btn-md btn-block">
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
                        echo $this->Form->input('seller_facebook_id', array(
                            'type' => 'text',
                            'label' => false,
                            'value' => $seller_facebook_id,
                            'class' => 'form-control',
                            'style' => 'font-size:12px',
                            'placeholder' => ''
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
                        echo $this->Form->input('seller_twitter_id', array(
                            'type' => 'text',
                            'label' => false,
                            'value' => $seller_twitter_id,
                            'class' => 'form-control',
                            'style' => 'font-size:12px',
                            'placeholder' => ''
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
            
                <?php
                echo $this->Form->input('seller_password', array(
                    'type' => 'password',
                    'label' => false,
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
                <input class="form-control" id="focusedInput" type="text" placeholder="Confirm password" style="font-size:12px;">
            </div>
        </div>
        <div class="col-sm-2">
            <H4 style="visibility: hidden;">OK</H4>
            <button class="btn-circle btn-green"><span class="glyphicon glyphicon-ok"></span></button>
            <button class="btn-circle btn-red"><span class="glyphicon glyphicon-remove"></span></button>
        </div>
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
            <div class="right-inner-addon">
                <input class="form-control" id="focusedInput" type="text" placeholder="User PHP mail" style="font-size:12px;">
            </div>
        </div>
        <div class="col-sm-2"></div>
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
                    'type' => 'text',
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
                <button type="submit" class="btn btn-success btn-md btn-block"><b>Send a test mail</b></button>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>


    <div class="" style="clear:both;">          
        <div class="col-sm-5" style="margin-bottom:5px;">
            <H4>Themes</H4>

            <div class="btn-group" style="margin-bottom:5px;">
                <button type="button" class="btn btn-default btn-block" data-toggle="dropdown" style="width:85%;">Winter</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:15%;">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <?php for ($index = 0; $index < count($themes); $index++) { ?>
                        <li><a href="#"><?php echo $themes[$index]['Theme']['theme_name'] ?></a></li>
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
