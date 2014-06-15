<?php

class m_tahun_ajaran extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_tahun_ajaran(){
        return $this->db->get('tahun_ajaran')->result();
    }

    function get_tahun_ajaran_by_id($id){
        return $this->db->get_where('tahun_ajaran',array('id'=>$id))->row();
    }

    function get_tahun_ajaran_nama($ta,$id){
        $sql = "SELECT *
                FROM tahun_ajaran
                WHERE tahun_ajaran = '$ta' AND id<>'$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_status_aktif($id){
       $sql = "SELECT *
                FROM tahun_ajaran
                WHERE status = 'AKTIF' AND id<>'$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function add_tahun_ajaran($params) {
        $this->db->insert('tahun_ajaran',$params);
    }

    function edit_tahun_ajaran($params) {
        $this->db->update('tahun_ajaran',$params,array('id'=>$params['id']));
    }

    function delete_tahun_ajaran($params) {
       $this->db->delete('tahun_ajaran',$params,array('id'=>$params['id']));
    }
    
}
