<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class teacher extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('teacher_model', 'teacher', TRUE);
        $this->load->library('validform_lib');
        $this->load->helper('valid_data');
        $this->load->helper('date_convert');
        
        $_POST = post_valid( $_POST );
    }
    
    function index(){ show_404(); }
    
    function add_teacher(){
//        print_r($_POST);
        if( $this->validform_lib->add_teacher( $_POST ) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Следующие поля были заполнены не правильно:<br />';
            $anser_ar['content']    .= $this->validform_lib->add_teacher( $_POST );
        }
        else{
            $teacher_id = $this->teacher->add_teacher();
            if( $teacher_id ){
                $this->teacher->add_lang_to_teacher( $teacher_id, $_POST['lang'] );
                if( $_POST['group'] == true )
                    $this->teacher->add_teacher_for_group( $teacher_id, $_POST['group']);
            
                $anser_ar['title']      = 'Преподаватель добавлен в базу';
                $anser_ar['content']    = '';
                $anser_ar['close_link'] = '/teacher_cart/'.$teacher_id.'/';
            }
            else{
                $anser_ar['title']      = 'Ошибка добавления';
                $anser_ar['content']    = '';
            }
        }
        
        echo json_encode( $anser_ar );
    }
    
    function update_teacher(){
//        print_r($_POST);
        if( $this->validform_lib->add_teacher( $_POST ) ){
            $anser_ar['title']      = 'Ошибка обновления';
            $anser_ar['content']    = 'Следующие поля были заполнены не правильно:<br />';
            $anser_ar['content']    .= $this->validform_lib->add_teacher( $_POST );
        }
        else{
            if( !$this->teacher->upd_user_info( $_POST ) ){
                $anser_ar['title']      = 'Ошибка обновления';
                $anser_ar['content']    = 'Произошла ошибка, обновление не выполненно';
            }
            else{
                $this->teacher->upd_teacher_lang( $_POST['lang'], $_POST['user_id']);
                
                $anser_ar['title']      = 'Редактирование выполненно';
                $anser_ar['content']    = 'Данные преподавателя были изменены';
                $anser_ar['close_link'] = '/teacher_cart/'.$_POST['user_id'].'/';
            }
        }
        
        echo json_encode( $anser_ar );
    }
}