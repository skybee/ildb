<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('list_model','list');
        $this->load->model('student_model', 'student');
        $this->load->model('group_model', 'group');
        $this->load->model('payment_model', 'payment');
        $this->load->helper('valid_data');
        
        $_GET = post_valid( $_GET );
    }

    function index(){ show_404(); }
    
    function get_payment_tbl($group_id, $student_id){
        $st_data['payment_list']    = $this->payment->get_payment_for_student_cart( $student_id );
        $st_data['payment_list']    = $st_data['payment_list'][$group_id];
        $st_data['group_id']        = $group_id;
        $st_data['student_id']      = $student_id;
        
//        print_r($st_data['payment_ar']);
        
        $this->load->view('ajax/student/payment_tbl_view', $st_data);
    }
    
    function get_groups_page( $student_id ){
        $st_data['student_groups_list'] = $this->group->get_groups_for_student( $student_id );
        $this->load->view('ajax/student/groups_page_view', $st_data);
    }
    
    function get_certificate( $group_id, $student_id ){
        $st_data['certificate_list']        = $this->student->get_certificate( $student_id );
        $st_data['student_group_ar']['id']  = $group_id;
        $st_data['student_info_ar']['id']   = $student_id;
        
        $this->load->view('ajax/student/certificate_view', $st_data);
    }
    
}