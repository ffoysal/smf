<?php
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
class SmfModelChildList extends JModelLegacy
{

/* Start - New code is being added for actual smf work */
	/**
	 * Search data array
	 *
	 * @var array
	 */
	protected $_data = null;

	/**
	 * Search total
	 *
	 * @var integer
	 */
	protected $_total = null;

	/**
	 * Pagination object
	 *
	 * @var object
	 */
	protected $_pagination = null;

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

		// Get the pagination request variables
		$this->setState('limit', $app->getUserStateFromRequest('com_smf.limit', 'limit', $config->get('list_limit'), 'uint'));
		$this->setState('limitstart', $app->input->get('limitstart', 0, 'uint'));

		/// Get parameters.
		$params = $app->getParams();

		/*if ($params->get('gender') == 1)
		{
			$gender = 'Male';
		} else if ($params->get('gender') == 2)
		{
			$gender = 'Female';
		}*/

		// Set the search parameters
		$id  = urldecode($app->input->getString('id'));
		$gender  = urldecode($app->input->getString('gender'));
		$match    = $app->input->get('gender', $gender, 'word');
		$country = $app->input->get('country', $params->get('country', 'Please Select'), 'word');
		$age = $app->input->get('age', $params->get('age', 'Please Select'), 'uint');
		$this->setSearch($gender, $match, $country, $age, $id);
	}

	/**
	 * Method to set the search parameters
	 *
	 * @param   string  $id   string search string
	 * @param   string  $match     matching option, exact|any|all
	 * @param   string  $ordering  option, newest|oldest|popular|alpha|category
	 *
	 * @return  void
	 *
	 * @access	public
	 */
	public function setSearch($gender, $match = 'Male', $country = 'Bangladesh', $age=1, $id)
	{
		if (isset($id))
		{
			$this->setState('originId', $id);
			$this->setState('id', $id);
		}

		if (isset($match))
		{
			$this->setState('match', $match);
		}
		if (isset($age))
		{
			$this->setState('age', $age);
		}
		if (isset($country))
		{
			$this->setState('country', $country);
		}
	}

	/**
	 * Method to get weblink item data for the category
	 *
	 * @access public
	 * @return array
	 */
	public function getData()
	{
		// Lets load the content if it doesn't already exist
		if ($this->_data===NULL)
		{
			$results = $this->getResults($this->getState('match'), $this->getState('country'), $this->getState('age'), $this->getState('id'));

			$this->_total = count($results);

			if ($this->getState('limit') > 0)
			{
				$this->_data = array_splice($results, $this->getState('limitstart'), $this->getState('limit'));
			}
			else
			{
				$this->_data = $results;
			}
		}

		return $this->_data;
	}

	/**
	 * Method to get the total number of weblink items for the category
	 *
	 * @access  public
	 *
	 * @return  integer
	 */
	public function getTotal()
	{
		return $this->_total;
	}

	/**
	 * Method to get a pagination object of the weblink items for the category
	 *
	 * @access public
	 * @return  integer
	 */
	public function getPagination()
	{
		// Lets load the content if it doesn't already exist
		if ($this->_pagination===NULL)
		{
			$this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
		}

		return $this->_pagination;
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
	public function getResults($gender, $country, $age, $id)
	{
		$db = JFactory::getDbo();

		$whrClause = $this->buildWhereClause($gender, $country, $age, $db, $id);
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__smf_child_data'));
		if($whrClause) {
			$query->where($whrClause);
		}
			
		$db->setQuery($query, 0, '');

		try
		{
			$rows = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			$rows = array();
			JFactory::getApplication()->enqueueMessage(JText::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
		}
		return $rows;
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
	public function buildWhereClause($gender, $country, $age, $db, $id)
	{
		$whereClause = '';
		$curYear = date('Y');
		$andString = '';

		if($country != 'BAN') {
			$whereClause = $db->quoteName('country') . " LIKE " . $db->quote($country . '%');	
			$andString = " AND ";
		}
		
		if($gender != '') {
			$whereClause = $whereClause . $andString . $db->quoteName('gender') . " = " . $db->quote($gender );
			$andString = " AND ";
		}
		
		if($age != 'Please Select') {
			$whereClause = $whereClause . $andString . $db->quoteName('birth_year') . " = " . $db->quote($curYear - $age);
			$andString = " AND ";
		}

		if($id != '') {
			$whereClause = $whereClause . $andString . $db->quoteName('id') . " = " . $db->quote($id);
			$andString = " AND ";
		}		
		$whereClause = $whereClause . $andString . $db->quoteName('show_in_site') . " =1";
		
		return $whereClause;
	}
/**
	 * Search content (contacts).
	 *
	 * The SQL must return the following fields that are used in a common display
	 * routine: href, title, section, created, text, browsernav.
	 * @return  $month  Search results.
	 *
	 * @since   1.6
	 */
	public function getMonthInt($month) {
		$monthTemp = '';
		if($month == 'January') {
			$monthTemp = 1;
		} else if($month == 'February') {
			$monthTemp = 2;
		} else if($month == 'March') {
			$monthTemp = 3;
		} else if($month == 'April') {
			$monthTemp = 4;
		} else if($month == 'May') {
			$monthTemp = 5;
		} else if($month == 'June') {
			$monthTemp = 6;
		} else if($month == 'July') {
			$monthTemp = 7;
		} else if($month == 'August') {
			$monthTemp = 8;
		} else if($month == 'September') {
			$monthTemp = 9;
		} else if($month == 'October') {
			$monthTemp = 10;
		} else if($month == 'November') {
			$monthTemp = 11;
		} else if($month == 'December') {
			$monthTemp = 12;
		} else {
			$monthTemp = 0;
		}
		return $monthTemp;
	}

/* End - New code is being added for actual smf work */
}