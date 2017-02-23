<?php
	class Services_invoice_model extends CORE_Model {
		protected $table="billing_info";
		protected $pk_id="billing_id";

		function __construct() {
			parent::__construct();
		}


        function get_billing_with_balances($contract_id){
            $sql="SELECT bi.*,pi.payment_amount,
                (IFNULL(bi.current_charge,0)-IFNULL(pi.payment_amount,0))as remaining_balance,

                (2)as charge_id,
                (SELECT charge_name FROM charges WHERE charge_id=2) as charge_name /**this is previous balance with id 2**/

                FROM

                (SELECT bi.billing_id,bi.billing_no,DATE_FORMAT(bi.date_billed,'%M %d, %Y')as date_billed,DATE_FORMAT(bi.date_due,'%M %d, %Y')as  date_due,
                (bi.total_billing_current_amount-bi.advance_payment)as current_charge
                FROM billing_info as bi


                WHERE bi.is_active=1 AND bi.is_deleted=0 AND bi.contract_id=$contract_id AND
                (bi.payment_status=0 OR bi.payment_status=1)) as bi


                LEFT JOIN

                (

                SELECT pi.billing_id,SUM(pi.payment_amount)as payment_amount FROM payment_items as pi
                INNER JOIN payment_info as p ON p.payment_id=pi.payment_id
                WHERE p.is_active=1 AND p.is_deleted=0 AND pi.contract_id=$contract_id
                GROUP BY pi.billing_id

                ) as pi

                ON pi.billing_id=bi.billing_id";

            return $this->db->query($sql)->result();
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

                    SELECT bi.customer_id,bi.contract_id FROM billing_info as bi WHERE bi.is_deleted=0 AND bi.is_active=1
                    AND bi.month_id=$month_id AND bi.year_id=$year_id LIMIT 1

                    ) as bi ON bi.contract_id=c.contract_id";

            return $this->db->query($sql)->result();
        }


	}

?>