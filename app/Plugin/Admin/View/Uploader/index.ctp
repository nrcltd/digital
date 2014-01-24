<?php
/**
 * Admin Index
 *
 */
?>
<?php
//Only display the javacript if an image has been uploaded
if (strlen($large_photo_exists) > 0) {
    ?>
    <script type="text/javascript">
        function preview(img, selection) {
            var scaleX = <?php echo $thumb_width; ?> / selection.width;
            var scaleY = <?php echo $thumb_height; ?> / selection.height;

            $('#thumbnail + div > img').css({
                width: Math.round(scaleX * <?php echo $current_large_image_width; ?>) + 'px',
                height: Math.round(scaleY * <?php echo $current_large_image_height; ?>) + 'px',
                marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
                marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
            });
            $('#x1').val(selection.x1);
            $('#y1').val(selection.y1);
            $('#x2').val(selection.x2);
            $('#y2').val(selection.y2);
            $('#w').val(selection.width);
            $('#h').val(selection.height);
        }

        $(document).ready(function() {
            $('#save_thumb').click(function() {
                var x1 = $('#x1').val();
                var y1 = $('#y1').val();
                var x2 = $('#x2').val();
                var y2 = $('#y2').val();
                var w = $('#w').val();
                var h = $('#h').val();
                if (x1 == "" || y1 == "" || x2 == "" || y2 == "" || w == "" || h == "") {
                    alert("You must make a selection first");
                    return false;
                } else {
                    return true;
                }
            });
    <?php if ($update_image_info == true) { ?>
                parent.updateimage(<?php echo $image_id ?>, '<?php echo $image_path;?>', <?php echo $filename; ?>);
    <?php } ?>
        });

        $(window).load(function() {
            $('#thumbnail').imgAreaSelect({<?php if ($photo_mode == 0) {
//        echo $current_large_image_height / $current_large_image_width;
    } else {
//        echo 'aspectRatio: 1:'.$thumb_height / $thumb_width.',';
    } ?>
                <?php if ($photo_mode == 0) { ?>
                onSelectChange: preview, minHeight: 300, minWidth: 700, maxHeight: 300, maxWidth: 700, resizable : false});
                <?php } else {?>
                 onSelectChange: preview, minHeight: 300, minWidth: 300, maxHeight: 300, maxWidth: 300, resizable : false});
                <?php }?>
        });

    </script>
<?php } ?>
<?php
//Display error message if there are any
if (strlen($error) > 0) {
    echo "<ul><li><strong>Error!</strong></li><li>" . $error . "</li></ul>";
}

if (strlen($large_photo_exists) > 0) {
    ?>
    <h2>Create Thumbnail</h2>
    <div align="center">
        <img src="<?php echo $this->webroot . $upload_path . $large_image_name . $fileext; ?>" style="float: left;" id="thumbnail" alt="Create Thumbnail" />
        <div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width; ?>px; height:<?php echo $thumb_height; ?>px;">
            <img src="<?php echo $this->webroot . $upload_path . $large_image_name . $fileext; ?>" style="position: relative;" alt="Thumbnail Preview" />
        </div>
        <br style="clear:both;"/>
        <form name="thumbnail" action="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'uploader', 'action' => 'index', 'mode' => $photo_mode)); ?>" method="post">
            <input type="hidden" name="x1" value="" id="x1" />
            <input type="hidden" name="y1" value="" id="y1" />
            <input type="hidden" name="x2" value="" id="x2" />
            <input type="hidden" name="y2" value="" id="y2" />
            <input type="hidden" name="w" value="" id="w" />
            <input type="hidden" name="h" value="" id="h" />
            <input type="hidden" name="photo_mode" value="<?php echo $photo_mode ?>" id="photo_mode" />
            
            <input type="hidden" name="year" value="<?php echo $year; ?>"/>
            <input type="hidden" name="month" value="<?php echo $month; ?>" />
            <input type="hidden" name="day" value="<?php echo $day; ?>" />
            <input type="hidden" name="filename" value="<?php echo $filename; ?>" />
            <input type="hidden" name="fileext" value="<?php echo $fileext; ?>" />
            <input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" />
        </form>
    </div>
    <hr />
<?php } ?>
<form name="photo" enctype="multipart/form-data" action="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'uploader', 'action' => 'index', 'mode' => $photo_mode)); ?>" method="post">
    Photo 
    <input type="file" name="image" size="30" /> 
    <input type="hidden" name="photo_mode" value="<?php echo $photo_mode ?>" id="photo_mode" />
    <input type="submit" name="upload" value="Upload" />
</form>