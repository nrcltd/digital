<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
echo $this->Html->css('main/font-awesome');
echo $this->Html->css($theme . '/bootstrap.css');
echo $this->Html->css('main/base.css', array('id' => 'callCss', 'media' => 'screen'));
?>
<div class="container-fluid" style="background:rgba(34, 34, 34, 0);">
    <div class="container-fluid">
        <div class="col-sm-3"></div>

        <!-- Body content begin ======================================== -->

        <div class="col-sm-6 centered">  
            <body style="background-image:url('<?php echo $this->Html->url('/img/pattern/' . $theme . '.png', true) ?>'); center;">
                <!-- Body content begin -->
                <div class="container-fluid">

                    <b><span style="font-size: 26.3px;">Thanks for your downloading our product.</span></b>
                    <p style="color: rgba(0, 0, 0, 0.4);font-size:12px;">
                        <i>Please check your email to get link for downloading file.</i></p>
                </div>
            </body>
            <!-- Footer content end ======================================== -->
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>