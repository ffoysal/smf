<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<hr>
<div class="search-result">
	<!--table-->
	<?php foreach ($this->results as $result) : ?>
		<div class="row">
    		<div class="col-md-4" style="padding:20px;border-right:1px solid #eee;">
           		<img src="<?php echo $this->escape($result->image_url);?>" class="img-thumbnail" alt="Cinque Terre" width="250" height="180">
    		</div>
	    	<div class="col-md-8">
	      		<div class="row">
	        		<div class="col-md-8 span12">
	           			<h2>Meet <a href="#"><?php echo $this->escape($result->first_name);?></a> in <?php echo $this->escape($result->country);?></h2> 
	        		</div>
	      		</div>
			    <div class="row">
			    	<div class="col-md-8 span12">
				    	<strong>Name: </strong> <?php echo $this->escape($result->first_name);?>    &nbsp;&nbsp;|&nbsp;&nbsp;
				    	<strong>Gender: </strong> <?php echo $this->escape($result->gender);?>       &nbsp;&nbsp;|&nbsp;&nbsp;
				        <strong>Home: </strong> <?php echo $this->escape($result->country);?> 
				   	</div> 
	      		</div> 
	            <div class="row" >
	        		<div class="col-md-8 span12"> 
	        			<?php echo $this->escape($result->my_story);?> 
	        		</div>
	      		</div>
			    <div class="row">
			        <div class="col-md-3 span4"> <a href=""><span class="icon-book"></span> Read my story</a></div>
			        <div class="col-md-4 span5"><a href=""><span class="icon-video"></span> Watch my video</a></div>
			    </div>
			    <div class="row">
			        <div class="col-md-8">
			          <button type="button" class="btn btn-warning">Donate Now</button>
			        </div>
			    </div>
  			</div>
  		</div>
  		<hr>
    <?php endforeach; ?>
</div>
<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>

		<!--tr class="result-title">
			<td>
				<?php echo $this->escape($result->id);?>.
			</td>		
			<td>
				<?php echo $this->escape($result->first_name);?>
			</td>
			<td>
				<?php echo $this->escape($result->last_name);?>
			</td>
			<td>
				<?php echo $this->escape($result->gender);?>
			</td>
			<td>
				<?php echo $this->escape($result->country);?>
			</td>
			<td>
				<?php echo $this->escape($result->my_story);?>
			</td>
			<td>
				<?php echo $this->escape($result->birth_date);?>
			</td>
		</tr-->
	<!--?php endforeach; ?-->
	<!--/table-->
<!--/div>
<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div-->
