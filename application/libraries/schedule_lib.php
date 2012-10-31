<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class schedule_lib{
    
    function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->model('schedule_model','schedule',TRUE);
    }
    
    function get_time_ar(){
        return array(   '08:00:00',
                        '08:30:00',
                        '09:00:00',
                        '09:30:00',
                        '10:00:00',
                        '10:30:00',
                        '11:00:00',
                        '11:30:00',
                        '12:00:00',
                        '12:30:00',
                        '13:00:00',
                        '13:30:00',
                        '14:00:00',
                        '14:30:00',
                        '15:00:00',
                        '15:30:00',
                        '16:00:00',
                        '16:30:00',
                        '17:00:00',
                        '17:30:00',
                        '18:00:00',
                        '18:30:00',
                        '19:00:00',
                        '19:30:00',
                        '20:00:00',
                        '20:30:00',
                        '21:00:00',
                        '21:30:00',
                        '22:00:00');
    }
    
    function get_time_column($day){
        $time_ar = $this->get_time_ar();
        
        $result_str = '<div class="sch_day_in_group">';
        foreach( $time_ar as $time ){
            $result_str .= '<div class="sch_time_td" starttime="'.$time.'" day_dot="'.$day.'">'.rtrim(rtrim($time,'0'),':').'</div>'."\n";
        }
        $result_str .= '</div>';
        
        return $result_str;
    }
    
    function check_lesson_valid($day, $classroom, $starttime, $stoptime, $lesson_id = false ){//проверяет попадает ли интервал времени в уже существующее время занятия в этот день в этом кабинете
        
        if( $lesson_id )
            $less_where = " AND `id` != {$lesson_id} ";
        else
            $less_where = '';
        
        $query = $this->ci->db->query(" SELECT COUNT(*) AS 'count' FROM `timetable_set` 
                                        WHERE
                                            `classroom_id` = '{$classroom}'
                                            AND
                                            `day` = '{$day}'
                                            AND
                                            (
                                                (`time_start`>= '{$starttime}' AND `time_start` < '{$stoptime}')
                                                OR
                                                (`time_stop` > '{$starttime}' AND `time_stop` <= '{$stoptime}')
                                            )
                                            {$less_where}");
        
        $row = $query->row();
        
        if( $row->count > 0)
            return FALSE;
        else
            return TRUE;

    }
    
    function check_lesson_valid_realy($day, $classroom, $starttime, $stoptime, $day_date, $lesson_id = false ){//проверяет попадает ли интервал времени в уже существующее время занятия в этот день в этом кабинете
        
        $week_ar = get_month_or_week_period('week', $day_date);
        
        $tmp_table_name = $this->ci->schedule->create_changes_tmp_tbl($week_ar['start'], $week_ar['last_day'] );
        
        if( $lesson_id )
            $less_where = " AND `lesson_id` != {$lesson_id} ";
        else
            $less_where = '';
        
        $query = $this->ci->db->query(" SELECT COUNT(*) AS 'count' FROM `{$tmp_table_name}` 
                                        WHERE
                                            `classroom_id` = '{$classroom}'
                                            AND
                                            `day` = '{$day}'
                                            AND
                                            (
                                                (`time_start`>= '{$starttime}' AND `time_start` < '{$stoptime}')
                                                OR
                                                (`time_stop` > '{$starttime}' AND `time_stop` <= '{$stoptime}')
                                            )
                                            {$less_where}");
        $row = $query->row();
        
        if( $row->count > 0)
            return FALSE;
        else
            return TRUE;

    }
     
    function check_teacher_valid($day, $starttime, $stoptime, $teacher_id){
        $query = $this->ci->db->query(" SELECT COUNT(*) AS 'count' FROM `timetable_set` 
                                        WHERE
                                            `user_id` = '{$teacher_id}'
                                            AND
                                            `day` = '{$day}'
                                            AND
                                            (
                                                (`time_start`>= '{$starttime}' AND `time_start` < '{$stoptime}')
                                                OR
                                                (`time_stop` > '{$starttime}' AND `time_stop` <= '{$stoptime}')
                                            )
                                      ");                                                
                                            
        $row = $query->row();
        
        if( $row->count > 0)
            return FALSE;
        else
            return TRUE;
    }
    
    function check_teacher_valid_realy($day, $starttime, $stoptime, $teacher_id, $day_date){
        $week_ar = get_month_or_week_period('week', $day_date);
        
        $tmp_table_name = $this->ci->schedule->create_changes_tmp_tbl($week_ar['start'], $week_ar['last_day'] );
        
        $query = $this->ci->db->query(" SELECT COUNT(*) AS 'count' FROM `{$tmp_table_name}` 
                                        WHERE
                                            `user_id` = '{$teacher_id}'
                                            AND
                                            `day` = '{$day}'
                                            AND
                                            (
                                                (`time_start`>= '{$starttime}' AND `time_start` < '{$stoptime}')
                                                OR
                                                (`time_stop` > '{$starttime}' AND `time_stop` <= '{$stoptime}')
                                            )
                                       ");
                                                                                               
        $row = $query->row();
        
        if( $row->count > 0)
            return FALSE;
        else
            return TRUE;
    }
}