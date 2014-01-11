<?php

App::uses('AdminAppController', 'Admin.Controller');
App::uses('AppController', 'Controller');

class DashboardController extends AdminAppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Dashboard';
    public $uses = array('Admin.Order', 'Admin.Product');

    public function index() {
        $this->setMenuItems();

        $report = $this->request->query('report');
        if (empty($report)) {
            $this->generateweekly();
        } else if ($report == 'weekly') {
            $this->generateweekly();
        } else if ($report == 'monthly') {
            $this->generatemonthly();
        }
        $this->render('index');
    }

    function generatemonthly() {
        $orderids = $this->Order->find('all', array(
            'fields' => array('DISTINCT Order.product_id') //array of conditions
        ));

        $productidarr = array();
        if (!empty($orderids)) {
            for ($index = 0; $index < count($orderids); $index++) {
                $item = $orderids[$index];
                $id = $item['Order']['product_id'];
                $productidarr[] = $id;
            }
        }

        $this->loadModel('Product');
        $keywords = '';
        $labels = '';
        $productnames = array();
        if (!empty($productidarr)) {
            for ($index1 = 0; $index1 < count($productidarr); $index1++) {
                $productid = $productidarr[$index1];

                $products = $this->Product->findById($productid);

                $productname = $products['Product']['product_name'];

                $temp = str_replace(' ', '_', $productname);
                $keywords = $keywords . '\'' . strtolower($temp) . '\',';
                $labels = $labels . '\'' . $productname . '\',';
                $productnames[] = strtolower($temp);
            }
        }

        $year = date('Y');
        $month = date('m');
//        debug($month);

        $values = '';
        if (!empty($productidarr)) {
            for ($index3 = 1; $index3 <= count($month); $index3++) {
                $values = $values . '{period: \'' . $year . ' ' . $index3 . '\',';

                $query_date = $year . '-' . $index3 . '-01';
                $start = date('Y-m-01', strtotime($query_date));
//                debug($start);
                $end = date('Y-m-t', strtotime($query_date));
//                debug($end);


                for ($index2 = 0; $index2 < count($productidarr); $index2++) {
                    $productid = $productidarr[$index2];
                    $name = $productnames[$index2];

                    $conditions = array('Order.product_id' => $productid,
                        'Order.purchased_date <=' => $end, 'Order.purchased_date >=' => $start);

                    $items = $this->Order->find('all', array(
                        'conditions' => $conditions,
                        'fields' => array('DISTINCT Order.product_id')
                    ));

                    $values = $values . ' ' . $name . ': ' . count($items) . ',';
                }
                if (strlen($values) > 0) {
                    $values = substr($values, 0, strlen($values) - 1);
                }
                $values = $values . '},';
            }
        }
        if (strlen($values) > 0) {
            $values = substr($values, 0, strlen($values) - 1);
        }
        $this->set('keywords', $keywords);
        $this->set('labels', $labels);
        $this->set('values', $values);
//        debug($values);
    }

    function generateweekly() {
        $orderids = $this->Order->find('all', array(
            'fields' => array('DISTINCT Order.product_id') //array of conditions
        ));

        $productidarr = array();
        if (!empty($orderids)) {
            for ($index = 0; $index < count($orderids); $index++) {
                $item = $orderids[$index];
                $id = $item['Order']['product_id'];
                $productidarr[] = $id;
            }
        }

        $this->loadModel('Product');
        $keywords = '';
        $labels = '';
        $productnames = array();
        if (!empty($productidarr)) {
            for ($index1 = 0; $index1 < count($productidarr); $index1++) {
                $productid = $productidarr[$index1];

                $products = $this->Product->findById($productid);

                $productname = $products['Product']['product_name'];

                $temp = str_replace(' ', '_', $productname);
                $keywords = $keywords . '\'' . strtolower($temp) . '\',';
                $labels = $labels . '\'' . $productname . '\',';
                $productnames[] = strtolower($temp);
            }
        }

        $year = date('Y');
        $month = date('m');
//        debug($month);
        $values = '';
        if (!empty($productidarr)) {
            for ($index3 = 1; $index3 <= $month; $index3++) {
                $values = $values . '{period: \'' . $year . ' ' . $index3 . '\',';

                $query_date = $year . '-' . $index3 . '-01';
                $start = date('Y-m-01', strtotime($query_date));
//                debug($start);
                $end = date('Y-m-t', strtotime($query_date));
//                debug($end);


                for ($index2 = 0; $index2 < count($productidarr); $index2++) {
                    $productid = $productidarr[$index2];
                    $name = $productnames[$index2];

                    $conditions = array('Order.product_id' => $productid,
                        'Order.purchased_date <=' => $end, 'Order.purchased_date >=' => $start);

                    $items = $this->Order->find('all', array(
                        'conditions' => $conditions,
                        'fields' => array('DISTINCT Order.product_id')
                    ));

                    $values = $values . ' ' . $name . ': ' . count($items) . ',';
                }

                if (strlen($values) > 0) {
                    $values = substr($values, 0, strlen($values) - 1);
                }
                $values = $values . '},';
            }
        }
//        $values = substr($values, 0, strlen($values) - 1);
        if (strlen($values) > 0) {
            $values = substr($values, 0, strlen($values) - 1);
        }
        $this->set('keywords', $keywords);
        $this->set('labels', $labels);
        $this->set('values', $values);
//        debug($values);
    }

}
