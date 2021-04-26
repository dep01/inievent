<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventTypeModel extends CI_Model {
    public function getAll(){
        return $this->db->query('select id,name,uom,created_date,updated_date from event_type where deleted=false')->result_object();
    }   
    public function update($data,$id){
        $this->db->where('id', $id);
        $this->db->update('event_type', $data);
    }
    public function add($data){
        $this->db->insert('event_type', $data);
    }
    public function delete($id){
        $this->db->query("update event_type set deleted = true where id = '$id'");
    }
    public function getById($id){
        return $this->db->query("SELECT * FROM event_type WHERE deleted = false and id ='$id'")->result_object();
    }
}

/* End of file BjbModel.php */
/* Location: ./application/models/BjbModel.php */