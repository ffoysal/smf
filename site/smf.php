<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Get an instance of the controller prefixed by smf
$controller = JControllerLegacy::getInstance('smf');

// Perform the Request task
$input = JFactory::getApplication()->input;
//$controller->execute($input->getCmd('task'));
$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();
