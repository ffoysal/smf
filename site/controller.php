<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class SmfController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param   bool  $cachable   If true, the view output will be cached
	 * @param   bool  $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JControllerLegacy This object to support chaining.
	 *
	 * @since   1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		// Force it to be the search view
		$this->input->set('view', 'childList');

		return parent::display($cachable, $urlparams);
	}
/**
	 * Method to display profile view.
	 *
	 * @return  JControllerLegacy This object to support chaining.
	 *
	 * @since   1.5
	 */
	public function profile() {

		$this->input->set('view', 'childProfile');

		return parent::display();
	}

	/**
	 * Search
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function search()
	{
		if($this->input->getWord('country', null, 'post') != 'Please Select') {
			$post['country']     = $this->input->getWord('country', null, 'post');
		}
		$post['birthMonth']     = $this->input->getWord('birthMonth', null, 'post');
		$post['birthDay']     = $this->input->getUInt('birthDay', null, 'post');
		$post['age']     = $this->input->getUInt('age', null, 'post');
		$post['gender'] = $this->input->getWord('gender', null, 'post');
		$post['limit']        = $this->input->getUInt('limit', null, 'post');

		if ($post['country'] === 'Please Select' || $post['country'] === 'PleaseSelect' )
		{
			unset($post['country']);
		}
		if ($post['birthMonth'] === 'Please Select' || $post['birthMonth'] === 'PleaseSelect' )
		{
			unset($post['birthMonth']);
		}
		if ($post['birthDay'] === 0)
		{
			unset($post['birthDay']);
		}
		if ($post['age'] === 0)
		{
			unset($post['age']);
		}
		if ($post['limit'] === null)
		{
			unset($post['limit']);
		}

		unset($post['task']);
		unset($post['submit']);

		$uri = JUri::getInstance();
		$uri->setQuery($post);
		$uri->setVar('option', 'com_smf');

		$this->setRedirect(JRoute::_('index.php' . $uri->toString(array('query', 'fragment')), false));
	}
}