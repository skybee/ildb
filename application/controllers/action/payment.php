<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class payment extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('list_model','list');
        $this->load->model('student_model', 'student');
        $this->load->model('group_model', 'group');
        $this->load->model('payment_model', 'payment');
        $this->load->model('schedule_model', 'schedule');
        $this->load->library('validform_lib');
        $this->load->helper('valid_data');
        
        $_POST  = post_valid( $_POST );
    }
    
    function add_payment(){
//        print_r($_POST);
        
        if( $this->validform_lib->add_payment( $_POST ) ){
            $anser_ar['title']      = 'Ошибка добавления/изменения';
            $anser_ar['content']    = 'Следующие поля были заполнены не правильно:<br />';
            $anser_ar['content']    .= $this->validform_lib->add_payment( $_POST );
            
        }
        else{
            if( $this->payment->add_payment( $_POST ) ){
                $anser_ar['title']      = 'Платеж успешно добавлен/изменен';
                $anser_ar['content']    = '';
                $anser_ar['close_link'] = '';
                $anser_ar['script']     = "ajax_update('#tabs-{$_POST['group_id']} .st_cart_payment_scroll_block','/ajax/student/get_payment_tbl/{$_POST['group_id']}/{$_POST['student_id']}/')";
            }
            else{
                $anser_ar['title']      = 'Произошла ошибка, платеж не занесен';
                $anser_ar['content']    = '';
            }
        }
        echo json_encode( $anser_ar );
    }
    
    function del_payment(){
        if( $this->payment->del_payment($_POST['id']) ){
            $anser_ar['title']      = 'Платеж удален';
            $anser_ar['content']    = '';
            $anser_ar['close_link'] = '';
            $anser_ar['script']     = "ajax_update('#tabs-{$_POST['group_id']} .st_cart_payment_scroll_block','/ajax/student/get_payment_tbl/{$_POST['group_id']}/{$_POST['student_id']}/')";
        }
        else{
            $anser_ar['title']      = 'Произошла ошибка удаления платежа';
            $anser_ar['content']    = 'Повторите операцию еще раз';
        }
        
        echo json_encode( $anser_ar );
    }
}