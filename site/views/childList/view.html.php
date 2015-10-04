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

		// Built select country lists
		$countryList   = array();
		$countryList[] = JHtml::_('select.option', 'Please Select', JText::_('COM_SMF_PLEASE_SELECT'));
		$countryList[] = JHtml::_('select.option', 'Bangladesh', JText::_('COM_SMF_COUNTRY_BAN'));
		$countryList[] = JHtml::_('select.option', 'Kenya', JText::_('COM_SMF_COUNTRY_KEN'));

		$lists             = array();
		$lists['country'] = JHtml::_('select.genericlist', $countryList, 'country', 'class="inputbox"', 'value', 'text', $state->get('country'));


		//<!-- TODO: Build Birth Month and Day here which is dynamic make it later, hard coded for now -->
		// Built select birthMonth lists
		$birthMonthList   = array();
		$birthMonthList[] = JHtml::_('select.option', 'Please Select', JText::_('COM_SMF_PLEASE_SELECT'));
		$birthMonthList[] = JHtml::_('select.option', 'January', JText::_('January'));
		$birthMonthList[] = JHtml::_('select.option', 'February', JText::_('February'));
		$birthMonthList[] = JHtml::_('select.option', 'March', JText::_('March'));
		$birthMonthList[] = JHtml::_('select.option', 'April', JText::_('April'));
		$birthMonthList[] = JHtml::_('select.option', 'May', JText::_('May'));
		$birthMonthList[] = JHtml::_('select.option', 'June', JText::_('June'));
		$birthMonthList[] = JHtml::_('select.option', 'July', JText::_('July'));
		$birthMonthList[] = JHtml::_('select.option', 'August', JText::_('August'));
		$birthMonthList[] = JHtml::_('select.option', 'September', JText::_('September'));
		$birthMonthList[] = JHtml::_('select.option', 'October', JText::_('October'));
		$birthMonthList[] = JHtml::_('select.option', 'November', JText::_('November'));
		$birthMonthList[] = JHtml::_('select.option', 'December', JText::_('December'));

		$lists['birthMonth'] = JHtml::_('select.genericlist', $birthMonthList, 'birthMonth', 'class="inputbox"', 'value', 'text', $state->get('birthMonth'));

		
		// Built select country lists
		$birthDaylist   = array();
		$birthDaylist[] = JHtml::_('select.option', 'Please Select', JText::_('COM_SMF_PLEASE_SELECT'));
		$birthDaylist[] = JHtml::_('select.option', '1', JText::_('1'));
		$birthDaylist[] = JHtml::_('select.option', '2', JText::_('2'));
		$birthDaylist[] = JHtml::_('select.option', '3', JText::_('3'));
		$birthDaylist[] = JHtml::_('select.option', '4', JText::_('4'));
		$birthDaylist[] = JHtml::_('select.option', '5', JText::_('5'));
		$birthDaylist[] = JHtml::_('select.option', '6', JText::_('6'));
		$birthDaylist[] = JHtml::_('select.option', '7', JText::_('7'));
		$birthDaylist[] = JHtml::_('select.option', '8', JText::_('8'));
		$birthDaylist[] = JHtml::_('select.option', '9', JText::_('9'));
		$birthDaylist[] = JHtml::_('select.option', '10', JText::_('10'));
		$birthDaylist[] = JHtml::_('select.option', '11', JText::_('11'));
		$birthDaylist[] = JHtml::_('select.option', '12', JText::_('12'));
		$birthDaylist[] = JHtml::_('select.option', '13', JText::_('13'));
		$birthDaylist[] = JHtml::_('select.option', '14', JText::_('14'));
		$birthDaylist[] = JHtml::_('select.option', '15', JText::_('15'));
		$birthDaylist[] = JHtml::_('select.option', '16', JText::_('16'));
		$birthDaylist[] = JHtml::_('select.option', '17', JText::_('17'));
		$birthDaylist[] = JHtml::_('select.option', '18', JText::_('18'));
		$birthDaylist[] = JHtml::_('select.option', '19', JText::_('19'));
		$birthDaylist[] = JHtml::_('select.option', '20', JText::_('20'));
		$birthDaylist[] = JHtml::_('select.option', '21', JText::_('21'));
		$birthDaylist[] = JHtml::_('select.option', '22', JText::_('22'));
		$birthDaylist[] = JHtml::_('select.option', '23', JText::_('23'));
		$birthDaylist[] = JHtml::_('select.option', '24', JText::_('24'));
		$birthDaylist[] = JHtml::_('select.option', '25', JText::_('25'));
		$birthDaylist[] = JHtml::_('select.option', '26', JText::_('26'));
		$birthDaylist[] = JHtml::_('select.option', '27', JText::_('27'));
		$birthDaylist[] = JHtml::_('select.option', '28', JText::_('28'));
		$birthDaylist[] = JHtml::_('select.option', '29', JText::_('29'));
		$birthDaylist[] = JHtml::_('select.option', '30', JText::_('30'));
		$birthDaylist[] = JHtml::_('select.option', '32', JText::_('31'));

		$lists['birthDay'] = JHtml::_('select.genericlist', $birthDaylist, 'birthDay', 'class="inputbox"', 'value', 'text', $state->get('birthDay'));
		
		// Built select country lists
		$ageList   = array();
		$ageList[] = JHtml::_('select.option', 'Please Select', JText::_('COM_SMF_PLEASE_SELECT'));
		$ageList[] = JHtml::_('select.option', '1', JText::_('1'));
		$ageList[] = JHtml::_('select.option', '2', JText::_('2'));
		$ageList[] = JHtml::_('select.option', '3', JText::_('3'));
		$ageList[] = JHtml::_('select.option', '4', JText::_('4'));
		$ageList[] = JHtml::_('select.option', '5', JText::_('5'));
		$ageList[] = JHtml::_('select.option', '6', JText::_('6'));
		$ageList[] = JHtml::_('select.option', '7', JText::_('7'));
		$ageList[] = JHtml::_('select.option', '8', JText::_('8'));
		$ageList[] = JHtml::_('select.option', '9', JText::_('9'));
		$ageList[] = JHtml::_('select.option', '10', JText::_('10'));

		$lists['age'] = JHtml::_('select.genericlist', $ageList, 'age', 'class="inputbox"', 'value', 'text', $state->get('age'));

		$genderList        = array();
		$genderList[]       = JHtml::_('select.option', 'Male', JText::_('COM_SMF_MALE'));
		$genderList[]       = JHtml::_('select.option', 'Female', JText::_('COM_SMF_FEMALE'));
		$lists['gender'] = JHtml::_('select.radiolistInline', $genderList, 'gender', '', 'value', 'text', $state->get('match'));

		// Limit searchword
		$lang        = JFactory::getLanguage();
		$upper_limit = $lang->getUpperLimitSearchWord();
		$lower_limit = $lang->getLowerLimitSearchWord();

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
		$this->country      = $state->get('country');
		$this->birthDay      = $state->get('birthDay');
		$this->birthMonth      = $state->get('birthMonth');
		$this->age      = $state->get('age');
		$this->gender  = $state->get('match');
		$this->total         = $total;
		$this->error         = $error;
		$this->action        = $uri;

		parent::display($tpl);
	}
}
