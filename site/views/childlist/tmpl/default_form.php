	<?php
	/**
	 * @package     Joomla.Site
	 * @subpackage  com_search
	 *
	 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 */

	defined('_JEXEC') or die;

	JHtml::_('bootstrap.tooltip');

	$doc = JFactory::getDocument();
	$doc->addStyleSheet( 'templates/protostar/css/bootstrap.min.css' );
	$doc->addStyleSheet( 'components/com_smf/assets/includes/styles/custom.css' );
	$doc->addScript('components/com_smf/assets/includes/javascripts/custom.js', 'text/javascript');
	$doc->addScript('templates/protostar/js/bootstrap.min.js', 'text/javascript');

	$lang = JFactory::getLanguage();
	?>
	<div class="search">
	<form class="inline-form" id="searchForm" action="<?php echo JRoute::_('index.php?option=com_smf');?>" method="post">
		<nav class="navbar navbar-default">
			<div class="row" style="padding:0px 15px 0px 15px;">			
				<div class="col-md-12">
					<legend>
						<div class="row" style="padding:10px;"> 
							<div class="col-md-10" style="border-right:1px solid #eee"><h3><?php echo JText::_('COM_SMF_SEARCH_FOR_A_CHILDREN');?></h3></div>
							<div class="col-md-2" style="text-align:center;"><?php echo $this->pagination->getLimitBox(); ?></div>
						</div>
					</legend>	
				</div>
				<div class="row" style="margin:0px 20px 20px 20px;">

							<div class="col-md-2">
									<?php echo $this->lists['country'];?>
							</div>
							<div class="col-md-2">
								<?php echo $this->lists['birthMonth'];?>
							</div>
							<div class="col-md-2">
								<?php echo $this->lists['birthDay'];?>
							</div>
							<div class="col-md-2">
								<?php echo $this->lists['age'];?>
							</div>
							<div class="col-md-2">						
								<?php echo $this->lists['gender']; ?>						
							</div>
													<div class="col-md-2 ">														
							<button name="Search" onclick="this.form.submit()" class="btn hasTooltip btn-success" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search </button>
							<input type="hidden" name="task" value="search" />
						</div>

							<!--div class="col-md-9">
								<div class="row">
									
								</div>
							</div-->
			
					<div class="clearfix"></div>
				</div>
				<!--div class="row" style="padding:0px 45px 10px 20px;">
					<div class="col-md-8">
						<fieldset class="gender">
							<label for="gender" class="gender">
								<strong><?php echo JText::_('COM_SMF_GENDER_LEBEL');?></strong>
							</label>
							<div class="gender-box">
								<?php echo $this->lists['gender']; ?>
							</div>
						</fieldset>
					</div>
					<div class="col-md-4" style="padding-left:26px;">	
						<div class="">
							<button name="Search" onclick="this.form.submit()" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>"> Search <span class="icon-search"></span></button>
						</div>
					</div>
					<input type="hidden" name="task" value="search" />
				</div-->
			</div>
		</nav>
	</form>
