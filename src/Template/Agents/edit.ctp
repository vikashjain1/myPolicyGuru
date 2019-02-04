<?php echo $this->Form->create($user ,['type' => 'file','id'=>'UserForm']);
 echo $this->Flash->render('auth');
?>
<script>
$( function() {
	// validate the comment form when it is submitted
	// validate signup form on keyup and submit
	$("#UserForm").validate({
		rules: {
			first_name: "required",
			last_name: "required",
			email: {
				required: true,
				email: true
			},
			address: {
				required: true
			},			
			city: {
				required: true
			},
			state: {
				required: true
			},
			zip: {
				required: true,
				number:true
			}
		},
		messages: {
			first_name: "Please enter your first  name",
			last_name: "Please enter your last  name",
			email: "Please enter a valid email address",
			address: "Please enter  address",
			city: "Please enter  city",
			state: "Please enter  state",
			zip: {
				required:"Please enter zip",
				number:"Please enter number only for zip"
			}
		}
	});
});
</script>
<div class="col-md-10 rightAreaInner">
   <div class="signUpBox">
   <div class="col-md-12"><?php echo $this->element('manageAgentAccountTop');?></div>
	<h3>Manage Account -> Update Profile<span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){echo  $errorMsg;}?></span></h3>
		<div class="panel panel-default">
		  <div class="panel-heading" style="color:green;font-size:15px;" ><?php echo  $this->Flash->render() ?></div>
		  <div class="panel-body">
		  <div class="form-group">
			<label class="control-label col-sm-3" for="first_name">First Name:</label>
			<div class="col-sm-9 col-md-9 col-lg-9">
			  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php  echo  $user->first_name;?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-3" for="last_name">Last Name:</label>
			<div class="col-sm-9 col-md-9 col-lg-9">
			  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="<?php  echo  $user->last_name;?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-3" for="email">Email:</label>
			<div class="col-sm-9 col-md-9 col-lg-9">
			  <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php  echo  $user->email;?>">
			</div>
		  </div>
		 </div>
		</div>
			
		<div class="panel panel-default">
		  <div class="panel-body">
		  <div class="form-group">
			<label class="control-label col-sm-3" for="email">Address:</label>
			<div class="col-sm-9 col-md-9 col-lg-9">
			  <input type="text" class="form-control" name="address" id="address" placeholder="" value="<?php  echo  $user->address;?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-3" for="city">City:</label>
			<div class="col-sm-9 col-md-9 col-lg-9">
			  <input type="text" class="form-control" name="city" id="city" placeholder="" value="<?php  echo  $user->city;?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-3" for="state">State:</label>
			<div class="col-sm-9 col-md-9 col-lg-9">
			  <input type="text" class="form-control" id="state" name="state" placeholder="" value="<?php  echo  $user->state;?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-3" for="zip">Zip:</label>
			<div class="col-sm-9 col-md-9 col-lg-9">
			  <input  class="form-control" id="zip" name="zip" type="text"  value="<?php  echo  $user->zip;?>">
			</div>
		  </div>
		   <div class="form-group">
			<div class="col-md-12 text-right">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-12 text-right">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
		</div>
		</div>	
	</div>
</div>
	<?php echo $this->Form->end();?>
