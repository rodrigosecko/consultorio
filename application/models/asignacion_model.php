<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignacion_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data_table() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT x.asignacion_id,x.activo_id,z.descripcion,y.persona_id,y.nombres,y.paterno,y.materno,x.fecha_asign,x.activo,z.imagen,z.url from asignacion x
            LEFT JOIN
            persona y
            on y.persona_id=x.empleado_id
            LEFT JOIN
            activos z
            on x.activo_id=z.activo_id
            WHERE x.activo=1
            ');
        return $query->result();
    }
    function get_data_porid($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT x.asignacion_id,x.activo_id,z.descripcion,y.persona_id,y.nombres,y.paterno,y.materno,x.fecha_asign,x.activo from asignacion x
            LEFT JOIN
            persona y
            on y.persona_id=x.empleado_id
            LEFT JOIN
            activos z
            on x.activo_id=z.activo_id
            WHERE asignacion_id=$id");
        return $query->row();
    }
    function get_data_activo() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from activos WHERE activo=1');
        return $query->result();
    }
    function get_data_persona() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * FROM persona WHERE activo=1');
        return $query->result();
    }

       function get_data_table_idpersona($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT x.asignacion_id,x.activo_id,z.descripcion,y.persona_id,y.nombres,y.paterno,y.materno,x.fecha_asign,x.activo,z.imagen,z.url from asignacion x
            LEFT JOIN
            persona y
            on y.persona_id=x.empleado_id
            LEFT JOIN
            activos z
            on x.activo_id=z.activo_id
            WHERE x.activo=1 and y.persona_id=$id");
        return $query->result();
    }
}
