<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grupos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("grupos_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Grupos/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo($cod_catastral = null)
    {

        if ($this->session->userdata("login")) {
		    $data['data_table_grupo'] = $this->grupos_model->get_data_table();			
            $this->load->view('datatable/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/grupos',$data);
			$this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  
     public function create(){
        if ($this->session->userdata("login")) {
        $data = array(
            'nombre' => $this->input->post('nombre'), //input                        
        );
        $this->db->set('fecha_creacion', 'NOW()', FALSE);
        $this->db->insert('Grupo', $data);
        redirect(base_url() . 'grupos/nuevo/');
    } else {
        redirect(base_url());
    }
    }
    public function update()
    {
        if ($this->session->userdata("login")) {
            $data = array(
            'nombre' => $this->input->post('nombre'), //input                                       
            );
            $id=$this->input->post('grupo_id');            
            $this->db->where('grupo_id', $id);
            $this->db->update('grupo', $data); 


            redirect(base_url() . 'grupos/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from grupo WHERE grupo_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;                      
            $data = array(
                'activo' => $valor, //input                                 
            );
            $this->db->where('grupo_id', $id);
            $this->db->update('grupo', $data);          
            redirect(base_url() . 'Grupos/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->grupos_model->get_data_porid($id);          
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('crud/grupo_edit',$data);
            $this->load->view('admin/footer');  
        } else {
            redirect(base_url());
        }
    } 
   
    
}
