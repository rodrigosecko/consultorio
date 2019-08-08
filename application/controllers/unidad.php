<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unidad extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("unidad_model");
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
		    $data['data_table_unidad'] = $this->unidad_model->get_data_table();
            $data['data_table_grupo'] = $this->unidad_model->get_data_grupo();			
            $this->load->view('datatable/header');
			$this->load->view('admin/menu');
			$this->load->view('Unidad/Unidad',$data);
			$this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  
     public function create(){
        if ($this->session->userdata("login")) {
        $id=$this->input->post('unidad_id');

        $nivel_bd = $this->db->query("SELECT nivel from Unidad WHERE unidad_id=$id");  
         foreach ($nivel_bd ->result() as $row)
            {
                $nivel=$row->nivel;                    
            }
        $nivel=$nivel+1;   

        $data = array(
            'nombre_unidad' => $this->input->post('unidad'), //input  
            'padre_id' => $this->input->post('unidad_id'), //input      
            'nivel' => $nivel, //input                 
        );       
        $this->db->set('fecha_creacion', 'NOW()', FALSE);
        $this->db->insert('Unidad', $data);
        
        redirect(base_url() . 'Unidad/nuevo/');
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
            $id=$this->input->post('auxiliar_id');            
            $this->db->where('auxiliar_id', $id);
            $this->db->update('auxiliar', $data); 


            redirect(base_url() . 'Auxiliar/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from Unidad WHERE unidad_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;                      
            $data = array(
                'activo' => $valor, //input                                 
            );
            $this->db->where('unidad_id', $id);
            $this->db->update('Unidad', $data);          
            redirect(base_url() . 'Unidad/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->unidad_model->get_data_porid($id);
            $data['data_table_grupo'] = $this->unidad_model->get_data_grupo();             
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('Unidad/unidad_edit',$data);
            $this->load->view('admin/footer');  
        } else {
            redirect(base_url());
        }
    } 
   
    
}
