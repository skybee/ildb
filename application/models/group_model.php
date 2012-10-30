<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class group_model extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    

    function get_groups(){
        $query = $this->db->query("
                                    SELECT 
                                        school_groups.*, school_groups.id AS `group_id`, lang.name AS `lang_name`, lang.short_name AS `lang_sname`, level.name AS `level_name`,
                                        (SELECT 
                                            COUNT(student.id) 
                                            FROM 
                                                `student`,`student_school_groups`
                                            WHERE
                                                student.id = student_school_groups.student_id
                                                AND
                                                student_school_groups.school_groups_id = `group_id`
                                         ) AS `cnt_student`
                                    FROM
                                        `school_groups`, `lang`, `level`
                                    WHERE     
                                        school_groups.lang_id   = lang.id
                                        AND
                                        school_groups.level_id  = level.id
                                        AND
                                        school_groups.group_format_id != 1
                                        AND
                                        school_groups.status != 404
                                    GROUP BY  school_groups.id
                                  ");
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    function get_individ_groups(){
        $query = $this->db->query(" SELECT 
                                        school_groups.*, 
                                        student.id AS 'student_id', student.id AS 'link_id', student.fio_name, student.fio_sname, student.fio_mname,
                                        lang.short_name AS 'lang', lang.color AS `lang_color`
                                    FROM 
                                        `school_groups`, `student`, `student_school_groups`, `lang`
                                    WHERE
                                        student_school_groups.student_id = student.id
                                        AND
                                        student_school_groups.school_groups_id = school_groups.id
                                        AND
                                        school_groups.lang_id = lang.id
                                        AND
                                        school_groups.name = 'Индивидуал' ");
        
        $result_ar = NULL;
        foreach( $query->result_array() as $row ){
            $row['name'] = $row['fio_sname'].' '.$row['fio_name'];
            $result_ar[$row['id']] = $row;
        }    
        return $result_ar;
    }
    
    function get_groups_for_student( $student_id ){
        $query = $this->db->query(" SELECT 
                                        school_groups.*, 
                                        student.id                                  AS 'student_id',
                                        lang.short_name                             AS 'lang', 
                                        level.name                                  AS 'level',
                                        student_school_groups.id                    AS 'st_gp_id',
                                        student_school_groups.test_lesson           AS 'test_lesson',
                                        student_school_groups.start_lesson_date     AS 'start_lesson_date',
                                        student_school_groups.start_pause           AS 'start_pause',
                                        student_school_groups.stop_pause            AS 'stop_pause'
                                    FROM
                                        `school_groups`, `lang`, `level`, `student_school_groups`, `student`
                                    WHERE
                                        student.id = '{$student_id}'
                                        AND
                                        student.id = student_school_groups.student_id
                                        AND
                                        school_groups.id = student_school_groups.school_groups_id
                                        AND
                                        school_groups.lang_id   = lang.id
                                        AND
                                        school_groups.level_id  = level.id
                                        AND
                                        school_groups.status != 404
                                    ");
        $return_ar = null;                                
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;                                 
    }
    
    function get_group_info( $id ){
        $query = $this->db->query(" SELECT 
                                        school_groups.*, 
                                        lang.name           AS `lang`,
                                        lang.short_name     AS `short_lang`,
                                        level.name          AS `level`,
                                        group_format.name   AS `group_format`,
                                        (SELECT COUNT(student.id) 
                                            FROM 
                                                `student`, student_school_groups 
                                            WHERE 
                                                student.id = student_school_groups.student_id
                                                AND
                                                student_school_groups.school_groups_id = '{$id}' ) AS `cnt_student`                                        
                                    FROM 
                                        `school_groups`, `lang`, `level`, `group_format`
                                    WHERE 
                                        school_groups.id = '{$id}'
                                        AND
                                        school_groups.lang_id = lang.id
                                        AND
                                        school_groups.level_id = level.id
                                        AND
                                        school_groups.group_format_id = group_format.id");
         return $query->row_array();                                 
    }
    
    function get_teachers_for_group( $group_id){
        $query = $this->db->query(" SELECT 
                                        users.id, users.fio 
                                    FROM
                                        `users`, `school_groups`, `school_groups_users`
                                    WHERE 
                                        school_groups_users.users_id = users.id
                                        AND
                                        school_groups_users.school_groups_id = school_groups.id
                                        AND
                                        school_groups.id = {$group_id}");
        $return_ar = null;                                
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    function get_classroom_for_group( $group_id){
//        $query = $this->db->query(" SELECT 
//                                        classroom.id, classroom.name
//                                     FROM
//                                        classroom");
        
    }
    
    function get_students_for_group( $group_id){
        $query = $this->db->query(" SELECT
                                        student.fio, student.id
                                    FROM 
                                        `student`, `student_school_groups`
                                    WHERE
                                        student_school_groups.student_id = student.id
                                        AND
                                        student_school_groups.school_groups_id = '{$group_id}'
                                    ORDER BY
                                        student.fio ");
        $return_ar = null;                                
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;                                
    }
    
    function get_student_notin_group( $group_id ){
        $query = $this->db->query(" SELECT
                                        `id`, `fio`
                                    FROM 
                                        `student`
                                    WHERE
                                        `id` NOT IN (   SELECT `student_id` 
                                                        FROM  `student_school_groups`
                                                        WHERE `school_groups_id` = '{$group_id}') 
                                    ORDER BY
                                        `fio`
                                    ");
        $return_ar = NULL;                    
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;                                
    }
    
    function get_timetable( $group_id ){
        $query = $this->db->query("SELECT * FROM `timetable_set` WHERE `school_groups_id` = '{$group_id}' ORDER BY `day` ");
        
        $result_ar = NULL;
        foreach( $query->result_array() as $row )
            $result_ar[ $row['day'] ] = $row;
        
        return $result_ar;
    }
    
    function add_group( $post ){
        $this->db->query("  INSERT INTO `school_groups`
                            SET
                                `name`              = '{$post['group_name']}',
                                `lang_id`           = '{$post['lang']}',
                                `level_id`          = '{$post['level']}',
                                `status`            = '1',
                                `group_format_id`   = '2'
                         ");
                                
        $group_id = $this->db->insert_id();
        if( !$group_id )
            return FALSE;
        
        //присоединение преподователей к группе
        foreach( $post['teacher_for_group'] as $teacher_id ){
            $this->db->query("  INSERT INTO `school_groups_users`
                                SET
                                    `school_groups_id`   = '{$group_id}',
                                    `users_id`           = '{$teacher_id}'
                             ");
        }
        
        //добавление студентов к группе
        if( isset($post['students_in_group']) ){
            foreach( $post['students_in_group'] as $student_id){
                $this->db->query("  INSERT INTO `student_school_groups`
                                    SET
                                        `school_groups_id`   = '{$group_id}',
                                        `student_id`        = '{$student_id}'
                                ");
            }
        }
        
        //добавление расписания
        if( $post['day'] ){
            foreach( $post['day'] as $day_nmbr => $val )
                $this->db->query("INSERT INTO `timetable_set` 
                                SET
                                    `school_groups_id`  = '{$group_id}',
                                    `day`               = '{$day_nmbr}',
                                    `classroom_id`      = '{$post['class'][$day_nmbr]}',
                                    `user_id`           = '{$post['teacher'][$day_nmbr]}',
                                    `time_start`        = '{$post['start_lesson'][$day_nmbr]}',
                                    `time_stop`         = SEC_TO_TIME( TIME_TO_SEC('{$post['start_lesson'][$day_nmbr]}') + TIME_TO_SEC('{$post['lesson_long'][$day_nmbr]}') )
                                ");
        }
        
        return $group_id;   
    }
    
    function get_paused_group_for_student( $student_id ){
        $date_now = date("Y-m-d 00:00:00");
        $query = $this->db->query(" SELECT 
                                        student_school_groups.stop_pause,
                                        student_school_groups.start_pause,
                                        school_groups.*
                                    FROM `student_school_groups`, `school_groups` 
                                    WHERE 
                                        student_school_groups.student_id
                                        AND
                                        student_school_groups.stop_pause > '{$date_now}'
                                        AND
                                        student_school_groups.school_groups_id = school_groups.id
                                        AND
                                        student_school_groups.student_id = '{$student_id}'
                                   ");
        
        $result_ar = NULL;
        
        foreach( $query->result_array() as $row )
            $result_ar[] = $row;
        
        return $result_ar;
    }
}