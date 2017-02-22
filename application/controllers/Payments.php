<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Payments extends CORE_Controller
	{		
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
					'Customers_model',
					'Payments_item_model',
					'Payments_info_model',
					'Payment_method_model'
				)
			);
		}

		public function index()
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
	        $data['title'] = 'Payments';	

	        $data['methods']=$this->Payment_method_model->get_list('is_deleted=FALSE');
	        $data['customers']=$this->Customers_model->get_list('is_deleted=FALSE');

	        $this->load->view('payments_view',$data);
		}

		function transactions($txn=null)
		{
			switch ($txn) {
				case 'list':
					$m_payment_info=$this->Payments_info_model;

					$response['data']=$m_payment_info->get_list(
						'payment_info.is_deleted=FALSE',
						'payment_info.*, customers_info.*',
						array(
							array('customers_info','customers_info.customer_id=payment_info.customer_id','left')
						)
					);

					echo json_encode($response);
					break;
			}
		}
	}
?>