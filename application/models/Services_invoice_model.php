<?php
	class Services_invoice_model extends CORE_Model {
		protected $table="billing_info";
		protected $pk_id="billing_id";

		function __construct() {
			parent::__construct();
		}



        function get_contract_billing_status($month_id,$year_id){
            $sql="SELECT c.*,IF(ISNULL(bi.customer_id),0,1)as bill_status

                    FROM

                    (

                    SELECT c.*,ci.company_name,ci.trade_name,ci.contact_no,ci.office_address FROM contracts as c
                    LEFT JOIN customers_info as ci ON ci.customer_id=c.customer_id
                    WHERE c.is_deleted=0 AND c.is_active=1

                    )as c

                    LEFT JOIN

                    (

                    SELECT bi.customer_id FROM billing_info as bi WHERE bi.is_deleted=0 AND bi.is_active=1
                    AND bi.month_id=$month_id AND bi.year_id=$year_id

                    ) as bi ON bi.customer_id=c.customer_id";

            return $this->db->query($sql)->result();
        }


	}

?>