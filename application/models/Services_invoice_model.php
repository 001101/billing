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

        function get_collection_percentage() {
            $sql = "SELECT
            IFNULL((no_fully_paid / no_billing) * 100, 0) AS pc
            FROM
            (SELECT
            billing_id,
            posted_by,
            COUNT(billing_id) AS no_fully_paid
            FROM `billing_info`
            WHERE 
            is_active=TRUE 
            AND is_deleted=FALSE
            AND payment_status = 2
            AND date_billed 
            LIKE CONCAT('%',YEAR(CURDATE()),'-',LPAD(MONTH(CURDATE()), 2, '0'),'%')
            ".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id).") AS t1
            LEFT JOIN 
            (SELECT
            billing_id,
            posted_by,
            COUNT(billing_id) AS no_billing
            FROM
            billing_info
            WHERE
            is_active=TRUE
            AND is_deleted=FALSE
            AND date_billed 
            LIKE CONCAT('%',YEAR(CURDATE()),'-',LPAD(MONTH(CURDATE()), 2, '0'),'%')
            ".($this->session->user_group_id == 1 ? '' : ' AND posted_by='.$this->session->user_group_id).") AS t2
            ON t2.billing_id=t1.billing_id";

            return $this->db->query($sql)->result();
        }

        function create_billing_no() {


            $sql="SELECT IFNULL(MAX(m.counter_id),0) as id
            FROM
            (SELECT CAST(REPLACE(billing_no,DATE_FORMAT(NOW(),'%Y-%m-'),'') AS UNSIGNED)as counter_id 
            FROM billing_info 
            WHERE billing_no LIKE CONCAT(DATE_FORMAT(NOW(),'%Y-%m-'),'%')) AS m";

            $counter=$this->db->query($sql)->result();
            $id= $counter[0] ->id;         

            settype($id, "double");

            return date('Y-m-').str_pad($id+1,4,0,STR_PAD_LEFT);
        }

        function get_contract_billing_status($month_id,$year_id,$contract_id=null){
            $sql="SELECT c.*,IF(ISNULL(bi.customer_id),0,1)as bill_status
                    FROM
                    (SELECT c.*,ci.company_name,ci.trade_name,ci.contact_no,ci.office_address FROM contracts as c
                    LEFT JOIN customers_info as ci ON ci.customer_id=c.customer_id
                    WHERE c.is_deleted=0 AND c.is_active=1
                    ".($contract_id==null ? "" : " AND c.contract_id=$contract_id")." )as c

                    LEFT JOIN
                    (SELECT bi.customer_id,bi.contract_id FROM billing_info as bi WHERE bi.is_deleted=0 AND bi.is_active=1
                    AND bi.month_id=CAST($month_id as UNSIGNED) AND bi.year_id=CAST($year_id as UNSIGNED)
                    ".($contract_id==null?"":" AND bi.contract_id=$contract_id")."

                    GROUP BY bi.contract_id

                    ) as bi ON bi.contract_id=c.contract_id";

            return $this->db->query($sql)->result();
        }



        function get_billing_no(){
            $sql="SELECT create_billing_no() as id";
            $result=$this->db->query($sql)->result();
            return $result[0]->id;
        }















	}

?>