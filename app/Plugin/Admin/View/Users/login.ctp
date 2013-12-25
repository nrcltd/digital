<?php
//echo $this->Session->flash();
//echo $this->BSForm->create('User', array('controller' => 'Users', 'action' => 'login'));
//echo $this->BSForm->input('username');
//echo $this->BSForm->input('password');
//echo $this->BSForm->end('Login');
?>

<!-- Tab Login  -->
<div class="tab-pane fade in active" id="login"> <br><br><br><br>
    <div class="col-sm-4"></div>
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'Users', 'action' => 'login'), 'class' => 'form-horizontal col-sm-4', 'role' => 'form')); ?>
    <?php
    echo $this->Form->input('username', array(
        'type' => 'text',
        'label' => false,
        'class' => 'form-control',
        'id' => 'focusedInput',
        'placeholder' => 'Name'
    ));
    ?>

    <br>
    <?php
    echo $this->Form->input('password', array(
        'type' => 'password',
        'label' => false,
        'class' => 'form-control',
        'id' => 'focusedInput',
        'placeholder' => 'Password'
    ));
    ?>
    <label>
        <small>Forgot password?</small>
    </label><br>
    <button type="submit" class="btn btn-success btn-md">Login</button>
    <br><br><br><br>
    <?php echo $this->Form->end(); ?>
    <div class="col-sm-4"></div>
</div>
