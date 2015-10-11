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
				        <strong>Home: </strong> <?php echo $this->escape($result->country);?>       &nbsp;&nbsp;|&nbsp;&nbsp;
				        <a href="<?php echo JRoute::_('index.php?option=com_smf&task=profile&id='. $result->id);?>" target="_blank"><span class="glyphicon glyphicon-book"></span> Read my story</a>                &nbsp;&nbsp;|&nbsp;&nbsp;
				        <a class="youtube" href="<?php echo $this->escape($result->video_code);?>"><span class="glyphicon glyphicon-facetime-video"></span> Watch my video</a>
				   	</div>
				   	<!--div class="col-md-3 span3"> <a href=""><span class="icon-book"></span> Read my story</a></div> &nbsp;&nbsp;|&nbsp;&nbsp;
			        <div class="col-md-3 span3"><a href=""><span class="icon-video"></span> Watch my video</a></div-->
	      		</div> 
	            <div class="row" >
	        		<div class="col-md-9 smf-story-ellipsis"> 
	        			<?php echo $this->escape($result->my_story);?> 
	        		</div><a href="<?php echo JRoute::_('index.php?option=com_smf&task=profile&id='. $result->id);?>" target="_blank">Read more</a>
	      		</div>
			    <div class="row">
			    	<div class="col-md-4 smf-paypal-button-position">
			          	<div style="width: 171px;height: 80px;" class="s5" data-state="hasContent" id="i478zcpg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg">
			          		<div id="i478zcpgiFrameHolder" class="s5iFrameHolder" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0">
			          			<iframe width="100%" style="border:none;" height="93px" src="http://www.sabrinamemorial.org.usrfiles.com/html/4c2bb9_02316a46c772b8c8d485a64b61f62e6e.html" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0.0">
			          			</iframe>
			          		</div>
			          	</div>
			        </div>
			    </div>
			    <!--div class="row">
			        
			    </div-->
  			</div>
  		</div>
  		<hr>
    <?php endforeach; ?>
</div>
<div class="row" style="text-align:center;">
	<div class="pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
</div>
