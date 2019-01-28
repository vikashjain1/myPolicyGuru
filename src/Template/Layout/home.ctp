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
  <header>	<?php  
	echo  $this->element('header');
?>

</header>    

<section>
  <div class="container-fluid "> 
	<?php echo $this->fetch('content') ?>
  </div>
</section>
<?php  
	echo  $this->element('footer');
?>
  </body>
</html>
