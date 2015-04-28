<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
       
	}

        
    public function view_user($user_id)
    {
         $data = array('users.id' => $user_id);
         
            $this->db->select('users.id,users.email,users.banned,users.ban_reason,users.last_login,users.last_ip,users.created,users.username');
            $this->db->where($data);
            $this->db->join('user_profiles','user_profiles.id = users.id', 'LEFT');
            $query =  $this->db->get('users');
      
      if ($query->num_rows() == 1)
            return $query->result_array();
        return NULL;
      
    }
    
     public function ban_user()
    {
        $data = array(
          'banned'=>'1',
          'ban_reason'=>$this->input->post('ban_reason')
        );
        
       
        $this->db->where('id',$this->input->post('ban_user_id'));
        
         if ( $this->db->update('users',$data))
            return true;
        return false;
        
    }
    
    public function un_ban_user($user_id)
    {
        $data = array(
          'banned'=>'0',
          'ban_reason'=>''
        );
        $this->db->where('id',$user_id);
        
         if ( $this->db->update('users',$data))
            return true;
        return false;
    }
}       

