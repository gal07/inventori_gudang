<?php

class Admin extends CI_Controller
{

    public function index($page = 'dashboard')
    {
        if (!$this->session->userdata('username')) {
            show_404();
        } else {
            if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                show_404();
              }else {
                
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_admin',$data);
                $this->load->view('admin/'.$page,$data);
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

    public function FooterScripts()
    {
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
                    demo.initDashboardPageCharts();
                    demo.initVectorMap();
                });
            </script>
        ';
        return $footer;

    }
    
}
