<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asignacion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("asignacion_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "asignacion/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_asign'] = $this->asignacion_model->get_data_table(); 
            $data['data_table_activo'] = $this->asignacion_model->get_data_activo();
            $data['data_table_persona'] = $this->asignacion_model->get_data_persona();         
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('asignacion/asignacion',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  
    public function bajas()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_asign'] = $this->asignacion_model->get_data_table(); 
            $data['data_table_activo'] = $this->asignacion_model->get_data_activo();
            $data['data_table_persona'] = $this->asignacion_model->get_data_persona();         
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('asignacion/asignacion',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  
    public function create(){  
        if ($this->session->userdata("login")) {       
            $data = array(
            'empleado_id' => $this->input->post('empleado'), //input 
            'activo_id' => $this->input->post('activo_id'), //input                          
        );
            $this->db->set('fecha_asign', 'NOW()', FALSE);
            $this->db->insert('asignacion', $data);

            $data_a = array(
            'activo' => 2,                                         
            );
            $id=$this->input->post('activo_id');            
            $this->db->where('activo_id', $id);
            $this->db->update('activos', $data_a); 
            redirect(base_url() . 'asignacion/nuevo/');
        } else {
            redirect(base_url());
        }
    }
    public function update()
    {
        if ($this->session->userdata("login")) {
            $data = array(
            'activo_id' => $this->input->post('activo_id'), //input                                         
            'empleado_id' => $this->input->post('empleado'), //input                                         
            );
            $id=$this->input->post('asignacion_id');            
            $this->db->where('asignacion_id', $id);
            $this->db->update('asignacion', $data); 


            redirect(base_url() . 'Asignacion/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from asignacion WHERE asignacion_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;                      
            $data = array(
                'activo' => $valor, //input                                 
            );
            $this->db->where('asignacion_id', $id);
            $this->db->update('asignacion', $data);          
            redirect(base_url() . 'asignacion/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->asignacion_model->get_data_porid($id); 
            $data['data_table_activo'] = $this->asignacion_model->get_data_activo();
            $data['data_table_persona'] = $this->asignacion_model->get_data_persona();                     
            $this->load->view('empresa/header_datetime');
            $this->load->view('admin/menu');
            $this->load->view('asignacion/asignacion_edit',$data);
            $this->load->view('empresa/footer_datetime');  
        } else {
            redirect(base_url());
        }
    }    

    public function lista_user()
    {
        if ($this->session->userdata("login")) {  
            $id_user=$this->session->userdata("persona_perfil_id");
            $data['data_table_asign'] = $this->asignacion_model->get_data_table_idpersona($id_user); 
            $data['data_table_activo'] = $this->asignacion_model->get_data_activo();
            $data['data_table_persona'] = $this->asignacion_model->get_data_persona(); 
            $data['id_persona'] = $id_user;        
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('asignacion/listado_user',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    } 
}
