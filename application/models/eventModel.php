<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventModel extends CI_Model {
    public function getAll(){
        return $this->db->query('select id,name,"Today" as date,start_date,end_date,time_event,short_desc,long_desc,price,is_refund,is_reservation,is_ots,banner_image,location,address,time_code,terms from m_event where deleted=false')->result_array();
    }   
    public function update($data,$id){
        $this->db->where('id', $id);
        $this->db->update('m_event', $data);
    }
    public function add($data){
        $this->db->insert('m_event', $data);
    }
    public function delete($id){
        $this->db->query("update event_type set deleted = true where id = '$id'");
    }
    public function getById($id){
        return $this->db->query("SELECT * FROM m_event WHERE  id ='$id'")->result_object();
    }
}

/* End of file BjbModel.php */
/* Location: ./application/models/BjbModel.php */