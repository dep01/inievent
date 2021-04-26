<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')){
            redirect('Auth');
        }
        $this->load->model('userTypeModel', 'userType', TRUE);
        $this->load->model('eventTypeModel', 'eventType', TRUE);
        $this->load->model('userModel', 'user', TRUE);
        // $this->load->model('campaignModel', 'campaign', TRUE);
    }
   
    public $parseData = [
        'content' => 'content/dashboard',
    ];
   


}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
