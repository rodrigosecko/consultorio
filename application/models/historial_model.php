<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class historial_model extends CI_Model {
	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from historial');
        return $query->result();
    }


    function get_esp() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from especialidad ');
        return $query->result();
    }
}
