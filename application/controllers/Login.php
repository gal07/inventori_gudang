<?php

class Login extends CI_Controller
{

    public function index($page = 'login')
    {
        if (!$this->session->userdata('username')) {
            if (!file_exists(APPPATH.'views/login/'.$page.'.php')) {
                show_404();
              }else {
    
                if(isset($_POST['username'])){
                    print_r($_POST);
                    redirect(base_url().'admin');
                }
                $data['titlenavbar'] = 'Login Inventori Gudang';
                $data['title'] = 'Login Inventori Gudang';
                $data['headScript'] = $this->Headscript();
                $data['footerScript'] = $this->FooterScripts();
                $this->load->view('templates/header_login',$data);
                $this->load->view('login/'.$page,$data);
                $this->load->view('templates/footer_login');
              }
        } else {
            redirect(base_url().'admin');
        }
    }

    public function loginFlow()
    {
        $data = array(
            "username"=>$this->input->post('username'),
            "password"=>$this->input->post('password')
        );

        $message = array();
        $login = $this->login_model->login($data);
        if ($login) {

            // Check user status
            $check = $this->login_model->checkStatus($this->input->post('username'));
            if (!$check) {

                $message = array(
                    "success"=>0,
                    "message"=>"User telah di non aktifkan",
                );
                echo json_encode($message);
                die();
                
            }

            $sessions = array();
            foreach ($login as $value) {
             $sessions = array(
                "id"=>$value->id,
                "username"=>$value->username,
                "password"=>$value->password,
                "email"=>$value->email,
                "role"=>$value->role,
                "status"=>$value->status
             );
            }
            $this->session->set_userdata($sessions);
            $message = array(
                "success"=>1,
                "message"=>"Login Sukses",
            );
        }else{
            $message = array(
                "success"=>0,
                "message"=>"Gagal Login, mungkin Username tidak ada di database",
            );
        }
        echo json_encode($message);
       
    }

    public function logout()
    {

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        redirect(base_url());

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
            <script src="'.base_url().'assets/js/login.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    demo.checkFullPageBackgroundImage();

                    setTimeout(function() {
                        $(".card").removeClass("card-hidden");
                    }, 700)
                });
            </script>
        ';
        return $footer;

    }
    
}
