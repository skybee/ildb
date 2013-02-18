<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class group extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('student_model', 'student', TRUE);
        $this->load->model('group_model', 'group', TRUE);
        $this->load->model('schedule_model', 'schedule', TRUE);
        $this->load->model('payment_model', 'payment', TRUE);
        $this->load->library('validform_lib');
        $this->load->library('schedule_lib');
        $this->load->helper('valid_data');
        $this->load->helper('date_convert');
        
        $_POST = post_valid( $_POST );
    }
    
    function index(){ show_404(); }
    
    function add_students(){
        
        $st_id_ar = $_POST['students_id_ar'];
        $group_id = $_POST['group_id'];
        
        if( isset($group_id) && count($st_id_ar) >= 1 ){
            foreach( $st_id_ar as $st_id ){
                $this->student->add_to_group( $group_id, $st_id, '0000-00-00' );
            }
            $anser_ar['title']      = 'Студенты добавленны в группу';
            $anser_ar['content']    = 'Обновите страницу, чтобы увидеть изменения';
        }
        else{
            $anser_ar['title']      = 'Ошибка добавления студентов';
            $anser_ar['content']    = 'возможно не указана группа или не выбраны студенты';
        }
        
        echo json_encode( $anser_ar );
    }
    
    function del_student_from_group(){
        
        if( $this->group->del_student_from_group( $_POST['gp_id'], $_POST['st_id']) ){
            $anser_ar['title']      = 'Студент удален из группы';
            $anser_ar['content']    = '';
            $anser_ar['script']     = "$('li#stud_line_{$_POST['st_id']}').css({display:'none'})";
        }
        else{
            $anser_ar['title']      = 'Ошибка! Студент не удален';
            $anser_ar['content']    = '';
        }
        
        echo json_encode( $anser_ar );
    }
    
    function upd_group(){
        
//        print_r($_POST);
        
        $_POST['start_lesson_date'] = date_to_timestamp( $_POST['start_lesson'] );
        $_POST['stop_lesson_date']  = date_to_timestamp( $_POST['stop_lesson'] );
        
        if( $this->group->upd_group_info($_POST) ){
            $anser_ar['title']      = 'Информация о группе обновлена';
            $anser_ar['content']    = '';
        }
        else{
            $anser_ar['title']      = 'Ошибка обновления';
            $anser_ar['content']    = '';
        }
        
        echo json_encode( $anser_ar );
    }
    
    function add_group(){

        if( $this->validform_lib->add_group( $_POST ) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Следующие поля были заполнены не правильно:<br />';
            $anser_ar['content']    .= $this->validform_lib->add_group( $_POST );
        }
//        elseif( !isset($_POST['teacher_for_group']) ){
//            $anser_ar['title']      = 'Ошибка добавления';
//            $anser_ar['content']    = 'Для группы не назначен препадаватель';
//        }
        elseif(     count($_POST['day']) != count($_POST['class']) 
                OR  count($_POST['day']) != count($_POST['start_lesson']) 
                OR  count($_POST['day']) != count($_POST['teacher']) 
                OR  count($_POST['day']) != count($_POST['lesson_long']) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Одно или несколько полей в рассписании не были выбранны';
        }
        else{
            
            //=== <Проверка пересечения в рассписании> ===//
            foreach( $_POST['day'] as $day => $val ){
                $stop_lesson = summ_time( $_POST['start_lesson'][$day], '+', $_POST['lesson_long'][$day] );
                //== проверка занятости кабинета ==//
                if( !$this->schedule_lib->check_lesson_valid($day, $_POST['class'][$day], $_POST['start_lesson'][$day], $stop_lesson) ){
                    $anser_ar['title']      = 'Ошибка добавления';
                    $anser_ar['content']    = 'Одно или несколько занятий пересекаются с уже существующими.<br /> Проверьте аудиторию и время занятий';
                    echo json_encode( $anser_ar );
                    return;
                }
                
                if( !$this->schedule_lib->check_teacher_valid($day, $_POST['start_lesson'][$day], $stop_lesson, $_POST['teacher'][$day]) ){
                    $anser_ar['title']      = 'Ошибка добавления';
                    $anser_ar['content']    = 'Один или несколько преподавателей заняты в выбранное Вами время';
                    echo json_encode( $anser_ar );
                    return;
                }
            }
            //=== </Проверка пересечения в рассписании> ===//
            
            $group_id = $this->group->add_group( $_POST );
            
            if( !$group_id ){
                $anser_ar['title']      = 'Ошибка добавления';
                $anser_ar['content']    = '';
            }
            else{
                $anser_ar['title']      = 'Группа успешно созданна';
                $anser_ar['content']    = '';
                $anser_ar['close_link'] = '/group_cart/'.$group_id.'/';
            }
        }
        
        echo json_encode( $anser_ar );
    }
    
    function upd_schedule(){
        if(     count($_POST['day']) != count($_POST['class']) 
                OR  count($_POST['day']) != count($_POST['start_lesson']) 
                OR  count($_POST['day']) != count($_POST['teacher']) 
                OR  count($_POST['day']) != count($_POST['lesson_long']) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Одно или несколько полей в рассписании не были выбранны';
        }
        else{
            //=== <Проверка пересечения в рассписании> ===//
            foreach( $_POST['day'] as $day => $val ){
                $stop_lesson = summ_time( $_POST['start_lesson'][$day], '+', $_POST['lesson_long'][$day] );
                //== проверка занятости кабинета ==//
                
                if( !isset($_POST['day_id'][$day]) ) $_POST['day_id'][$day] = false;
                if( !$this->schedule_lib->check_lesson_valid($day, $_POST['class'][$day], $_POST['start_lesson'][$day], $stop_lesson, $_POST['day_id'][$day]) ){
                    $anser_ar['title']      = 'Ошибка обновления';
                    $anser_ar['content']    = 'Одно или несколько занятий пересекаются с уже существующими.<br /> Проверьте аудиторию и время занятий';
                    echo json_encode( $anser_ar );
                    return;
                }
                
//                if( !$this->schedule_lib->check_teacher_valid($day, $_POST['start_lesson'][$day], $stop_lesson, $_POST['teacher'][$day]) ){
//                    $anser_ar['title']      = 'Ошибка обновления';
//                    $anser_ar['content']    = 'Один или несколько преподавателей заняты в выбранное Вами время';
//                    echo json_encode( $anser_ar );
//                    return;
//                }
            }
            //=== </Проверка пересечения в рассписании> ===//
            
            if( !$this->schedule->upd_from_group($_POST, $_POST['group_id']) ){
                $anser_ar['title']      = 'Ошибка обновления';
                $anser_ar['content']    = '';
            }
            else{
                $this->payment->update_group_payment( $_POST['group_id'], date("Y-m-d")  );
                $this->payment->update_group_payment( $_POST['group_id'], date("Y-m-d", strtotime("+ 1 week", strtotime( date("Y-m-d") ) ) ) );
                $anser_ar['title']      = 'Расписание обновленно';
                $anser_ar['content']    = '';
            }
        }
        echo json_encode( $anser_ar );
    }
    
    function del_group(){
        
        $i=0;
        $id_str = '';
        foreach( $_POST['id_ar'] as $id ){
            if($i)
                $id_str .= ', ';
            $id_str .= $id;
            $i++;
        }
        
        if( $this->db->query("UPDATE `school_groups` SET `status`='404' WHERE `id` IN ({$id_str}) ") ){
            $this->db->query("DELETE FROM `timetable_set` WHERE `school_groups_id` IN ({$id_str}) ");
            $this->db->query("DELETE FROM `timetable_changes` WHERE `school_groups_id` IN ({$id_str}) ");
            
            $anser_ar['title']      = 'Выбранные группы удалены';
            $anser_ar['content']    = '';
        }
        else{
            $anser_ar['title']      = 'Ошибка удаления';
            $anser_ar['content']    = '';
        }
        
        echo json_encode( $anser_ar );
    }
    
}
