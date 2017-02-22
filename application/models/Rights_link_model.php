<?php

class Rights_link_model extends CORE_Model{

    protected  $table="rights_links"; //table name
    protected  $pk_id="link_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function create_default_link_list(){
        $sql="INSERT IGNORE INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`) VALUES
                                          (1,'1','1-1','Documents Management'),
                                          (2,'2','2-1','Customers Management'),
                                          (3,'3','3-1','Setup Tax'),
                                          (4,'3','3-2','Setup User Rights'),
                                          (5,'3','3-3','Create User Account'),
                                          (6,'3','3-4','Setup Company Info'),
                                          (7,'1','1-2','Service Types'),
                                          (8,'4','4-1','Service Invoice'),
                                          (9,'4','4-2','Process Accomplishments'),
                                          (10,'4','4-3','Payments'),
                                          (11,'3','3-5','Charges'),
                                          (12,'1','1-3','Category Management'),
                                          (13,'2','2-2','Contract Management')
            ";


        $this->db->query($sql);
    }



}




?>