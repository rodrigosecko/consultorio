<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidad_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data_table() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT x.unidad_id,x.nombre_unidad,x.padre_id,y.nombre_unidad as padre_unidad,x.activo,x.nivel from unidad x
            LEFT JOIN  
            unidad y
            on x.padre_id=y.unidad_id
           ");
        return $query->result();
    }
    function get_data_porid($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT x.unidad_id,x.nombre_unidad,x.padre_id,y.nombre_unidad as padre_unidad,x.activo,x.nivel from unidad x
            LEFT JOIN  
            unidad y
            on x.padre_id=y.unidad_id
            WHERE x.activo=1 and x.unidad_id=$id");
        return $query->row();
    }
     function get_data_grupo() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from unidad where activo=1');
        return $query->result();
    }

}
