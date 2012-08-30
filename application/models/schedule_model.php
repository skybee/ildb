<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class schedule_model extends CI_Model{
    function __construct() {
        parent::__construct();
        
        $this->load->helper('date_convert');
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
    
    function get_timetable( $date_start = false, $date_stop = false){
        $result_ar = NULL;
        $where_sql = '';
        
        // <вытаскивание замен>
        if($date_start && $date_stop){
            $query_realy = $this->db->query("   SELECT *, `timetable_set_id` AS `id` FROM `timetable_changes` 
                                                WHERE
                                                    `new_date` >= '$date_start' 
                                                    AND 
                                                    `new_date` <= '$date_stop'
                                            ");

            $i=0;
            foreach( $query_realy->result_array() as $row_realy ){
                $result_ar[$row_realy['classroom_id']][$row_realy['day']][$row_realy['time_start']] = $row_realy;
            }
            $where_sql = " WHERE `id` NOT IN 
                                (SELECT `timetable_set_id` FROM `timetable_changes`
                                WHERE `change_date` >= '$date_start' AND `change_date` <= '$date_stop')";
        }
        // </вытаскивание замен>
        
        $query = $this->db->query(" SELECT * FROM `timetable_set` $where_sql ");
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
        $this->db->query("  DELETE FROM `timetable_changes` 
                            WHERE
                                `timetable_set_id`  = '{$_POST['lesson_id']}'
                                AND
                                `change_date`       = '{$_POST['date']}'");
        $this->db->query("  INSERT INTO `timetable_changes` 
                            SET 
                                `timetable_set_id`  = '{$_POST['lesson_id']}',
                                `change_date`       = '{$_POST['date']}',
                                `new_date`          = '{$_POST['new_date']}',
                                `classroom_id`      = '{$_POST['classroom']}',
                                `user_id`           = '{$_POST['teacher_id']}',
                                `day`               = '{$_POST['day']}',
                                `time_start`        = '{$_POST['starttime']}',
                                `time_stop`         = '{$_POST['stoptime']}',
                                `school_groups_id`  = '{$_POST['group_id']}'
                         ");
    }
    
    function create_tmp_tbl( $date ){
        $date_ar = get_month_or_week_period('week', $date);
        $tbl_name = 'sch_'.str_replace('-', '_', $date_ar['start']);
        $this->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS `$tbl_name`
                            (
                            `id` int(11) NOT NULL auto_increment,
                            `classroom_id` int(5) NOT NULL,
                            `school_groups_id` int(5) NOT NULL,
                            `user_id` int(5) NOT NULL,
                            `day` int(1) NOT NULL,
                            `time_start` time NOT NULL,
                            `time_stop` time NOT NULL,
                            PRIMARY KEY  (`id`)
                            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    }
}