<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class FileUploaderController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'FileUploader';
    public $uses = array('Admin.ProductFile');
    public $layout = "fileuploader";
    var $upload_dir = '';
    var $large_file_name = '';
    var $upload_path = '';

    public function index() {
        if ($this->request->isPost()) {

            $filename_temp = strtotime(date('Y-m-d H:i:s'));
            $filename_ext = '';
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            $folder = 'upload';
            $rootfolder = WWW_ROOT . 'img' . DS . $folder;
            $this->upload_path = $rootfolder . DS . $year . DS . $month . DS . $day . DS;
            if (!is_dir($rootfolder)) {
                mkdir($rootfolder, 0777);
                chmod($rootfolder, 0777);
            }
            if (!is_dir($rootfolder . DS . $year)) {
                mkdir($rootfolder . DS . $year, 0777);
                chmod($rootfolder . DS . $year, 0777);
            }
            if (!is_dir($rootfolder . DS . $year . DS . $month)) {
                mkdir($rootfolder . DS . $year . DS . $month, 0777);
                chmod($rootfolder . DS . $year . DS . $month, 0777);
            }
            if (!is_dir($rootfolder . DS . $year . DS . $month . DS . $day)) {
                mkdir($rootfolder . DS . $year . DS . $month . DS . $day, 0777);
                chmod($rootfolder . DS . $year . DS . $month . DS . $day, 0777);
            }


            if ($_FILES["file"]["error"] > 0) {
                echo "Error: " . $_FILES["file"]["error"] . "<br>";
            } else {

                try {
                    $this->large_file_name = $filename_temp;
                    $userfile_name = $_FILES['file']['name'];
                    $userfile_tmp = $_FILES['file']['tmp_name'];
                    $userfile_size = $_FILES['file']['size'] / 1024;
                    $userfile_type = $_FILES['file']['type'];
                    $filename = basename($_FILES['file']['name']);
                    $file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
                    $filename_ext = "." . $file_ext;
                    move_uploaded_file($userfile_tmp, $this->upload_path . $this->large_file_name . "." . $file_ext);
                    chmod($this->upload_path . $this->large_file_name . "." . $file_ext, 0777);

                    $productfileid = $this->ProductFile->addProductFile($filename_temp, $userfile_name, $userfile_size, $year, $month, $day, $filename_ext);
                    $result = array();
                    $result['result_code'] = '1';
                    $result['productfileid'] = $productfileid;

                    $filesizetemp = '';
                    $filesize = $userfile_size;
                    if ($filesize < 1024) {
                        $filesizetemp = number_format($filesize, 2, '.', '') . 'KB';
                    } else if ($filesize >= 1024) {
                        $filesizetemp = number_format($filesize / 1024, 2, '.', '') . 'MB';
                    } else if ($filesize >= (1024 * 1024)) {
                        $filesizetemp = number_format($filesize / (1024 * 1024), 2, '.', '') . 'GB';
                    }

                    $result['productfilename'] = $userfile_name;
                    $result['productfilesize'] = $filesizetemp;
                    echo json_encode($result);
                } catch (Exception $ex) {
                    $result = array();
                    $result['result_code'] = '-1';
                    $result['productfileid'] = '';
                    $result['productfilename'] = '';
                    $result['productfilesize'] = '';
                    echo json_encode($result);
                }
            }
        }
    }

}
