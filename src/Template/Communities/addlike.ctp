
							<div style="color:green;text-align:right;padding-right:2px;"  >
<?php		
//echo  'hua--',$numRowsCommunitiesLikes;				
if($numRowsCommunitiesLikes>0){
echo $this->Html->link('UnLike It', array('controller' => 'communities', 'action' => 'addlike', $communityId,0),['id'=>'linkforLikeId','class'=>"mylink"]);
?>
				<!--  <a href="#" id="linkforLikeId1" class="mylink">aa</a>-->

<?php 
}
				  else{
		  echo $this->Html->link('Like It', array('controller' => 'communities', 'action' => 'addlike', $communityId,1), ['id'=>'linkforLikeId','class'=>"mylink"]);
				  
				  ?>
				  				  <!--<a href="#" class="mylink" id="linkforLikeId1">nnnnn aa</a>-->
<?php
				  }
				  ?>



<input type="hidden"  id= "numRowsCommunitiesLikesTextID" value="<?php echo  $numRowsCommunitiesLikes?>">
<?php 
?>
</div>