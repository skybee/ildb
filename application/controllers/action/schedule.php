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
}