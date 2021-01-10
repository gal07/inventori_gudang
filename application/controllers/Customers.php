<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Customers extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model','customers');
    }
 
    public function index()
    {
        $data['titlenavbar'] = 'My Inventory';
        $data['title'] = 'My Inventory';
        $data['headScript'] = $this->Headscript();
        $data['footerScript'] = $this->FooterScripts();
        $this->load->view('templates/header_admin',$data);
        $this->load->view('customer/customers_view');
        $this->load->view('templates/footer');
    }
 
    public function ajax_list()
    {
        $list = $this->customers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->FirstName;
            $row[] = $customers->LastName;
            $row[] = $customers->phone;
            $row[] = $customers->address;
            $row[] = $customers->city;
            $row[] = $customers->country;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->customers->count_all(),
                        "recordsFiltered" => $this->customers->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
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