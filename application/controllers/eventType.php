<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventType extends Base_Controller {
	public function index()
	{
		$this->parseData['data'] = $this->eventType->getAll();
        $this->parseData['content'] = 'content/master/event_type_list';
		$this->load->view('main', $this->parseData);
	}

    public function showFormAdd(){
		// $this->parseData['userType'] = $this->userType->getAll();
        $this->parseData['content'] = 'content/master/event_type_add';
		$this->load->view('main', $this->parseData);
    }
	public function showFormEdit()
	{
		$data = $this->eventType->getById($this->uri->segment('3'));
        $this->parseData['content'] = 'content/master/event_type_edit';
		$this->parseData['data'] = $data[0];
		$this->load->view('main', $this->parseData);
	}
	public function delete(){
		$id = $this->uri->segment('3');
		$this->eventType->delete($id);
		$this->session->set_flashdata([
			'title' => 'Info',
			'type' => 'error',
			'message' => 'Data has been deleted'
		]);
		redirect('User');
	}
    public function add()
	{
		$data = [
			'uom'   => $this->input->post('uom'),
			'name'   => $this->input->post('name'),
			'created_by'  => $this->session->userdata('username') != null?$this->session->userdata('username'):'Testing',
			'created_date'  => date('Y-m-d H:i:s'),
			'updated_by'  => $this->session->userdata('username') != null?$this->session->userdata('username'):'Testing',
			'updated_date'  => date('Y-m-d H:i:s')	
		];
		$this->eventType->add($data);
		redirect('EventType');
    }
	public function update(){
		$data = [
			'uom'   => $this->input->post('uom'),
			'name'   => $this->input->post('name'),
			'updated_by'  => $this->session->userdata('username') != null?$this->session->userdata('username'):'Testing',
			'updated_date'  => date('Y-m-d H:i:s')	
		];
		$id= $this->input->post('id');
		$this->eventType->update($data,$id);
		redirect('EventType');
	}
}
?>