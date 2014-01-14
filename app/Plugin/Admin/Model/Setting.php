<?php

class Setting extends AppModel {

    public $useTable = false;
    public $validate = array(
        'seller_name' => array(
            'rule_1' => array(
                'rule' => 'notEmpty'
            )
        )
        ,
        'seller_description' => array(
            'rule_2' => array(
                'rule' => 'notEmpty'
            )
        ),
        'seller_facebook_url' => array(
            'rule_3' => array(
                'rule' => 'notEmpty'
            )
        ),
        'seller_twitter_url' => array(
            'rule_3' => array(
                'rule' => 'notEmpty'
            )
        ),
        'seller_paypal_account' => array(
            'rule_3' => array(
                'rule' => 'notEmpty'
            )
        ), 
        'smtp_test_user' => array(
            'rule_3' => array(
                'rule' => 'notEmpty'
            )
        )
    );
    public $_schema = array(
        'seller_name' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_description' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_facebook_url' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_twitter_url' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_photo' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_paypal_account' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_password' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_email' => array(
            'type' => 'string',
            'length' => 512
        ),
        'smtp_host' => array(
            'type' => 'string',
            'length' => 512
        ),
        'smtp_port' => array(
            'type' => 'string',
            'length' => 512
        ),
        'smtp_user' => array(
            'type' => 'string',
            'length' => 512
        ),
        'smtp_password' => array(
            'type' => 'string',
            'length' => 512
        ),
        'use_php_email' => array(
            'type' => 'boolean'
        ),
        'frontend_theme' => array(
            'type' => 'string',
            'length' => 512
        )
    );

}

?>