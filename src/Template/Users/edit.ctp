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
		<div class="col-md-12"><?php echo $this->element('manageAccountTop');?></div>
	  <h3>Manage Account -> Update Profile<span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){ echo $errorMsg;}?></span></h3>

	<?php 
		echo $this->Form->create($user ,['type' => 'file','id'=>'UserForm']);
		echo $this->Flash->render('auth');
	?>

	  <div class="panel panel-default">
	  <div class="panel-heading" style="color:green;font-size:15px;" ><?php echo  $this->Flash->render() ?></div>
		<div class="panel-body">
			<div class="form-group">
			  <div class="col-md-4">
				<label> First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php echo $user->first_name;?>">
			   </div>
			  <div class="col-md-4">
				  <label>Last name</label>
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
		</div>
	  </div> <!--ends of from Panel -->

	  <!--Exposure and life health -->
	  <div class="row">
		<div class="col-md-7 pr8">
		  <div class="panel panel-default padding-controller">
			<div class="panel-heading"><strong>Exposure Vault</strong></div>
			<div class="panel-body">
			  <div class="row">
				<div class="col-md-4">Do you own a home or condo?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="own_home" id="own_home">
					<option value="">select</option>
					<option value="1" <?php if($user->own_home=='1') echo "selected";?>>Yes</option>
					<option value="0" <?php if($user->own_home=='0') echo "selected";?>>No</option>
				  </select>
				</div>
				<!--<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>-->
			  </div>

			  <div class="row">
				<div class="col-md-4">How many cars do you own ?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="own_car" id="own_car">
					<option value="">select</option>
					<?php for($i=0; $i<=10; $i++) {?>
					<option value="<?php echo $i;?>" <?php if($i==$user->own_car){ echo 'selected';} ?>><?php echo $i;?>
					</option>
					<?php } ?>
				  </select>
				</div>
				<!--<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>-->
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you own boat?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="own_boat" id="own_boat">
					<option value="">select</option>
					<option value="1" <?php if($user->own_boat=='1') echo "selected";?>>Yes</option>
					<option value="0" <?php if($user->own_boat=='0') echo "selected";?>>No</option>
				  </select>
				</div>
				<!--<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>-->
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you have expensive jewelry or art?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="expensive_jewelry" id="expensive_jewelry">
					<option value="">select</option>
					<option value="1" <?php if($user->expensive_jewelry=='1') echo "selected";?>>Yes</option>
					<option value="0" <?php if($user->expensive_jewelry=='0') echo "selected";?>>No</option>
				  </select>
				</div>
				<!--<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>-->
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you own rental property?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="own_rental_property" id="own_rental_property">
					<option value="">select</option>
					<option value="1" <?php if($user->own_rental_property=='1') echo "selected";?>>Yes</option>
					<option value="0" <?php if($user->own_rental_property=='0') echo "selected";?>>No</option>
				  </select>
				</div>
				<!--<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>-->
			  </div>

			  <div class="row">
				<div class="col-md-4">Do you own small business?</div>
				<div class="col-md-3 text-left">
				  <select class="form-control" name="own_small_business" id="own_small_business">
					<option value="">select</option>
					<option value="1" <?php if($user->own_small_business=='1') echo "selected";?>>Yes</option>
					<option value="0" <?php if($user->own_small_business=='0') echo "selected";?>>No</option>
				  </select>	
				  <!--<div class="radioBtn">
					<label class="radio-inline">
					<input type="radio" name="own_small_business" id="own_small_business" value="1" <?php if($user->own_small_business=='1') echo "checked";?>>Yes
				  </label>
				   <label class="radio-inline">
					<input type="radio" name="own_small_business" id="own_small_business" value="0" <?php if($user->own_small_business=='0') echo "checked";?>>No
				  </label>
				  </div>-->
				</div>
				<!--<div class="col-md-3 text-right">
				  <div class="file-upload">
					<label for="upload" class="file-upload__label">browse pictures</label>
					<input class="file-upload__input" type="file" name="file-upload">
				  </div>
				</div>
			  <div class="col-md-2"><a href="#" class="smallText">View All Images</a></div>-->
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
				  <select class="form-control" name="married" id="married">
					<option value="">select</option>
					<option value="1" <?php if($user->married=='1') echo "selected";?>>Yes</option>
					<option value="0" <?php if($user->married=='0') echo "selected";?>>No</option>
				  </select>			  
				</div>
				  <!--<div class="radioBtn">
					  <label class="radio-inline">
						<input type="radio" name="married" id="married" value="1" <?php //if($user->married=='1') echo "checked";?>>Yes
					  </label>
					  <label class="radio-inline">
						<input type="radio" name="married" id="married" value="0" <?php //if($user->married=='0') echo "checked";?>>No
					  </label>
				  </div>-->
				</div>
			  </div>

			  <div class="row">
				<div class="col-md-8">How Many Children do you have?</div>
				<div class="col-md-4">
				  <select class="form-control" name="how_many_children" id="how_many_children">
					<option value="">select</option>
					<?php for($i=0; $i<=5; $i++) {?>
					<option value="<?php echo $i;?>" <?php if($i==$user->how_many_children){ echo 'selected';} ?>><?php echo $i;?>
					</option>
					<?php } ?>
				  </select>				  
				</div>
			  </div>

			  <!--<div class="row">
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
			  </div>-->

			  <div class="row">
				<div class="col-md-8">What is your income range?</div>
				<div class="col-md-4">
				  <select class="form-control" name="income_range" id="income_range">
					<option value="">Income Range</option>
					<option value="1" <?php if($user->income_range=='less_than_10_lac') echo "selected";?>>Less Than 10 Lac</option>
					<option value="0" <?php if($user->income_range=='less_than_10_crore') echo "selected";?>>Less Than 10 Crore</option>
				  </select>
				  </div>
			  </div>

			  <div class="row">
				<div class="col-md-8">What is your net worth range?</div>
				<div class="col-md-4">
				  <select class="form-control" name="net_worth_range" id="net_worth_range">
					<option value="">Net Worth Range</option>
					<option value="1" <?php if($user->net_worth_range=='less_than_1_crore') echo "selected";?>>Less Than 1 Crore</option>
					<option value="0" <?php if($user->net_worth_range=='1_crore_to_5_crore') echo "selected";?>>1 Crore to 5 Crore</option>
				  </select>
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
		</div>
	  </div>
	  <!--Exposure and life health ends-->

	  <!--bottom buttons -->
	  <div class="row">
		  <div class="col-md-12 text-right mt20 mb20">
		  <button class="btn btn-primary mb0 mr5">Update Profile</button>
		  <button class="btn btn-default">Back</button>
		</div>
	  </div>
	  <?php  echo $this->Form->end();?>
	  <!--bottom buttons -->
   </div>
 </div>