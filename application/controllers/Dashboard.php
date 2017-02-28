<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(
            array(
                'Customers_model',
                'User_customers_model',
                'Users_model'
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

        $user_count=$this->Users_model->get_list(
            'is_deleted=FALSE AND is_active=TRUE',
            'COUNT(*) AS user_count'
        );

        $customer_count=$this->User_customers_model->get_list(
            array('user_id'=>$this->session->user_id),
            'COUNT(*) AS customer_count'
        );

        $data['users_count']=$user_count[0];

        $data['customers_count']=$customer_count[0];

        $this->load->view('dashboard_view',$data);
    }
}
