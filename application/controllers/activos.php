<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("activos_model");
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

            redirect(base_url() . "activos/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_activos'] = $this->activos_model->get_activos_depreciacion(); 
            $data['data_table_grupo'] = $this->activos_model->get_data_grupo();
            $data['data_table_auxiliar'] = $this->activos_model->get_data_auxiliar();
            $data['data_table_estado'] = $this->activos_model->get_data_estado();           
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('activos/activos',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    }  


     public function bajas()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_inactivos'] = $this->activos_model->get_data_inactivos();          
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('activos/bajas',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    } 

    public function do_upload(){
        if ($this->session->userdata("login")) {
            $ultimo_id = $this->db->query("SELECT * FROM activos ORDER BY activo_id DESC LIMIT 1");            
            foreach ($ultimo_id ->result() as $col)
            {
                $img=$col->activo_id;                    
            }
            $img = $img+1;

                $config['upload_path']          = './public/assets/images/activos';
                $config['file_name']        = $img;
                $config['allowed_types']        = 'jpg';
                $config['overwrite']        = TRUE;
                $config['max_size']             = 100000000;
                $config['max_width']            = 100024;
                $config['max_height']           = 700068;
                
        $sw = $this->input->post('opcion');    
        $id_grupo=$this->input->post('grupo_id');

            $contador_gr = $this->db->query("SELECT COUNT(activo_id)as conteo FROM activos
            WHERE grupo_id=$id_grupo");            
            foreach ($contador_gr ->result() as $cont)
            {
                $ult=$cont->conteo;                                
            }
            $ult=$ult+1;

        $code="RYNV-".$this->input->post('auxiliar_id')."-".$this->input->post('grupo_id')."-0000".$ult;
        $data = array(
            'codigo' => $code, //input
            'descripcion' => $this->input->post('descripcion'), //input 
            'costo' => $this->input->post('costo'), //input 
            'auxiliar_id' => $this->input->post('auxiliar_id'), //input 
            'grupo_id' => $this->input->post('grupo_id'), //input     
            'fecha_incorporacion' => $this->input->post('fecha'), //input  
            'observaciones' => $this->input->post('observaciones'), //input  
            'estado_id' =>$this->input->post('estado'), //input 
            'url' => 'public/assets/images/activos', //input 
            'imagen' => $img.'.jpg', //input           
        );
        $this->db->set('fecha_creacion', 'NOW()', FALSE);
        $this->db->insert('activos', $data);
        //depreciacion del activo
        //========================
        $actvid = $this->db->query("SELECT * FROM activos ORDER BY activo_id DESC LIMIT 1");            
            foreach ($actvid ->result() as $row)
            {
                $activo_id_last=$row->activo_id;
                $codeqr=$row->codigo;                    
            }
        $grupo_id_u=$this->input->post('grupo_id');
        $vid_u = $this->db->query("SELECT * FROM grupo where grupo_id=$grupo_id_u");            
            foreach ($vid_u ->result() as $row_u)
            {
                $vida_util=$row_u->vida_util;                    
            }
        $costo=$this->input->post('costo');
        $dep_anual=$costo/$vida_util;
        $dep_mensual=$dep_anual/12;
        $dep_dia=$dep_mensual/30;

        $fecha_actual=$this->input->post('fecha');
        //$fecha_fin = strtotime ('+1 year' , strtotime($fecha_actual));
        $fecha_fin = strtotime ('+'.$vida_util.' year' , strtotime($fecha_actual));
        $fecha_fin = date ('Y-m-d',$fecha_fin);


        $data_d = array(
           
            'activo_id' => $activo_id_last, //input 
            'vida_util' => $vida_util, //input 
            'dep_anual' => $dep_anual, //input 
            'dep_mensual' => $dep_mensual, //input 
            'dep_dia'=>$dep_dia,
            'fecha_fin'=>$fecha_fin,
        ); 
        $this->db->set('fecha_creacion', 'NOW()', FALSE);
        $this->db->insert('depreciacion', $data_d);


        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto_org'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
               
        }

        $this->qrcodeGenerator($activo_id_last,$codeqr);

   



        redirect(base_url() . 'activos/nuevo/');
         } else {
            redirect(base_url());
        }
    }
    public function update()
    {
        if ($this->session->userdata("login")) {
            $data = array(
            //'codigo' => '12346', //input
            'descripcion' => $this->input->post('descripcion'), //input 
            'costo' => $this->input->post('costo'), //input 
            'auxiliar_id' => $this->input->post('auxiliar_id'), //input 
            'grupo_id' => $this->input->post('grupo_id'), //input     
            'fecha_incorporacion' => $this->input->post('fecha'), //input  
            'observaciones' => $this->input->post('observaciones'), //input  
            //'estado' =>$this->input->post('estado'), //input                              
            );
            $id=$this->input->post('activo_id');            
            $this->db->where('activo_id', $id);
            $this->db->update('activos', $data); 


            redirect(base_url() . 'activos/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }

    public function alta($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from activos WHERE activo_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;                      
            $data = array(
                'activo' => $valor, //input                                 
            );
            $this->db->where('activo_id', $id);
            $this->db->update('activos', $data);          
            redirect(base_url() . 'activos/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function delete()
    {
        if ($this->session->userdata("login")) {
            $id = $this->input->post('activo_id');                                            
            $data = array(
                'activo' => 0, //input                                 
            );
            $this->db->where('activo_id', $id);
            $this->db->update('activos', $data);

            $data_b = array(            
            'motivo' => $this->input->post('motivo'),
            'activo_id' => $this->input->post('activo_id'),
            );
            $this->db->set('fecha_baja', 'NOW()', FALSE);
            $this->db->insert('bajas', $data_b);
            redirect(base_url() . 'activos/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->activos_model->get_data_porid($id); 
            $data['data_table_grupo'] = $this->activos_model->get_data_grupo();
            $data['data_table_auxiliar'] = $this->activos_model->get_data_auxiliar();                
            $this->load->view('empresa/header_datetime');
            $this->load->view('admin/menu');
            $this->load->view('activos/activos_edit',$data);
            $this->load->view('empresa/footer_datetime');  
        } else {
            redirect(base_url());
        }
    }
    public function edit_baja($id = null)
    {
        if ($this->session->userdata("login")) {
            $data['row'] = $this->activos_model->get_data_porid($id); 
            $data['data_table_grupo'] = $this->activos_model->get_data_grupo();
            $data['data_table_auxiliar'] = $this->activos_model->get_data_auxiliar();                
            $this->load->view('empresa/header_datetime');
            $this->load->view('admin/menu');
            $this->load->view('activos/activos_baja',$data);
            $this->load->view('empresa/footer_datetime');  
        } else {
            redirect(base_url());
        }
    } 

    public function pdftest()
    {
        $this->load->view('user_list');
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }

    public function pdf()
    {
        $this->load->view('reportes/cert_dep_pdf');
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 

    public function pdf_asign($id=null)
    {
        $data['data_table_activos'] = $this->db->query("SELECT a.*,e.descripcion as est,d.* from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo_id=$id")->result();

        $data['code'] = $this->db->query("SELECT a.*,e.descripcion as est,d.* from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo_id=$id")->row();






        $this->load->view('reportes/cert_asign_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }  


    public function pdf_alta($id=null)
    {
        $data['data_table_activos'] = $this->db->query("SELECT a.*,e.descripcion as est,d.* from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo_id=$id")->result();

        $data['code'] = $this->db->query("SELECT a.*,e.descripcion as est,d.* from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo_id=$id")->row();

        $data['fecha']=date('d');


        $this->load->view('reportes/cert_alta_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 

    public function pdf_dev($id=null)
    {
        $data['data_table_activos'] = $this->db->query("
SELECT d.*,a.*,s.nombre as auxdesc,e.descripcion as descestado FROM devolucion d
LEFT JOIN activos a
on d.activo_id=a.activo_id
LEFT JOIN auxiliar s
on s.auxiliar_id=a.auxiliar_id
LEFT JOIN estado e
on e.estado_id=a.estado_id
WHERE d.activo=1 and d.devolucion_id=$id")->result();
    
        $data['fecha']=date('d');
        $this->load->view('reportes/cert_dev_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 

    public function html()
    {
         $data['data_table_activos'] = $this->db->query('SELECT a.*,e.descripcion as est,d.* from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo=1 or a.activo=2')->result();

        $data['code'] = $this->db->query('SELECT a.*,e.descripcion as est,d.* from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo=1 or a.activo=2')->row();
        $data['fecha']=date('d');
        $this->load->view('reportes/cert_listado_qr',$data);    
    }  

    public function qrcodeGenerator($id=null,$cod)
    {                
        $qrtext=$cod;   

        if(isset($cod))
        { 
            //file path for store images
            $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/activosfijos/images/';
            $text = $qrtext;
            $text1= substr($text, 0,9);            
            $folder = $SERVERFILEPATH;
            //$file_name1 = $text1."-Qrcode" . rand(2,200) . ".png";
            $file_name1 = $id.".png";
            $file_name = $folder.$file_name1;
            QRcode::png($text,$file_name);            
            echo"<center><img src=".base_url().'images/'.$file_name1."></center";
        }
        else
        {
            echo 'No Text Entered';
        }   
    } 

     public function pdf_lista($id=null)
    {
        $data['data_table_activos'] = $this->db->query("SELECT a.*,e.descripcion as est,d.*, (a.costo-(d.dep_dia)*DATEDIFF(now(),fecha_incorporacion)) as valor_actual from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo!=0")->result(); 
        $data['fecha']=date('d');

        $this->load->view('reportes/cert_listado',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);   
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 

      public function pdf_lista_qr()
    {
        $data['data_table_activos'] = $this->db->query("SELECT a.*,e.descripcion as est,d.*, (a.costo-(d.dep_dia)*DATEDIFF(now(),fecha_incorporacion)) as valor_actual from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo!=0")->result(); 
        $data['fecha']=date('d');

        $this->load->view('reportes/cert_listado_qr',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  

        $this->dompdf->setPaper('A4', 'portrait');

        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 

     public function anio()
    {
        if ($this->session->userdata("login")) {  
            $data['data_table_activos'] = $this->activos_model->get_data_activos(); 
            $data['data_table_grupo'] = $this->activos_model->get_data_grupo();
            $data['data_table_auxiliar'] = $this->activos_model->get_data_auxiliar();
            $data['data_table_estado'] = $this->activos_model->get_data_estado();           
            $this->load->view('datatable/header');
            $this->load->view('admin/menu');
            $this->load->view('activos/list_anio',$data);
            $this->load->view('datatable/footer');            
        } else {
            redirect(base_url());
        }
    } 

     public function reporte_anio()
    {
        if ($this->session->userdata("login")) {  

            $gest=$this->input->post('gestion');


          $data['data_table_activos'] = $this->db->query("SELECT a.*,e.descripcion as est,d.*, (a.costo-(d.dep_dia)*DATEDIFF(now(),fecha_incorporacion)) as valor_actual from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo!=0 and YEAR(fecha_incorporacion)='$gest'")->result(); 
        $data['fecha']=date('d');
        $data['gest']=$gest;

        $this->load->view('reportes/cert_anio',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));         
        } else {
            redirect(base_url());
        }
    } 

     public function pdf_dep_fin()
    {
        if ($this->session->userdata("login")) {  

           
          $data['data_table_activos'] = $this->db->query("SELECT a.*,e.descripcion as est,d.*, (a.costo-(d.dep_dia)*DATEDIFF(now(),fecha_incorporacion)) as valor_actual from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
         where a.activo!=0 and DATEDIFF(d.fecha_fin,now())=1461")->result(); 
        $data['fecha']=date('d');
       

        $this->load->view('reportes/cert_dep_rest',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));         
        } else {
            redirect(base_url());
        }
    } 

    public function pdf_lista_asign($id=null)
    {

        $data['data_user'] = $this->db->query("SELECT p.*,c.*,u.* from persona p
LEFT JOIN
cargos c
on p.cargo_id=c.cargo_id
LEFT JOIN 
unidad u
on p.unidad_id=u.unidad_id
WHERE persona_id=$id")->row(); 
        $data['data_table_activos'] = $this->db->query("SELECT a.*,e.descripcion as est,d.*, (a.costo-(d.dep_dia)*DATEDIFF(now(),fecha_incorporacion)) as valor_actual from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id
                                                LEFT JOIN
                                                asignacion s
                                                on a.activo_id=s.activo_id
         where a.activo!=0 and s.empleado_id=$id")->result(); 
        $data['fecha']=date('d');

        $this->load->view('reportes/cert_asignacion_user',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 


    


}
