<script>	
$( function() {
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
				required:"Please enter  zip",
				number:"Please enter number only for  zip"
			}
		}
	});
});
	
/*$.validator.addMethod("integer", function(value, element) {
return this.optional(element) || /^-?\d+$/.test(value);
}, "A positive or negative non-decimal number please");
*/
</script>
	
<div class="col-md-10 rightAreaInner">
   <div class="updateProfileBox">
	  <h3>Add New Customers <span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){ echo $errorMsg;}	?></span></h3>

	<?php 
		echo $this->Form->create($user ,['type' => 'file','id'=>'UserForm']);
		echo $this->Flash->render('auth');
	?>

	  <div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
			  <div class="col-md-4">
				<label>First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php echo $user->first_name;?>">
			   </div>
			  <div class="col-md-4">
				  <label>Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="<?php echo $user->last_name;?>">
			  </div>
			  <div class="col-md-4">
				<label>Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo $user->address;?>">
			   </div>
			</div>

			<div class="form-group">
				<div class="col-md-4">
					<label>City</label>
                  <input type="text" class="form-control" name="city" id="city" placeholder="" value="<?php echo $user->city;?>">
				</div>
				<div class="col-md-4">
				  <label>State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="" value="<?php echo $user->state;?>">
				</div>
				<div class="col-md-4">
				  <label>Zip</label>
                  <input  class="form-control" name="zip" id="zip" type="text" value="<?php echo $user->zip;?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4">
					<label>Email</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="" value="">
				</div>
				<div class="col-md-4">
				  <label>Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="" value="">
				</div><div class="col-md-4">
				  <label>Confirm Password</label>
                  <input type="text" class="form-control" id="cnfpassword" name="cnfpassword" placeholder="" value="">
				</div>
			</div>
		</div>
	  </div> <!--ends of from Panel -->
	  

	  <!--Exposure and life health -->
	  <div class="row">
		<!--<div class="col-md-7 pr8">
		  <div class="panel panel-default padding-controller">
			<div class="panel-heading"><strong>Exposure Vault</strong></div>
			<div class="panel-body">
			  <div class="row">
				<div class="col-md-4">Do you own a home or condo?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="" id="">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				  </select>
				</div>
				<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>
			  </div>

			  <div class="row">
				<div class="col-md-4">How many cars do you own ?</div>
				<div class="col-md-3 text-left">
				  <input type="number" name="" class="form-control">
				</div>
				<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you own bodt?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="" id="">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				  </select>
				</div>
				<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you have expensive jewelry or art?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="" id="">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				  </select>
				</div>
				<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you own rental property?</div>
				<div class="col-md-3 text-left">
				  <input class="form-control" name="" id="">
				</div>
				<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you own small business?</div>
				<div class="col-md-3 text-left">
				  <div class="radioBtn">
					<label class="radio-inline">
					<input type="radio" name="status" checked>Yes
				  </label>
				   <label class="radio-inline">
					<input type="radio" name="status">No
				  </label>
				  </div>
				</div>
				<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>
			  </div>
			</div>
		  </div>
		</div>

		<div class="col-md-5 pl8">
		  <div class="panel panel-default padding-controller">
			<div class="panel-heading"><strong>Life & Health</strong></div>
			<div class="panel-body">
			  <div class="row">
				<div class="col-md-8">Are you married?</div>
				<div class="col-md-4">
				  <div class="radioBtn">
					  <label class="radio-inline">
						<input type="radio" name="status" checked>Yes
					  </label>
					  <label class="radio-inline">
						<input type="radio" name="status">No
					  </label>
				  </div>
				</div>
			  </div>

			  <div class="row">
				<div class="col-md-8">How Many Children do you have?</div>
				<div class="col-md-4">
				  <input type="number" name="" class="form-control">
				</div>
			  </div>

			  <div class="row">
				<div class="col-md-8">What is their age</div>
				<div class="col-md-5">
				  <div class="">
					<div class="col-md-4" style="padding:0px 5px;">
					  <input type="number" name="" min="0" max="99" class="form-control">
					</div>
					<div class="col-md-4" style="padding:0px 5px;">
					  <input type="number" name="" min="0" max="99" class="form-control">
					</div>
					<div class="col-md-4" style="padding:0px 5px;">
					  <input type="number" name="" min="0" max="99" class="form-control">
					</div>
				  </div>
				</div>
			  </div>

			  <div class="row" id="showMoreAge" style="display:none;">
				  <div class="col-md-3">
					<input type="text" name="" class="form-control">
				  </div>
				  <div class="col-md-3">
					<input type="text" name="" class="form-control">
				  </div>
				  <div class="col-md-3">
					<input type="text" name="" class="form-control">
				  </div>
				  <div class="col-md-3">
					<input type="text" name="" class="form-control">
				  </div>
			  </div>

			  <div class="row">
				<div class="col-md-8">What is your income range?</div>
				<div class="col-md-4">
				  <select class="form-control" name="" id="">
					<option value="yes">Income Range</option>
					<option value="yes">Less Than 10 Lac</option>
					<option value="no">Less Than 10 Crore</option>
				  </select>
				  </div>
			  </div>

			  <div class="row">
				<div class="col-md-8">What is your net worth range?</div>
				<div class="col-md-4">
				  <input type="text" name="" class="form-control">
				</div>
			  </div>

			  <div class="row">
				<div class="col-md-8">Health Assessment?</div>
				<div class="col-md-4">
				  <input type="text" name="" class="form-control">
				</div>
			  </div>

			</div>
		  </div>
		</div>-->
	  </div>
	  <!--Exposure and life health ends-->

	  <!--bottom buttons -->
	  <div class="row">
		  <div class="col-md-12 text-right mt20 mb20">
		  <button class="btn btn-primary mb0 mr5">Add  Profile</button>
		  <button class="btn btn-default">Back</button>
		</div>
	  </div>
	  <?php  echo $this->Form->end();?>
	  <!--bottom buttons -->

   </div>
 </div>