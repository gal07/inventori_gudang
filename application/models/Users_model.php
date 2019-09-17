<?php
class Users_model extends CI_model
{
    
    function __construct(){
        $this->load->database();
    }

    public function createAccount($data)
    {
        $newData = array(
            "username"=>$data["username"],
            "email"=>$data["email"],
            "telepon"=>$data["telepon"],
            "password"=>$data["password"],
            "role"=>2,
            "status"=>1
        );

        $compare = array(
            "username"=>$data["username"],
            "email"=>$data["email"]
        );

        $check = $this->db->select("*")
                          ->from("users")
                          ->where('username', $data["username"])
                          ->or_where('email', $data["email"])
                          ->get();
        if ($check->num_rows() > 0) {
            return FALSE;
        }else {
            $this->db->insert("users",$newData);
            return TRUE;
        }
    }

    public function getAllAccount()
    {
        $get = $this->db->select("*")
                            ->from("users")
                            ->where("role",2)
                            ->get();

        if ($get->num_rows() > 0) {
            return $get->result();
        }else{
            return NULL;
        }
    }

}
