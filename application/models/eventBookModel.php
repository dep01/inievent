<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventBookModel extends CI_Model {
    public function getAll(){
        return $this->db->query('select * from event_book where deleted=false')->result_array();
    }   
    public function update($data,$id){
        $this->db->where('id', $id);
        $this->db->update('event_book', $data);
    }
    public function add($data){
        $this->db->insert('event_book', $data);
    }
    public function delete($id){
        $this->db->query("update event_book set deleted = true where id = '$id'");
    }
    public function getByUser($id){
        return $this->db->query("SELECT a.*,b.banner_image,b.name,b.address,b.time_event,b.time_code FROM event_book a inner join m_event b on a.event_id = b.id WHERE a.user_id ='$id'")->result_array();
    }
}

/* End of file BjbModel.php */
/* Location: ./application/models/BjbModel.php */