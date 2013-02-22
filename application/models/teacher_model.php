<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class teacher_model extends CI_Model{
    
    function __construct() {
        $this->load->database();
        parent::__construct();
    }
    
    function get_teachers(){
        $query = $this->db->query(" SELECT 
                                        users.id, users.fio, users.email, users.phone
                                        ,lang.short_name AS 'lang_name', lang.id AS 'lang_id'
                                        ,school_groups.id AS 'group_id', school_groups.name AS 'group_name'
                                    FROM `users`
                                    JOIN `groups`               ON  groups.name             = 'teachers'
                                    JOIN `users_groups`         ON  groups.id               = users_groups.group_id 
                                                                    AND 
                                                                    users.id                = users_groups.user_id
                                    JOIN `teacher_lang`         ON  users.id                = teacher_lang.user_id    
                                    JOIN `lang`                 ON  teacher_lang.lang_id    = lang.id
                                    LEFT JOIN `school_groups`   ON  school_groups.status    != 404
                                                                    AND
                                                                    school_groups.id IN 
                                                                        (   SELECT timetable_set.school_groups_id 
                                                                            FROM `timetable_set` 
                                                                            WHERE timetable_set.user_id = users.id  )
                                  ");
        
        
        $result_ar = array();
        foreach( $query->result_array() as $row ){
            foreach( $row as $key => $val ){
                if( $key == 'lang_name')
                    $result_ar[$row['id']][$key][$row['lang_id']] = $val;
                elseif( $key == 'group_name' ){
                    if( $val == 'Индивидуальная' OR !$val )
                        continue;
                    $result_ar[$row['id']][$key][$row['group_id']] = $val;
                }    
                else
                    $result_ar[$row['id']][$key] = $val;
            }
        }
        
        return $result_ar;
    }
    
    function get_teachers_old(){ //старая функция возвращения преподов с привязкой к группе
//        $query = $this->db->query(" SELECT 
//                                        users.id, users.fio, users.email, users.phone, 
//                                        lang.short_name AS 'lang_name', lang.id AS 'lang_id',
//                                        school_groups.id AS 'group_id', school_groups.name AS 'group_name'
//                                    FROM `users`, `groups`, `users_groups`, `lang`, `teacher_lang`, `school_groups`, `school_groups_users` 
//                                    WHERE
//                                        groups.name             = 'teachers'
//                                        AND
//                                        users_groups.group_id   = groups.id
//                                        AND
//                                        users_groups.user_id    = users.id
//                                        AND
//                                        lang.id                 = teacher_lang.lang_id
//                                        AND
//                                        teacher_lang.user_id    = users.id
//                                        AND
//                                        school_groups.id        = school_groups_users.school_groups_id
//                                        AND
//                                        school_groups_users.users_id = users.id
//                                     ORDER BY users.fio ASC     
//                                  ");
//        $result_ar = array();
//        foreach( $query->result_array() as $row ){
//            foreach( $row as $key => $val ){
//                if( $key == 'lang_name')
//                    $result_ar[$row['id']][$key][$row['lang_id']] = $val;
//                elseif( $key == 'group_name' ){
//                    if( $val == 'Индивидуальная' OR !$val )
//                        continue;
//                    $result_ar[$row['id']][$key][$row['group_id']] = $val;
//                }    
//                else
//                    $result_ar[$row['id']][$key] = $val;
//            }
//
//        }
//        
//        return $result_ar;
    }
    
    function add_teacher(){
        $this->db->query("  INSERT INTO `users`
                            SET
                                `fio`       = '{$_POST['fio_sname']} {$_POST['fio_name']} {$_POST['fio_mname']}',
                                `fio_name`  = '{$_POST['fio_name']}', 
                                `fio_sname` = '{$_POST['fio_sname']}',
                                `fio_mname` = '{$_POST['fio_mname']}',
                                `phone`     = '{$_POST['phone']}',
                                `address`   = '{$_POST['address']}',
                                `email`     = '{$_POST['email']}',
                                `comment`   = '{$_POST['comment']}'
                         ");
                                
        $teacher_id = $this->db->insert_id();  
        if( $teacher_id ){
            $this->db->query("INSERT INTO `users_groups` SET `user_id`={$teacher_id}, group_id=3");
            return $teacher_id;
        }
        else
            return FALSE;
    }
    
    function add_lang_to_teacher( $teacher_id, $lang_ar ){
        foreach( $lang_ar as $lang_id)
            $this->db->query(" INSERT INTO `teacher_lang` SET `user_id`='{$teacher_id}', `lang_id`='{$lang_id}' ");
    }
    
    function add_teacher_for_group( $teacher_id, $group_id){
        if( $this->db->query("  INSERT INTO `school_groups_users` 
                                SET 
                                    `users_id`          = '{$teacher_id}',
                                    `school_groups_id`  = '{$group_id}'
                            "))
            return TRUE;
        else
            return FALSE;
    }
    
    function get_teacher_info( $teacher_id ){
        $query = $this->db->query(" SELECT 
                                        users.*
                                    FROM
                                        `users`
                                    WHERE
                                        users.id = {$teacher_id} ");
        return $query->row_array();                                
    }
    
    function get_lang_for_teacher( $teacher_id ){
        $query = $this->db->query(" SELECT lang.* 
                                    FROM 
                                        `lang`, `teacher_lang` 
                                    WHERE
                                        lang.id = teacher_lang.lang_id
                                        AND
                                        teacher_lang.user_id = '{$teacher_id}'
                                  ");
        foreach( $query->result_array() as $row ){
            $result_ar[ $row['id'] ] = $row;
        }
        
        return $result_ar;
    }
    
    function get_oter_group_for_teacher( $teacher_id ){ //возвращает список групп которые не связанны с преподавателем
        $query = $this->db->query(" SELECT
                                        school_groups.*, lang.short_name AS `lang` 
                                    FROM
                                        `school_groups`, `lang`
                                    WHERE
                                        school_groups.id NOT IN (   SELECT `school_groups_id`
                                                                    FROM `school_groups_users` 
                                                                    WHERE users_id != {$teacher_id} )
                                        AND
                                        lang.id = school_groups.lang_id
                                  ");
        $result_ar = NULL;                                                            
        foreach( $query->result_array() as $row ){
            $result_ar[] = $row;
        }
        
        return $result_ar;
    }
    
    function upd_user_info( $data_ar ){
        return $this->db->query("  
                                UPDATE `users` 
                                SET
                                    `fio`       = '{$data_ar['fio_sname']} {$data_ar['fio_name']} {$data_ar['fio_mname']}',
                                    `fio_name`  = '{$data_ar['fio_name']}',
                                    `fio_sname` = '{$data_ar['fio_sname']}',
                                    `fio_mname` = '{$data_ar['fio_mname']}',
                                    `address`   = '{$data_ar['address']}',
                                    `phone`     = '{$data_ar['phone']}',
                                    `email`     = '{$data_ar['email']}',
                                    `comment`   = '{$data_ar['comment']}'
                                WHERE `id` = {$data_ar['user_id']}
                            ");
    }
    
    function upd_teacher_lang( $lang_ar, $teacher_id ){
        $this->db->query("DELETE FROM `teacher_lang` WHERE `user_id` = {$teacher_id} ");
        
        foreach( $lang_ar as $lang_id ){
            $lang_id = (int) $lang_id;
            $this->db->query("INSERT INTO `teacher_lang` SET `lang_id`= {$lang_id}, `user_id`={$teacher_id} ");
        }
    }
}


