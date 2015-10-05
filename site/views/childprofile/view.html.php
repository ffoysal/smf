<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the SMF Component
 *
 * @since  0.0.1
 */
class smfViewChildprofile extends JViewLegacy
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
		$profiles = null;
		$state      = $this->get('state');
		
		$profiles    = $this->get('profile_data');
		$this->profiles       = &$profiles;
		
		$this->id             = $state->get('id');
		
		parent::display($tpl);
	}
}
