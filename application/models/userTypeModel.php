<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserTypeModel extends CI_Model
{
    public function getAll(){
        return $this->db->query("SELECT * FROM user_type WHERE deleted = false ")->result_object();
    }
    public function getById($id){
        return $this->db->query("SELECT * FROM user_type WHERE deleted = false and id ='$id'")->result_object();
    }
    public function update($data,$id){
        $this->db->where('id', $id);
        $this->db->update('user_type', $data);
    }

}

?>