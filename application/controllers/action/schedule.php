<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class schedule extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('schedule_model',    'schedule', TRUE);
        $this->load->model('teacher_model',     'teacher',  TRUE);
        $this->load->library('schedule_lib');
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
        
        if( $_POST['date'] != false ){ //перенос занятия в реальном расписании  
            if( !$this->schedule_lib->check_lesson_valid_realy($_POST['day'], $_POST['classroom'], $_POST['starttime'], $_POST['stoptime'], $_POST['date'], $_POST['lesson_id']) ){
                $anser_ar['title']      = 'Ошибка! - Конфликт времени';
                $anser_ar['content']    = 'Вероятно в выбранное вами время уже идут занятия';
                
                echo json_encode( $anser_ar );
                return;
            }
            $this->schedule->realy_drag_change($_POST);
        }
        else{ //перенос занятия в стандартном расписании
            if( !$this->schedule_lib->check_lesson_valid($_POST['day'], $_POST['classroom'], $_POST['starttime'], $_POST['stoptime'], $_POST['lesson_id']) ){
                $anser_ar['title']      = 'Ошибка! - Конфликт времени';
                $anser_ar['content']    = 'Вероятно в выбранное вами время уже идут занятия';
                
                echo json_encode( $anser_ar );
                return;
            }
            $this->schedule->drag_change($_POST);
        }
        
        $block_h = 29 + ($_POST['timesize']-2)*18; //дефолт 2 ячейки(29px)
        $block_h .= 'px';
        
        $anser_ar['title']      = 'Время занятие измено';
        $anser_ar['content']    = 'Не забудьте предупредить студентов и преподавателя об изменение графика.';
        $anser_ar['script']     = ' $(".lesson_data .visual_drag").css({height:"'.$block_h.'"});
                                    $(".lesson_data .sch_drag").attr("timesize", "'.$_POST['timesize'].'");
                                    del_street_light();
                                  ';
        
        echo json_encode( $anser_ar );
    }
    
    function change_teacher(){
        $_POST['stoptime']      = get_timestop($_POST['starttime'], $_POST['timesize']);
        $_POST['teacher_id']    = $_POST['new_teacher_id'];
        $teacher_info_ar        = $this->teacher->get_teacher_info( $_POST['new_teacher_id'] ); 
        
        
        if( $_POST['date'] != false ){ //замена преподавателя в реальном рассписании
            if( !$this->schedule_lib->check_teacher_valid_realy($_POST['day'], $_POST['starttime'], $_POST['stoptime'], $_POST['new_teacher_id'], $_POST['new_date']) ){
                $anser_ar['title']      = 'Ошибка! - Конфликт времени';
                $anser_ar['content']    = 'Вероятно преподаватель занят в этот промежуток времени'; //'<pre>'.print_r($_POST,true).'</pre>';

                echo json_encode( $anser_ar );
                return;
            }
            else
                $this->schedule->realy_drag_change($_POST);
        }
        else{ //замена преподавателя в стандартном рассписании
            if( !$this->schedule_lib->check_teacher_valid($_POST['day'], $_POST['starttime'], $_POST['stoptime'], $_POST['new_teacher_id']) ){
                $anser_ar['title']      = 'Ошибка! - Конфликт времени';
                $anser_ar['content']    = 'Вероятно преподаватель занят в этот промежуток времени';//'<pre>'.print_r($_POST,true).'</pre>';

                echo json_encode( $anser_ar );
                return;
            }
            else
                $this->schedule->drag_change($_POST); 
        }
        
        $anser_ar['title']      = 'Преподаватель заменен';
        $anser_ar['content']    = ''; //'<pre>'.print_r($_POST,true).'</pre>';
        $anser_ar['script']     = ' drag = $(".lesson_data");
                                    $(".sch_drag_teachername",drag).attr("teacher_id", "'.$_POST['new_teacher_id'].'");
                                    $(".sch_drag_teachername",drag).text("'.$teacher_info_ar['fio_name'].' '.$teacher_info_ar['fio_sname'].'")';
        
        echo json_encode( $anser_ar );
    }
    
    function cancel_lesson(){
        $_POST['stoptime'] = get_timestop($_POST['starttime'], $_POST['timesize']);
        $change_id = $this->schedule->realy_drag_change($_POST);
        $this->db->query("UPDATE `timetable_changes` SET `cancel`='yes' WHERE `id`='{$change_id}' ");
        
        $anser_ar['title']      = 'Занятие отменено';
        $anser_ar['content']    = 'Не забудьте предупредить студентов и преподавателя об изменение графика.';
        $anser_ar['script']     = ' $(".lesson_data").empty();
                                    del_street_light();
                                  ';
        echo json_encode( $anser_ar );
    }
}