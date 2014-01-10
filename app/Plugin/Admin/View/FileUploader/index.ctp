<?php
/**
 * Admin Index
 *
 */
?>
<form id="form-upload" method="post" action="file.php" enctype="multipart/form-data">
    <input type="file" name="file" id="select-file"/>
    <input type="submit" value="Upload" id="submit-upload"/>
</form>

<div id="progress">
    <div id="bar"></div>
    <div id="percent">0%</div>
</div>

<div id="result">
</div>
<script type="text/javascript">
    var bar = document.getElementById('bar')
    var percent = document.getElementById('percent')
    var result = document.getElementById('result')
    var percentValue = "0%";

    var fileInput = document.getElementById('select-file');
    var form = document.getElementById('form-upload');

    form.addEventListener('submit', function(evt) {
        // Chan khong cho form tao submit
        evt.preventDefault();
        var percentValue = 0 + '%';
        percent.innerHTML = percentValue;
        // Ajax upload
        var file = fileInput.files[0];

        // fd dung de luu gia tri goi len
        var fd = new FormData();
        fd.append('file', file);

        // xhr dung de goi data bang ajax
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'fileuploader', 'action' => 'index')); ?>', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                var percentValue = (e.loaded / e.total) * 100 + '%';
                percent.innerHTML = percentValue;
                bar.setAttribute('style', 'width: ' + percentValue);
            }
        };

        xhr.onload = function() {
            if (this.status == 200) {
//                result.innerHTML = this.response;
//                alert(this.response);
                var str = this.response;
                var first = str.indexOf("{\"result_code");
                var last = str.indexOf("}") + 1;
                
                var newString = str.substring(first,last);
//                alert(newString);
                var obj = $.parseJSON(newString);
                if (obj.result_code === "1") {
                    parent.updateproductfile(obj.productfileid);
                }
            }
        };

        xhr.send(fd);


    }, false);

</script>