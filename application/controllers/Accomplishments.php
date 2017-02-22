<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Accomplishments extends CORE_Controller
	{
		
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
					'Services_model',
                    'Customers_model'
				)
			);
		}

		public function index(){
			$data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
	        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
	        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
	        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
	        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
	        $data['title']='Process Accomplishments';

            $current_year=date("Y");
            $max_year=$current_year+1;

            $years=array();
            for($min_year=$current_year-1;$min_year<=$max_year;$min_year++){
                $years[]=$min_year;
            }


            $data['years']=$years;
            $data['months']=array("January","February","March","April","May","June","July","August","September","October","November","December");
            $data['customers']=$this->Customers_model->get_list('is_deleted=0');

	        $this->load->view('accomplishments_view',$data);
		}



        function transaction($txn=null){
            switch($txn){
                case 'list':
                    $m_customers=$this->Customers_model;
                    $response['data']=$m_customers->get_list('is_deleted=0');
                    echo json_encode(
                        $response
                    );

                    break;
                case 'expand-view':
                    $m_customers=$this->Customers_model;
                    $customer_id=$this->input->get('id');

                    $data['customer_id']=$this->input->get('id');
                    $data['services']=$this->Services_model->get_list('is_deleted=0');
                    $data['customer_info']=$m_customers->get_list($customer_id);


                    $this->load->view('template/accomplishment_expand_view',$data);
                    break;

                case 'service-status':

                    break;

            }
        }















	}

?>



