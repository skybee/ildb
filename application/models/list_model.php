<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class list_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    function get_groups(){
        $query = $this->db->query("SELECT 
                                        school_groups.*, school_groups.id AS 'link_id', lang.short_name AS `lang`, lang.color AS `lang_color`, level.name AS `level`, group_format.name AS `group_format` 
                                    FROM 
                                        `school_groups`, `lang`, `level`, `group_format` 
                                    WHERE 
                                        school_groups.lang_id = lang.id 
                                        AND 
                                        school_groups.level_id = level.id 
                                        AND 
                                        school_groups.group_format_id = group_format.id
                                        AND 
                                        group_format.id != 1
                                    GROUP BY school_groups.id 
                                    ORDER BY lang.name, level.name");
        
        foreach ( $query->result_array() as $row )
            $return_ar[$row['id']] = $row; //авто id изменен на id группы 21.07.12(работа над расписанием)
        
        return $return_ar;
    }
    
    
    function get_classroom(){
        $query = $this->db->query("SELECT * FROM `classroom` ORDER BY `name` ");
        
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    
    function get_teacher_lang(){
        $query = $this->db->query("SELECT 
                                        users.fio, users.fio_name, users.fio_sname, users.fio_mname, users.id
                                        -- , lang.short_name AS `lang` 
                                    FROM 
                                        `users`, `users_groups`
                                        -- , `groups` ,`lang`, `teacher_lang`
                                    WHERE 
                                        users.id = users_groups.user_id 
                                        AND 
                                        users_groups.group_id = 3
                                        -- AND
                                        -- users.id = teacher_lang.user_id
                                        -- AND
                                        -- lang.id = teacher_lang.lang_id
                                    -- GROUP BY teacher_lang.id
                                    ORDER BY 
                                        -- lang.short_name, 
                                        users.fio_sname
                                    ");
        foreach ( $query->result_array() as $row )
            $return_ar[$row['id']] = $row; //авто id изменен на id группы 21.07.12(работа над расписанием)
        
        return $return_ar;
    }
    
    function get_student_status(){
        $query = $this->db->query("SELECT * FROM `student_status` ORDER BY `default` DESC, `sort` ASC ");
        
        $return_ar = NULL;
        foreach ( $query->result_array() as $row )
            $return_ar[ $row['id'] ] = $row;
        
        return $return_ar;
    }
    
    function get_lang(){
        $query = $this->db->query("SELECT * FROM `lang` ORDER BY `name`");
        
        $return_ar = NULL;                    
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    function get_level(){
        $query = $this->db->query("SELECT * FROM `level` ORDER BY `name`");
        
        $return_ar = NULL;                    
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
    
    function get_group_format(){
        $query = $this->db->query("SELECT * FROM `group_format` WHERE id!=1 ORDER BY `name`");
        
        $return_ar = NULL;                    
        foreach ( $query->result_array() as $row )
            $return_ar[] = $row;
        
        return $return_ar;
    }
}