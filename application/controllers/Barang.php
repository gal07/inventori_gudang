<?php 

class Barang extends CI_Controller
{
    
    // public function ListBarangMasuk($page = 'listBarangMasuk')
    // {
    //     # code...
    // }

    public function CreateBarangMasuk($page = 'createBarangMasuk')
    {
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/barang/'.$page.'.php')) {
                show_404();
              }else {
                $data['titlenavbar'] = 'Create Barang Masuk';
                $data['title'] = 'Create Barang Masuk';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('barang/'.$page,$data);
                $this->load->view('templates/footer');
              }
        }
   
    }

    public function CreateBarangKeluar($page = 'CreateBarangKeluar')
    {
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/barang/'.$page.'.php')) {
                show_404();
              }else {
                $data['titlenavbar'] = 'Create Barang Keluar';
                $data['title'] = 'Create Barang Keluar';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('barang/'.$page,$data);
                $this->load->view('templates/footer');
              }
        }
   
    }

    public function listbarang($page = 'listbarang')
    {
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/barang/'.$page.'.php')) {
                show_404();
              }else {
                $data['titlenavbar'] = 'List Barang';
                $data['title'] = 'List barang';
                $data['listbarangs'] = $this->barang_model->Get_Barang();
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts('datatable');
                $this->load->view('templates/header_admin',$data);
                $this->load->view('barang/'.$page,$data);
                $this->load->view('templates/footer');
              }
        }
   
    }

    public function BuatDataBarang($page = 'BuatDataBarang')
    {
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/barang/'.$page.'.php')) {
                show_404();
              }else {
                $data['titlenavbar'] = 'Buat Data Barang';
                $data['title'] = 'Buat Data Barang';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('barang/'.$page,$data);
                $this->load->view('templates/footer');
              }
        }
   
    }

    public function histori($page = 'histori')
    {
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/barang/'.$page.'.php')) {
                show_404();
              }else {
                $data['titlenavbar'] = 'Histori Barang';
                $data['title'] = 'Histori Barang';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('barang/'.$page,$data);
                $this->load->view('templates/footer');
              }
        }
   
    }

    public function SaveBarang()
    {
        /* Check barang sudah ada atau belum */
        $check = $this->barang_model->checkExist(ucwords($this->input->post('nama_barang')),$this->input->post('jenis'));
        if ($check) {

        /* Set Data gambar upload */
        $config['upload_path'] = 'assets/picture/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
        $config['max_size'] = '1040';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        date_default_timezone_set('Asia/Jakarta');
        $config['file_name']  = date('Ymdhis').'.jpg';
        $config['detect_mime'] = TRUE;
        $config['width']  = 75;
        $config['height'] = 50;

        $this->load->library('image_lib', $config);
        $this->load->library('upload', $config);
        $this->image_lib->resize();
  
        if ($_FILES['picture']['size'] != 0) {
          if (!$this->upload->do_upload('picture')) {
            $result = array('code'=>3,'msg'=>strip_tags($this->upload->display_errors()),'success'=>FALSE);
            echo json_encode($result);
            die();
          }

          /* After Success upload ,Save Data */
          $data = array(
            'nama_barang'=>ucwords($this->input->post('nama_barang')),
            'jenis'=>$this->input->post('jenis'),
            'stock'=>$this->input->post('stock'),
            'picture'=>$config['file_name'],
            'active'=>$this->input->post('status'),
          );

          $save = $this->barang_model->create($data);
          if ($save) {
            $result = array('code'=>1,'msg'=>'Data Barang Telah Terbuat','success'=>TRUE);
            echo json_encode($result);
            die();
          } else {
            $result = array('code'=>2,'msg'=>'Gagal Membuat Barang, Coba Lagi','success'=>FALSE);
            echo json_encode($result);
            die();
          }

        }

        }else{
            $result = array('code'=>4,'msg'=>'Barang sudah ada, tidak bisa membuat data yang sama','success'=>FALSE);
            echo json_encode($result);
            die();
        }

        

    }


  

    public function Headscript()
    {
        $head ='
        <link href="'.base_url().'assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="'.base_url().'assets/css/material-dashboard.css" rel="stylesheet" />
        <link href="'.base_url().'assets/css/demo.css" rel="stylesheet" />
        <link href="'.base_url().'assets/css/font-awesome.css" rel="stylesheet" />
        <link href="'.base_url().'assets/css/google-roboto-300-700.css" rel="stylesheet" />
        ';
        return $head;
    }

    public function FooterScripts($type=null)
    {
        $footer=null;

        if ($type == 'datatable') {
            $footer='
            <script src="'.base_url().'assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/jquery-ui.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/material.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/jquery.validate.min.js"></script>
            <script src="'.base_url().'assets/js/moment.min.js"></script>
            <script src="'.base_url().'assets/js/chartist.min.js"></script>
            <script src="'.base_url().'assets/js/jquery.bootstrap-wizard.js"></script>
            <script src="'.base_url().'assets/js/bootstrap-notify.js"></script>
            <script src="'.base_url().'assets/js/jquery.sharrre.js"></script>
            <script src="'.base_url().'assets/js/bootstrap-datetimepicker.js"></script>
            <script src="'.base_url().'assets/js/jquery-jvectormap.js"></script>
            <script src="'.base_url().'assets/js/nouislider.min.js"></script>
            <script src="'.base_url().'assets/js/jquery.select-bootstrap.js"></script>
            <script src="'.base_url().'assets/js/jquery.datatables.js"></script>
            <script src="'.base_url().'assets/js/sweetalert2.js"></script>
            <script src="'.base_url().'assets/js/jasny-bootstrap.min.js"></script>
            <script src="'.base_url().'assets/js/fullcalendar.min.js"></script>
            <script src="'.base_url().'assets/js/jquery.tagsinput.js"></script>
            <script src="'.base_url().'assets/js/material-dashboard.js"></script>
            <script src="'.base_url().'assets/js/demo.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
                $("#datatables").DataTable({
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                    }
        
                });
        
        
                var table = $("#datatables").DataTable();
        
                // Edit record
                table.on("click", ".edit", function() {
                    $tr = $(this).closest("tr");
        
                    var data = table.row($tr).data();
                    alert("You press on Row: " + data[0] + " " + data[1] + " " + data[2] + "\"s row.");
                });
        
                // Delete a record
                table.on("click", ".remove", function(e) {
                    $tr = $(this).closest("tr");
                    table.row($tr).remove().draw();
                    e.preventDefault();
                });
        
                //Like record
                table.on("click", ".like", function() {
                    alert("You clicked on Like button");
                });
        
                $(".card .material-datatables label").addClass("form-group");
            });
            </script>
        ';
        }else {
            $footer = '
            <script src="'.base_url().'assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/jquery-ui.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/material.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
            <script src="'.base_url().'assets/js/jquery.validate.min.js"></script>
            <script src="'.base_url().'assets/js/moment.min.js"></script>
            <script src="'.base_url().'assets/js/chartist.min.js"></script>
            <script src="'.base_url().'assets/js/jquery.bootstrap-wizard.js"></script>
            <script src="'.base_url().'assets/js/bootstrap-notify.js"></script>
            <script src="'.base_url().'assets/js/jquery.sharrre.js"></script>
            <script src="'.base_url().'assets/js/bootstrap-datetimepicker.js"></script>
            <script src="'.base_url().'assets/js/jquery-jvectormap.js"></script>
            <script src="'.base_url().'assets/js/nouislider.min.js"></script>
            <script src="'.base_url().'assets/js/jquery.select-bootstrap.js"></script>
            <script src="'.base_url().'assets/js/jquery.datatables.js"></script>
            <script src="'.base_url().'assets/js/sweetalert2.js"></script>
            <script src="'.base_url().'assets/js/jasny-bootstrap.min.js"></script>
            <script src="'.base_url().'assets/js/fullcalendar.min.js"></script>
            <script src="'.base_url().'assets/js/jquery.tagsinput.js"></script>
            <script src="'.base_url().'assets/js/material-dashboard.js"></script>
            <script src="'.base_url().'assets/js/demo.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    demo.initDashboardPageCharts();
                    demo.initVectorMap();
                });
            </script>
        ';
        }



        return $footer;

    }

}
