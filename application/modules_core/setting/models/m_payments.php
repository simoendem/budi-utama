<?php

class m_payments extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function add_payments($params) {
        $this->db->insert('payments',$params);
    }
    
    function get_all_bank(){
        return $this->db->get('bank')->result();
    }

    function get_student_invoice_tahun_aktif($params) {
        $ns='';
        $ct='';
        if(!empty($params['ns'])){
        	$kw='%'.$params['ns'].'%';
        	$ns=" (usa.nama_lengkap LIKE '".$kw."' OR usa.nis LIKE '".$kw."') AND ";
        }
        if(!empty($params['ct'])){
        	$ct=" ii.item_type_id=".$params['ct']." AND ";
        }

        $sql = "SELECT DISTINCT 
        			usa.nis, usa.nama_lengkap, ru.unit, usa.id_kelas, ii.item_type_id,
        			sum(ii.amount) AS jumlah_invoice,
					sum(ii.scholarship) AS jumlah_scholarship,
					sum(p.amount) AS jumlah_payment,
					IF(IFNULL(sum(p.amount),0)>=IFNULL(SUM(ii.amount),0)-IFNULL(SUM(ii.scholarship),0),'LUNAS','BELUM') AS status,
					IF(LPAD(ii.period_name,2,0)>'06',
					DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),date_format(concat(SUBSTR(ii.period_name,4,4),'-',LEFT(ii.period_name,2),'-','10'),'%Y-%m-%d')),
					DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),date_format(concat(RIGHT(ii.period_name,4),'-',LEFT(ii.period_name,2),'-','10'),'%Y-%m-%d'))) 
					AS selisih, date_format(concat('2000','-',LEFT(ii.period_name,2),'-','10'),'%M') AS bulan
                FROM invoice_items ii
                LEFT JOIN invoices i ON i.id=ii.invoice_id
                LEFT JOIN users_siswa_alumni usa ON usa.nis=i.nis
                LEFT JOIN ref_unit ru ON ru.id_unit=usa.id_unit
                LEFT JOIN payment_items p ON p.invoice_id = i.id
                WHERE
                    ".$ns." ".$ct."
                    i.tahun_ajaran_id=".$params['ta_id']."
                GROUP BY usa.nis
                HAVING
                	(IFNULL(sum(p.amount),0)<IFNULL(SUM(ii.amount),0)-IFNULL(SUM(ii.scholarship),0))
                ORDER BY selisih DESC
               ";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_student_invoices($nis,$ta_id,$iti){
         $sql = "SELECT 
                  ru.id_unit,
                  ii.*,
                  i.nis,
                  i.tahun_ajaran_id,
                  i.template_id,
                  it.name AS item_name,
                  (SELECT sub_ac.amount 
                  FROM 
                    administration_costs sub_ac,
                    items_type sub_it
                  WHERE sub_ac.item_type_id=sub_it.id
                    AND sub_ac.tahun_ajaran_id=".$ta_id."
                    AND sub_it.name='Denda'
                    AND sub_ac.unit_id=ru.id_unit
                  ) AS fines,
                  IF(LPAD(ii.period_name,2,0)>'06',
                    DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),date_format(concat(SUBSTR(ii.period_name,4,4),'-',LEFT(ii.period_name,2),'-','10'),'%Y-%m-%d')),
                    DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),date_format(concat(RIGHT(ii.period_name,4),'-',LEFT(ii.period_name,2),'-','10'),'%Y-%m-%d'))) 
                    AS selisih,
                  date_format(concat('2000','-',LEFT(ii.period_name,2),'-','10'),'%M') AS bulan
                FROM
                  invoices i 
                  LEFT JOIN invoice_items ii 
                    ON ii.invoice_id = i.id 
                  LEFT JOIN users_siswa_alumni usa 
                    ON usa.nis = i.nis 
                  LEFT JOIN ref_unit ru 
                    ON ru.id_unit = usa.id_unit 
                  LEFT JOIN payment_items p 
                    ON p.invoice_id = i.id 
                  LEFT JOIN items_type it 
                    ON it.id = ii.item_type_id 
                WHERE i.nis = ".$nis." 
                  AND i.tahun_ajaran_id = ".$ta_id." 
                  AND i.template_id = 
                  (SELECT 
                    sub_i.template_id 
                  FROM
                    invoices sub_i,
                    invoice_items sub_ii 
                  WHERE sub_i.id = sub_ii.invoice_id  
                    AND sub_ii.item_type_id = ".$iti."
                    AND sub_i.nis = ".$nis." 
                    AND sub_i.tahun_ajaran_id = ".$ta_id."
                  LIMIT 1)
                GROUP BY i.id
                HAVING
                  (IFNULL(SUM(p.amount),0)<IFNULL(SUM(ii.amount),0)-IFNULL(SUM(ii.scholarship),0))
                ";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
