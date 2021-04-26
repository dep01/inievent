<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel', 'user', TRUE);
    }
	public function index()
	{
		$this->load->view('content/auth/login');
	}
    public function CheckLogin(){
        $data = [
            'username' => $this->input->post('username'),
            'password'=>md5($this->input->post('password'))
        ];
        $logindata = $this->user->CheckLogin($data);
        // var_dump($logindata[0]);die;
        if(!$logindata){
            $this->session->set_flashdata([
                'title' => 'Login Failed',
                'type' => 'error',
                'message' => 'User Not Found'
            ]);
            redirect(base_url('Auth'));
        }else  {
            $userData  = [
                'id'  => $logindata[0]->id,
                // 'username'  => $logindata[0]->username,
                'phone'  => $logindata[0]->phone,
                // 'fullname'  => $logindata[0]->fullname,
                'image_path'=>$logindata[0]->image,
                
            ];
            $this->session->set_userdata($userData);
            redirect(base_url('Home'));
        }
    }
    public function logOut(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
