<!-- File: src/Template/Policies/edit.ctp --> 
<script>
$( function() {
    $( "#expiration_date" ).datepicker();
    $( "#effective_date" ).datepicker(); 
	// validate signup form on keyup and submit
	$("#PolicyForm").validate({
		rules: {
			carrier: "required",			
			
			policy_number: {
				required: true
			},expiration_date: {
				required: true
			},			
			effective_date: {
				required: true
			},
			policy_premium: {
				required: true,number:true
			}	
		},
		messages: {
			carrier: "Please enter your carrier",								
			policy_number: "Please enter a policy number",
			address: "Please enter  address",
			expiration_date: "Please enter  expiration date",
			effective_date: "Please enter  effective date",
			policy_premium:{
				required:"Please enter  premium.",
				number:"Please enter numbers only for premiu. "
			}
		}
	});
});
  
</script>	
<div class="col-md-10 rightAreaInner">
   <div class="updateProfileBox">
	<h3>Manage Policies -> Edit Policy: <?php echo $policy->policy_number;?><span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){ echo  $errorMsg;}?></span></h3>
	
	<?php echo $this->Form->create($policy ,['type' => 'file','id'=>'PolicyForm']);?>
	  <div class="panel panel-default">
		<div class="panel-heading" style="color:green;font-size:15px;" ><?php echo  $this->Flash->render() ?></div>
		
		<div class="panel-body">
			<div class="form-group">
			  <div class="col-md-4">
					<label>Policy Type: </label>
					<?php
					foreach($selectListdata as $policyid => $policyType){				
						if($policyid == $policy->policy_type){
							echo $policyType;
							break;
						}
					}
					?>
			  </div>
			  <div class="col-md-4">
				<label>Policy Number</label>
				<input type="text" name="policy_number" value="<?php echo $policy->policy_number;?>"  class="form-control">
			   </div>
			  <div class="col-md-4">
				  <label>Policy Premium</label>
				  <input name="policy_premium" value="<?php echo $policy->policy_premium;?>" type="text" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-4">
				  <label>Insurance Carrier</label>
				  <input type="hidden" value="<?php echo $policy->id;?>" name="id" >
				  <input type="text" name="carrier" value="<?php echo  $policy->carrier ;?>" class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Effective Date</label>
				  <input name="effective_date" type="text" id="effective_date" value="<?php echo $policy->effective_date ;?>"  class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Expiration Date</label>
				  <input name="expiration_date" type="text" id="expiration_date" value="<?php echo $policy->expiration_date ;?>" class="form-control">
				</div>
			 </div>

			  <div class="form-group">
				<div class="col-md-4">
				  <label>Upload File</label>
				  <input name="policy_path" type="file" class="form-control">
				</div>
				<div class="col-md-4">
				   <div class="addPolicyBtn">(Download existing document from here.)</div>
				</div>
				<div class="col-md-4 text-right">
				 <div class="addPolicyBtn"><input type="submit" class="btn btn-primary" value="Update Policy"></div>
				
				<a href="#" id="addMore" >Add More</a>
				</div>
			  </div>
		</div>
	  </div> <!--ends of from Panel -->

	  <!--claim table -->
	  <div class="table-responsvie" id="cloneDivId">
		
		<div class="panel panel-default"  >
			
					<?php echo  $this->element('addAutoDetails',['data'=>$policy['policies_auto']]);?>		
			 </div>
		 </div>
		 
	  </div>
	  <!--claim table ends -->
	  
	  <?php echo $this->Form->end();?>

   </div>
 </div>
 