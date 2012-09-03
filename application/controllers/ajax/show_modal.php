<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class show_modal extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('valid_data');
        $this->load->model('list_model','list');
        
        $_POST = post_valid( $_POST );
    }
    
    private function is_less_checked(){
        if( !isset($_POST['lesson_id']) ){
            $return_ar['title']     = 'Ошибка';
            $return_ar['content']   = 'Не выбранно занятие для редактирования';
            echo json_encode($return_ar);
            return FALSE;
        }
        else
            return TRUE;
    }
    
    
    function schedule_time(){
        if( $this->is_less_checked() ){
            $return_ar['title']     = 'Изменение длительность занятия';
            $return_ar['content']   = $this->load->view('ajax/modal_window/schedule_time_view', $_POST, TRUE );
        
            echo json_encode($return_ar);
        }
    }
    
    function schedule_teacher(){
        if( $this->is_less_checked() ){
            
            $_POST['teachers_list']  = $this->list->get_teacher_lang();
            
            $return_ar['title']     = 'Замена преподавателя';
            $return_ar['content']   = $this->load->view('ajax/modal_window/schedule_teacher_view', $_POST, TRUE );
        
            echo json_encode($return_ar);
        }
    }
    
}