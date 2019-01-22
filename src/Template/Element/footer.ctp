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
	<?php if (!$this->request->session()->read('Auth.User')) {?>
	<li><?=$this->Html->Link(__('Agent Login'),['controller'=>'agents','action'=>'login']) ?></li>
	<?php } ?>
</ul>
</footer>