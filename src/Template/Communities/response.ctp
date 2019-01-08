<!-- File: src/Template/Communities/response.ctp -->
<script>
$(function() {
	// validate CommunityResponse form on submit
	$("#CommunityResponse").validate({
		rules: {
			response: {
				required: true
			}
		},
		messages: {
			response: "Please enter Response."
		}
	});
});
</script>
		<div class="col-md-10 rightAreaInner">
           <div class="signUpBox">
		   
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
		   
		   <h3>User Respond</h3>
            <div class="panel panel-default">
              <div class="panel-heading">Some Title Related to Respond</div>
              <div class="panel-body">
			<?php echo $this->Form->create('', ['id'=>'CommunityResponse', 'url' => ['action' => 'response']]);?>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Subject:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                  	<?php echo $community->subject;?>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  </br>(Total Like = <?php echo $community->like;?>)
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  (Total Reply = <?php echo $community->reply;?>)
                </div>
              </div>
			  <div class="form-group">
                <label class="control-label col-sm-3" for="email">Details:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
					<?php echo $community->details;?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Reply:</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
					<input type="hidden" value="<?php echo $community->id;?>" name="id">
					<textarea name="response" id="response" rows="6" cols="52"></textarea>
                </div>
              </div>
               <div class="form-group">
                <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary">Like</button>
				  <button type="submit" class="btn btn-primary">Reply</button>
                </div>
              </div>
			<?php echo $this->Form->end();?>
			</div>
            </div>
		 </div>
         </div>