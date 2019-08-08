<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activos_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data_table() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from activos');
        return $query->result();
    }
    function get_data_porid($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT x.activo_id,x.codigo,x.grupo_id,y.nombre as grupo,x.auxiliar_id,z.nombre as auxiliar,x.descripcion,x.costo,x.fecha_incorporacion,x.estado_id,x.observaciones FROM activos x
            LEFT JOIN
            grupo y
            on x.grupo_id=y.grupo_id
            left JOIN
            auxiliar z
            on x.auxiliar_id=z.auxiliar_id
            WHERE x.activo_id=$id");
        return $query->row();
    }
    function get_data_grupo() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * FROM grupo WHERE activo=1 order by nombre asc');
        return $query->result();
    }
    function get_data_auxiliar() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * FROM auxiliar WHERE activo=1 order by nombre asc');
        return $query->result();
    }
    function get_data_activos() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT a.*,e.descripcion as estado_act from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
         where a.activo=1 or a.activo=2');
        return $query->result();
    }
    function get_data_inactivos() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT x.activo_id,x.descripcion,x.codigo,y.motivo,y.fecha_baja from activos x 
            left JOIN
            bajas y
            on x.activo_id=y.activo_id
            WHERE x.activo=0
            ');
        return $query->result();
    }
     function get_data_almacen() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from activos where activo=2');
        return $query->result();
    }
     function get_data_estado() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * from estado');
        return $query->result();
    }

    function get_activos_depreciacion() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT a.*,e.descripcion as est,d.*, (a.costo-(d.dep_dia)*DATEDIFF(now(),fecha_incorporacion)) as valor_actual from activos a
            LEFT JOIN
            estado e
            on a.estado_id=e.estado_id
                        LEFT JOIN
                        depreciacion d
                        on a.activo_id=d.activo_id                                              
         where a.activo!=0');
        return $query->result();
    }

}
