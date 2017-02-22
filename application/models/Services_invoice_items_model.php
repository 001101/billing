<?php
	class Services_invoice_items_model extends CORE_Model
	{
		protected $table="service_invoice_items";
		protected $pk_id="service_invoice_item_id";	

		function __construct()
		{
			parent::__construct();
		}
	}

?>