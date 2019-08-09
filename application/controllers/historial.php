<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historial extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("historial_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //QR CODE
        $this->load->library('phpqrcode/qrlib');
        $this->load->helper('url');
        
    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "historial/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_consultas'] = $this->historial_model->get_data(); 
            $data['doctores'] = $this->historial_model->get_esp(); 
            $data['pacientes'] = $this->historial_model->get_esp();
                  
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('historial/historial',$data);
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
            'id_especialidad' => $this->input->post('id_especialidad'), //input    
            'telefono' => $this->input->post('telefono'), //input     
            'direccion' => $this->input->post('direccion'), //input    
                  
        );     
        $this->db->insert('doctor', $data);

        $query = $this->db->query('SELECT * from doctor d 
        ORDER BY id_doctor desc LIMIT 1')->row();


        $datas = array(
            'id_doctor' => 1, //input
            'usuario' => $this->input->post('nombre'), //input 
            'contrasenia' => $this->input->post('ci'), //input     
            'rol_id' => 1, //input    
     
                  
        );     
        $this->db->insert('credencial', $datas);

        redirect(base_url() . 'doctor');
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
            'id_especialidad' => $this->input->post('id_especialidad_e'), //input 
            'telefono' => $this->input->post('telefono_e'), //input     
            'direccion' => $this->input->post('direccion_e'), //input    
          
          
            );
            $id=$this->input->post('id_doctor_e');            
            $this->db->where('id_doctor', $id);
            $this->db->update('doctor', $data); 


            redirect(base_url() . 'doctor');           
           
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
            $this->db->where('id_doctor', $id);
            $this->db->update('doctor', $data);



            redirect(base_url() . 'doctor');
        } else {
            redirect(base_url());
        }
    }
}
