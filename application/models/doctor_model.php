<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class doctor_model extends CI_Model {
	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT d.*,e.descripcion from doctor d
		LEFT JOIN 
		especialidad e
		on e.id_especialidad=d.id_especialidad
		where d.activo=1');
        return $query->result();
    }
    function get_esp() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from especialidad ');
        return $query->result();
    }
}
