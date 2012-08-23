<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class schedule_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function upd_from_group( $sch_data, $group_id ){
        if( $sch_data == NULL ) return FALSE;
        
        //удаление старых записей
        $this->db->query("DELETE FROM `timetable_set` WHERE `school_groups_id` = {$group_id}");
        
        foreach( $sch_data['day'] as $day => $val ){
            $time_stop = summ_time( $sch_data['start_lesson'][$day], '+', $sch_data['lesson_long'][$day] );
            
            if( isset($sch_data['day_id'][$day]) )
                $day_id = " `id` = '{$sch_data['day_id'][$day]}', ";
            else
                $day_id = '';
            
            $this->db->query("  INSERT INTO `timetable_set`
                                SET
                                    {$day_id}    
                                    `classroom_id`      = '{$sch_data['class'][$day]}',
                                    `user_id`           = '{$sch_data['teacher'][$day]}',
                                    `day`               = '$day',
                                    `time_start`        = '{$sch_data['start_lesson'][$day]}',
                                    `time_stop`         = '{$time_stop}', 
                                    `school_groups_id`  = '{$group_id}'
                                ");   
        }
        
        return TRUE;
    }
    
    function get_timetable(){
        $query = $this->db->query(" SELECT * FROM `timetable_set`");
        
        $result_ar = NULL;
        foreach( $query->result_array() as $row ){
            $result_ar[$row['classroom_id']][$row['day']][$row['time_start']] = $row;
        }
        
        return $result_ar;
    }
    
    function drag_change( $data ){ //изменение занятия в постоянном расписании
        $this->db->query("  UPDATE `timetable_set` 
                            SET
                                `classroom_id`  = {$data['classroom']},
                                `day`           = {$data['day']},
                                `time_start`    = '{$data['starttime']}',
                                `time_stop`     = '{$data['stoptime']}'
                            WHERE
                                `id`={$data['lesson_id']}");
    }
    
    function realy_drag_change( $data ){ //изменение занятия в реальном расписании
        $this->db->query("  INSERT INTO `timetable_changes` 
                            SET 
                                ");
    }
}