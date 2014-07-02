<?php

class m_pendaftaran extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // add menu
    function add_siswa_baru($params) {
        $insert = $this->db->insert('users_siswa_alumni',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // add menu
    function add_siswa_baru_prestasi($params) {
        $insert = $this->db->insert('siswa_prestasi',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    function add_siswa_import($dataarray)
    {
        foreach ($dataarray as $params) {
            //check duplicate apa nggra
            $this->db->where('nis',$params['nis']);
            $query = $this->db->get('users_siswa_alumni');
            if ($query->num_rows() == 0 )
            {
                //if not found insert
                if ($insert = $this->db->insert('users_siswa_alumni', $params))
                {
                    $success = true;
                }
                else
                {
                    return false;
                }            
            }
            else {
                //update or not?
                $this->db->where('nis',$params['nis']);
                if ($update = $this->db->update('users_siswa_alumni', $params))
                {
                    $success = true;
                }
                else
                {
                    return false;
                }            
            }
        }
        return true;
    }
 
    function getuser()
    {
        $query = $this->db->get('users_siswa_alumni');
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
        // echo '<pre>'; print_r($query->result());die;
    }    

    function update_users_siswa_alumni($params){
        $q = $this->db->update('users_siswa_alumni',$params,array('nis'=>$params['nis']));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

}
