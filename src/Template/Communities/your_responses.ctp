	
<div class="col-md-10 rightAreaInner">
   <div class="updateProfileBox">
	  <div class="row">
		<div class="col-md-12">
		  <ul class="innerHeadButtons">
			<li><?php echo $this->Html->link('View Posts', array('controller' => 'communities', 'action' => 'view'));?></li>
			<li><?php echo $this->Html->link('Your Posts', array('controller' => 'communities', 'action' => 'your_post'));?></li>
			<li><?php echo $this->Html->link('Your Responses', array('controller' => 'communities', 'action' => 'your_responses'));?></li>
			<li><?php echo $this->Html->link('Your Likes', array('controller' => 'communities', 'action' => 'your_likes'));?></li>
			<li><?php echo $this->Html->link('Add Posts', array('controller' => 'communities', 'action' => 'post'));?></li>
		  </ul>
		</div>
	  </div>
	<h3>View All Posts<span style="font-size:15px;text-align:right;width:100%;color:red;"><?php if(isset($errorMsg)){ echo  $errorMsg;} ?></span></h3>
	  <!--View All Posts table -->
		  <div class="table-responsvie">
			<table class="table table-bordered">
			  <thead>
				<tr>
				  <th>S No.</th>
				  <th>subject</th>
				  <th>Details</th>
				  <th>Likes</th>
				  <th>Responses</th>
				  <th>Want to Send a Response</th>
				</tr>
			  </thead>
			  <tbody>
			  
			<?php 
			$sNo = 1;
			foreach ($allPosts as $communityPost):
			?>
				<tr>
				  <td><?php echo $sNo;?></td>
				  <td><?php echo $communityPost->subject;?></td>
				  <td><?php echo $communityPost->details;?></td>
				  <td><?php echo '';?></td>
				  <td></td>
				  <td><?php echo $this->Html->link('Post Respons', array('controller' => 'communities', 'action' => 'response', $communityPost->id));?></td>
				</tr>
			<?php 
			$sNo++;
			endforeach;
			?>
			
			  </tbody>
			</table>
		  </div>
		  <!--View All Posts table ends -->

	   </div>
	 </div>