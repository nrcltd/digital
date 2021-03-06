<?php
/**
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
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--        <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/main/font-awesome.css', true) ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/main/bootstrap.css', true) ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/main/basecss', true) ?>" id="callCss" media="screen">
        <style type="text/css" id="enject"></style>-->
    </head>
    <body>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>
