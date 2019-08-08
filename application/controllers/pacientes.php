<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pacientes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pacientes_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //QR CODE
        $this->load->library('phpqrcode/qrlib');
        $this->load->helper('url');
        
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "pacientes/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_pacientes'] = $this->pacientes_model->get_data(); 
                  
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('pacientes/pacientes',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  


    public function create(){
        if ($this->session->userdata("login")) {  
        $data = array(
            'nombre' => $this->input->post('nombre'), //input
            'ap_paterno' => $this->input->post('ap_paterno'), //input 
            'ap_materno' => $this->input->post('ap_materno'), //input 
            'ci' => $this->input->post('ci'), //input 
            'telefono' => $this->input->post('telefono'), //input     
            'direccion' => $this->input->post('direccion'), //input    
            'fecha_nac' => $this->input->post('fecha_nac'), //input          
        );     
        $this->db->insert('paciente', $data);
        redirect(base_url() . 'pacientes');
    } else {
        redirect(base_url());
    }
    }

    public function update()
    {
        if ($this->session->userdata("login")) {
            $data = array(
            //'codigo' => '12346', //input
            'nombre' => $this->input->post('nombre_e'), //input
            'ap_paterno' => $this->input->post('ap_paterno_e'), //input 
            'ap_materno' => $this->input->post('ap_materno_e'), //input 
            'ci' => $this->input->post('ci_e'), //input 
            'telefono' => $this->input->post('telefono_e'), //input     
            'direccion' => $this->input->post('direccion_e'), //input    
            'fecha_nac' => $this->input->post('fec_nac_e'), //input     
            //'estado' =>$this->input->post('estado'), //input                              
            );
            $id=$this->input->post('id_paciente_e');            
            $this->db->where('id_paciente', $id);
            $this->db->update('paciente', $data); 


            redirect(base_url() . 'pacientes');           
           
        } else {
            redirect(base_url());
        }
    }

 

    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
                                                   
            $data = array(
                'activo' => 0, //input                                 
            );
            $this->db->where('id_paciente', $id);
            $this->db->update('paciente', $data);



            redirect(base_url() . 'pacientes');
        } else {
            redirect(base_url());
        }
    }
}
