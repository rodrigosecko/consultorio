<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("depreciaciones_model");
        $this->load->model("dashboard_model");
    }

    public function index()
    {
      if ($this->session->userdata("login")) {
        $rol= $this->session->userdata("rol");
        if($rol==1){
            redirect(base_url() . "asignacion/lista_user");
        }else{
            redirect(base_url() . "dashboard/graficos");
        }



        
        } else {
            redirect(base_url());
        }
    }    

    public function graficos()
    {
        if ($this->session->userdata("login")) {     
            $data['conteo_dep'] = 1;
            $data['conteo_pers'] = 2; 
            $data['conteo_asign'] = 3; 
            $data['conteo_act'] = 4; 

            $this->load->view('dashboard/header');
            $this->load->view('admin/menu');
            $this->load->view('dashboard/dashboard',$data);
            //$this->load->view('dashboard/footer');   
        } else {
            redirect(base_url());
        }
    }

    public function listado()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_activos'] = $this->depreciaciones_model->get_rest(1461); 
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('dashboard/listado',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }   
    

    
}
