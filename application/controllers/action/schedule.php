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
        
        if( $_POST['date'] != false ){
            $this->schedule->realy_drag_change($_POST);
        }
        else{
            $this->schedule->drag_change($_POST);
        }
        
        $block_h = 29 + ($_POST['timesize']-2)*18; //дефолт 2 ячейки(29px)
        $block_h .= 'px';
        
        $anser_ar['title']      = 'Время занятие измено';
        $anser_ar['content']    = '';
        $anser_ar['script']     = ' $(".lesson_data .visual_drag").css({height:"'.$block_h.'"});
                                    $(".lesson_data .sch_drag").attr("timesize", "'.$_POST['timesize'].'");
                                    del_street_light();
                                  ';
        
        echo json_encode( $anser_ar );
    }
}