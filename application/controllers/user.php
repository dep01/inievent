<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Base_Controller {
	public function index()
	{
		$this->parseData['data'] = $this->user->getAll();
        $this->parseData['content'] = 'content/master/user_list';
		$this->load->view('main', $this->parseData);
	}

    public function showFormAdd(){
		$this->parseData['userType'] = $this->userType->getAll();
        $this->parseData['content'] = 'content/master/user_add';
		$this->load->view('main', $this->parseData);
    }
	public function showFormEdit()
	{
		$data = $this->user->getById($this->uri->segment('3'));
        $this->parseData['content'] = 'content/master/user_edit';
		$this->parseData['data'] = $data[0];
		$this->parseData['userType'] = $this->userType->getAll();
		$this->load->view('main', $this->parseData);
	}
	public function delete(){
		$id = $this->uri->segment('3');
		$this->user->delete($id);
		$this->session->set_flashdata([
			'title' => 'Info',
			'type' => 'error',
			'message' => 'Data has been deleted'
		]);
		redirect('User');
	}
    public function add()
	{
		$emailFound = $this->user->checkEmailAvail($this->input->post('email'));
		$phoneFound = $this->user->checkPhoneAvail($this->input->post('phone'));
		if($emailFound){
			$this->session->set_flashdata([
                'title' => 'Info',
                'type' => 'error',
                'message' => 'Email is used, change another one!'
            ]);
            // redirect('User/showFormAdd')->withInput();
			redirect($_SERVER['HTTP_REFERER']);

		} elseif($phoneFound){
			$this->session->set_flashdata([
                'title' => 'Info',
                'type' => 'error',
                'message' => 'Phone is used, change another one!'
            ]);
            // redirect('User/showFormAdd')->withInput();
			redirect($_SERVER['HTTP_REFERER']);

		}else{
			$data = [
				'user_type_code'   => $this->input->post('codes'),
				'first_name'   => $this->input->post('first_name'),
				'last_name'   => $this->input->post('last_name'),
				'gender'   => $this->input->post('gender'),
				'email'   => $this->input->post('email'),
				'password'   => md5($this->input->post('password')),
				'phone'   => $this->input->post('phone'),
				'image' =>$this->session->flashdata('imagePath'),
				'created_by'  => $this->session->userdata('username') != null?$this->session->userdata('username'):'Testing',
				'created_date'  => date('Y-m-d H:i:s'),
				'updated_by'  => $this->session->userdata('username') != null?$this->session->userdata('username'):'Testing',
				'updated_date'  => date('Y-m-d H:i:s')	
			];
			$this->user->add($data);
			redirect('User');
		}
    }
	public function update(){
		$image_path = '';
		if(!$this->session->flashdata('imagePath')){
			$image_path = $this->input->post('image_path');
		}else{
			$image_path = $this->session->flashdata('imagePath');
		}
		$data = [
			'user_type_code'   => $this->input->post('codes'),
			'first_name'   => $this->input->post('first_name'),
			'last_name'   => $this->input->post('last_name'),
			'gender'   => $this->input->post('gender'),
			'email'   => $this->input->post('email'),
			'phone'   => $this->input->post('phone'),
			'image' =>$this->session->flashdata('imagePath'),
			'updated_by'  => $this->session->userdata('username') != null?$this->session->userdata('username'):'Testing',
			'updated_date'  => date('Y-m-d H:i:s')	
		];
		// print_r($this->session->flashdata('imagePath'));die;
		$id= $this->input->post('id');
		$this->user->update($data,$id);
		redirect('User');
	}
	public function fileUpload(){
        if(!empty($_FILES['file']['name'])){
          $new_name                 = md5(time().$_FILES["file"]['name']);
		  $ext = end((explode(".", $_FILES['file']['name'])));
		//   print_r($ext);die;
          $config['upload_path']    = 'assets/images/user/'; 
          $config['allowed_types']  = 'jpg|jpeg|png';
          $config['max_size']       = '3000'; // max_size in kb
          $config['file_name']      = $new_name;
          $this->load->library('upload',$config); 
          if($this->upload->do_upload('file')){
            	$uploadData = $this->upload->data();
				$this->session->set_flashdata('imagePath','assets/images/user/'.$new_name.'.'.$ext);
          }
        }
      }
}
?>