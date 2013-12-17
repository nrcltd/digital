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
echo $this->Html->css('spring/bootstrap.css');
echo $this->Html->css('main/base.css', array('id' => 'callCss', 'media' => 'screen'));
?>
<div class="container-fluid" style="background:rgba(34, 34, 34, 0);">
    <div class="row">
        <div class="col-sm-3"></div>

        <!-- Body content begin ======================================== -->
        <div class="col-sm-6">  
            <body style="background-image:url('<?php echo $this->Html->url('/img/pattern/spring.png', true)?>'); center;">

                <nav class="navbar navbar-wrapper navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container" style="display:none">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                            <!--      <a class="navbar-brand" href="#">Digital Sell</a> -->
                        </div> 
                        <!-- Collect the nav links, forms, and other content for toggling -->         
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li class=""><a href="#"><span class="icon-home"></span> Home</a></li>   
                                <li><a href="#"><span class="icon-group"></span> About Us</a></li>
                                <li><a href="#"><span class="icon-comment"></span> Contact Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav">


                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                        <span class="icon-user"></span>Log in / Sign up<strong class="caret"></strong></a>
                                    <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                         Login form here 
                                        <div class="account-wall">
                                              <img class="profile-img" src="themes/images/photo.png" alt=""> 

                                            <button type="button" class="btn btn-primary btn-circle btn-xl">
                                                <i style="font-size:1.4em;" class="glyphicon glyphicon-user"></i></button>

                                            <form class="form-signin">
                                                <input type="text" class="form-control" placeholder="Username" required autofocus>
                                                <input type="password" class="form-control" placeholder="Password" required>
                                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                                <label class="checkbox pull-left">
                                                    <input type="checkbox" value="remember-me"> Remember me
                                                </label>
                                                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                                            </form>
                                        </div>

                                    </div>
                                </li>

                            </ul>
                        </div>           
                    </div>
                </nav>  




                <!-- Body content begin -->

                <div class="row">
                    <!-- Sectionone begin ======================================== -->
                    <div style="color:white; background:rgba(54, 57, 59, 1);border-bottom: 1px solid #ffffff;">
                        <p style="font-size:1.4em;padding:10px"><b>The Chart of 300 Hand Tools</b></p>
                    </div>

                    <section id="header_img" style="height:300px; 
                             background-image:url('<?php echo $this->Html->url('/img/download_link.jpg', true)?>')">
                    </section>

                    <br>
                    <!-- Sectionone ends ======================================== -->            

                    <div class="col-md-7 pad_left_right">
                        <p>his meticulously organized chart places 300 hand tools into five categories: tools that measure, stabilize, mark, divide and manipulate. 24" x 36"</p>
                        <p>Pencil is made to make you happy, and we back that up with our return policies. If you're not pleased, just contact us within 30 days and we will get you a refund or replacement. While we hope it doesn't come to that, we'll make it as painless as possible with free return shipping. In addition to the <a href="#">"30-day Satisfaction Guarantee,"</a> Pencil is covered by a limited warranty for a full year.</p>
                        <br>
                    </div>
                    <div class="col-md-5 pad_left_right">

                        <div class="panel panel-warning" style="font-size:0.9em;">
                            <i class="left-inner-addon"><img id="callcorner" src="<?php echo $this->Html->url('/img/corner/spring.png', true)?>" alt="..."></i>
                            <div class="panel-heading">
                                <b><span style="font-size: 26.3px;">Now </span><span style="font-size: 35.4px;">$12.00 </span></b>
                                <span style="font-size:18px; color:#ebedee;"><STRIKE><sub>$ 25.99</sub></STRIKE></span>
                            </div>
                            <div class="panel-body" >

                                <i class="left-addon" style="position: relative; z-index: -1;">
                                    <img id="callcorner" src="<?php echo $this->Html->url('/img/gradient corner.png', true)?>" alt="..."></i>



                                <form  role="form" >

                                    <div class="form-group" style="font-size: 14px;">
                                        <p> You will get :</p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <button class="btn-circle btn-customize"><span class="glyphicon glyphicon-ok"></span></button>
                                                <span>.mov</span><span class="pull-right">894.39kb</span>
                                                <p style="color: rgba(0, 0, 0, 0.4);margin-left:24px; font-size:12px;">
                                                    <i>Includes working file*</i></p>
                                            </li>
                                            <li>
                                                <button class="btn-circle btn-customize"><span class="glyphicon glyphicon-ok"></span></button>
                                                <span>PSD 300dpi</span><span class="pull-right">- KB</span>                   
                                            </li>
                                        </ul>


                                        <div class="right-inner-addon">
                                            <i class="icon-user"></i>
                                            <input class="form-control" id="focusedInput" type="text" placeholder="User name">
                                        </div><br>
                                        <div class="right-inner-addon">
                                            <i class="icon-envelope"></i>
                                            <input class="form-control" id="focusedInput" type="text" placeholder="Email">
                                        </div><br>
                                        <div class="right-inner-addon">
                                            <input class="form-control" id="focusedInput" type="text" placeholder="Coupon code (if you have any)">
                                        </div><br>
                                        <div id="demo" class="collapse out">
                                            <input class="form-control" type="text" placeholder="Coupon code"> 
                                        </div>



                                        <!-- <hr style="border-top: 1.5px dotted green; width:150px" /> -->
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" style="font-size: 24px;"><b>Download</b></button>
                                    </div>
                                </form>

                            </div></div>

                    </div>





                </div>

            </body>
            <!-- Body content ends ======================================== -->


            <!-- Footer content begin ====================================== -->

            <footer>


                <!--             <div class="uparrowdiv" style="background:rgba(200, 200, 200, 1);">
                             <div class="media"><br>
                              <a class="pull-left" href="#">
                              <img class="media-object img-circle" src="themes/images/user_pic.png" alt="..."></a>
                              <div class="media-body">
                              <h3 class="media-heading text-primary">Patty Griffin</h3>
                              <small style="color:gray;">MARCH 16,2013 AT 3:44A M</small>
                              <p>Get hands-on with my ideas. Pencil takes care of the lines so you can use your finger to smooth rough edges 
                                blend color directly on the page. Good jobs guys!</p>
                              </div>
                             
                              <p>
                              <a href="#"><img src="themes/images/facebook.png" alt="..."></a>
                              <a href="#"><img src="themes/images/twitter.png" alt="..."></a> 
                              <a href="#"><img src="themes/images/rss.png" alt="..."></a> 
                              <a href="#"><img src="themes/images/google.png" alt="..."></a> 
                              <a href="#"><img src="themes/images/p.png" alt="..."></a>                           
                              </p>
                              
                              </div>
                            </div> -->


                <div class="uparrowdiv">
                    <div class="row"><br>
                        <div class="col-xs-3 pad_left_right">
                            <a href="#"><img class="media-object img-circle img-responsive" src="<?php echo $this->Html->url('/img/user_pic.png', true)?>" alt="..."></a>
                        </div>
                        <div class="col-sm-9 pad_left_right">
                            <h3 class="media-heading text-primary" style="color:#2c3e50;">Patty Griffin</h3>
                            <small style="font-size:0.7em;">MARCH 16,2013 AT 3:44 AM</small>
                            <p>Get hands-on with my ideas. Pencil takes care of the lines so you can use your finger to smooth rough edges 
                                blend color directly on the page. Good jobs guys!</p>

                            <!-- Social icons begin ======================================== -->
                            <p>
                                <a href="#"><img src="<?php echo $this->Html->url('/img/facebook.png', true)?>" alt="..."></a>
                                <a href="#"><img src="<?php echo $this->Html->url('/img/twitter.png', true)?>" alt="..."></a>                   
                            </p>
                            <!-- Social icons end ======================================== -->
                        </div>
                    </div>
                </div>



            </footer>

            <!-- Footer content end ======================================== -->
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>