	
<div class="col-md-10 rightAreaInner">
   <div class="updateProfileBox">
	  <div class="row">
		<div class="col-md-12">
		   <?php 
				//echo $this->element('communityTop');
			?>
			
		</div>
	  </div>
	<h3>My Customers<span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){ echo  $errorMsg;} ?></span></h3>
	  <!--View All Customers table -->
		  <div class="table-responsvie">
		   <div class="panel-heading" style="color:green;font-size:15px;" ><?php echo  $this->Flash->render() ?></div>
		  
			<table class="table table-bordered">
			  <thead>
				<tr>
				  <th>S No.</th>
				  <th>Name</th>				  <th>Email</th>

				  <th>City</th>
				  <th>Zip</th>
				  <th>Send a Response</th>
				  <th>&nbsp;</th>
				</tr>
			  </thead>
			  <tbody>
			  
			<?php 
			$sNo = 1;
			foreach ($custData as $data):
						//pr();die;

			?>
				<tr>
				  <td><?php echo $sNo;?></td>
				  <td>			   <?php echo ucfirst($data['user']->first_name).' '. ucfirst($data['user']->last_name);?></td>
				  <td><?php echo $data['user']->email;?></td>
				  <td><?php echo $data['user']->city;?></td>
				  				  <td><?php echo $data['user']->zip;?></td>

				  <td>
				  
				  <?php 
				   $textDisp = ($data['status']==0)?'Send Response':'Waiting for Response';
				   $status = ($data['status']==0)?1:0;
				   $textDisp = ($data['status']==0)?'Send Response':'Waiting for Response';
				  echo	$this->Html->link($textDisp, 
									array('controller' => 'agents', 'action' => 'sendResponse',
									$data['id'],$status)); 
				  ?>
				  </td>
				  <td><?php echo	$this->Html->link('Edit', 
									array('controller' => 'agents', 'action' => 'editUser',
									$data['user_id'])); ?></td>
				</tr>
			<?php 
			$sNo++;
			endforeach;
			if($sNo==1){
			?>
			<tr>
				  <td colspan="6" style="text-align:center;">No Records Found !!</td>
				 
				</tr>
			<?php
			}
			?>
			  </tbody>
			</table>
		  </div>
		  <!--View All Posts table ends -->

	   </div>
	 </div>