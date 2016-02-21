<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the SMF Component
 *
 * @since  0.0.1
 */
class smfViewChildlist extends JViewLegacy
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

		// Start New Code
		$app     = JFactory::getApplication();
		$uri     = JUri::getInstance();
		$error   = null;
		$rows    = null;
		$results = null;
		$total   = 0;

		// Get some data from the model
		$state      = $this->get('state');
		$params     = $app->getParams();
		$id = $state->get('id');

		// Built select country lists
		$countryList   = array();
		$countryList[] = JHtml::_('select.option', 'Please Select', JText::_('COM_SMF_PLEASE_SELECT_COUNTRY'));
		$countryList[] = JHtml::_('select.option', 'Bangladesh', JText::_('COM_SMF_COUNTRY_BAN'));
		$countryList[] = JHtml::_('select.option', 'Kenya', JText::_('COM_SMF_COUNTRY_KEN'));

		$lists             = array();
		$lists['country'] = JHtml::_('select.genericlist', $countryList, 'country', 'class="inputbox"', 'value', 'text', $state->get('country'));
		
		// Built select country lists
		$ageList   = array();
		$ageList[] = JHtml::_('select.option', 'Please Select', JText::_('COM_SMF_PLEASE_SELECT_AGE'));
		$ageList[] = JHtml::_('select.option', '5', JText::_('5'));
		$ageList[] = JHtml::_('select.option', '6', JText::_('6'));
		$ageList[] = JHtml::_('select.option', '7', JText::_('7'));
		$ageList[] = JHtml::_('select.option', '8', JText::_('8'));
		$ageList[] = JHtml::_('select.option', '9', JText::_('9'));
		$ageList[] = JHtml::_('select.option', '10', JText::_('10'));
		$ageList[] = JHtml::_('select.option', '11', JText::_('11'));
		$ageList[] = JHtml::_('select.option', '12', JText::_('12'));
		$ageList[] = JHtml::_('select.option', '13', JText::_('13'));
		$ageList[] = JHtml::_('select.option', '14', JText::_('14'));
		$ageList[] = JHtml::_('select.option', '15', JText::_('15'));

		$lists['age'] = JHtml::_('select.genericlist', $ageList, 'age', 'class="inputbox"', 'value', 'text', $state->get('age'));

		$genderList = array();
		$genderList[] = JHtml::_('select.option', 'Please Select', JText::_('COM_SMF_PLEASE_SELECT_GENDER'));
		$genderList[] = JHtml::_('select.option', 'Male', JText::_('COM_SMF_MALE'));
		$genderList[] = JHtml::_('select.option', 'Female', JText::_('COM_SMF_FEMALE'));
		$lists['gender'] = JHtml::_('select.genericlist', $genderList, 'gender', 'class="inputbox"', 'value', 'text', $state->get('match'));

		// Log the search
		JSearchHelper::logSearch($id, 'com_smf');

		// Limit id
		$lang        = JFactory::getLanguage();
		$upper_limit = $lang->getUpperLimitSearchWord();
		$lower_limit = $lang->getLowerLimitSearchWord();

		// Put the filtered results back into the model
		// for next release, the checks should be done in the model perhaps...
		$state->set('id', $id);

		if ($error == null)
		{
			$results    = $this->get('data');
			$total      = $this->get('total');
			$pagination      = $this->get('pagination');
		}

		// Check for layout override
		$active = JFactory::getApplication()->getMenu()->getActive();

		if (isset($active->query['layout']))
		{
			$this->setLayout($active->query['layout']);
		}

		// Escape strings for HTML output
		$this->pageclass_sfx = htmlspecialchars($params->get('pageclass_sfx'));
		$this->pagination    = &$pagination;
		$this->results       = &$results;
		$this->lists         = &$lists;
		$this->params        = &$params;
		$this->country       = $state->get('country');
		$this->age           = $state->get('age');
		$this->gender        = $state->get('match');
		$this->id            = $id;
		$this->originId      = $state->get('originId');
		$this->total         = $total;
		$this->error         = $error;
		$this->action        = $uri;

		parent::display($tpl);
	}
}
