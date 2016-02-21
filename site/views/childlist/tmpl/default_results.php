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
<hr class="smf-horizontal-rule-style">
<div class="search-result">
	<?php foreach ($this->results as $result) : ?>
		<div class="row smf-div-hover">
    		<div class="col-md-2 smf-listing-image-style">
           		<img src="<?php echo $this->escape($result->image_url);?>" class="img-thumbnail" alt="Cinque Terre" width="250" height="180">
    		</div>
	    	<div class="col-md-10">
	      		<div class="row">
	        		<div class="col-md-12 span12">
	           			<h4>Meet <a href="<?php echo JRoute::_('index.php?option=com_smf&task=profile&id='. $result->id);?>" target="_blank"><?php echo $this->escape($result->first_name);?></a> in <?php echo $this->escape($result->country);?></h4> 
	        		</div>
	      		</div>
			    <div class="row">
			    	<div class="col-md-12 span12">
				    	<strong>Name: </strong> <?php echo $this->escape($result->first_name);?>    &nbsp;&nbsp;|&nbsp;&nbsp;
				    	<strong>Gender: </strong> <?php echo $this->escape($result->gender);?>      &nbsp;&nbsp;|&nbsp;&nbsp;
				        <strong>Country: </strong> <?php echo $this->escape($result->country);?>       &nbsp;&nbsp;|&nbsp;&nbsp;
				        <a href="<?php echo JRoute::_('index.php?option=com_smf&task=profile&id='. $result->id);?>" target="_blank"><span class="glyphicon glyphicon-book"></span> Read my story</a>
				        </div>
				  </div> 
	            <div class="row">
	        		<div class="col-md-9 smf-story-ellipsis"> 
	        			<?php echo $this->escape($result->my_story);?> 
	        		</div><a href="<?php echo JRoute::_('index.php?option=com_smf&task=profile&id='. $result->id);?>" target="_blank">Read more</a>
	      		</div>
			    <div class="row">
			    	<div class="col-md-4 smf-paypal-button-position">
			          	<!-- div style="width: 171px;height: 80px;" class="s5" data-state="hasContent" id="i478zcpg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg">
			          		<div id="i478zcpgiFrameHolder" class="s5iFrameHolder" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0">
			          			<iframe width="100%" style="border:none;" height="93px" src="http://www.sabrinamemorial.org.usrfiles.com/html/4c2bb9_02316a46c772b8c8d485a64b61f62e6e.html" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0.0">
			          			</iframe>
			          		</div>
			          	</div -->
						<?php if ($this->escape($result->sponsored)) { ?>
								<span class="label label-success already_sponsored">Already Sponsored</span>
						<?php } else { ?>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_donations">
						<!-- Replace "business" value with your PayPal Email Address or Account ID -->
						<input type="hidden" name="business" value="sabrinamemorial@gmail.com">
						<input type="hidden" name="lc" value="US">
						<input type="hidden" name="item_name" value="Sabrina Memorial Foundation (<?php echo $this->escape($result->student_id);?>)">

						<input type="hidden" name="no_note" value="0">
						<input type="hidden" name="cn" value="Any message to Sabrina Memorial Foundation:">
						<input type="hidden" name="no_shipping" value="2">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="max_text" value="Yearly 240 and 20 per month">

						<input type="hidden" name="return" value="http://www.smfacademy.co/smf">
						<input type="hidden" name="cancel_return" value="http://www.smfacademy.co/smf">

						<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
						<input type="image" src="images/smf/sponsor_now_btn.jpg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form>
						<?php } ?>						
			        </div>
			    </div>
  			</div>
  		</div>
  		<hr class="smf-horizontal-rule-style">
    <?php endforeach; ?>
</div>
<div class="row" style="text-align:center;">
	<div class="pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
</div>
