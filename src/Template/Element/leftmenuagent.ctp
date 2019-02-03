<div class="col-md-2 leftMenuArea">
	<ul>
		<li><?php echo $this->Html->link('User Dashboard', array('controller' => 'agents', 'action' => 'dashboard'));?></li>
		<li><?php echo $this->Html->link('Update Profile', array('controller' => 'agents', 'action' => 'edit'));?></li>
		<li><?php echo $this->Html->link('Manage Password', array('controller' => 'agents', 'action' => 'changepwd')); ?></li>
		<li><?php echo $this->Html->link('Add Customers', array('controller' => 'agents', 'action' => 'addUser'));?></li>
		<li><?php echo $this->Html->link('View Customers', array('controller' => 'agents', 'action' => 'viewUser'));?></li>
		<li><?php echo $this->Html->link('View Upcoming Renewals', array('controller' => 'agents', 'action' => 'edit'));?></li>
		<li><?php echo $this->Html->link('Add Experts or Agents', array('controller' => 'agents', 'action' => 'addExpert'));?></li>
	</ul>
</div>