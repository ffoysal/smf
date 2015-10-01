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
	 * Search
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function search()
	{
		// Slashes cause errors, <> get stripped anyway later on. # causes problems.
		//$badchars = array('#', '>', '<', '\\');
		//$gender = trim(str_replace($badchars, '', $this->input->getString('gender', null, 'post')));

		// If searchword enclosed in double quotes, strip quotes and do exact match
		/*if (substr($gender, 0, 1) == '"' && substr($gender, -1) == '"')
		{
			$post['gender'] = substr($gender, 1, -1);
			$this->input->set('searchphrase', 'exact');
		}
		else
		{
			$post['gender'] = $gender;
		}*/
		print_r("expression" . $this->input->getWord('country', null, 'post'));
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

		/*$areas = $this->input->post->get('areas', null, 'array');

		if ($areas)
		{
			foreach ($areas as $area)
			{
				$post['areas'][] = JFilterInput::getInstance()->clean($area, 'cmd');
			}
		}*/

		// The Itemid from the request, we will use this if it's a search page or if there is no search page available
		$post['Itemid'] = $this->input->getInt('Itemid');

		// Set Itemid id for links from menu
		$app  = JFactory::getApplication();
		$menu = $app->getMenu();
		$item = $menu->getItem($post['Itemid']);

		// The request Item is not a search page so we need to find one
		if ($item->component != 'com_smf' || $item->query['view'] != 'childList')
		{
			// Get item based on component, not link. link is not reliable.
			$item = $menu->getItems('component', 'com_smf', true);

			// If we found a search page, use that.
			if (!empty($item))
			{
				$post['Itemid'] = $item->id;
			}
		}

		unset($post['task']);
		unset($post['submit']);

		$uri = JUri::getInstance();
		$uri->setQuery($post);
		$uri->setVar('option', 'com_smf');

		$this->setRedirect(JRoute::_('index.php' . $uri->toString(array('query', 'fragment')), false));
	}
}