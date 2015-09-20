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
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(                
                'gender',
				'birth_month'
            );
        }
 
        parent::__construct($config);
    }	
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
       	// Filter: like / search
		$search = $this->getState('filter.search');
 
		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('first_name LIKE ' . $like);
		}         
 		// Filter by gender
		$gender = $this->getState('filter.gender');
 
		if (!empty($gender))
		{
			$query->where('gender = ' . $db->quote($gender));
		}				
  		// Filter by birth month
		$birthMonth = $this->getState('filter.birth_month');
 
		if (!empty($birthMonth))
		{
			$query->where('birth_month = ' . $db->quote($birthMonth));
		}	

		return $query;
	}
}