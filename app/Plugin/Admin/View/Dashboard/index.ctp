<?php
/**
 * Admin Index
 *
 */
?>
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<!-- Tab Dashboard  -->
<div class="tab-pane fade in active" id="Dashboard">
    <br>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-success btn-md btn-block"><b>Weekly</b></button>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-success btn-md btn-block"><b>Monthly</b></button>
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



<script type="text/javascript">
    new Morris.Area({
        element: 'myfirstchart',
        data: [
            {period: '2010 Q1', iphone: 2666, ipad: null, itouch: 2647},
            {period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441},
            {period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501},
            {period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689},
            {period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293},
            {period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881},
            {period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588},
            {period: '2011 Q4', iphone: 15073, ipad: 5967, itouch: 5175},
            {period: '2012 Q1', iphone: 10687, ipad: 4460, itouch: 2028},
            {period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791}
        ],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        pointSize: 2,
        hideHover: 'auto'
    });
</script>