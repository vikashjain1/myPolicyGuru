<script>
$( function() {
	// validate signin form on keyup and submit
	$("#UserLoginForm").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true
			}
		},
		messages: {
			email: "Please enter your email",								
			password: "Please enter a password"
		}
	});
});
</script>
<div class="col-md-10 rightAreaInner">
	
   <?php
	$renderMsg = $this->Flash->render();
	if($renderMsg) {
		echo '<h3><span style="font-size:15px;text-align:right;width:100%;color:red;">'.$renderMsg.'</span></h3>';
	}
	?>
   
   <div class="formContainerNew">
   <!--login Form Start -->
	 <div class="row">
	   <div class="col-md-4">
		 <div class="panel panel-default">
		   <div class="panel-heading"><strong>New Agents?</strong></div>
		   <div class="panel-body">
			  <div class="loginSocial">
				 <a href="#" class="btn btn-primary btn-block">Ragister Using Facebook</a>
				 <a href="#" class="btn btn-danger btn-block">Ragister Using Google +</a>
				 <?php echo	$this->Html->link('Register Using Email', array('controller' => 'agents', 'action' => 'add'), array('class' => 'btn btn-warning btn-block')); ?>
			  </div>
		   </div>
		 </div>
	   </div> <!-- left login Buttons -->

	   <div class="col-md-4">
		 <div class="panel panel-default">
		   <div class="panel-heading"><strong>Existing Agent?</strong></div>
		   <div class="panel-body">
			 <?php echo $this->Form->create('',['id'=>'UserLoginForm']);?>
			   <!--<div class="formGroup">-->
			   <div class="form-group vertical-center">
				<label for="Username">Username</label>
				<input type="text" name="email" id="email" placeholder="email" class="form-control">
			  </div> 

			  <div class="formGroup">
				<label for="Password">Password</label>
				<input type="password" name="password" id="password" placeholder="Password" class="form-control">
			  </div>
			
			  <div class="loginButton text-right">
				<!--<a href="#" class="btn btn-success">Login</a>-->
				<button type="submit" class="btn btn-primary">Login </button>
			  </div>
			 <?php echo $this->Form->end() ?>
		   </div>
		  </div>
	   </div> <!-- right login Buttons -->
	 </div>
	 <!--login Form ends -->

   </div>
  </div>