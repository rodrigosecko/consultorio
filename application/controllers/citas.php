<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Citas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("citas_model");
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
            $data['data_table_consultas'] = $this->citas_model->get_data(); 
            $data['doctores'] = $this->citas_model->get_doctor(); 
            $data['pacientes'] = $this->citas_model->get_paciente();
                  
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('citas/citas',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }
  


    public function create(){
        if ($this->session->userdata("login")) {  
        $data = array(
            'id_doctor' => $this->input->post('id_doctor'), //input
            'id_paciente' => $this->input->post('id_paciente'), //input 
           
            'fecha' => $this->input->post('fecha'), //input 
            'descripcion' => $this->input->post('descripcion'), //input    
                        
        );     
        $this->db->insert('cita', $data);

      

        redirect(base_url() . 'citas');
    } else {
        redirect(base_url());
    }
    }

    public function update()
    {
        if ($this->session->userdata("login")) {
            $data = array(
            //'codigo' => '12346', //input
            'id_doctor' => $this->input->post('id_doctor_e'), //input
            'id_paciente' => $this->input->post('id_paciente_e'), //input 
       
            'fecha' => $this->input->post('fecha_e'), //input 
            'descripcion' => $this->input->post('descripcion_e'), //input    
               
          
          
            );
            $id=$this->input->post('id_cita_e');            
            $this->db->where('id_cita', $id);
            $this->db->update('cita', $data); 


            redirect(base_url() . 'citas');           
           
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
            $this->db->where('id_historial', $id);
            $this->db->update('historial', $data);



            redirect(base_url() . 'historial');
        } else {
            redirect(base_url());
        }
    }

    public function pdf_recibo($id=null)
    {
        $data['data'] = $this->db->query("SELECT h.*,CONCAT(d.nombre, ' ',d.ap_paterno, ' ',d.ap_materno) as doctor,p.ci,CONCAT(p.nombre, ' ',p.ap_paterno, ' ',p.ap_materno) as paciente from historial h
LEFT JOIN 
doctor d
on h.id_doctor=d.id_doctor
LEFT JOIN
paciente p
on h.id_paciente=p.id_paciente
WHERE h.activo=1 and id_historial=$id")->row();

         $data['data_dr'] = $this->db->query("SELECT h.*,CONCAT(d.nombre, ' ',d.ap_paterno, ' ',d.ap_materno) as doctor,e.descripcion from historial h
LEFT JOIN 
doctor d
on h.id_doctor=d.id_doctor
LEFT JOIN
especialidad e
on d.id_especialidad=e.id_especialidad
WHERE h.activo=1 and id_historial=$id")->row();

        $data['fecha']=date('d');

        $data['dia']=date('d');
        
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";
        $data['mes']= $mes;
        $data['anio']=date('Y'); 


        $this->load->view('reportes/cert_alta_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
          $this->dompdf->set_option('isRemoteEnabled', TRUE);   
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 
}
