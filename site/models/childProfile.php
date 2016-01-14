<?php
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
class smfModelChildProfile extends JModelLegacy
{

/* Start - New code is being added for actual smf work */
	/**
	 * Search data array
	 *
	 * @var array
	 */
	protected $_profile_data = null;

	/**
	 * Constructor
	 *
	 * @since 1.5
	 */
	public function __construct()
	{
		parent::__construct();

		// Get configuration
		$app    = JFactory::getApplication();
		$config = JFactory::getConfig();
		/// Get parameters.
		$params = $app->getParams();

		$id = $app->input->get('id', $params->get('id', null), 'uint');
		
		$this->setState('id', $id);

	}

	/**
	 * Method to get weblink item data for the category
	 *
	 * @access public
	 * @return array
	 */
	public function getProfile_data()
	{
		$profiles = $this->getProfile($this->getState('id'));

		$this->_profile_data = $profiles;

		return $this->_profile_data;
	}

/**
	 * Search content (contacts).
	 *
	 * The SQL must return the following fields that are used in a common display
	 * routine: href, title, section, created, text, browsernav.
	 *
	 * @param   string  $text      Target search string.
	 * @param   string  $phrase    Matching option (possible values: exact|any|all).  Default is "any".
	 * @param   string  $ordering  Ordering option (possible values: newest|oldest|popular|alpha|category).  Default is "newest".
	 * @param   string  $areas     An array if the search is to be restricted to areas or null to search all areas.
	 *
	 * @return  array  Search results.
	 *
	 * @since   1.6
	 */
	public function getProfile($id)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__smf_child_data'));
		$query->where($db->quoteName('id') . " = " . $db->quote($id ));
		$db->setQuery($query, 0, '');

		try
		{
			$profiles = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			$profiles = array();
			JFactory::getApplication()->enqueueMessage(JText::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
		}
		return $profiles;
	}
}