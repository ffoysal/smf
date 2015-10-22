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
		    						<?php echo $this->escape($result->birth_date);?>
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
		    					<strong><?php echo JText::_('COM_SMF_CHORES');?></strong>
	    					</div>
	    					<div class="col-md-7">
	    						<?php if ($this->escape($result->chores_work)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
		    						<?php echo $this->escape($result->chores_work);?>
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
		    					<strong><?php echo JText::_('COM_SMF_FAV_GAME');?></strong>
	    					</div>
	    					<div class="col-md-7">
		    					<?php if ($this->escape($result->favourite_game)===NULL) : ?>
	    							<?php echo JText::_('COM_SMF_NA');?>
	    						<?php else:?>
		    						<?php echo $this->escape($result->favourite_game);?>
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
			          	<div style="width: 171px;height: 80px;" class="s5" data-state="hasContent" id="i478zcpg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg">
			          		<div id="i478zcpgiFrameHolder" class="s5iFrameHolder" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0">
			          			<iframe width="100%" style="border:none;" height="93px" src="http://www.sabrinamemorial.org.usrfiles.com/html/4c2bb9_02316a46c772b8c8d485a64b61f62e6e.html" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0.0">
			          			</iframe>
			          		</div>
			          	</div>
			        </div>
			    </div>
  			</div>
  		</div>
  		<hr>
    <?php endforeach; ?>