<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the SMF Component
 *
 * @since  0.0.1
 */
class smfViewChildList extends JViewLegacy
{
	/**
	 * Display the SMF view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
		// Assign data to the view
	function display($tpl = null)
	{
		// Assign data to the view
		$this->msg = $this->get('Msg');
 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
 
			return false;
		}
 
		// Display the view
		parent::display($tpl);
	}
}