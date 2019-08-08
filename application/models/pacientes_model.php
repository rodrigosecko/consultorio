<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from paciente where activo=1');
        return $query->result();
    }
   

}
