<script>
$( function() {
	// validate signup form on keyup and submit
	$("#UserForm").validate({
		rules: {
			newpwd: {
			    required: true,
				minlength: 5
			},
			oldpassword: {
				required: true,
				minlength: 5
			},
			cnfpassword: {
				required: true,
				minlength: 5,
				equalTo: "#newpwd"
			}
		},
		messages: {
			newpwd: "Please enter a new password",
			oldpassword: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			}
		}
	});	
});
</script>
		<div class="col-md-12">
           <div class="signUpBox">
		   <h3>Manage Account -> Change Password</h3>
		   <h3><span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){ echo  $errorMsg;} ?></span></h3>
            <div class="panel panel-default">
              <div class="panel-heading" style="color:green;font-size:15px;" ><?php echo  $this->Flash->render() ?></div>
              <div class="panel-body">
			<?php 
			echo $this->Form->create('' ,['type' => 'file','id'=>'UserForm']);
			echo $this->Flash->render('auth');
			?>
              <div class="form-group">
                <label class="control-label col-sm-4" for="Password">Old Password:</label>
                <div class="col-sm-9 col-md-9 col-lg-8">
                  <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter old password">
                </div>
              </div>
			  <div class="form-group vertical-center">
                <label class="control-label col-sm-4" for="newpwd">New Password : <span class="labelComment"></span>
				</label>
                <div class="col-sm-9  col-md-9 col-lg-8">
                  <input type="password" class="form-control" name="newpwd" id="newpwd" placeholder="Enter new password">
                </div>
              </div>
			<div class="form-group">
                <label class="control-label col-sm-4" for="Confirm Password">Confirm Password:</label>
                <div class="col-sm-9 col-md-9 col-lg-8">
                  <input type="password" class="form-control" name="cnfpassword" id="cnfpassword" placeholder="Enter confirm password">
                </div>
              </div>
               <div class="form-group">
				<div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            <?php echo $this->Form->end();?>
			  </div>
              </div>
			</div>
         </div>