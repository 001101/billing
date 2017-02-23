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
					'Payment_method_model',
					'Services_invoice_items_model',
					'Services_invoice_model'
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
	        $data['title'] = 'Collection Entry';	

	        $data['methods']=$this->Payment_method_model->get_list('is_deleted=FALSE');
	        $data['customers']=$this->Customers_model->get_list('is_deleted=FALSE');

	        $this->load->view('payments_view',$data);
		}

		function transactions($txn=null,$filter_value=null)
		{
			switch ($txn) {
				case 'get-customer-billings':
					$m_billing_info=$this->Services_invoice_model;

					$response['billing_items']=$m_billing_info->get_list(
						array(
							'billing_info.customer_id'=>$filter_value,
							'billing_info.`payment_status`=0 OR billing_info.payment_status=1'
						),
						'billing_info.*,
						billing_items.*',
						array(
							array('billing_items','billing_items.billing_id=billing_info.billing_id','left')
						)
					);

					echo json_encode($response);
					break;

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

				case 'create':
					$m_payment_info=$this->Payments_info_model;

					$m_payment_info->begin();

					$m_payment_info->receipt_no=$this->input->post('receipt_no',TRUE);
					$m_payment_info->date_paid=date('Y-m-d',strtotime($this->input->post('date_paid',TRUE)));
					$m_payment_info->payment_method_id=$this->input->post('payment_method_id',TRUE);
					$m_payment_info->customer_id=$this->input->post('customer_id',TRUE);
					$m_payment_info->posted_by=$this->session->user_id;
					$m_payment_info->set('date_posted','NOW()');
					$m_payment_info->save();

					$payment_id=$m_payment_info->last_insert_id();

					$m_payment_items=$this->Payments_item_model;

					$service_invoice_id=$this->input->post('service_invoice_id',TRUE);
					$remarks=$this->input->post('remarks',TRUE);
					$amount_due=$this->input->post('amount_due',TRUE);
					$payment_amount=$this->input->post('payment_amount',TRUE);

					for($i=0;$i<count($service_invoice_id);$i++) {
						$m_payment_items->payment_id=$payment_id;
						$m_payment_items->service_invoice_id=$service_invoice_id;
						$m_payment_items->billing_id=$billing_id[$i];
						$m_payment_items->remarks=$remarks[$i];
						$m_payment_items->amount_due=get_numeric_value($amount_due[$i]);
						$m_payment_items->payment_amount=get_numeric_value($payment_amount[$i]);
						$m_payment_items->save();
					}

					$m_payment_info->commit();

					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Collection Entry successfully created.';
                    $response['row_added']=$this->response_rows($payment_id);

                    echo json_encode($response);

					break;
					
			}
		}
	}
?>