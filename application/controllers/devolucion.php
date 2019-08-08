<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Devolucion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("devolucion_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Devolucion/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_asign'] = $this->devolucion_model->get_data_table(); 
            $data['data_table_activo'] = $this->devolucion_model->get_data_activo();
            $data['data_table_persona'] = $this->devolucion_model->get_data_persona();         
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('Devolucion/Devolucion',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  

    public function lista()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_asign'] = $this->devolucion_model->get_data_histo(); 
            $data['data_table_activo'] = $this->devolucion_model->get_data_activo();
            $data['data_table_persona'] = $this->devolucion_model->get_data_persona();         
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('Devolucion/Devolucion_lista',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  

    public function delete()
    {
        if ($this->session->userdata("login")) {
            $data = array(
            'empleado_id' => $this->input->post('empleado'), //input 
            'activo_id' => $this->input->post('activo_id'), //input  
            'motivo' => $this->input->post('motivo'), //input             
            );
            $this->db->set('fecha_devolucion', 'NOW()', FALSE);
            $this->db->insert('devolucion', $data);

            $activo_id=$this->input->post('activo_id');
                                
            $data_a = array(
                'activo' => 0, //input                                 
            );
            $this->db->where('activo_id', $activo_id);
            $this->db->update('asignacion', $data_a);

            $data_a = array(
                'activo' => 1, //input                                 
            );
            $this->db->where('activo_id', $activo_id);
            $this->db->update('activos', $data_a);

            redirect(base_url() . 'Devolucion/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->devolucion_model->get_data_porid($id); 
            $data['data_table_activo'] = $this->devolucion_model->get_data_activo();
            $data['data_table_persona'] = $this->devolucion_model->get_data_persona();                     
            $this->load->view('empresa/header_datetime');
            $this->load->view('admin/menu');
            $this->load->view('devolucion/devolucion_baja',$data);
            $this->load->view('empresa/footer_datetime');  
        } else {
            redirect(base_url());
        }
    }

     


}
