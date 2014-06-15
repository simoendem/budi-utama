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
    function delete_kelas($id,$params) {
        $this->db->where('id',$id);
        $delete = $this->db->delete('ref_kelas');        
        if($delete) {
            return true;
        } else {
            return false;
        }    }



}
