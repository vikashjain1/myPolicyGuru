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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php  echo 'Policy App';  ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min') ?>

    <?= $this->Html->css('style') ?>
    <?= $this->Html->css('calendarstyle') ?>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?= $this->Html->css('responsive') ?>
    <?= $this->Html->script(['jquery-3.3.1.min','bootstrap.min','bootstrap-multiselect','custom','jquery-ui','jquery.validate']); ?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
 
   
	      <?= $this->Html->meta('icon') ?>

 

    <?= $this->fetch('meta') ?>
   


</head><style>

<?php if(isset($errorMsg)){
?>

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
<body> 
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
		<a href="index.php" class="navbar-brand"><img src="img/logo.jpg" alt="My Guru"></a>
	  </div>
	  <div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="#">How it Works</a></li>
		  <li><a href="#">Talk to an Expert</a></li>
		  <li><a href="#">Community Forum</a></li>
		  <li><a href="register.php">Register</a></li>
		  <li><a href="profile_step_one.php">Enter into the website</a></li>
		</ul>
	  </div>
	</div>
  </nav> <!--header nav -->
</header>    


 <section>
      <div class="container-fluid">
	  <div class="col-md-2 leftMenuArea">
			<ul>

									<li>			<?php echo	$this->Html->link('Modify User', 
									array('controller' => 'users', 'action' => 'edit')); 
			?>
									
									
									</li>

									
									<?php //echo	$this->Html->link('Profile', array('controller' => 'users', 'action' => 'edit'));?> </li>

			<li><?php echo	$this->Html->link('Add Policy', array('controller' => 'policies', 'action' => 'add')); 
			?></li>
			<li><a href="user_sumarry.php">User Summary</a></li>
			<li><a href="claim_summaries.php">Claim Summaries</a></li>
			<li><a href="talk_to_an_expert.php">Talk to an Expert</a></li>
				<?php  if ($this->request->session()->read('Auth.User')){ ?>
					<li>
					<?=$this->Html->Link(__('Log out'),['controller'=>'users','action'=>'logout']) ?>  </li>
	<?php }else{  ?><li>
		 <?=$this->Html->Link(__('Login'),['controller'=>'users','action'=>'login']) ?>  

				</li>				<?php } ?>
</ul>
		</div>
		 <?php echo $this->fetch('content') ?>
      </div>
</section>
	<footer class="footer">
	<ul>
		<li class="active"><a href="index.php">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Jobs</a></li>
		<li><a href="#">Advertising</a></li>
		<li><a href="#">Investors</a></li>
		<li><a href="#">Press</a></li>
		<li><a href="#">Blog</a></li>
		<li><a href="#">Help</a></li>
	</ul>
	</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  </body>
</html>

