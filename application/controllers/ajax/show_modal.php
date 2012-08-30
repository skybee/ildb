<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class show_modal extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('valid_data');
        
        $_POST = post_valid( $_POST );
    }
    
    
    function schedule_time(){
        if( isset($_POST['lesson_id']) ){
            $return_ar['title']     = 'Изменение длительность занятия';
            $return_ar['content']   = $this->load->view('ajax/modal_window/shedule_time_view', $_POST, TRUE );
        }
        else{
            $return_ar['title']     = 'Ошибка';
            $return_ar['content']   = 'Не выбранно занятие для редактирования';
        }
        
        echo json_encode($return_ar);
    }
    
}