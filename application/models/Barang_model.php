<?php 

class Barang_model extends CI_model
{

    function __construct() {
        $this->load->database();
    }

    public function checkExist($nama,$jenis)
    {
        $check = $this->db->select('*')
                          ->from('barang')
                          ->where(array('nama_barang'=>$nama,'jenis'=>$jenis))
                          ->get();
        if ($check->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function create($data)
    {
        $this->db->insert('barang',$data);
        return TRUE;
    }

    public function barangMasuk($data)
    {
        /* Get Data */
        $get = $this->db->select('*')
                        ->from('barang')
                        ->where('id',$data['nama_barang'])
                        ->get();
        if ($get->num_rows() > 0) {
            $datas = $get->result();
            $qtyOld = NULL;
            foreach ($datas as $value) {
                $qtyOld = $value->stock;
            }
            $afterSum = $qtyOld+$data['stock'];
            $this->db->where('id',$data['nama_barang']);

            $newData = array(
                'stock'=>$afterSum
            );

            $update = $this->db->update('barang',$newData);
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function Get_Barang()
    {
       
            $get = $this->db->select('*')
                            ->from('barang')
                            ->get();
            if ($get->num_rows() > 0) {
                return $get->result_array();
            }else {
                return NULL;
            }

    }
    
}
