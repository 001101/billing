<?php

class Accomplishment_model extends CORE_Model{

    protected  $table="accomplishments"; //table name
    protected  $pk_id="accomplishment_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_services_accomplishment($customer_id,$service_id=null,$month_id=null,$year_id=null){
        $sql="SELECT

                ser.service_id,ser.service_name,
                IFNULL(acc.narration,'')as narration,acc.date_accomplished,
                IF(ISNULL(acc.service_id),0,1) as status FROM

                (SELECT s.service_id,s.service_name FROM services as s
                WHERE s.is_deleted=0) as ser

                LEFT JOIN

                (SELECT a.service_id,a.narration,a.month_id,a.year_id,a.date_accomplished FROM accomplishments as a
                WHERE a.customer_id=$customer_id)as acc

                ON acc.service_id=ser.service_id

                WHERE ser.service_id>0

                ".($service_id==null?"":" AND ser.service_id=".$service_id)."
                ".($month_id==null?"":" AND acc.month_id=".$month_id)."
                ".($year_id==null?"":" AND acc.year_id=".$year_id)."

                ";

        return $this->db->query($sql)->result();
    }


}


?>