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
	$doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
	$doc->addScript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', 'text/javascript');

	$lang = JFactory::getLanguage();
	?>
	<div class="search">
	<form class="inline-form" id="searchForm" action="<?php echo JRoute::_('index.php?option=com_smf');?>" method="post">
		<div class="row">
			<div class="col-md-12">
				<legend><?php echo JText::_('COM_SMF_SEARCH_FOR_A_CHILDREN');?></legend>
			</div>
		</div>
		<div class="row" style="padding-bottom:20px;">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 country-box">
						<label for="country" class="country">
							<?php echo JText::_('COM_SMF_COUNTRY_LEBEL');?>
						</label>
						<?php echo $this->lists['country'];?>
					</div>
					<div class="col-md-4">
						<label for="birthMonth" class="birthMonth-box">
							<?php echo JText::_('COM_SMF_BIRTH_MONTH');?>
						</label>
						<?php echo $this->lists['birthMonth'];?>
					</div>
					<div class="col-md-4">
						<label for="birthDay" class="birthDay-box">
							<?php echo JText::_('COM_SMF_BIRTH_DAY');?>
						</label>
						<?php echo $this->lists['birthDay'];?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<fieldset class="gender">
					<label for="gender" class="gender">
						<?php echo JText::_('COM_SMF_GENDER_LEBEL');?>
					</label>
					<div class="gender-box">
						<?php echo $this->lists['gender']; ?>
					</div>
				</fieldset>
			</div>
			<div class="col-md-4">
				<label for="age" class="age-box">
					<?php echo JText::_('COM_SMF_AGE');?>
				</label>
				<?php echo $this->lists['age'];?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="text-align:right;">	
				<div class="">
					<button name="Search" onclick="this.form.submit()" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>"><span class="icon-search"></span></button>
				</div>
			</div>
			<input type="hidden" name="task" value="search" />
		</div>
		<?php if ($this->total > 0) : ?>

		<div class="form-limit">
			<label for="limit">
				<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
			</label>
				<?php echo $this->pagination->getLimitBox(); ?>
		</div>
		<p class="counter">
			<?php echo $this->pagination->getPagesCounter(); ?>
		</p>
		<?php endif; ?>
	</form>
