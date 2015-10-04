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
	$doc->addStyleSheet( 'templates/protostar/css/custom.css' );
	$doc->addScript('templates/protostar/js/bootstrap.min.js', 'text/javascript');
	$doc->addScript('templates/protostar/js/custom.js', 'text/javascript');

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
							<div class="col-md-2" style="text-align:right;"><?php echo $this->pagination->getLimitBox(); ?></div>
						</div>
					</legend>	
				</div>
				<div class="row" style="padding-bottom:10px;">
					<div class="col-md-12">
						<div class="row" style="padding:0px 20px 0px 20px;">
							<div class="col-md-3">
								<label for="country" class="country">
									<strong><?php echo JText::_('COM_SMF_COUNTRY_LEBEL');?></strong>
								</label>
								<?php echo $this->lists['country'];?>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-3">
										<label for="birthMonth" class="birthMonth-box">
											<strong><?php echo JText::_('COM_SMF_BIRTH_MONTH');?></strong>
										</label>
										<?php echo $this->lists['birthMonth'];?>
									</div>
									<div class="col-md-3">
										<label for="birthDay" class="birthDay-box">
											<strong><?php echo JText::_('COM_SMF_BIRTH_DAY');?></strong>
										</label>
										<?php echo $this->lists['birthDay'];?>
									</div>
									<div class="col-md-3">
										<label for="age" class="age-box">
											<strong><?php echo JText::_('COM_SMF_AGE');?></strong>
										</label>
										<?php echo $this->lists['age'];?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="row" style="padding:0px 45px 10px 20px;">
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
				</div>
			</div>
		</nav>
	</form>
