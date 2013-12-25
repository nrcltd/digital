<?php
/**
 * Admin Index
 *
 */
?>
<!-- Tab Customers  -->  
<div class="tab-pane fade in active" id="Customers">

    <div class="">
        <div class="col-sm-4" style="margin-bottom:5px;">
            <div class="btn-group"  style="margin-bottom:5px;">
                <button type="button" class="btn btn-default btn-block" style="width:85%;">Product filter</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:15%;">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <li><a href="#">Name</a></li>
                    <li><a href="#">Email</a></li>
                    <li><a href="#">...</a></li>
                </ul>
            </div><div style="visibility: hidden;">.</div>
        </div>


        <div class="col-sm-4"  style="margin-bottom:5px;">
            <div class="right-inner-addon">
                <i class="glyphicon glyphicon-search"></i>
                <input class="form-control" id="focusedInput" type="text" placeholder="Search by email" style="font-size:12px;">
            </div>
        </div>
        <div class="col-sm-4" style="margin-bottom:5px;">
            <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;">
                <b>Export customer list </b></button>
            <br>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr  style="background-color:#acacac;color:white;">
                <td style="border-right: 2px solid white;">Name</td>
                <td style="border-right: 2px solid white;">Email</td>
                <td style="border-right: 2px solid white;">Purchased date</td>
                <td>Actions</td>
            </tr>
            <tr>
                <td>Test User</td>
                <td>Testuser@gmail.com</td>
                <td>1st Jan 2013</td>
                <td><button type="button" class="btn btn-warning btn-xs">Resend invoice</button></td>
            </tr>
            <tr >
                <td>Test User</td>
                <td>Testuser@gmail.com</td>
                <td>1st Jan 2013</td>
                <td></td>
            </tr>
            <tr >
                <td>Test User</td>
                <td>Testuser@gmail.com</td>
                <td>1st Jan 2013</td>
                <td></td>
            </tr>
            <tr >           
                <td>Test User</td>
                <td>Testuser@gmail.com</td>
                <td>1st Jan 2013</td>
                <td></td>
            </tr>
        </table>
    </div>

</div>