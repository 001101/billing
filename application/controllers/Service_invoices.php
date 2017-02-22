<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Service_invoices extends CORE_Controller 
	{
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
                    'Services_invoice_model',
				    'Services_invoice_items_model',
				    'Customers_model'
                )
			);
		}

		public function index()
		{
			$data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
	        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
	        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
	        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
	        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
	        $data['title']='Service Invoice';

            $current_year=date("Y");
            $max_year=$current_year+1;

            $years=array();
            for($min_year=$current_year-1;$min_year<=$max_year;$min_year++){
                $years[]=$min_year;
            }

            $data['years']=$years;
            $data['months']=array("January","February","March","April","May","June","July","August","September","October","November","December");
            $data['customers']=$this->Customers_model->get_list('is_deleted=0');

	        $this->load->view('service_invoice_view',$data);
        }

		function transaction($txn=null) 
		{
			switch($txn) {
                case 'invoice-list':
                    $billing_month=$this->input->get('');

                    $m_service_info=$this->Services_invoice_model;
                    $response['data']=$m_service_info->get_list('is_deleted=FALSE');
                    echo json_encode($response);
                break;
            }
		}


        function get_response_rows($params=null){
            $m_service_info=$this->Services_invoice_model;
            return $m_service_info->get_list(
                $params,

                array(
                    'service_info.*',
                    'customers_info.company_name'
                ),

                array(
                    array('customers_info as ci','ci.customer_id=service_info.customer_id')
                )

            );
        }



	}
?>