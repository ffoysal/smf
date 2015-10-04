<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
	$doc->addStyleSheet( 'templates/protostar/css/bootstrap.min.css' );
	$doc->addStyleSheet( 'templates/protostar/css/custom.css' );
	$doc->addScript('templates/protostar/js/bootstrap.min.js', 'text/javascript');
	$doc->addScript('templates/protostar/js/custom.js', 'text/javascript');

?>
<div class="search-result top-border-style">
	<!--table-->
	<?php foreach ($this->profiles as $result) : ?>
		<div class="row">
    		<div class="col-md-4" style="padding:20px;border-right:1px solid #eee;">
           		<img src="<?php echo $this->escape($result->image_url);?>" class="img-thumbnail" alt="Cinque Terre" width="250" height="180">
    		</div>
	    	<div class="col-md-8">
	      		<div class="row">
	        		<div class="col-md-8 span12">
	           			<h2>Meet <a href="<?php echo JRoute::_('index.php?option=com_smf&task=search');?>" target="_blank"><?php echo $this->escape($result->first_name);?></a> in <?php echo $this->escape($result->country);?></h2> 
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