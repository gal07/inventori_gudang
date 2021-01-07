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
            "gudang"=>$data["gudang"],
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
                            ->where(array("role"=>2,"softdelete"=>0))
                            ->get();

        if ($get->num_rows() > 0) {
            return $get->result();
        }else{
            return NULL;
        }
    }

    public function getDetailUser($id)
    {
        $get = $this->db->select("*")
                        ->from("users")
                        ->where(array("id"=>$id,"role"=>2))
                        ->get();

        if ($get->num_rows() > 0) {
            return $get->result();
        } else {
            return FALSE;
        }
        
    }

    public function editaccount($data)
    {
        
        $newData = array(
            "username"=>$data["username"],
            "email"=>$data["email"],
            "telepon"=>$data["telepon"]
        );

        $this->db->where("id",$data["id"]);
        $update = $this->db->update("users",$newData);

        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }

    public function toggleStatus($id)
    {
        
        $get = $this->db->select('*')
                        ->from('users')
                        ->where('id',$id)
                        ->get();
        if ($get->num_rows() > 0) {

            $result = $get->result_array();
            $data = array(
                'status'=>($result[0]['status'] == 1 ? 0:1)
            );

            $this->db->where('id', $id);
            $update = $this->db->update('users', $data);
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }

        }else{
            return FALSE;
        }
        
    }

    public function delete($id)
    {
        $get = $this->db->select('*')
                        ->from('users')
                        ->where('id',$id)
                        ->get();
        if ($get->num_rows() > 0) {

            $result = $get->result_array();
            $data = array(
                'softdelete'=>($result[0]['softdelete'] == 0 ? 1:0)
            );

            $this->db->where('id', $id);
            $update = $this->db->update('users', $data);
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
                
            }

        }else{
            return FALSE;
        }
        
    }

}
