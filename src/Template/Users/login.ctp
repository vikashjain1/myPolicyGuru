
<script>
  $( function() {
   

	// validate the comment form when it is submitted

		// validate signup form on keyup and submit
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
           <div class="signUpBox">
		   <h3><span style="font-size:15px;text-align:right;width:100%;color:red;">
<?php if(isset($errorMsg)){
echo  $errorMsg;
	}	
	?></span></h3>
            <div class="panel panel-default">
              <div class="panel-heading"></div>
              <div class="panel-body">
<?php    echo $this->Form->create('',['id'=>'UserLoginForm']);?>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
 	<?php echo $this->Form->input('email',['label'=>false,'id'=>'email']);?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="password">Password</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
 	<?php echo $this->Form->input('password',['label'=>false,'id'=>'password']);?>
                </div>
              </div>
              
               <div class="form-group">
                <!--<div class="col-sm-offset-3 col-sm-6">-->
				<div class="col-md-6 text-right">
                  <button type="submit" class="btn btn-primary">Login </button>

	
                </div><div class="col-md-6 text-left">

	<?php echo	$this->Html->link('Register', 
									array('controller' => 'users', 'action' => 'add')); 
			?> 
                </div>
              </div>
 	<?php echo $this->Form->end() ?>
			</div>
            </div>
		 </div>
         </div>
     
 