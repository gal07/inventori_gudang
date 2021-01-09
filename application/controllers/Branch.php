<?php 

class Branch extends CI_Controller
{

    public function index($page = 'index')
    {
        if (!$this->session->userdata('username')) {
            show_404();
        }else {
            if (!file_exists(APPPATH.'views/branch/'.$page.'.php')) {
                show_404();
              }else {
                $getInvent = $this->branch_model->getInventoryByBranch($this->session->userdata('branch'));
                $data['databarang'] = array();
                foreach ($getInvent['databarang'] as $value) {
                    $data['databarang'][$value['id']] = $value;
                }

                $data['datainventory'] = array();
                foreach ($getInvent['datainventory'] as $value) {
                    $data['datainventory'][$value['id']] = $value;
                }

                $data['_isactive'] = ($this->branch_model->_isBranchActive($this->session->userdata('branch')) ? array("_isactive"=>1):array("_isactive"=>0));
                $data['_isdelete'] = ($this->branch_model->_isBranchDelete($this->session->userdata('branch')) ? array("_isdelete"=>1):array("_isdelete"=>0));
                $data['titlenavbar'] = 'My Inventory';
                $data['title'] = 'My Inventory';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('branch/'.$page,$data);
                $this->load->view('templates/footer');
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
