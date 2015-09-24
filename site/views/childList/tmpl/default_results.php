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
    		<div class="col-md-4" style="padding:20px;">
           		<img src="http://images.agoramedia.com/wte3.0/gcms/fy-ww-baby-growth-and-behavior.jpg" class="img-thumbnail" alt="Cinque Terre" width="250" height="180">
    		</div>
	    	<div class="col-md-8 style="padding:20px;border:1px solid black;">
	      		<div class="row" style="padding-top:20px;">
	        		<div class="col-md-8">
	           			<span><strong>Meet <a href="#"><?php echo $this->escape($result->first_name);?></a> in Bangladesh</strong></span> 
	        		</div>
	      		</div>
			    <div class="row">
			        <div class="col-md-2" style="padding-top:10px;">
			           <div><strong>Name: </strong> <?php echo $this->escape($result->first_name);?> </div> 
			        </div>
			        <div class="col-md-2" style="padding-top:10px;">
			           <div class="row">
			             <div class="col-md"><strong>Gender: </strong> <?php echo $this->escape($result->gender);?> </div> 
			           </div> 
			        </div>
			        <div class="col-md-3" style="padding-top:10px;">
			           <div><strong>Home: </strong> <?php echo $this->escape($result->country);?> </div> 
			        </div>
	      		</div> 
	            <div class="row" style="padding-top:10px;">
	        		<div class="col-md-8"> <?php echo $this->escape($result->my_story);?> </div>
	      		</div>
			    <div class="row" style="padding-top:10px;">
			        <div class="col-md-3"><p class="glyphicon glyphicon-book"> Read my Story</p></div>
			        <div class="col-md-4""><p class="glyphicon glyphicon-facetime-video"> Watch my video</p></div>
			    </div>
			    <div class="row" style="padding-top:10px;">
			        <div class="col-md-8">
			          <button type="button" class="btn btn-warning">Warning</button>
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
