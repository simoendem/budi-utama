<?php

class m_kelas extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_kelas_by_unit($id_unit) {
        $sql = "SELECT * FROM ref_kelas WHERE id_unit = '$id_unit'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }

    function get_kelas_option_by_unit($id_unit) {
        //ambil semua di tabel 
        $sql = "SELECT *
                FROM   ref_kelas r
                WHERE  r.id_unit = '$id_unit'
                AND NOT EXISTS (SELECT *
                   FROM   kelas_aktif k
                   WHERE  r.id = k.id_kelas ) 
        ";

        // $sql = "SELECT * FROM ref_kelas r,kelas_aktif k WHERE r.id_unit = '$id_unit' AND r.id ";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }
    function get_kelas_detail($id) {
        $sql = "SELECT * FROM ref_kelas WHERE id = '$id'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }        
    }
    // add menu
    function add_kelas($params) {
        $insert = $this->db->insert('ref_kelas',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // edit menu
    function edit_kelas($id,$params) {
        $this->db->where('id',$id);
        $edit = $this->db->update('ref_kelas',$params);        
        if($edit) {
            return true;
        } else {
            return false;
        }    }

    // delete menu
    function delete_kelas($id) {
        $this->db->where('id',$id);
        $delete = $this->db->delete('ref_kelas');        
        if($delete) {
            return true;
        } else {
            return false;
        }    
    }

    function get_kelas_buka_by_unit_tahun($id_unit,$thn) {

        $sql = "SELECT k.id_buka,k.id_kelas,r.kelas,r.tingkat,r.id_unit,r.id
                FROM
                (SELECT *
                FROM kelas_aktif a
                WHERE a.id_unit = '$id_unit') k
                LEFT JOIN ref_kelas r 
                ON k.id_kelas = r.id
                 AND k.tahun_ajaran = '$thn' 
                 ORDER BY r.id";

        // $sql = "SELECT *
        //         FROM kelas_aktif a
        //         WHERE a.id_unit = '$id_unit'";

        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }           
    }

    function get_kelas_buka_by_unit_tahun_detail($id_buka) {
        $sql = "SELECT k.id_buka,k.id_kelas,r.kelas,r.tingkat,r.id_unit 
                FROM kelas_aktif k
                LEFT JOIN ref_kelas r 
                ON k.id_kelas = r.id
                AND k.id_buka = '$id_buka' ";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }        
    }

    // add menu
    function add_buka_kelas($params) {
        $insert = $this->db->insert('kelas_aktif',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }


    // delete menu
    function delete_kelas_buka($id_buka) {
        $this->db->where('id_buka',$id_buka);
        $delete = $this->db->delete('kelas_aktif');        
        if($delete) {
            return true;
        } else {
            return false;
        }    
    }

}
