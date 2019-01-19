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
	<h3>Edit Policy<span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){ echo  $errorMsg;}?></span></h3>
	
	<?php echo $this->Form->create($policy ,['type' => 'file','id'=>'PolicyForm']);?>

	  <div class="panel panel-default">
		<div class="panel-heading" style="color:green;font-size:15px;" ><?php echo  $this->Flash->render() ?></div>
		
		<div class="panel-body">
			<div class="form-group">
			  <div class="col-md-4">
					<label>Policy Type <span>(Individual/Family Account)</span></label>
					<?php
					$policy_typeexp = [];
					if(!empty($policy->policy_type)){
						$policy_typeexp  = explode(",",$policy->policy_type);
					}			
					?>
					<select id="policy_type" class="my-select" name="policy_type[]" multiple="multiple">
					<?php
					foreach($selectListdata as $policyid => $policyType){				
					?>
						<option value="<?php echo $policyid;?>" 
						<?php if(in_array($policyid, $policy_typeexp)){echo 'selected';} ?>><?php echo $policyType;?></option>						 
					<?php 
					}
					?>
					</select>
			  </div>
			  
			  <div class="col-md-4">
				<label>Policy Number</label>
				<input type="text" name="policy_number" value="<?php echo $policy->policy_number ;?>"  class="form-control">
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
				
				<!-- Handling of policy dependent fields starts here. -->
				<div id="LifeDiv" class="col-md-4 policydependentFields">
				  <label>Beneficiaries</label>
				  <input name="beneficiaries" value="<?php echo $policy->beneficiaries;?>" type="text" class="form-control">
				</div>
				<div id="UmbrellaDiv" class="col-md-4 policydependentFields">
				  <label>Coverage Amount</label>
				  <input name="coverage_amount" value="<?php echo $policy->coverage_amount;?>" type="text" class="form-control">
				</div>

				<div class="col-md-4 policyBlankColumn"></div>
				<!-- Handling of policy dependent fields ends here. -->
				
				<div class="col-md-4 text-right">
				 <div class="addPolicyBtn"><input type="submit" class="btn btn-primary" value="Update Policy"></div>
				</div>
			  </div>
			<?php echo $this->Form->end();?>
		</div>
	  </div> <!--ends of from Panel -->

	  <!--claim table -->
	  <div class="table-responsvie">
		<table class="table table-bordered">
		  <thead>
			<tr>
			  <th>Policy Number</th>
			  <th>Policy Type</th>
			  <th>Expiration Date</th>
			  <th>Effective Date</th>
			  <th>Premium</th>
			  <th>Insurance Carrier</th>
			  <th>Download</th>
			  <th></th>
			</tr>
		  </thead>
		  <tbody>	  
			<?php foreach ($policies as $policy):
			$policy_typeexp = [];
			if(!empty($policy->policy_type)){
				$policy_typeexp  = explode(",",$policy->policy_type);
			}			
			?>
			<tr>
			  <td><?php echo $policy->policy_number;?></td>
			  <td><?php 
			  $allPolicyType=[];
			  foreach($policy_typeexp as $id){
			  
			   $allPolicyType[]= (isset($selectListdata[$id]))?$selectListdata[$id]:'';
			  }
			  echo  implode(",",$allPolicyType);
			  ?></td>
			  <td><?php echo Date("d/m/Y",strtotime($policy->expiration_date)); ?></td>
			  <td><?php echo Date("d/m/Y",strtotime($policy->effective_date));?></td>
			  <td><?php echo $policy->policy_premium;?></td>
			  <td><?php echo $policy->carrier;?></td>
			  <td><?= $this->Html->link(''.$policy->policy_path , ['action' => 'download', $policy->policy_path]) ?></td>
			  <td><?= $this->Html->link('Edit', ['action' => 'edit', $policy->id]) ?></td>
			</tr>
			<?php endforeach;?>
		  </tbody>
		</table>
	  </div>
	  <!--claim table ends -->

   </div>
 </div>