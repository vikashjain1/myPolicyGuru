<div class="col-md-8">
	 <!--form Buttons -->
	 <div class="blogButtons">
	   <div class="row"> 
		 <div class="col-md-4"><?php echo $this->Html->link('Respond to Customer Requests', array('controller' => 'agents', 'action' => 'edit'));?></div>
		 <div class="col-md-4"><?php echo	$this->Html->link('Invite New Customer', array('controller' => 'agents', 'action' => 'addUser'));?></div>
	   </div>
	 </div>
	 <div class="blogButtons">
	   <div class="row">
		 <div class="col-md-4"><?php echo $this->Html->link('Manage Upcoming Policy Renewals', array('controller' => 'agents', 'action' => 'addExpert'));?></div>
		 <div class="col-md-4"><?php echo $this->Html->link('Manage Agent / Expert Details', array('controller' => 'agents', 'action' => 'addExpert'));?></div>
	   </div>
	 </div>
	 <!--form Buttons Ends -->
  </div>
<div class="col-md-4 rightArea">
  <div class="agentBox">
	 <div class="userBox"></div>
  </div>
</div>