<?php

class Customers_model extends CORE_Model {
    protected $table="customers_info"; //table name
    protected $pk_id="customer_id"; //primary key id

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_customer_services($customer_id){
        $sql="SELECT s.service_id,s.service_name,s.service_description,IF(ISNULL(n.service_id),0,1)as service_stat FROM services as s

        LEFT JOIN

        (
        SELECT cs.service_id FROM customers_services as cs WHERE cs.customer_id=$customer_id
        ) as n

        ON s.service_id=n.service_id";

        return $this->db->query($sql)->result();
    }



}

?>