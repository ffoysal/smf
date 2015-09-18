<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * DataList Model
 *
 * @since  0.0.1
 */
class SmfModelDataList extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
 
		// Create the base select statement.
		$query->select('*')
                ->from($db->quoteName('#__smf_child_data'));
 
		return $query;
	}
}