<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class UploaderController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Uploader';
    public $uses = array('Admin.Image');
    public $layout = "uploader";
    var $upload_dir = '';
    var $upload_path = '';
    var $large_image_prefix = "orginal_";
    var $thumb_image_prefix = "thumbnail_";
    var $resize_image_prefix = "resize_";
    var $large_image_name = '';
    var $thumb_image_name = '';
    var $resize_image_name = '';
    var $max_file = "10";
    var $max_width = "500";
    var $thumb_width = "100";
    var $thumb_height = "100";
    var $allowed_image_types = array('image/pjpeg' => "jpg", 'image/jpeg' => "jpg", 'image/jpg' => "jpg", 'image/png' => "png", 'image/x-png' => "png", 'image/gif' => "gif");
    var $allowed_image_ext;
    var $image_ext = "";
    //Image Locations
    var $large_image_location = '';
    var $thumb_image_location = '';
    var $resize_image_location = '';

    public function index() {
        error_reporting(E_ALL ^ E_NOTICE);

        $folder = 'upload';
        $rootfolder = WWW_ROOT . 'img' . DS . $folder;

        $this->set('update_image_info', false);
        $large_photo_exists = '';
        $error = '';
        if ($this->request->isPost()) {

//            if (!isset($_SESSION['random_key']) || strlen($_SESSION['random_key']) == 0) {
//                $_SESSION['random_key'] = strtotime(date('Y-m-d H:i:s'));
//                $_SESSION['user_file_ext'] = "";
//            }

            $filename_temp = strtotime(date('Y-m-d H:i:s'));
            $filename_ext = '';
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            if (!empty($this->request->data['upload_thumbnail'])) {
                $year = $this->request->data['year'];
                $month = $this->request->data['month'];
                $day = $this->request->data['day'];
                $filename_temp = $this->request->data['filename'];
                $filename_ext = $this->request->data['fileext'];
                $this->set('fileext', $filename_ext);
//                debug($this->request);
            }
            
            $this->upload_dir = $rootfolder . DS . $year . DS . $month . DS . $day;
            $this->upload_path = $rootfolder . DS . $year . DS . $month . DS . $day . DS;
            $this->set('upload_path', 'img' . DS . $folder . DS . $year . DS . $month . DS . $day . DS);
            $this->set('year', $year);
            $this->set('month', $month);
            $this->set('day', $day);
            $this->set('filename', $filename_temp);
            $this->large_image_name = $this->large_image_prefix . $filename_temp;
            $this->thumb_image_name = $this->thumb_image_prefix . $filename_temp;
            $this->resize_image_name = $this->resize_image_prefix . $filename_temp;
            $this->allowed_image_ext = array_unique($this->allowed_image_types);

            foreach ($this->allowed_image_ext as $mime_type => $ext) {
                $this->image_ext.= strtoupper($ext) . " ";
            }

            //Image Locations
            $this->large_image_location = $this->upload_path . $this->large_image_name . $filename_ext;
            $this->thumb_image_location = $this->upload_path . $this->thumb_image_name . $filename_ext;
            $this->resize_image_location = $this->upload_path . $this->resize_image_name . $filename_ext;


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

            $data = $this->request->data;
            if (!empty($data['upload'])) {
//            debug($this->request);
                //Get the file information
                $userfile_name = $_FILES['image']['name'];
                $userfile_tmp = $_FILES['image']['tmp_name'];
                $userfile_size = $_FILES['image']['size'];
                $userfile_type = $_FILES['image']['type'];
                $filename = basename($_FILES['image']['name']);
                $file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));

                //Image Locations
                $this->large_image_location = $this->upload_path . $this->large_image_name . "." . $file_ext;
                $this->thumb_image_location = $this->upload_path . $this->thumb_image_name . "." . $file_ext;
                $this->resize_image_location = $this->upload_path . $this->resize_image_name . "." . $file_ext;


                //Only process if the file is a JPG, PNG or GIF and below the allowed limit
                if ((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {

                    foreach ($this->allowed_image_types as $mime_type => $ext) {
                        if ($file_ext == $ext && $userfile_type == $mime_type) {
                            $error = "";
                            break;
                        } else {
                            $error = "Only <strong>" . $this->image_ext . "</strong> images accepted for upload<br />";
                        }
                    }
                    //check if the file size is above the allowed limit
                    if ($userfile_size > ($this->max_file * 1048576)) {
                        $error.= "Images must be under " . $this->max_file . "MB in size";
                    }
                } else {
                    $error = "Select an image for upload";
                }
                //Everything is ok, so we can upload the image.
                if (strlen($error) == 0) {

                    if (isset($_FILES['image']['name'])) {
//                        $this->large_image_location = $this->large_image_location. $file_ext;
//                        $this->thumb_image_location = $this->thumb_image_location. $file_ext;
                        //put the file ext in the session so we know what file to look for once its uploaded
                        $filename_ext = "." . $file_ext;
                        $this->set('fileext', $filename_ext);
                        move_uploaded_file($userfile_tmp, $this->large_image_location);
                        chmod($this->large_image_location, 0777);

                        $width = $this->getWidth($this->large_image_location);
                        $height = $this->getHeight($this->large_image_location);
                        //Scale the image if it is greater than the width set above
                        if ($width > $this->max_width) {
                            $scale = $this->max_width / $width;
                            $uploaded = $this->resizeImage($this->large_image_location, $width, $height, $scale);
                        } else {
                            $scale = 1;
                            $uploaded = $this->resizeImage($this->large_image_location, $width, $height, $scale);
                        }

                        //Delete the thumbnail file so the user can create a new one
                        if (file_exists($this->thumb_image_location)) {
                            unlink($this->thumb_image_location);
                        }
                    }
                }
            }

            if (!empty($this->request->data['upload_thumbnail']) && strlen($this->large_image_location) > 0) {
                //Get the new coordinates to crop the image.
//                        debug($this->request);
                $x1 = $_POST["x1"];
                $y1 = $_POST["y1"];
                $x2 = $_POST["x2"];
                $y2 = $_POST["y2"];
                $w = $_POST["w"];
                $h = $_POST["h"];
                //Scale the image to the thumb_width set above
                $scale = $this->thumb_width / $w;
                $cropped = $this->resizeThumbnailImage($this->thumb_image_location, $this->large_image_location, $w, $h, $x1, $y1, $scale);

                $resized = $this->resizeThumbnailImage($this->resize_image_location, $this->large_image_location, $w, $h, $x1, $y1, 1);

                $width = $this->getWidth($this->large_image_location);
                $height = $this->getHeight($this->large_image_location);
                $imageid = $this->Image->addImage($width, $height, $filename_temp, date("Y"), date("m"), date("d"), $filename_ext);

                $this->set('update_image_info', true);
                $this->set('image_id', $imageid);
            }
        }

        if (file_exists($this->large_image_location)) {
            if (file_exists($this->thumb_image_location)) {
                $thumb_photo_exists = "<img src=\"" . $this->upload_path . $this->thumb_image_name  . "\" alt=\"Thumbnail Image\"/>";
            } else {
                $thumb_photo_exists = "";
            }
            $large_photo_exists = "<img src=\"" . $this->upload_path . $this->large_image_name  . "\" alt=\"Large Image\"/>";
        } else {
            $large_photo_exists = "";
            $thumb_photo_exists = "";
        }

        $this->set('large_photo_exists', $large_photo_exists);
        if (strlen($large_photo_exists) > 0) {
            $current_large_image_width = $this->getWidth($this->large_image_location);
            $current_large_image_height = $this->getHeight($this->large_image_location);

            $this->set('current_large_image_width', $current_large_image_width);
            $this->set('current_large_image_height', $current_large_image_height);
        }

        $this->set('large_image_name', $this->large_image_name);
        if (file_exists($this->resize_image_location)) {
            $this->set('resize_image_name', $this->resize_image_name);
        } else {
            $this->set('resize_image_name', $this->large_image_name);
        }
        $this->set('thumb_width', $this->thumb_width);
        $this->set('thumb_height', $this->thumb_height);
        $this->set('error', $error);

//        debug($this->large_image_location);
    }

    function resizeImage($image, $width, $height, $scale) {
        list($imagewidth, $imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
        $newImageWidth = ceil($width * $scale);
        $newImageHeight = ceil($height * $scale);
        $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
        switch ($imageType) {
            case "image/gif":
                $source = imagecreatefromgif($image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source = imagecreatefromjpeg($image);
                break;
            case "image/png":
            case "image/x-png":
                $source = imagecreatefrompng($image);
                break;
        }
        imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $width, $height);

        switch ($imageType) {
            case "image/gif":
                imagegif($newImage, $image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage, $image, 90);
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage, $image);
                break;
        }

        chmod($image, 0777);
        return $image;
    }

    function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale) {
        list($imagewidth, $imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);

        $newImageWidth = ceil($width * $scale);
        $newImageHeight = ceil($height * $scale);
        $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
        switch ($imageType) {
            case "image/gif":
                $source = imagecreatefromgif($image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source = imagecreatefromjpeg($image);
                break;
            case "image/png":
            case "image/x-png":
                $source = imagecreatefrompng($image);
                break;
        }
        imagecopyresampled($newImage, $source, 0, 0, $start_width, $start_height, $newImageWidth, $newImageHeight, $width, $height);
        switch ($imageType) {
            case "image/gif":
                imagegif($newImage, $thumb_image_name);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage, $thumb_image_name, 90);
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage, $thumb_image_name);
                break;
        }
        chmod($thumb_image_name, 0777);
        return $thumb_image_name;
    }

    function getHeight($image) {
        $size = getimagesize($image);
        $height = $size[1];
        return $height;
    }

    function getWidth($image) {
        $size = getimagesize($image);
        $width = $size[0];
        return $width;
    }

}
