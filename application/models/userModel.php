<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
    public function CheckLogin($data){
        $username = $data['username'];
        $password = $data['password'];
        // $sql ="SELECT * FROM users WHERE deleted = false and (email ='$username' or phone ='$username') and password ='$password'";
        // print_r($sql);die;
        return $this->db->query("SELECT * FROM users WHERE deleted = false and (email ='$username' or phone ='$username') and password ='$password' ")->result_object();
    }
    public function delete($id){
        $this->db->query("update users set deleted = true where id = '$id'");
    }
    public function getAll(){
        return $this->db->query("SELECT * FROM users WHERE deleted = false ")->result_object();
    }
    public function checkEmailAvail($email){
        return $this->db->query("SELECT * FROM users WHERE deleted = false and email ='$email'")->result_object();
    }
    public function checkPhoneAvail($phone){
        return $this->db->query("SELECT * FROM users WHERE deleted = false and phone ='$phone'")->result_object();
    }
    public function getById($id){
        return $this->db->query("SELECT id,first_name,last_name,gender,phone,email,image FROM users WHERE deleted = false and id ='$id'")->result_object();
    }
    public function update($data,$id){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    public function add($data){
        $this->db->insert('users', $data);
        return $this->db->get_where('users',$data)->result();
    }

}

?>