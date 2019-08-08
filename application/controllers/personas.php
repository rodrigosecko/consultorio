<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("personas_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Personas/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_personas'] = $this->personas_model->get_data_table();     
            $data['data_table_cargo'] = $this->personas_model->get_data_cargo();  
            $data['data_table_unidad'] = $this->personas_model->get_data_unidad();       
            $this->load->view('personas/header_datetime');
            $this->load->view('admin/menu');
            $this->load->view('Personas/nuevo',$data);
            $this->load->view('Personas/footer_datetime');            
        } else {
            redirect(base_url());
        }
    }  
    public function create(){
        if ($this->session->userdata("login")) {  
            $cargo_id=$this->input->post('cargo_id');
            $unidad_id=$this->input->post('unidad_id');


        $data = array(
            'nombres' => ucwords($this->input->post('nombres')), //input
            'paterno' => ucwords($this->input->post('paterno')), //input 
            'materno' => ucwords($this->input->post('materno')), //input 
            'direccion' => ucwords($this->input->post('direccion')), //input 
            'telefono' => $this->input->post('telefono'), //input 
            'ci' => $this->input->post('ci'), //input 
            'fec_nacimiento' => $this->input->post('fecha_nacimiento'), //input 
            'fec_incorporacion' => $this->input->post('fecha_incorporacion'), //input                 
            'unidad_id' => $this->input->post('unidad_id'), //input 
            'cargo_id' => $this->input->post('cargo_id'), //input          
        );
        $this->db->set('fecha_creacion', 'NOW()', FALSE);
        $this->db->insert('persona', $data);

        $nombres=$this->input->post('nombres');
        $paterno=strtolower(($this->input->post('paterno')));
        $usuario=explode(" ", $nombres);
        $usuario=strtolower($usuario[0]).".".$paterno;
        $data_c = array(
            'usuario' => $usuario, //input
            'contrasenia' => $this->input->post('ci'), //input                    
        );
        $this->db->set('fecha_creacion', 'NOW()', FALSE);
        $this->db->insert('credencial', $data_c);


        redirect(base_url() . 'Personas/nuevo/');
    } else {
        redirect(base_url());
    }
    }
    public function update()
    {

        if ($this->session->userdata("login")) {
            $data = array(
            'nombres' => ucwords($this->input->post('nombres')), //input
            'paterno' => ucwords($this->input->post('paterno')), //input 
            'materno' => ucwords($this->input->post('materno')), //input 
            'direccion' => ucwords($this->input->post('direccion')), //input 
            'telefono' => $this->input->post('telefono'), //input 
            'ci' => $this->input->post('ci'), //input 
            'fec_nacimiento' => $this->input->post('fecha_nacimiento'), //input 
            'fec_incorporacion' => $this->input->post('fecha_incorporacion'), //input                 
            'unidad_id' => $this->input->post('unidad_id'), //input 
            'cargo_id' => $this->input->post('cargo_id'), //input                              
            );
            $id=$this->input->post('persona_id');            
            $this->db->where('persona_id', $id);
            $this->db->update('Persona', $data); 
            redirect(base_url() . 'Personas/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from persona WHERE persona_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;                      
            $data = array(
                'activo' => $valor, //input                                 
            );
            $this->db->where('persona_id', $id);
            $this->db->update('persona', $data);          
            redirect(base_url() . 'Personas/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->personas_model->get_data_porid($id); 
            $data['data_table_cargo'] = $this->personas_model->get_data_cargo();  
            $data['data_table_unidad'] = $this->personas_model->get_data_unidad();             
            $this->load->view('personas/header_datetime');
            $this->load->view('admin/menu');
            $this->load->view('personas/persona_edit',$data);
            $this->load->view('personas/footer_datetime');  
        } else {
            redirect(base_url());
        }
    }    
}
