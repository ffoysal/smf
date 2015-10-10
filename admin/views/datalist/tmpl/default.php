<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<form action="index.php?option=com_smf&view=datalist" method="post" id="adminForm" name="adminForm">
         <?php
            // Search tools bar
            echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
            ?>
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th >
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_STUDENT_ID') ;?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_FIRST_NAME') ;?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_LAST_NAME'); ?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_GENDER'); ?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_BIRTHDATE'); ?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_COUNTRY'); ?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_MONTHLY_SPONSORSHIP'); ?>
			</th>
			<th >
				<?php echo JText::_('COM_SMF_SHOW_IN_SITE'); ?>
			</th>
			<th width="20%">
				<?php echo JText::_('COM_SMF_MY_STORY'); ?>
			</th>
			<!--th width="5%">
				<?php echo JText::_('COM_SMF_CHILD_VIDEO_CODE'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_SMF_CHILD_CHORES_WORK'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_SMF_CHILD_EDUCATION'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_SMF_CHILD_HOBBIES'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_SMF_CHILD_FAVOURITE_GAME'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_SMF_CHILD_DREAM'); ?>
			</th -->

		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="15">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : 
					$link = JRoute::_('index.php?option=com_smf&task=smf.edit&id=' . $row->id);
				?>
 
					<tr>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_SMF_EDIT_RECORD'); ?>">						
								<?php echo $row->student_id; ?>
							</a>	
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_SMF_EDIT_RECORD'); ?>">						
								<?php echo $row->first_name; ?>
							</a>	
						</td>
						<td >
							<?php echo $row->last_name; ?>
						</td>
						<td >
							<?php echo $row->gender; ?>
						</td>
						<td >
							<?php $d = strtotime($row->birth_date); echo date('m-d-Y',$d); ?>
						</td>
						<td >
							<?php echo $row->country; ?>
						</td>
						<td >
							<?php echo $row->monthly_sponsorship; ?>
						</td>
						<td >
							<?php echo $row->show_in_site; ?>
						</td>
						<td >
							<?php echo $row->my_story; ?>
						</td>
						<!-- td >
							<?php echo $row->video_code; ?>
						</td>
						<td >
							<?php echo $row->chores_work; ?>
						</td>
						<td >
							<?php echo $row->education; ?>
						</td>
						<td >
							<?php echo $row->hobbies; ?>
						</td>
						<td >
							<?php echo $row->favourite_game; ?>
						</td>
						<td >
							<?php echo $row->dream; ?>
						</td -->
						
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>	
</form>
