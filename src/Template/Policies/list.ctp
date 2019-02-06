<!-- File: src/Template/Policies/view.ctp -->

<div class="col-md-10 rightAreaInner">
   <div class="updateProfileBox">
	<h3>Manage Policies -> List all Policy<span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){echo $errorMsg;}?></span></h3>

	<?php echo $this->Form->create('',['id'=>'PolicyForm']);?> 
	  <div class="panel panel-default">
		<div class="panel-heading" style="color:green;font-size:16px;" ><?php echo $this->Flash->render() ?></div>
		<div class="panel-body">
			<div class="form-group">
			  <div class="col-md-4">
				<label>Policy Type <span>(Individual/Family Account)</span></label>
				<select id="policy_type" class="my-select" name="policy_type">
					<?php
						$cnt=0;
						foreach($selectListdata as $policyid => $policyType){
					?>
					<option value="<?php echo $policyid;?>" <?php if($cnt==0) echo 'selected';?>>
					<?php echo $policyType;?>
					</option>						 
					<?php 
						$cnt++;
					}
					?>
				 </select>
			   </div>
			   <div class="col-md-4 text-right">
					<div class="addPolicyBtn"><input type="submit" class="btn btn-primary" value="Add Policy"></div>
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

		<?php foreach ($articles as $article):	
			$policy_typeexp = [];
			if(!empty($article->policy_type)){
				$policy_typeexp  = explode(",",$article->policy_type);
			}
			?>
			<tr>
			  <td>
			  <?php echo  $this->Html->link($article->policy_number, 
						  ['action' => 'view', $article->id]) ?></td>
			  <td><?php 
			  $allPolicyType=[];
			  foreach($policy_typeexp as $id){
				$allPolicyType[]= (isset($selectListdata[$id]))?$selectListdata[$id]:'';
			  }
			  echo  implode(",",$allPolicyType);
			  ?></td>
			  <td><?php echo Date("d/m/Y",strtotime($article->expiration_date)); ?></td>
			  <td><?php echo Date("d/m/Y",strtotime($article->effective_date));?></td>
			  <td><?php echo $article->policy_premium;?></td>
			  <td><?php echo $article->carrier;?></td>
			  <td><?= $this->Html->link(''.$article->policy_path , ['action' => 'download', $article->policy_path]) ?></td>
			  <td><?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?></td>
			</tr>
		<?php endforeach; ?>
		  </tbody>
		</table>
	  </div>
	  <!--claim table ends -->

   </div>
 </div>