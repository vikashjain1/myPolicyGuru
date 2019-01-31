
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