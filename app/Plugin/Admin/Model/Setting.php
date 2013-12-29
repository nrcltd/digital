<?php

class Setting extends AppModel {

    public $useTable = false;
    public $_schema = array(
        'seller_name' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_description' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_facebook_id' => array(
            'type' => 'string',
            'length' => 512
        ),
        'seller_twitter_id' => array(
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