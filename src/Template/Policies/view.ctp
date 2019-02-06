<!-- File: src/Template/Policies/edit.ctp --> 
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
				<?php echo $policy->policy_number;?>
			   </div>
			  <div class="col-md-4">
				  <label>Policy Premium</label>
				  <?php echo $policy->policy_premium;?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-4">
				  <label>Insurance Carrier</label>
				  <?php echo  $policy->carrier ;?>
				</div>
				<div class="col-md-4">
				  <label>Effective Date</label>
				 <?php echo $policy->effective_date ;?>" 
				 </div>
				<div class="col-md-4">
				  <label>Expiration Date</label>
				  <?php echo $policy->expiration_date ;?>
				</div>
			 </div>

			  <div class="form-group">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
				   <div class="addPolicyBtn">(Download existing document from here.)</div>
				</div>
				<div class="col-md-4 text-right">
				 <div class="addPolicyBtn">
				 </div>
				
				</div>
			  </div>
		</div>
	  </div> <!--ends of from Panel -->

	  <!--claim table -->
	  <div class="table-responsvie" id="cloneDivId">
		
		<div class="panel panel-default"  >
			
			<?php
			$data = $policy['policies_auto'];
$cnt=1;
if(isset($data) && count($data)>0){
foreach($data as $value){
?>
<div class="panel-heading changevehicleText" style="color:blue;font-size:18px;" 
			id="addvehicleTextId1" >Add Vehicle <?php echo $cnt;
			?></div>
				<div  id="addAutoDetailsId">
<div class="form-group">
		
		<div class="col-md-4">
				  <label>Covered Items </label>
				 <?php echo $value->covered_items ;?>				</div>
				<div class="col-md-4">
				  <label>Make </label>
				  <?php echo $value->make ;?>
				</div>
				<div class="col-md-4">
				  <label>Model </label>
				  <?php echo $value->model ;?> 

				  
				</div>
	</div>
	<div class="form-group">
				<div class="col-md-4">
				  <label>License Plate </label>
				  <?php echo $value->license_plate ;?>
				  </div>
				<div class="col-md-4">
				  <label>Vin </label><?php echo $value->vin ;?>
				</div>
				<div class="col-md-4">
				  <label>Full Cost Replace</label><?php echo ($value->full_cost_replace==1)?'Yes':'No';?>
				  				  				</div>
	</div>
	
	<div class="form-group">
				<div class="col-md-4">
				  <label>Comprehensive  Deductible </label>
				  <?php echo $value->comp_deduct ;?>
				</div>
				<div class="col-md-4">
				  <label>Medical/PIP  </label>
				  <?php echo $value->medical_pip ;?>
				</div>
				<div class="col-md-4">
				  <label>Liability Limit </label>
				 <?php echo $value->liability_limit ;?>
				</div>
	</div>
	<div class="form-group">
				<div class="col-md-4">
				  <label>Uninsured motor limits </label>
				 <?php echo $value->motor_limits ;?>
				</div>
				<div class="col-md-4">
				  <label>Towing limits </label>
				  <?php echo $value->tow_limits ;?>
					</div>
				<div class="col-md-4"><label>Gap or Lease /loan Coverage</label>
				  
				  <?php echo ($value->gap_or_lease==1)?'Yes':'No';?>
					 
				</div>
	</div>
	
	<div class="form-group">
				<div class="col-md-4">
				  <label>Accident  Forgive </label>
				  <?php echo ($value->accident_forgive==1)?'Yes':'No';?>
				</div>
				<div class="col-md-4">
				 &nbsp;
				</div>
				<div class="col-md-4">&nbsp;
				 </div>
	</div>
	<?php
	
			$cnt++;

?>
	
	</div>
	
	<?php
	}}?>
	</div>
		 
	  </div>
	  <!--claim table ends -->
	  
   </div>
 </div>
 