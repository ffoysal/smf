<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of HelloWorld component
 */
class com_smfInstallerScript
{
	/**
	 * method to install the component
	 *
	 * @return void
	 */
	function install($parent) 
	{
		jimport('joomla.filesystem.folder');
		$path = JPATH_SITE . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "smf";
		$mode = 0755;
		if (! JFolder::exists($path)){
			JFolder::create($path, $mode);
		}
		
	}
 
}
