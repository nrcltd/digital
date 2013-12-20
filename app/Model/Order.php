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
            'rule_1' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Alphabets and numbers only'
            )
        ),
        'customer_email' => 'email',
        'coupon_code' => array (
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
        if ($this->validates()) {
            
            $this->create();
            $this->save($data);
            $data['id'] = $this->id;
            $dataToken = array('id' =>  $data['id'], 'token_id' => $this->Token->addToken());
//            debug($this->saveField('token_id', $this->Token->addToken()));
            $this->saveField('token_id', $this->Token->addToken());

            return $data['id'];
        }
        return false;
    }
}
