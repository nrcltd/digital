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
            <button type="submit" class="btn btn-success btn-md btn-block"><i  style="font-size:50px;" class="glyphicon glyphicon-plus"></i><br><b>Upload photos</b></button>
            <br>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-md btn-block" style="background-color:black;color:white;"><b>Product list  </b><i class="glyphicon glyphicon-list"></i></button>
        </div>



        <form class="form-inline" role="form">
            <table class="table table-bordered">
                <tr style="visibility: hidden;">
                    <td ><input type="text" class="form-control" id="" placeholder="" style=""></td>
                    <td><input type="text" class="form-control" id="" placeholder="" style=""></td>
                    <td><input type="text" class="form-control" id="" placeholder="" style=""></td>
                <tr>
                    <td colspan="2"><input type="text" class="form-control no-border" id="" placeholder="Product name" style=""></td>
                    <td><input type="text" class="form-control no-border" id="" placeholder="Price" style=""></td>
                </tr>
                <tr>
                    <td colspan="3"><textarea class="form-control no-border" rows="10" style="width:100%;" placeholder="Product description"></textarea></td>
                </tr>
                </tr>
            </table>

            <div class="">
                <div class="col-sm-3"></div>
                <div class="col-sm-3"><button type="submit" class="btn btn-success btn-md btn-block"><b>Save</b></i></button><br></div>
                <div class="col-sm-3"><button type="submit" class="btn btn-warning btn-md btn-block"><b>Pause</b></i></button><br></div>
                <div class="col-sm-3"></div>
            </div>
        </form>
        <br>



    </div>
</div><br>