<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

function formatDob($dateOfBirth) {

	$dob = explode("-", $dateOfBirth);
	if($dob[1] == '01') {
		$dob[1] = 'Jan';
	} elseif ($dob[1] == '02') {
		$dob[1] = 'Feb';
	} elseif ($dob[1] == '03') {
		$dob[1] = 'Mar';
	} elseif ($dob[1] == '04') {
		$dob[1] = 'Apr';
	} elseif ($dob[1] == '05') {
		$dob[1] = 'May';
	} elseif ($dob[1] == '06') {
		$dob[1] = 'Jun';
	} elseif ($dob[1] == '07') {
		$dob[1] = 'Jul';
	} elseif ($dob[1] == '08') {
		$dob[1] = 'Aug';
	} elseif ($dob[1] == '09') {
		$dob[1] = 'Sep';
	} elseif ($dob[1] == '10') {
		$dob[1] = 'Oct';
	} elseif ($dob[1] == '11') {
		$dob[1] = 'Nov';
	} elseif ($dob[1] == '12') {
		$dob[1] = 'Dec';
	}
	return $dob;
}

?>
<div class="search-result top-border-style">
	<!--table-->
	<?php foreach ($this->profiles as $result) : ?>
		<div class="row">
    		<div class="col-md-3 smf-profile-img-style">
           		<img src="<?php echo $this->escape($result->image_url);?>" class="img-thumbnail" alt="Cinque Terre" width="250" height="180">
    		</div>
	    	<div class="col-md-9">
	      		<div class="row">
	        		<div class="col-md-12">
	           			<h2>Experience the true happiness of life</h2> 
	        		</div>
	      		</div>
			    <div class="row smf-border-left">
			    	<div class="col-md-12">
		    			<h3>About 
		    				<?php echo $this->escape($result->first_name);?> 
		    				<?php echo $this->escape($result->last_name);?>:
		    			</h3>
				    </div>
				</div>
		    	<div class="row smf-border-left">
		    		<div class="col-md-5"> 
		    			<div class="row">
		    				<div class="col-md-5">
		    					<strong><?php echo JText::_('COM_SMF_NAME');?></strong> 
	    					</div>
	    					<div class="col-md-7">
	    						<?php if ($this->escape($result->first_name)===NULL || $this->escape($result->last_name)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
	    							<?php echo $this->escape($result->first_name);?> <?php echo $this->escape($result->last_name);?>
	    						<?php endif; ?>
	    					</div>
	    				</div>
	    				<div class="row">
		    				<div class="col-md-5">
		    					<strong><?php echo JText::_('COM_SMF_GENDER');?></strong>
	    					</div>
	    					<div class="col-md-7">
	    						<?php if ($this->escape($result->gender)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
		    						<?php echo $this->escape($result->gender);?>
		    					<?php endif; ?>
	    					</div>
	    				</div>
	    				<div class="row">
		    				<div class="col-md-5">
		    					<strong><?php echo JText::_('COM_SMF_BIRTHDAY');?></strong>
	    					</div>
	    					<div class="col-md-7">
	    						<?php if ($this->escape($result->birth_date)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
		    						<?php echo $this->escape(formatDob($result->birth_date)[1] . ' ' . formatDob($result->birth_date)[2]. ', ' .formatDob($result->birth_date)[0]);?>
		    					<?php endif; ?>
	    					</div>
	    				</div>
	    				<div class="row">
		    				<div class="col-md-5">
		    					<strong><?php echo JText::_('COM_SMF_COUNTRY');?></strong>
	    					</div>
	    					<div class="col-md-7">
	    						<?php if ($this->escape($result->country)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
	    							<?php echo $this->escape($result->country);?>
	    						<?php endif; ?>
	    					</div>
	    				</div>
	    				<div class="row">
		    				<div class="col-md-5">
		    					<strong><?php echo JText::_('COM_SMF_EDUCATION');?></strong>
	    					</div>
	    					<div class="col-md-7">
	    						<?php if ($this->escape($result->education)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
		    						<?php echo $this->escape($result->education);?>
		    					<?php endif; ?>
	    					</div>
	    				</div>
	    				<div class="row">
		    				<div class="col-md-5">
		    					<strong><?php echo JText::_('COM_SMF_HOBBIES');?></strong>
	    					</div>
	    					<div class="col-md-7">
		    					<?php if ($this->escape($result->hobbies)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
		    						<?php echo $this->escape($result->hobbies);?>
		    					<?php endif; ?>
	    					</div>
	    				</div>
	    				<div class="row">
		    				<div class="col-md-5">
		    					<strong><?php echo JText::_('COM_SMF_DREAM');?></strong>
	    					</div>
	    					<div class="col-md-7">
		    					<?php if ($this->escape($result->dream)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
		    						<?php echo $this->escape($result->dream);?>
		    					<?php endif; ?>
	    					</div>
	    				</div>
		    		</div>
		        	<div class="col-md-7">
		        		<div class="row">
		        			<h4><?php echo $this->escape($result->first_name);?> <?php echo $this->escape($result->last_name);?> is <?php echo (date('Y') - $this->escape($result->birth_year));?> years old and lives in <?php echo $this->escape($result->country);?>.</h4>
		        		</div>
		        		<div class="row">
		        			<?php echo $this->escape($result->my_story);?>
		        		</div>
		        	</div>
		    	</div>
			    <div class="row smf-donate-now-align">
			        <div class="col-md-4">
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
  		<hr>
    <?php endforeach; ?>