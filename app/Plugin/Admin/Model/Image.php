<?php

class Image extends AppModel {

    public function addImage($width, $height, $name, $year, $month, $day, $ext) {

        $img = $this->findByImageName($name);
        if (empty($img)) {
            $this->create();
            $this->set('image_name', $name);
            $this->set('image_width', $width);
            $this->set('image_height', $height);
            $this->set('image_year', $year);
            $this->set('image_month', $month);
            $this->set('image_day', $day);
            $this->set('image_ext', $ext);
//        debug($month);
            $this->save();
        } else {
            $this->set('id', $img['Image']['id']);
            $this->set('image_name', $name);
            $this->set('image_width', $width);
            $this->set('image_height', $height);
            $this->set('image_year', $year);
            $this->set('image_month', $month);
            $this->set('image_day', $day);
            $this->set('image_ext', $ext);
//        debug($month);
            $this->save();
        }
        return $this->id;
    }

}

?>