<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class group extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('student_model', 'student', TRUE);
        $this->load->model('group_model', 'group', TRUE);
        $this->load->model('schedule_model', 'schedule', TRUE);
        $this->load->library('validform_lib');
        $this->load->helper('valid_data');
        $this->load->helper('date_convert');
        
        $_POST = post_valid( $_POST );
    }
    
    function index(){ show_404(); }
    

    function upd_group(){
        sleep(2);
        
        $anser_ar['title']      = 'Ошибка обновления';
        $anser_ar['content']    = 'Не удалось выполнить запрос к БД';
        
        echo json_encode( $anser_ar );
    }
    
    function add_students(){
        sleep(2);
        
        $anser_ar['title']      = 'Ошибка добавления студентов';
        $anser_ar['content']    = 'Не удалось выполнить запрос к БД';
        
        echo json_encode( $anser_ar );
    }
    
    function add_group(){
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
        if( $this->validform_lib->add_group( $_POST ) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Следующие поля были заполнены не правильно:<br />';
            $anser_ar['content']    .= $this->validform_lib->add_group( $_POST );
        }
        elseif( !isset($_POST['teacher_for_group']) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Для группы не назначен препадаватель';
        }
        elseif(     count($_POST['day']) != count($_POST['class']) 
                OR  count($_POST['day']) != count($_POST['start_lesson']) 
                OR  count($_POST['day']) != count($_POST['teacher']) 
                OR  count($_POST['day']) != count($_POST['lesson_long']) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Одно или несколько полей в рассписании не были выбранны';
        }
        else{
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
        elseif( !$this->schedule->upd_from_group($_POST, $_POST['group_id']) ){
            $anser_ar['title']      = 'Ошибка обновления';
            $anser_ar['content']    = '';
        }
        else{
            $anser_ar['title']      = 'Расписание обновленно';
            $anser_ar['content']    = '';
        }
        echo json_encode( $anser_ar );
    }
    
}
