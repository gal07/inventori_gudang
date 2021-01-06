<?php 

class Gudang extends CI_Controller
{

    public function index($page = 'index')
    {
     
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/gudang/'.$page.'.php')) {
                show_404();
              }else {
                $data['datagudang'] = $this->gudang_model->getDataGudang();
                $data['titlenavbar'] = 'List Gudang';
                $data['title'] = 'List Gudang';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('gudang/'.$page,$data);
                $this->load->view('templates/footer');
              }
        }
        
        
    }

    public function createnewgudang($page = '_formcreategudang')
    {
     
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/gudang/'.$page.'.php')) {
                show_404();
              }else {


                $data['titlenavbar'] = 'Create Gudang';
                $data['title'] = 'Create Gudang';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('gudang/'.$page,$data);
                $this->load->view('templates/footer');

                        
              }
        }
    }

    public function savegudang()
    {
         if ($this->session->userdata('role') == 1) {

            $data = array(
                "nama"=>ucwords($this->input->post('nama')),
                "status"=>$this->input->post('status'),
            );
            $save = $this->gudang_model->saveDataGudang($data);
            if ($save) {
                $result = array('code'=>1,'msg'=>'Data Telah Terbuat','success'=>TRUE);
                echo json_encode($result);
            } else {
                $result = array('code'=>3,'msg'=>'Something Error','success'=>TRUE);
                echo json_encode($result);
            }
            
            

         } else {
           
            $result = array('code'=>3,'msg'=>'User Role tidak sesuai','success'=>TRUE);
            echo json_encode($result);

         }
         
        
    }

    public function toggleStatus()
    {
        $toggle = $this->gudang_model->toggleStatus($this->input->post('id'));
        if ($toggle) {
            $result = array('code'=>1,'msg'=>'Berhasil merubah status','success'=>TRUE);
            echo json_encode($result);
        } else {
            $result = array('code'=>3,'msg'=>'Something Error','success'=>TRUE);
            echo json_encode($result);
        }
        
    }

    public function deleteGudang()
    {
        $Isexists = $this->gudang_model->existsInInventory($this->input->post('id'));
        if ($Isexists) {

            
            $result = array('code'=>3,'msg'=>'Gagal Menghapus, Karena gudang ini masih memiliki inventory aktif','success'=>TRUE);
            echo json_encode($result);


        } else {
            $delete = $this->gudang_model->delete($this->input->post('id'));
            if ($delete) {
                
                $result = array('code'=>1,'msg'=>'Data Gudang Telah Terhapus','success'=>TRUE);
                echo json_encode($result);

            } else {

                $result = array('code'=>3,'msg'=>'Something Error','success'=>TRUE);
                echo json_encode($result);
            }

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
