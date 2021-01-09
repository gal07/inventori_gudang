<?php 

class Branch_model extends CI_model
{

    
    function __construct() {
        $this->load->database();
    }

    public function getInventoryByBranch($idbranch)
    {
        
        $getInventory = $this->db->select('*')
                                 ->from('inven_gudang')
                                 ->where(
                                     array(
                                        "id_gudang"=>$idbranch
                                     )
                                 )->get();
        $getDataBarang = $this->db->select('*')
                                  ->from('barang')
                                  ->get();
        
    
        $data = array();
        $data["datainventory"] = $getInventory->result_array();
        $data["databarang"] = $getDataBarang->result_array();
        return $data;

    }

    public function saveInventory($data)
    {
        for ($i=0; $i < count($data) ; $i++) { 
            $this->db->insert('inven_gudang',$data[$i]);
        }

        // $this->report($this->db->insert_id(),$data['stock'],$this->session->userdata('username'),1);
        return TRUE;

    }

    public function _isBranchActive($idbranch)
    {
        $get = $this->db->select('*')
                        ->from('gudang')
                        ->where(array(
                            'status'=>1,
                            'id'=>$idbranch
                        ))
                        ->get();
        if ($get->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }

    public function _isBranchDelete($idbranch)
    {
        $get = $this->db->select('*')
                        ->from('gudang')
                        ->where(array(
                            'softdelete'=>1,
                            'id'=>$idbranch
                        ))
                        ->get();
        if ($get->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


}
