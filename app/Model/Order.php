<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Order extends AppModel {

    public $validate = array(
        'customer_name' => array(
            'rule_3' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Customer name can not be empty.'
            )
        ),
        'customer_email' => 'email',
        'coupon_code' => array(
            'rule_3' => array(
                'rule' => 'alphaNumeric',
                'allowEmpty' => true,
                'message' => 'Alphabets and numbers only'
            )
        )
    );
    public $hasOne = 'Token';

    public function addOrder($data) {

        $data['Order']['orderstatus'] = 'Pending';
        $data['Order']['purchased_date'] = date("Y-m-d H:i:s");
        $this->set($data);
//        debug($data);
//        debug($this->invalidFields());
        if ($this->validates()) {

            $this->create();
            $this->save($data);
            $data['id'] = $this->id;
//            $dataToken = array('id' =>  $data['id'], 'token_id' => $this->Token->addToken());
//            debug($this->saveField('token_id', $this->Token->addToken()));
            $token = $this->Token->addToken($this->id);
            $data['token'] = $token['token_code'];

            return $data;
        }
        return false;
    }

    public function findOrder($orderid, $token_code) {
        $token = $this->Token->find('first', array(
            'conditions' => array(
                'Token.token_code' => $token_code)
        ));
//        debug($token);
        if (empty($token)) {
            return false;
        }

        $token_id = $token['Token']['id'];
        $result = $this->find('first', array(
            'conditions' => array(
                'Order.id' => $orderid,
                'Token.id' => $token_id),
            'fields' => array('Order.id', 'Order.customer_name', 'Order.customer_email',
                'Order.purchased_date', 'Order.product_id', 'Order.coupon_code')
        ));
//debug($result);
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
//        debug($token);
    }

    public function findPaidOrder($orderid, $token_code) {
        $token = $this->Token->find('first', array(
            'conditions' => array(
                'Token.token_code' => $token_code)
        ));
//        debug($token);
        if (empty($token)) {
            return false;
        }

        $token_id = $token['Token']['id'];
        $result = $this->find('first', array(
            'conditions' => array(
                'Order.id' => $orderid,
                'Order.orderstatus' => 'paid',
                'Token.id' => $token_id),
            'fields' => array('Order.id', 'Order.customer_name', 'Order.customer_email',
                'Order.purchased_date', 'Order.product_id', 'Order.coupon_code')
        ));
//debug($result);
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
//        debug($token);
    }

    public function checkOrder($orderid, $token_code) {
        $token = $this->Token->find('first', array(
            'conditions' => array(
                'Token.token_code' => $token_code)
        ));
//        debug($token);
        if (empty($token)) {
            return false;
        }

        $token_id = $token['Token']['id'];
        $result = $this->find('first', array(
            'conditions' => array(
                'Order.id' => $orderid,
                'Order.orderstatus' => 'Pending',
                'Token.id' => $token_id),
            'fields' => array('Order.id', 'Order.customer_name', 'Order.customer_email',
                'Order.purchased_date', 'Order.product_id', 'Order.coupon_code')
        ));
//debug($result);
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
//        debug($token);
    }

    public function updateOrder($status, $orderid) {
//        $this->id = $orderid;
//        $this->set('orderstatus', $status);
//        $data = array('id' => $orderid, 'orderstatus' => $status);
//        $this->save($data);

        $this->updateAll(
                array('Order.orderstatus' => '\'' . $status . '\''), array('Order.id' => $orderid)
        );

//        debug($this->save($data));
//        debug($orderid);
//        debug($status);
        return $this->id;
    }

}
