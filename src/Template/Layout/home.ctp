<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?php  echo $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo 'My Policy Guru';  ?></title>
    <?php  echo $this->Html->meta('icon') ?>
    <?php  echo $this->Html->css('bootstrap.min') ?>
    <?php  echo $this->Html->css('style') ?>
	<?php  echo $this->Html->css('style_new') ?>
    <?php  echo $this->Html->css('calendarstyle') ?>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php  echo $this->Html->css('responsive') ?>
	    <?php  echo $this->Html->script(['https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js']); ?>

    <?php  echo $this->Html->script(['bootstrap.min','bootstrap-multiselect','custom','jquery-ui','jquery.validate']); ?>
    <?php  echo $this->Html->script(['https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js']); ?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
	<?php  echo $this->Html->meta('icon') ?>
    <?php  echo $this->fetch('meta') ?>
	
    <?php  echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css') ?>
</head>

<style>
<?php if(isset($errorMsg)){ ?>
	div.message.error {
		background-color: #C3232D;
		color: #FFF;height:40px;padding:10px;
	}

	div.message.hidden {
		height: 0;
	}
<?php
}
?>
</style>

<body class="loginBg"> 
  <header>
  <nav class="navbar">
	<div class="container-fluid">
	<div class="navbar-header" >
	</div>
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>                        
		</button>
		<!--<?php 
		//$logoImage = $this->Html->image('logo.jpg', array('alt' => 'My Policy Guru', 'border' => '0'));
		//echo $this->Html->Link($this->Html->image('logo.jpg', array('alt' => 'My Policy Guru', 'border' => '0')), array('controller'=>'users','action'=>'login'), array('class' => 'navbar-brand'));
		?>-->
		<!--<?php //echo $this->Html->image('logo.jpg', array('alt' => 'My Policy Guru', 'border' => '0'));?>-->
		<?php echo $this->Html->image('logo.jpg', array('alt' => 'My Policy Guru', 'border' => '0', 'url' => array('controller'=>'users','action'=>'login'), array('class' => 'navbar-brand')));?>

	  </div>
	  <div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="#">How it Works</a></li>
		  <li><a href="#">Talk to an Expert</a></li>
		  <li><a href="#">Community Forum</a></li>
		  
		<?php if ($this->request->session()->read('Auth.User')){ 
		$actionLogout = ['controller' => 'Users', 'action' => 'logout'];
		$user_type_code = $this->request->session()->read('Auth.User.user_type_code');
		if($user_type_code==_AGENT_CODE){
				$actionLogout = ['controller' => 'Agents', 'action' => 'logout'];
		}
			
		
		?>
			<li><?php  echo $this->Html->Link(__('Log out'),$actionLogout) ?></li>
		<?php }else{  ?>
			<li><?php  echo $this->Html->Link(__('Login & Signup'),['controller'=>'users','action'=>'login']) ?></li>
		<?php } ?>
		</ul>
	  </div>
	</div>
  </nav> <!--header nav -->
</header>    

<section>
<?php

if($this->request->params['controller'] == "Users" && ($this->request->params['action'] == "login" || $this->request->params['action'] == "dashboard")){
	$loginPageNewClassFlag = true;
	$leftMenuFlag = false;
}
elseif($this->request->session()->read('Auth.User') && $this->request->params['action'] != "login" && $this->request->params['action'] != "dashboard"){
	$loginPageNewClassFlag = false;
	$leftMenuFlag = true;
}
else {
	$loginPageNewClassFlag = false;
	$leftMenuFlag = false;
}
?>
  <div class="container-fluid <?php if($loginPageNewClassFlag == true) echo 'loginPageNew';?>">
 
	<?php echo $this->fetch('content') ?>
	</div>
</section>
<?php  
	echo  $this->element('footer');
?>
  </body>
</html>
