<?php 

class Gudang_model extends CI_model
{

    function __construct() {
        $this->load->database();
    }

    public function getDataGudang()
    {

        $get = $this->db->select('*')
                        ->from('gudang')
                        ->where('softdelete',0)
                        ->get();
        if ($get->num_rows() > 0) {
            return $get->result_array();
        }else {
            return NULL;
        }
       
    }

    public function getDetailGudang($id)
    {
        $get = $this->db->select("*")
                        ->from("gudang")
                        ->where(array("id"=>$id,"softdelete"=>0))
                        ->get();
        if ($get->num_rows() > 0) {
            return $get->result();
        } else {
            return FALSE;
        }
        
    }

    public function saveDataGudang($data)
    {
        $save = $this->db->insert('gudang',$data);
        if ($save) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }

    public function toggleStatus($id)
    {
        
        $get = $this->db->select('*')
                        ->from('gudang')
                        ->where('id',$id)
                        ->get();
        if ($get->num_rows() > 0) {

            $result = $get->result_array();
            $data = array(
                'status'=>($result[0]['status'] == 1 ? 0:1)
            );

            $this->db->where('id', $id);
            $update = $this->db->update('gudang', $data);
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }

        }else{
            return FALSE;
        }
        
    }

    public function existsInInventory($id)
    {
        $get = $this->db->select('*')
                        ->from('inven_gudang')
                        ->where('id_gudang',$id)
                        ->get();
        if ($get->num_rows() > 0) {
            return TRUE;
        }else {
            return NULL;
        }
    }

    public function delete($id)
    {
        $get = $this->db->select('*')
                        ->from('gudang')
                        ->where('id',$id)
                        ->get();
        if ($get->num_rows() > 0) {

            $result = $get->result_array();
            $data = array(
                'softdelete'=>($result[0]['softdelete'] == 0 ? 1:0)
            );

            $this->db->where('id', $id);
            $update = $this->db->update('gudang', $data);
            if ($update) {
                return TRUE;
            } else {
                return FALSE;
            }

        }else{
            return FALSE;
        }
        
    }

    public function editgudang($data)
    {
        
        $newData = array(
            "nama"=>$data["nama"],
            "status"=>$data["status"],
        );

        $this->db->where("id",$data["id"]);
        $update = $this->db->update("gudang",$newData);

        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
