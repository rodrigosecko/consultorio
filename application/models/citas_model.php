<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class citas_model extends CI_Model {
	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT c.*,CONCAT(d.nombre, ' ',d.ap_paterno, ' ',d.ap_materno) as doctor,CONCAT(p.nombre, ' ',p.ap_paterno, ' ',p.ap_materno) as paciente from cita c
LEFT JOIN 
doctor d
on c.id_doctor=d.id_doctor
LEFT JOIN
paciente p
on c.id_paciente=p.id_paciente WHERE c.activo=1");
        return $query->result();
    }


    function get_doctor() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from doctor where activo=1');
        return $query->result();
    }
    function get_paciente() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from paciente ');
        return $query->result();
    }
    
}
