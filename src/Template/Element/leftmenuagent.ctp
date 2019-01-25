<div class="col-md-2 leftMenuArea">
	<ul>
		<li><a href="#user_dashboard.php">User Dashboard</a></li>
		<li>			<?php echo	$this->Html->link('Update Profile ', 
									array('controller' => 'agents', 'action' => 'edit')); 
			?>
									
									
									</li>
									
									<li>			<?php echo	$this->Html->link('Account Settings  ', 
									array('controller' => 'agents', 'action' => 'edit')); 
			?>
									
									
									</li>
									
									<li>			<?php echo	$this->Html->link('Add Customers   ', 
									array('controller' => 'agents', 'action' => 'edit')); 
			?>
									
									
									</li>
									
									
									
									<li>			<?php echo	$this->Html->link('View Customers   ', 
									array('controller' => 'agents', 'action' => 'edit')); 
			?>
									
									
									</li>
									
									<li>			<?php echo	$this->Html->link('View Upcoming Renewals    ', 
									array('controller' => 'agents', 'action' => 'edit')); 
			?>
									
									
									</li>
									
									<li>			<?php echo	$this->Html->link('Add Experts or Agents     ', 
									array('controller' => 'agents', 'action' => 'edit')); 
			?>
									
									
									</li>
					<?php  if ($this->request->session()->read('Auth.User')){ ?>
					<li>
					<?=$this->Html->Link(__('Log out'),['controller'=>'users','action'=>'logout']) ?>  </li>
	<?php }else{  ?><li>
		 <?=$this->Html->Link(__('Login'),['controller'=>'users','action'=>'login']) ?>  

				</li>				<?php } ?>
	</ul>
</div>

