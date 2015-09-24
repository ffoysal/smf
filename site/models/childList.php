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
		$country = $app->input->get('country', $params->get('country', 'Bangladesh'), 'word');
		$birthMonth = $app->input->get('birthMonth', $params->get('birthMonth', 'January'), 'word');
		$birthDay = $app->input->get('birthDay', $params->get('birthDay', 1), 'uint');
		$age = $app->input->get('age', $params->get('age', 1), 'uint');
		$this->setSearch($gender, $match, $country, $birthMonth, $birthDay, $age);

		// Set the search areas
		//$areas = $app->input->get('areas', null, 'array');
		//$this->setAreas($areas);
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
		//if (isset($gender))
		//{
			//$this->setState('origkeyword', $gender);
			//$this->setState('gender', $gender);
		//}

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
		/*if (empty($this->_data))
		{
			//$areas = $this->getAreas();

			//JPluginHelper::importPlugin('search');
			//$dispatcher = JEventDispatcher::getInstance();
			$results = $this->getResults($this->getState('keyword'));
			$this->_data = $results;
			$this->_total = count($results);
		}
		return $this->_data;*/
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			//$areas = $this->getAreas();

			//JPluginHelper::importPlugin('search');
			//$dispatcher = JEventDispatcher::getInstance();
			//$results = $dispatcher->trigger('onContentSearch', array(
			//	$this->getState('gender'),
			//	$this->getState('match'),
			//	$this->getState('country'),
			//	$areas['active'])
			//);
			$results = $this->getResults($this->getState('match'), $this->getState('country'), $this->getState('birthMonth'), $this->getState('birthDay'), $this->getState('age'));
			//$rows = array();

			//foreach ($results as $result)
			//{
			//	$rows = array_merge((array) $rows, (array) $result);
			//}

			$this->_total = count($results);
			print_r('total');
			print_r($this->_total);

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
		//require_once JPATH_SITE . '/components/com_contact/helpers/route.php';
		$db = JFactory::getDbo();
		
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__smf_child_data'));
		$query->where($db->quoteName('country') . " LIKE " . $db->quote($country . '%') . 'AND' .
			$db->quoteName('gender') . " = " . $db->quote($gender ));
		print_r("Day");
		print_r($birthDay);
		print_r("Month");
		print_r($birthMonth);
		print_r("Age");
		print_r($age);
		//$query->where('(first_name LIKE ' . $firstName . ')');
				//OR a.misc LIKE ' . $text . ' OR a.con_position LIKE ' . $text
					//. ' OR a.address LIKE ' . $text . ' OR a.suburb LIKE ' . $text . ' OR a.state LIKE ' . $text
					//. ' OR a.country LIKE ' . $text . ' OR a.postcode LIKE ' . $text . ' OR a.telephone LIKE ' . $text
					//. ' OR a.fax LIKE ' . $text . ') AND a.published IN (' . implode(',', $state) . ') AND c.published=1 '
					//. ' AND a.access IN (' . $groups . ') AND c.access IN (' . $groups . ')'
			//)
			
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

/* End - New code is being added for actual smf work */
}