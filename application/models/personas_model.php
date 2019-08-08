<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data_table() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT p.persona_id,p.nombres,p.paterno,p.materno,p.ci,p.fec_nacimiento,p.fec_incorporacion,p.cargo_id,p.unidad_id,c.descripcion,u.nombre_unidad,p.activo from persona p
            LEFT JOIN
            cargos c
            on p.cargo_id=c.cargo_id
            LEFT JOIN
            unidad u
            on p.unidad_id=u.unidad_id
            ");
        return $query->result();
    }
    function get_data_porid($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT p.*,g.descripcion,u.nombre_unidad FROM
            persona p
            LEFT JOIN
            cargos g
            on p.cargo_id=g.cargo_id
            LEFT JOIN
            unidad u
            on p.unidad_id=u.unidad_id
            WHERE p.persona_id=$id");
        return $query->row();
    }
    function get_data_cargo() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from cargos WHERE activo=1');
        return $query->result();
    }
    function get_data_unidad() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * FROM unidad WHERE activo=1');
        return $query->result();
    }
}
