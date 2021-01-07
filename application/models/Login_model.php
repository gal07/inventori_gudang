<?php
class Login_model extends CI_model
{
    
    function __construct(){
        $this->load->database();
    }

    public function login($data)
    {
        $compare = array(
            'username'=>$data['username'],
            'password'=>$data['password'],
        );

        $login = $this->db->select('*')
                          ->from('users')
                          ->where($compare)
                          ->get();
        if ($login->num_rows() > 0) {
            return $login->result();
        }else{
            return false;
        }
    }

    public function checkStatus($username)
    {
        $check = $this->db->select('*')
                          ->from('users')
                          ->where(array("username"=>$username,"status"=>1,"softdelete"=>0))
                          ->get();
        if ($check->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }


}
