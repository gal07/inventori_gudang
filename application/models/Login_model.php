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
            'password'=>$data['password']
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


}
