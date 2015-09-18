<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Smf Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 * @since       0.0.9
 */
class SmfControllerSmf extends JControllerForm
{
	//after save, cancel redirecto to this view
	protected $view_list="datalist";

 // Call automatically by joomla
	public function save(){
		$data  = $this->input->post->get('jform', array(), 'array');		
		$date = new JDate($data['birth_date']);
		$data['birth_day'] =$date->day;
		$data['birth_month'] =$date->month;
		$data['birth_year'] =$date->year;
		//set the values again to store into the db
		$this->input->post->set('jform',$data);
		parent::save();
	}	
}
