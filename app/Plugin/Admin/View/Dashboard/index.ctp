<?php
/**
 * Admin Index
 *
 */
?>
<?php
echo $this->Html->css('/Admin/css/morris-0.4.3.min.css');
echo $this->Html->script('/Admin/js/jquery.min.1.9.js');
echo $this->Html->script('/Admin/js/raphael-min.js');
echo $this->Html->script('/Admin/js/morris-0.4.3.min.js');
?>
<!--<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>-->
<!-- Tab Dashboard  -->
<div class="tab-pane fade in active" id="Dashboard">
    <br>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-md btn-block" onclick="weeklyreport();"><b>Weekly</b></button>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-md btn-block" onclick="monthlyreport();"><b>Monthly</b></button>
    </div>
    <div class="col-sm-3"></div>
    <div class="col-sm-3"></div> <br><br><br>

    <!--             <div id="chart_div" style="" class="table-responsive"></div> -->
    <div class="col-sm-12">
        <div style="col-sm-12">
            <div class="graph-container centered" style="background-color: transparent">
                <div id="myfirstchart" style="height: 250px;"></div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="visibility: hidden;">
    wer dsfa sdf ertwet  ads rdt wer sad as dgsdf g ert asf asdkfhaksjdfhajsdhfashdfkjahsdf ajskdfhk asdfkjahs dfk akjsdfh asdfhakjsfjashdfkjah sdfakjshdf asjdfh as df ew wer ds gsdfhg sdhw ert dfghsdgf
</div>


<script type="text/javascript">
    new Morris.Area({
        element: 'myfirstchart',
        data: [<?php echo $values; ?>],
        xkey: 'period',
        ykeys: [<?php echo $keywords ?>],
        labels: [<?php echo $labels ?>],
        pointSize: 2,
        hideHover: 'auto'
    });

    function weeklyreport() {
        window.location = '<?php
        echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'dashboard',
    'action' => 'index',
    '?' => array('report' => 'weekly')));
?>';
    }

    function monthlyreport() {
        window.location = '<?php
        echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'dashboard',
    'action' => 'index',
    '?' => array('report' => 'monthly')));
?>';
    }
</script>