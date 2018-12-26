<?php echo $this->Form->create($user ,['type' => 'file','id'=>'UserForm']);
 echo $this->Flash->render('auth');

   ?>
<script>
	
  $( function() {
		// validate the comment form when it is submitted

		// validate signup form on keyup and submit
		$("#UserForm").validate({
			rules: {
				name: "required",
				
				password: {
					required: true,
					minlength: 5
				},
				cnfpassword: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				}
				,
				email: {
					required: true,
					email: true
				}
				,address: {
					required: true
				}
				,			
				city: {
					required: true
				}
				,
				state: {
					required: true
				}
				,
				zip: {
					required: true
				}
				
			},
			messages: {
				name: "Please enter your name",
				
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				address: "Please enter  address",
				city: "Please enter  city",
				state: "Please enter  state",
				zip: "Please enter  zip"
			}
		});

		

		
	});
	</script>
<div class="col-md-10 rightAreaInner">
           <div class="signUpBox">
		   <h3>User Registration
		   </h3>
		   <h3><span style="font-size:15px;text-align:right;width:100%;color:red;">
<?php if(isset($errorMsg)){
echo  $errorMsg;
	}	
	?></span></h3>
            <div class="panel panel-default">
              <div class="panel-heading">Some Title Related to Ragistration</div>
              <div class="panel-body">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Name:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="email" class="form-control" id="email" name="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="password">Password:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="password" class="form-control" name="password" id="password" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="cnfpassword">Confirm Password:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="password" class="form-control"  name="cnfpassword" id="cnfpassword" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="account_type">Account Type</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <label class="radio-inline">
                    <input type="radio" name="account_type" value="individual" >Individual
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="account_type" checked value="business">Business Owner
                    </label>
                </div>
              </div>
               <div class="form-group">
				<div class="col-md-12 text-right">
                </div>
              </div>
			  </div>
              </div>
			
            <div class="panel panel-default">
              <div class="panel-body">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Address:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="text" class="form-control" name="address" id="address" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="city">City:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="text" class="form-control" name="city" id="city" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="state">State:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="text" class="form-control" id="state" name="state" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="zip">Zip:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="">
                </div>
              </div>
               <div class="form-group">
				<div class="col-md-12 text-right">
                </div>
              </div>
			  
			</div>
			            </div>

			<div class="panel panel-default">
              <div class="panel-body">
              <div class="form-group">
                <label class="control-label col-sm-5" for="how_many_homes">How many homes do you own:</label>
                <div class="col-sm-9 col-md-9 col-lg-7">
                  <input type="number" min="0" class="form-control" id="how_many_homes"  name="how_many_homes" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="how_many_cars">How many cars do you own:</label>
                <div class="col-sm-9 col-md-9 col-lg-7">
                  <input type="number" min="0" class="form-control" id="how_many_cars"  name="how_many_cars" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="boat_exists">Do you own a boat:</label>
                
				
				<div class="col-sm-9 col-md-9 col-lg-7">
					<label class="radio-inline">
                    <input type="radio" name="boat_exists"  value="1">Yes
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="boat_exists" checked value="0">No
                    </label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="married">Are you married:</label>
                <div class="col-sm-9 col-md-9 col-lg-7">
					<label class="radio-inline">
                    <input type="radio" name="married" value="1">Yes
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="married" checked value="0">No
                    </label>
                </div>
              </div>
			  <div class="form-group">
                <label class="control-label col-sm-5" for="how_many_children">How many children do you have:</label>
                <div class="col-sm-9 col-md-9 col-lg-7">
                  <input type="number" min="0" class="form-control" id="how_many_children"  name="how_many_children" placeholder="">
                </div>
              </div>
			  <div class="form-group">
                <label class="control-label col-sm-5" for="pwd">Do you own a small business:</label>
                <div class="col-sm-9 col-md-9 col-lg-7">
					<label class="radio-inline">
                    <input type="radio" name="small_business_exists" value="1">Yes
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="small_business_exists" checked value="0">No
                    </label>
                </div>
              </div>
			  <div class="form-group">
                <label class="control-label col-sm-5" for="business_name">Business Name:</label>
                <div class="col-sm-9 col-md-9 col-lg-7">
                  <input type="text" class="form-control" name="business_name" id="business_name" placeholder="">
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
         </div>   <?php  echo $this->Form->end();?>
