<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class schedule extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('schedule_model', 'schedule', TRUE);
        $this->load->helper('valid_data');
        $this->load->helper('date_convert');
        
        $_POST = post_valid( $_POST );
    }
    
    function drag_change(){ //изменение занятия для постоянного расписания
        $_POST['stoptime'] = get_timestop($_POST['starttime'], $_POST['timesize']);
        $this->schedule->drag_change($_POST);
    }
    
    function realy_drag_change(){
        $_POST['stoptime'] = get_timestop($_POST['starttime'], $_POST['timesize']);
        $this->schedule->realy_drag_change($_POST);
//        print_r($_POST);
    }
    
    function change_timesize(){
        
        $_POST['stoptime']  = get_timestop($_POST['starttime'], $_POST['timesize']);
        $this->schedule->realy_drag_change($_POST);
        
        $anser_ar['title']      = 'Время занятие измено';
        $anser_ar['content']    = '<pre>'.print_r($_POST, true).'</pre>';
//        $anser_ar['script']     = "alert(123)";
        
        echo json_encode( $anser_ar );
    }
}