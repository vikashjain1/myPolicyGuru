<?php
$cnt=1;
if(isset($data) && count($data)>0){
foreach($data as $value){
?>
<div class="panel-heading changevehicleText" style="color:blue;font-size:18px;" 
			id="addvehicleTextId1" >Add Vehicle <?php echo $cnt;
			$cnt++;
			?></div>
				<div  id="addAutoDetailsId">
<div class="form-group">
		
		<div class="col-md-4">
				  <label>Covered Items </label>
				  <input type="text" name="covered_items[]"  
				  value="<?php echo $value->covered_items ;?>" 
				  class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Make </label>
				  <input name="make[]"  type="text" id="make"
				  value="<?php echo $value->make ;?>" 
				  class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Model </label>
				  <input name="model[]"  type="text" id="model"
				 				  value="<?php echo $value->model ;?>" 

				  class="form-control">
				</div>
	</div>
	<div class="form-group">
				<div class="col-md-4">
				  <label>License Plate </label>
				  <input type="text" name="license_plate[]"   id="license_plate"
				  value="<?php echo $value->license_plate ;?>"
				  class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Vin </label>
				  <input name="vin[]"  type="text" id="vin" 
				  value="<?php echo $value->vin ;?>"
				  class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Full Cost Replace </label>
				  <input name="full_cost_replace[]"  type="text" id="full_cost_replace" 
						value="<?php echo $value->full_cost_replace ;?>"
				  				  class="form-control">
				</div>
	</div>
	
	<div class="form-group">
				<div class="col-md-4">
				  <label>Comprehensive  Deductible </label>
				  <input type="text" name="comp_deduct[]"  
				  						value="<?php echo $value->comp_deduct ;?>"
class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Medical/PIP  </label>
				  <input name="medical_pip[]"  type="text" id="medical_pip" 
				  value="<?php echo $value->medical_pip ;?>"
				  class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Liability Limit </label>
				  <input name="liability_limit[]"  type="text" id="liability_limit" 
				  value="<?php echo $value->liability_limit ;?>"
				  class="form-control">
				</div>
	</div>
	<div class="form-group">
				<div class="col-md-4">
				  <label>Uninsured motor limits </label>
				  <input type="text" name="motor_limits[]"  
				    value="<?php echo $value->motor_limits ;?>"
					class="form-control">
				</div>
				<div class="col-md-4">
				  <label>Towing limits </label>
				  <input name="tow_limits[]"  type="text" id="tow_limits" 
				     value="<?php echo $value->tow_limits ;?>"
					 class="form-control">
				</div>
				<div class="col-md-4"><label>Gap or Lease /loan Coverage</label>
				  <input name="gap_or_lease[]"  type="text" id="gap_or_lease" 
				  value="<?php echo $value->gap_or_lease ;?>"
					 class="form-control">
				 		</div>
	</div>
	<input type="hidden" value="<?php echo $cnt;?>" name="totalrows" id="totalrowsAutoId" >
	<?php }}?>
	
	</div>