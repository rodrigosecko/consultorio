<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cargos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("cargos_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Unidad/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo()
    {
        if ($this->session->userdata("login")) {
		    $data['data_table_cargo'] = $this->cargos_model->get_data_table();
            $data['data_table_grupo'] = $this->cargos_model->get_data_grupo();			
            $this->load->view('datatable/header');
			$this->load->view('admin/menu');
			$this->load->view('cargos/cargos',$data);
			$this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  
     public function create(){
        if ($this->session->userdata("login")) {       
        $data = array(
            'descripcion' => $this->input->post('cargo'), //input                             
        );       
        $this->db->set('fecha_creacion', 'NOW()', FALSE);
        $this->db->insert('cargos', $data);
        
        redirect(base_url() . 'cargos/nuevo/');
    } else {
        redirect(base_url());
    }
    }
    public function update()
    {
        if ($this->session->userdata("login")) {            
            $data = array(
            'descripcion' => $this->input->post('descripcion'), //input                                       
            );
            $id=$this->input->post('cargo_id');            
            $this->db->where('cargo_id', $id);
            $this->db->update('cargos', $data); 


            redirect(base_url() . 'cargos/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from cargos WHERE cargo_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;                      
            $data = array(
                'activo' => $valor, //input                                 
            );
            $this->db->where('cargo_id', $id);
            $this->db->update('Cargos', $data);          
            redirect(base_url() . 'cargos/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->cargos_model->get_data_porid($id);
            $data['data_table_grupo'] = $this->cargos_model->get_data_grupo();             
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('cargos/cargos_edit',$data);
            $this->load->view('admin/footer');  
        } else {
            redirect(base_url());
        }
    } 
   
    
}
