<div class="col-md-2 leftMenuArea">
	<ul>
		<li><?php echo $this->Html->link('Dashboard', array('controller' => 'users', 'action' => 'dashboard')); ?></li>
		<li><?php echo $this->Html->link('Manage Account', array('controller' => 'users', 'action' => 'edit')); ?></li>		<li><?php echo $this->Html->link('Manage Policies', array('controller' => 'policies', 'action' => 'list')); ?></li>
		<li><?php echo $this->Html->link('Manage Claims', array('controller' => 'claims', 'action' => 'add'));?></li>
		<li><a href="#talk_to_an_expert.php">Talk to an Expert</a></li>
		<li><?php echo $this->Html->link('Community Forum', array('controller' => 'communities', 'action' => 'view'));?></li>
	</ul>
</div>