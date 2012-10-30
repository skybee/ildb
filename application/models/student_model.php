<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class student_model extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('date_convert');
        $this->load->library('info_db_lib');
    }
    
    
    function add_student( $dataAr ){
        if( !$dataAr['sale'] ) $dataAr['sale'] = 0;
        
        if( $this->db->query("INSERT INTO `student` SET 
                            `fio`       ='{$dataAr['fio_sname']} {$dataAr['fio_name']} {$dataAr['fio_mname']}',
                            `fio_name`  ='{$dataAr['fio_name']}',
                            `fio_sname` ='{$dataAr['fio_sname']}',
                            `fio_mname` ='{$dataAr['fio_mname']}',
                            `mail`      ='{$dataAr['email']}',
                            `phone`     ='{$dataAr['phone']}',
                            `address`   ='{$dataAr['address']}',
                            `comment`   ='{$dataAr['comment']}',
                            `from_know` ='{$dataAr['from_know']}',
                            `discount`  ='{$dataAr['sale']}',
                            `birthday`  ='".date_to_timestamp($dataAr['birthday_date'])."',
                            `date`      ='".date_to_timestamp($dataAr['today_date'])."'
                            ")
          )
          return $this->db->insert_id();                    
       else return FALSE;
    }
    
    function add_individual_student( $dataAr ){
        $student_id = $this->add_student($dataAr);
        
        //создание индивидуальной группы
        $this->db->query("INSERT INTO `school_groups` 
            SET 
                `group_format_id` = 1, 
                `name`      = 'Индивидуал',
                `lang_id`   = {$dataAr['individ_lang']},
                `level_id`  = '1' ");
        $group_id = $this->db->insert_id();
        
        //связка группы и студента
        $this->db->query("INSERT INTO `student_school_groups` SET `student_id`={$student_id}, `school_groups_id`={$group_id} ");
        
        //связка преподавателей и группы
        foreach( $dataAr['teacher'] as $teacher_id )
            $this->db->query("INSERT INTO `school_groups_users` SET `school_groups_id`={$group_id}, `users_id`={$teacher_id} ");
            
        //установка дней и времени занятий (связка учителей,гуппу,аудиторию)
        foreach( $dataAr['day'] as $day_nmbr => $val )
            $this->db->query("INSERT INTO `timetable_set` 
                              SET
                                `school_groups_id`  = '{$group_id}',
                                `day`               = '{$day_nmbr}',
                                `classroom_id`      = '{$dataAr['class'][$day_nmbr]}',
                                `user_id`           = '{$dataAr['teacher'][$day_nmbr]}',
                                `time_start`        = '{$dataAr['start_lesson'][$day_nmbr]}',
                                `time_stop`         = SEC_TO_TIME( TIME_TO_SEC('{$dataAr['start_lesson'][$day_nmbr]}') + TIME_TO_SEC('{$dataAr['lesson_long'][$day_nmbr]}') )
                              ");
        
        //установка статуса "учащиеся"
        $this->set_status( 1, $student_id);
        
        return $student_id;
    }
    
    function update_student( $dataAr ){
        if( $this->db->query("  UPDATE `student`
                                SET
                                    `fio`           ='{$dataAr['fio_sname']} {$dataAr['fio_name']} {$dataAr['fio_mname']}',
                                    `fio_name`      ='{$dataAr['fio_name']}',
                                    `fio_sname`      ='{$dataAr['fio_sname']}',
                                    `fio_mname`      ='{$dataAr['fio_mname']}',
                                    `address`       ='{$dataAr['address']}',
                                    `phone`         ='{$dataAr['phone']}',
                                    `mail`          ='{$dataAr['email']}',
                                    `status_id`     ='{$dataAr['status_id']}',
                                    `date`          ='".date_to_timestamp($dataAr['add_date'])."',
                                    `discount`      ='{$dataAr['sale']}',
                                    `birthday`      ='".date_to_timestamp($dataAr['birthday_date'])."',
                                    `business_info` ='{$dataAr['business_info']}',
                                    `from_know`     ='{$dataAr['from_know']}',
                                    `comment`       ='{$dataAr['comment']}'
                                WHERE
                                    `id`= {$dataAr['student_id']}
                            ")
          ) return TRUE;
         else
             return FALSE;          
    }
    
    function add_to_group( $group_id, $student_id, $test_lesson, $start_lesson = false ){
        $group_id   = (int) $group_id;  
        $student_id = (int) $student_id;
        
        $query = $this->db->query(" INSERT INTO `student_school_groups` 
                                    SET 
                                        `student_id`        ={$student_id}, 
                                        `school_groups_id`  ={$group_id},
                                        `test_lesson`       ='".date_to_timestamp($test_lesson)."',
                                        `start_lesson_date` ='".date_to_timestamp($start_lesson)."'     
                         ");
        $this->set_status( 1, $student_id);
        
        return $query;
    }
    
    function add_without_group( $dataAr, $student_id ){
        $info_obj = new $this->info_db_lib;
        
        $info_obj->count_lesson     = $dataAr['count_lesson'];
        $info_obj->lesson_form      = $dataAr['lesson_form'];
        $info_obj->lesson_length    = $dataAr['lesson_length'];
        $info_obj->prefer_lang      = $dataAr['prefer_lang'];
        
        foreach( $dataAr['op3_start_lesson'] as $key => $time){
            $info_obj->schedule_ar[$key] = $time;
        }
        
        $serial_obj = serialize($info_obj);
        
        $this->db->query("UPDATE `student` SET `info_obj`='{$serial_obj}' WHERE `id`='{$student_id}' ");
        $this->set_status( 3, $student_id); 
    }
    
    
    function del_from_group( $student_group_id ){
        return $this->db->query("DELETE FROM `student_school_groups` WHERE `id`='{$student_group_id}' ");
    }
    
    function paused_in_group( $st_gp_id, $start_pause, $stop_pause ){
        return $this->db->query("   UPDATE `student_school_groups` 
                                    SET
                                        `start_pause`   ='".date_to_timestamp($start_pause)."',
                                        `stop_pause`   ='".date_to_timestamp($stop_pause)."'   
                                    WHERE
                                        `id`='{$st_gp_id}'
                                ");
    }
    
    function add_certificate( $data_ar ){
        return $this->db->query("INSERT INTO `certificate` 
                                SET
                                    `name`              = '{$data_ar['name']}',
                                    `student_id`        = '{$data_ar['student_id']}',
                                    `school_groups_id`  = '{$data_ar['group_id']}',
                                    `img`               = '{$data_ar['file_name']}' ");
    }
    
    function get_certificate( $student_id ){
        $query = $this->db->query(" SELECT 
                                        certificate.*, level.name AS `level_name`
                                    FROM 
                                        `certificate`, `level`, `school_groups`
                                    WHERE
                                        certificate.student_id = '$student_id'
                                        AND
                                        certificate.school_groups_id = school_groups.id
                                        AND
                                        school_groups.level_id = level.id ");
        $return_ar = null;                                
        foreach ( $query->result_array() as $row )
            $return_ar[ $row['school_groups_id'] ][] = $row;
        
        return $return_ar; 
    }
    
    function del_certificate( $id ){
        $query = $this->db->query(" SELECT `img` FROM `certificate` WHERE `id`='$id' ");
        $row = $query->row();
        @unlink('./upload/'.$row->img);
        return $this->db->query("DELETE FROM `certificate` WHERE `id`='$id' ");
    }
    
    function set_status( $status_id, $student_id){
        $this->db->query("UPDATE `student` SET `status_id`='{$status_id}' WHERE `id`='{$student_id}' ");
    }
    
    function set_test_lesson_date( $date_str, $student_id ){
        $timestamp = date_to_timestamp($date_str);
        $this->db->query("UPDATE `student` SET `test_lesson`='{$timestamp}' WHERE `id`='{$student_id}' ");
    }
    
    
    function get_students_with_lang_group( $param ){
        $query = $this->db->query("
                        SELECT 
                            student.*, 
                            school_groups.name AS `group_name`, school_groups.id AS `group_id`, 
                            lang.short_name AS `lang_name`,
                            lang.id AS `lang_id`
                        FROM
                            `student`, `school_groups`, `student_school_groups`, `lang`
                        WHERE
                            student.id = student_school_groups.student_id
                            AND
                            school_groups.id = student_school_groups.school_groups_id
                            AND 
                            school_groups.lang_id = lang.id
                            AND
                            student.delete = '{$param}'
                        GROUP BY student_school_groups.id
                        ORDER BY student.fio
                        ");
        $result_ar = NULL;                    
        foreach ( $query->result_array() as $row ){
            foreach( $row as $key => $val ){
                if( $key == 'group_name' )
                    $result_ar[$row['id']][$key][$row['group_id']] = $val;
                elseif( $key == 'lang_name' )
                    $result_ar[$row['id']][$key][$row['lang_id']] = $val;
                else
                    $result_ar[$row['id']][$key] = $val;
            }
        }
            
        
        return $result_ar;                    
    }
    
    function get_del_student(){
        $query = $this->db->query(" SELECT * FROM `student` WHERE `delete` = 'delete' ");
        
        $return_ar = NULL;
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    function get_students_for_status($status = FALSE){
        $status = (int) $status;
        $where = '';
        if( $status )
            $where = " AND `status_id`={$status} ";
        $query = $this->db->query("SELECT * FROM `student` WHERE `delete`='live' {$where} ");
        
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    function get_students_without_group(){
       $query = $this->db->query("  SELECT * FROM `student`
                                    WHERE 
                                        `id` NOT IN (SELECT `student_id` FROM `student_school_groups`) 
                                        AND
                                        `delete` = 'live' "); 
       $return_ar = NULL;
       foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    function get_student_info( $student_id ){
        $student_id = (int) $student_id;
        
//        $query = $this->db->query("
//                                SELECT 
//                                    student.*, student_status.name AS `status`
//                                FROM 
//                                    `student`, `student_status`
//                                WHERE 
//                                    student.id='{$student_id}' 
//                                    AND 
//                                    student.status_id = student_status.id ");
        $query = $this->db->query("
                                SELECT 
                                    student.* 
                                    -- , (SELECT student_school_groups.school_groups_id FROM `student_school_groups` WHERE student_school_groups.student_id = student.id ) AS `group_id`
                                FROM 
                                    `student`
                                WHERE 
                                    student.id='{$student_id}' ");
        return $query->row_array();
    }
    
    function get_individual_group_id( $student_id ){
        $query = $this->db->query(" SELECT school_groups.id 
                                    FROM 
                                        `student_school_groups`, `school_groups`
                                    WHERE 
                                        student_school_groups.student_id = {$student_id}
                                        AND
                                        student_school_groups.school_groups_id = school_groups.id
                                        AND
                                        school_groups.group_format_id = 1
                                    ");
        if( $query->num_rows() ){
            foreach( $query->result_array() as $row ){
                $result_ar[] = $row['id'];
            }
            return $result_ar;
        }
        else 
            return FALSE;
    }
    
    
    function is_individual( $student_id ){
        $query = $this->db->query(" SELECT school_groups.group_format_id 
                                    FROM 
                                        `school_groups`, `student_school_groups`
                                    WHERE
                                        student_school_groups.student_id = '{$student_id}'
                                        AND
                                        student_school_groups.school_groups_id = school_groups.id ");
        
        foreach( $query->result_array() as $row ){
            if( $row['group_format_id'] == 1 )
                return TRUE;
        }
        return FALSE;
    }
    
    
    
    
    
    
    
    
}