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
        $lastid = $this->db->insert_id();
        // $this->report($this->db->insert_id(),$data['stock'],$this->session->userdata('username'),1);
        return $lastid;
    }

    public function barangMasuk($data,$idgudang)
    {
        /* Get Data */
        $get = $this->db->select('*')
                        ->from('inven_gudang')
                        ->where(array(
                            'id_barang'=>$data['nama_barang'],
                            'id_gudang'=>$idgudang
                        ))
                        ->get();
        if ($get->num_rows() > 0) {
            $datas = $get->result();
            $qtyOld = NULL;
            foreach ($datas as $value) {
                $qtyOld = $value->qty;
            }
            $afterSum = $qtyOld+$data['stock'];
            $this->db->where(array(
                'id_barang'=>$data['nama_barang'],
                'id_gudang'=>$idgudang
            ));

            $newData = array(
                'qty'=>$afterSum
            );

            $update = $this->db->update('inven_gudang',$newData);
            $this->report($data['nama_barang'],$data['stock'],$this->session->userdata('username'),1,$idgudang);
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function barangKeluar($data,$idbranch)
    {

        /* Stock Barang - Permintaan */
        $jumlah = array(
            'qty'=>$data['stockbarang'] - $data['stock']
        );

        $this->db->where(array(
            "id_barang"=>$data['id'],
            "id_gudang"=>$idbranch
        ));
        $this->db->update('inven_gudang', $jumlah);
        $this->report($data['id'],$data['stock'],$this->session->userdata('username'),2,$idbranch);
        return TRUE;
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
    
    public function CompareStock($data,$idbranch)
    {

        $compare = $this->db->select('*')
                            ->from('inven_gudang')
                            ->where(array(
                                "id_barang"=>$data['id'],
                                "id_gudang"=>$idbranch
                            ))
                            ->where('qty >=',$data['stock'])
                            ->get();
        if ($compare->num_rows() > 0) {
            return $compare->result();
        }else {
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }

    public function report($id,$qty,$by,$report,$idgudang)
    {
        $data = array(
            'id_barang'=>$id,
            'quantity'=>$qty,
            'action_by'=>$by,
            'jenis_report'=>$report,
            'waktu'=>date('Y-m-d'),
            'id_gudang'=>$idgudang
        );
        
        $this->db->insert('report',$data);
        return TRUE;

    }
    
    public function getReport($idbranch){

        $get = $this->db
                    ->select('*')
                    ->from('report')
                    ->where('id_gudang',$idbranch)
                    ->get();

        if ($get->num_rows() > 0) {
            return $get->result_array();
        }else {
            return NULL;
        }

    }

    public function getReportDetail($idbarang,$idbranch){

        $get = $this->db
                    ->select('*')
                    ->from('report')
                    ->where(array(
                        'id_gudang'=>$idbranch,
                        'id_barang'=>$idbarang
                    ))
                    ->get();

        if ($get->num_rows() > 0) {
            return $get->result_array();
        }else {
            return NULL;
        }

    }

    public function getJenisReport()
    {
        $get = $this->db
                    ->select('*')
                    ->from('jenis_report')
                    ->get();

        if ($get->num_rows() > 0) {
            return $get->result_array();
        }else {
            return NULL;
        }
    }
    
}
