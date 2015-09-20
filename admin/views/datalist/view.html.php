<?php
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * DataInsert View
 *
 * @since  0.0.1
 */
class SmfViewDataList extends JViewLegacy
{
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');
 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
 		// Set the toolbar
		$this->addToolBar();
		// Display the template
		parent::display($tpl);
	}

		/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		$title = JText::_('COM_SMF_MANAGER');
		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'> (" . $this->pagination->total . ")</span>";
		}

		JToolBarHelper::title($title,'smf');

		JToolBarHelper::addNew('smf.add');
		JToolBarHelper::editList('smf.edit');
		JToolBarHelper::deleteList('', 'datalist.delete');
	}
}
