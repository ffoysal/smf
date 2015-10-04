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

		if ($params->get('gender') == 1)
		{
			$gender = 'Male';
		} else if ($params->get('gender') == 2)
		{
			$gender = 'Female';
		}

		// Set the search parameters
		$gender  = urldecode($app->input->getString('gender'));
		$match    = $app->input->get('gender', $gender, 'word');
		$country = $app->input->get('country', $params->get('country', 'Please Select'), 'word');
		$birthMonth = $app->input->get('birthMonth', $params->get('birthMonth', 'Please Select'), 'word');
		$birthDay = $app->input->get('birthDay', $params->get('birthDay', 'Please Select'), 'uint');
		$age = $app->input->get('age', $params->get('age', 'Please Select'), 'uint');
		$this->setSearch($gender, $match, $country, $birthMonth, $birthDay, $age);
	}

	/**
	 * Method to set the search parameters
	 *
	 * @param   string  $keyword   string search string
	 * @param   string  $match     matching option, exact|any|all
	 * @param   string  $ordering  option, newest|oldest|popular|alpha|category
	 *
	 * @return  void
	 *
	 * @access	public
	 */
	public function setSearch($gender, $match = 'Male', $country = 'Bangladesh', $birthMonth='January', $birthDay=1, $age=1)
	{
		if (isset($match))
		{
			$this->setState('match', $match);
		}

		if (isset($birthMonth))
		{
			$this->setState('birthMonth', $birthMonth);
		}
		if (isset($birthDay))
		{
			$this->setState('birthDay', $birthDay);
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
		if (empty($this->_data))
		{
			$results = $this->getResults($this->getState('match'), $this->getState('country'), $this->getState('birthMonth'), $this->getState('birthDay'), $this->getState('age'));

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
		if (empty($this->_pagination))
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
	public function getResults($gender, $country, $birthMonth, $birthDay, $age)
	{
		$db = JFactory::getDbo();

		$whrClause = $this->buildWhereClause($gender, $country, $birthMonth, $birthDay, $age, $db);
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
	public function buildWhereClause($gender, $country, $birthMonth, $birthDay, $age, $db)
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
		$monthStr = $this->getMonthInt($birthMonth);

		if($monthStr != 0) {
			$whereClause = $whereClause . $andString . $db->quoteName('birth_month') . " = " . $db->quote($monthStr );
			$andString = " AND ";
		}
		
		if($birthDay != 'Please Select') {
			$whereClause = $whereClause . $andString . $db->quoteName('birth_day') . " = " . $db->quote($birthDay );
			$andString = " AND ";
		}
		
		if($age != 'Please Select') {
			$whereClause = $whereClause . $andString . $db->quoteName('birth_year') . " = " . $db->quote($curYear - $age);
		}
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