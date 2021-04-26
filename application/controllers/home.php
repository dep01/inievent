<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller {

	
	public function index()
	{
		// print_r($this->session->userdata());die;
		$this->load->view('main', $this->parseData);
	}
}
