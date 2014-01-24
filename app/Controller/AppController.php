<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array('DebugKit.Toolbar', 'Session');
    public $helpers = array('Html', 'Form', 'PaypalIpn.Paypal');

    function afterPaypalNotification($txnId) {
        //Here is where you can implement code to apply the transaction to your app.
        //for example, you could now mark an order as paid, a subscription, or give the user premium access.
        //retrieve the transaction using the txnId passed and apply whatever logic your site needs.

        $transaction = ClassRegistry::init('PaypalIpn.InstantPaymentNotification')->findById($txnId);
        $this->log($transaction['InstantPaymentNotification']['id'], 'paypal');

        //Tip: be sure to check the payment_status is complete because failure 
        //     are also saved to your database for review.

        if ($transaction['InstantPaymentNotification']['payment_status'] == 'Completed') {
            //Yay!  We have monies!

            $productname = $transaction['InstantPaymentNotification']['item_name'];

            $pos = strrpos($productname, ":");
            if ($pos === false) {
                // not found...
            } else {
                $order_id = trim(substr($productname, 6, $pos - 6));
//                $this->log($order_id, 'paypal');
                $this->loadModel('Token');
                $token = $this->Token->findByOrderId($order_id);
                
                $this->loadModel('Order');
                $this->Order->updateOrder('paid', $order_id);

                $order = $this->Order->findOrder($order_id, $token['Token']['token_code']);
                $couponcode = $order['Order']['coupon_code'];

                if (!empty($couponcode)) {
                    $this->loadModel('Coupon');
                    $discount = $this->Coupon->getDiscount($couponcode, $order['Order']['product_id']);
                    if ($discount > 0) {

                        $this->Coupon->updatequantitycoupon($couponcode, $order['Order']['product_id']);
                    }
                }

                $this->sendorder($order_id, $token['Token']['token_code']);
            }

            //parse
        } else {
            //Oh no, better look at this transaction to determine what to do; like email a decline letter.
        }
    }

    public function test($id) {
        $this->loadModel('Token');
        $token = $this->Token->findByOrderId($id);
        $this->sendorder($id, $token['Token']['token_code']);
        exit();
    }

    function sendorder($orderid, $token) {

        $this->loadModel('Order');
        $order = $this->Order->findById($orderid);

        $this->loadModel('Option');
        $option = $this->Option->findByOptionName('smtp_host');
        $smtp_host = '';
        if ($option) {
            $smtp_host = $option['Option']['option_value'];
        }

        $option = $this->Option->findByOptionName('smtp_port');
        $smtp_port = '';
        if ($option) {
            $smtp_port = $option['Option']['option_value'];
        }

        $option = $this->Option->findByOptionName('smtp_user');
        $smtp_user = '';
        if ($option) {
            $smtp_user = $option['Option']['option_value'];
        }

        $option = $this->Option->findByOptionName('smtp_password');
        $smtp_password = '';
        if ($option) {
            $smtp_password = $option['Option']['option_value'];
        }

        $smtp_test_user = $order['Order']['customer_email'];

        $option = $this->Option->findByOptionName('use_php_email');
        $use_php_email = '';
        if ($option) {
            $use_php_email = $option['Option']['option_value'];
        }

        $option = $this->Option->findByOptionName('smtp_tls');
        $smtp_tls = false;
        if ($option) {
            $tempvalue = $option['Option']['option_value'];
            if ($tempvalue == '1') {
                $smtp_tls = true;
            }
        }

        $gmail = array();
        if ($use_php_email === '0') {
            $gmail = array(
                'host' => $smtp_host,
                'port' => $smtp_port,
                'username' => $smtp_user,
                'password' => $smtp_password,
                'transport' => 'Smtp',
                'tls' => $smtp_tls,
                'timeout' => 30,
                'client' => null,
                'log' => false,
            );
        } else {
            $gmail = array(
                'transport' => 'Mail',
                'from' => $smtp_user,
                    //'charset' => 'utf-8',
                    //'headerCharset' => 'utf-8',
            );
        }

        $email = new CakeEmail($gmail);
        $email->template('download', 'default');
        $email->emailFormat('html');
        $email->to($smtp_test_user);
        $email->from($smtp_user);

        $product_id = $order['Order']['product_id'];
        $this->loadModel('Product');
        $product = $this->Product->findById($product_id);

        $email->subject('Download file: ' . $product["Product"]['product_name']);


        $content = $order['Order']['id'] . '\n' . $token;
        try {
            $email->send($content);
        } catch (Exception $ex) {
            
        }
    }

}
