<?php

App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');

class AdminAppController extends AppController {

    var $menu = null;

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = array(
        'Html',
        'Session' => array(
            'className' => 'Admin.BootstrapSession'
        ),
        'Paginator' => array(
            'className' => 'Admin.BootstrapPaginator'
        )
    );

    // Check if they are logged in


    function authenticate() {

        // Check if the session variable User exists, redirect to loginform if not
        if (!$this->Session->check('User')) {
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
            exit();
        }
    }

    // Authenticate on every action, except the login form
    function afterFilter() {
        if ($this->action != 'login') {
            $this->authenticate();
        }
    }

    public function setMenuItems() {
        $this->menu = array();
        $this->menu[0] = '';
        $this->menu[1] = '';
        $this->menu[2] = '';
        $this->menu[3] = '';
        $this->menu[4] = '';
//        debug($this->params['controller']);
        if (strtolower($this->params['controller']) == 'dashboard') {
            $this->menu[0] = 'active';
        }
        if (strtolower($this->params['controller']) == 'products') {
            $this->menu[1] = 'active';
        }
        if (strtolower($this->params['controller']) == 'customers') {
            $this->menu[2] = 'active';
        }
        if (strtolower($this->params['controller']) == 'coupons') {
            $this->menu[3] = 'active';
        }
        if (strtolower($this->params['controller']) == 'setting') {
            $this->menu[4] = 'active';
        }

        $this->set('menu', $this->menu);
    }

    /**
     * Pagination
     *
     * @var string
     */
    public function beforeRender() {
        
    }

    /**
     * Before Filter
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * uploads files
     * @return:
     *      will return an array with the success of each file upload
     */
    public function uploadFiles($folder = null, $formdata, $itemId = null) {
        // setup dir names absolute and relative
        if (isset($folder)) {
            $folder_url = WWW_ROOT . 'img' . DS . $folder;
            $rel_url = 'img' . DS . $folder;
        } else {
            $folder_url = WWW_ROOT . 'img';
            $rel_url = 'img';
        }

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }
        // if itemId is set create an item/sub folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = $folder_url . DS . $itemId;
            // set new relative folder
            $rel_url = $rel_url . DS . $itemId;
            // create the folder if it does not exist
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types
        $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

        // replace spaces with underscores
        $filename = $formdata['name'];
        $filename = str_replace(' ', '_', $filename);
        // assume filetype is false
        $typeOK = false;
        // check filetype is ok
        foreach ($permitted as $type) {
            if ($type == $formdata['type']) {
                $typeOK = true;
                break;
            }
        }

        // if file type ok upload the file
        if ($typeOK) {
            // switch based on error code
            switch ($formdata['error']) {
                case 0:
                    // check filename already exists
                    if (!file_exists($folder_url . DS . $filename)) {
                        // create full filename
                        $full_url = $folder_url . DS . $filename;
                        $url = $rel_url . DS . $filename;
                        // upload the file
                        $success = move_uploaded_file($formdata['tmp_name'], $url);
                    } else {
                        // create unique filename and upload file
                        // ini_set('date.timezone', 'India/Maldives');
                        $now = date('Y-m-d-His');
                        $full_url = $folder_url . DS . $now . $filename;
                        $url = $rel_url . DS . $now . $filename;
                        $success = move_uploaded_file($formdata['tmp_name'], $url);
                    }
                    // if upload was successful
                    if ($success) {
                        // save the url of the file
                        $result['urls'][] = substr($url, 4);
                    } else {
                        $result['errors'][] = "Error uploaded $filename. Please try again.";
                    }
                    break;
                case 3:
                    // an error occured
                    $result['errors'][] = "Error uploading $filename. Please try again.";
                    break;
                default:
                    // an error occured
                    $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                    break;
            }
        } elseif ($formdata['error'] == 4) {
            // no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } else {
            // unacceptable file type
            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }

        return $result;
    }

}
