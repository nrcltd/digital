<?php

class ProductFile extends AppModel {

    public function addProductFile($name, $description, $size, $year, $month, $day, $ext) {
        $this->create();
        $this->set('product_file_name', $name);
        $this->set('product_file_description', $description);
        $this->set('product_file_size', $size);
        $this->set('product_file_year', $year);
        $this->set('product_file_month', $month);
        $this->set('product_file_day', $day);
        $this->set('product_file_extension', $ext);
        $this->save();
        return $this->id;
    }

}

?>