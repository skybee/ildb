<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class student extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('student_model', 'student', TRUE);
        $this->load->library('validform_lib');
        $this->load->library('schedule_lib');
        $this->load->helper('valid_data');
        $this->load->helper('date_convert');
        
        $_POST = post_valid( $_POST );
    }
    
    function index(){ show_404(); }
    
    
    function add_student(){
        if( $this->validform_lib->add_student( $_POST ) ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Следующие поля были заполнены не правильно:<br />';
            $anser_ar['content']    .= $this->validform_lib->add_student( $_POST );
        }
        else{
            if( $_POST['option'] == 1 ){ //добавление студента в группу
                $student_id = $this->student->add_student( $_POST );
                if( $student_id ){
                    $this->student->add_to_group( $_POST['group'], $student_id, $_POST['test_lesson_date']  );
                    
                    if( $_POST['test_lesson_date'] )
                        $this->student->set_test_lesson_date( $_POST['test_lesson_date'], $student_id );
                    
                    $anser_ar['title']      = 'Студент добавлен в базу';
                    $anser_ar['content']    = '';
                    $anser_ar['close_link'] = '/student_cart/'.$student_id.'/';
                    $anser_ar['new_html']   = '';
                }
                else{
                    $anser_ar['title']      = 'Ошибка добавления';
                    $anser_ar['content']    = '';
                }
                
                
            }
            elseif( $_POST['option'] == 2 ){ //Добавление индивидуально обучающегося студента 
                
                //проверка выбран ли день
                if( !isset($_POST['day']) ){ 
                    $anser_ar['title']      = 'Ошибка добавления';
                    $anser_ar['content']    = 'Не указан день занятия';
                }
                //проверка, указан ли для дне преподователь, аудитория, время
                elseif(     count($_POST['day']) != count($_POST['class']) 
                        OR  count($_POST['day']) != count($_POST['start_lesson']) 
                        OR  count($_POST['day']) != count($_POST['teacher'])
                        OR  !isset($_POST['individ_lang']) ){
//                    print_r($_POST);
                    $anser_ar['title']      = 'Ошибка добавления';
                    $anser_ar['content']    = 'Одно или несколько полей в рассписании не были выбранны';
                }
                //занесение студента индивидуального обучения
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
                    
                    
                    $student_id = $this->student->add_individual_student( $_POST );
                    if( $student_id ){
                        $anser_ar['title']      = 'Студент добавлен в базу';
                        $anser_ar['content']    = '';
                        $anser_ar['close_link'] = '/student_cart/'.$student_id.'/';
                    }
                    else{
                        $anser_ar['title']      = 'Ошибка добавления';
                        $anser_ar['content']    = '';
                    }   
                }
            }
            elseif( $_POST['option'] == 3 ){
                if( count($_POST['op3_start_lesson']) != count($_POST['op3_day']) OR !isset($_POST['op3_day'])  ){
                    $anser_ar['title']      = 'Ошибка добавления';
                    $anser_ar['content']    = 'Вы не указали время занятия';
                }
                else{
                    $student_id = $this->student->add_student( $_POST );
                    if( $student_id ){
                        $this->student->add_without_group($_POST, $student_id);
                        $anser_ar['title']      = 'Студент добавлен в базу';
                        $anser_ar['content']    = '';
                        $anser_ar['close_link'] = '/student_cart/'.$student_id.'/';
                    }
                }
            }
            else{
                $anser_ar['title']      = 'Ошибка добавления';
                $anser_ar['content']    = '';
            }
        }
        
        echo json_encode( $anser_ar );
    }
    
    private function get_individ_group_id( $student_id ){ //принимает id студента, возвращает id индивидуальной группы или false
        $query = $this->db->query("         SELECT school_groups.id 
                                            FROM 
                                                `school_groups`, `student`, `student_school_groups` 
                                            WHERE
                                                school_groups.group_format_id = 1
                                                AND
                                                school_groups.id = student_school_groups.school_groups_id
                                                AND
                                                student_school_groups.student_id = {$student_id}
                                        ");
                $row = $query->row_array();
                if( isset($row['id']) ){
                    return $row['id'];
                }
                else 
                    return FALSE;
    }

    function del_student(){
//        print_r($_POST);
        
        if( $_POST['action'] == 'arhive' ){
            foreach( $_POST['id_ar'] as $st_id ){
                $st_id = (int) $st_id;
                
                // <удалени записи из расписания(для индивид)>
                $individ_group_id = $this->get_individ_group_id( $st_id );
                if( $individ_group_id ){
                    $this->db->query("DELETE FROM `timetable_set`       WHERE `school_groups_id` = {$individ_group_id} ");
                    $this->db->query("DELETE FROM `timetable_changes`   WHERE `school_groups_id` = {$individ_group_id} ");
                }    
                // </удалени записи из расписания(для индивид)>
                
                $this->db->query("UPDATE `student` SET `delete`='arhive' WHERE `id` = {$st_id} ");
            }
            
            $anser_ar['title']      = 'Выбранные студенты перемещенны в архив';
            $anser_ar['content']    = ''; 
        }
        elseif( $_POST['action'] == 'delete' ){
            foreach( $_POST['id_ar'] as $st_id ){
                $st_id = (int) $st_id;
                
                // <удалени записи из расписания(для индивид)>
                $individ_group_id = $this->get_individ_group_id( $st_id );
                if( $individ_group_id ){
                    $this->db->query("DELETE FROM `timetable_set`       WHERE `school_groups_id` = {$individ_group_id} ");
                    $this->db->query("DELETE FROM `timetable_changes`   WHERE `school_groups_id` = {$individ_group_id} ");
                }    
                // </удалени записи из расписания(для индивид)>
                    
                $this->db->query("UPDATE `student` SET `delete`='delete' WHERE `id` = {$st_id} ");
                $this->db->query("DELETE FROM `student_school_groups` WHERE `student_id` = {$st_id} ");
            }
            
            $anser_ar['title']      = 'Выбранные студенты удалены';
            $anser_ar['content']    = ''; 
        }
        
        echo json_encode( $anser_ar );
    }
    
    function update_student(){
        if( $this->validform_lib->add_student( $_POST ) ){
            $anser_ar['title']      = 'Ошибка обновления';
            $anser_ar['content']    = 'Следующие поля были заполнены не правильно:<br />';
            $anser_ar['content']    .= $this->validform_lib->add_student( $_POST );
        }
        else{
            if( $this->student->update_student( $_POST ) ){
                $anser_ar['title']      = 'Информация о студенте обновлена';
                $anser_ar['content']    = '';
                $anser_ar['close_link'] = '/student_cart/'.$_POST['student_id'].'/';
            }
            else{
                $anser_ar['title']      = 'Произошла ошибка в процессе обновления';
                $anser_ar['content']    = '';
            }
        }
        echo json_encode( $anser_ar );
    }

    function add_to_group(){
        if( $_POST['start_lesson_date'] == false ){
            $anser_ar['title']      = 'Ошибка добавления';
            $anser_ar['content']    = 'Вы не указали дату начала занятий';
        }
        else{                                
            if( $this->student->add_to_group( $_POST['group_id'], $_POST['student_id'], '', $_POST['start_lesson_date'] ) ){
                $anser_ar['title']      = 'Студент добавлен в группу';
                $anser_ar['content']    = '';
                $anser_ar['script']     = "ajax_update('#ajax_update_groups','/ajax/student/get_groups_page/{$_POST['student_id']}/')";
            }
            else{
                $anser_ar['title']      = 'Ошибка добавления';
                $anser_ar['content']    = 'Попробуйте выполнить операцию повторно';
            }
        }
        echo json_encode( $anser_ar );
    }
    
    function del_from_group(){
        if( $this->student->del_from_group($_POST['id']) ){
            $anser_ar['title']      = 'Студент удален из группы';
            $anser_ar['content']    = '';
            $anser_ar['script']     = "ajax_update('#ajax_update_groups','/ajax/student/get_groups_page/{$_POST['student_id']}/')";
        }
        else{
            $anser_ar['title']      = 'Ошибка удаления';
            $anser_ar['content']    = '';
            $anser_ar['script']     = "ajax_update('#ajax_update_groups','/ajax/student/get_groups_page/{$_POST['student_id']}/')";
        }
        echo json_encode( $anser_ar );
    }
    
    function paused_in_group(){
        if(  date_to_time($_POST['pause_start']) >= date_to_time($_POST['pause_stop'])  OR date_to_time($_POST['pause_stop']) <= time() ){
            $anser_ar['title']      = 'Ошибка даты';
            $anser_ar['content']    = 'Проверьте указанный Вами временной интервал';
        }
        else{
            if( $this->student->paused_in_group( $_POST['st_gp_id'], $_POST['pause_start'], $_POST['pause_stop'] ) ){
                $anser_ar['title']      = 'Занятия студента приостановленны';
                $anser_ar['content']    = '';
                $anser_ar['script']     = "ajax_update('#ajax_update_groups','/ajax/student/get_groups_page/{$_POST['student_id']}/')";
            }
            else{
                $anser_ar['title']      = 'Произошла ошибка';
                $anser_ar['content']    = 'Попробуйте перегрузить страницу и повторить операцию';
                $anser_ar['script']     = "ajax_update('#ajax_update_groups','/ajax/student/get_groups_page/{$_POST['student_id']}/')";
            }
        }
        echo json_encode( $anser_ar );
    }
    
    function del_pause_in_group(){
        if( $this->student->paused_in_group( $_POST['st_gp_id'], $_POST['pause_start'], $_POST['pause_stop'] ) ){
            $anser_ar['title']      = 'Занятия студента возноблены';
            $anser_ar['content']    = '';
            $anser_ar['script']     = "ajax_update('#ajax_update_groups','/ajax/student/get_groups_page/{$_POST['student_id']}/')";
        }
        else{
            $anser_ar['title']      = 'Произошла ошибка';
            $anser_ar['content']    = 'Попробуйте перегрузить страницу и повторить операцию';
            $anser_ar['script']     = "ajax_update('#ajax_update_groups','/ajax/student/get_groups_page/{$_POST['student_id']}/')";
        }
        echo json_encode( $anser_ar );
    }
    
    function add_certificate(){
        
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'pdf|gif|jpg|png';
	$config['max_size']         = '2000';
	$config['max_width']        = '2000';
	$config['max_height']       = '2000';
        
        $this->load->library('upload', $config);
        
        if ( !$this->upload->do_upload('img') ){
            $anser_ar['title']      = 'Ошибка загрузки файла';
            $anser_ar['content']    = $this->upload->display_errors('','');
	}
	else{
            $file_data_ar = $this->upload->data();
            $_POST['file_name']     = $file_data_ar['file_name'];
            $_POST['name']          = $file_data_ar['raw_name'];
           
            if( $this->student->add_certificate($_POST) ){
                $anser_ar['title']      = 'Сертификат успешно загружен';
                $anser_ar['content']    = '';
                $anser_ar['script']     = "ajax_update('#tabs2-{$_POST['group_id']}','/ajax/student/get_certificate/{$_POST['group_id']}/{$_POST['student_id']}/')";
            }
	}
        echo json_encode( $anser_ar );
    }
    
    function del_certificate(){
        if( $this->student->del_certificate($_POST['id']) ){
            $anser_ar['title']      = 'Сертификат удален';
            $anser_ar['content']    = '';
            $anser_ar['script']     = "ajax_update('#tabs2-{$_POST['group_id']}','/ajax/student/get_certificate/{$_POST['group_id']}/{$_POST['student_id']}/')";
        }
        else{
            $anser_ar['title']      = 'Ошибка удаления сертификата';
            $anser_ar['content']    = '';
            $anser_ar['script']     = "ajax_update('#tabs2-{$_POST['group_id']}','/ajax/student/get_certificate/{$_POST['group_id']}/{$_POST['student_id']}/')";
        }
        echo json_encode( $anser_ar );
    }
    
    
    function change_star(){
        $this->db->query("UPDATE `student` SET `star`='{$_POST['st_star']}' WHERE id='{$_POST['st_id']}' ");
    }
}

