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
                                `time_stop`     = '{$data['stoptime']}',
                                `user_id`       = '{$data['teacher_id']}'
                            WHERE
                                `id`={$data['lesson_id']}");                                
    }
    
    function realy_drag_change( $data ){ //изменение занятия в реальном расписании
        $this->db->query("  DELETE FROM `timetable_changes` 
                            WHERE
                                `timetable_set_id`  = '{$data['lesson_id']}'
                                AND
                                `change_date`       = '{$data['date']}'");
        $this->db->query("  INSERT INTO `timetable_changes` 
                            SET 
                                `timetable_set_id`  = '{$data['lesson_id']}',
                                `change_date`       = '{$data['date']}',
                                `new_date`          = '{$data['new_date']}',
                                `classroom_id`      = '{$data['classroom']}',
                                `user_id`           = '{$data['teacher_id']}',
                                `day`               = '{$data['day']}',
                                `time_start`        = '{$data['starttime']}',
                                `time_stop`         = '{$data['stoptime']}',
                                `school_groups_id`  = '{$data['group_id']}'
                         ");
    }
    
    function create_changes_tmp_tbl( $date_start, $date_stop ){ //принимает дату в формате YYYY-MM-DD, возвращает имя временной таблицы
        $table_name = 'schedule_'.rand(100,999999);
        //TEMPORARY
        $this->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS `$table_name`
                            (
                            `id` int(11) NOT NULL auto_increment,
                            `lesson_id` int(11) NOT NULL,
                            `classroom_id` int(5) NOT NULL,
                            `school_groups_id` int(5) NOT NULL,
                            `user_id` int(5) NOT NULL,
                            `day` int(1) NOT NULL,
                            `time_start` time NOT NULL,
                            `time_stop` time NOT NULL,
                            `date` date NOT NULL,
                            `cancel` varchar(10) collate utf8_unicode_ci NOT NULL default 'no',
                            PRIMARY KEY  (`id`)
                            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        
        //создание массива стандартного рассписания
        $query = $this->db->query("SELECT *,  'no' AS 'cancel'  FROM `timetable_set` ");
        $sch_default_ar = NULL;
        foreach( $query->result_array() as $row ){
            $sch_default_ar[$row['day']] [$row['id']] = $row;
        }
        
        //создание массива замен
        $query = $this->db->query(" SELECT * FROM `timetable_changes` 
                                    WHERE 
                                    (`change_date` >= '{$date_start}' AND `change_date` <= '{$date_stop}')
                                    OR
                                    (`new_date` >= '{$date_start}' AND `new_date` <= '{$date_stop}')
                                  ");
        $changes_old_date_ar = array();                            
        $changes_new_date_ar = array();
        foreach( $query->result_array() as $row ){
            $changes_old_date_ar[ $row['change_date'] ][ $row['timetable_set_id'] ] = $row['timetable_set_id'];    //массив дат в которых были замены
            $changes_new_date_ar[] = $row; //массив с заменами
        } 
        
        //<обход дат и занесение записей в БД>
        $day_date   = $date_start; //
        $day_stop   = date("Y-m-d", strtotime("+1 day", strtotime($date_stop)) ); //день остановки цикла
        $result_ar  = array();
        do{ 
            $time       = strtotime($day_date); //получение метки времени дня в итерации
            $day_number = date("w",$time); //порядковый номер дня
            if( $day_number == 0 ) $day_number = 7; //воскресение
            
            //<создание массива расписания с заменами>
            if( $sch_default_ar[$day_number] != NULL ){
                foreach($sch_default_ar[$day_number] as $lesson_ar){
                    if( isset($changes_old_date_ar[$day_date]) ) //проверка замены урока в текущую дату
                        if( in_array($lesson_ar['id'], $changes_old_date_ar[$day_date]) )
                            continue;
                    $lesson_ar['date'] = $day_date;    
                    $result_ar[] = $lesson_ar;
                }
            }
            //</создание массива расписания с заменами>
            
            $day_date = date("Y-m-d", strtotime("+1 day", $time)); //дата следущего дня
        }
        while($day_date != $day_stop);
        
        foreach($changes_new_date_ar as $changes_ar){
            $result_ar[] = array(   'id'                =>$changes_ar['timetable_set_id'],
                                    'classroom_id'      =>$changes_ar['classroom_id'],
                                    'school_groups_id'  =>$changes_ar['school_groups_id'],
                                    'user_id'           =>$changes_ar['user_id'],
                                    'day'               =>$changes_ar['day'],
                                    'time_start'        =>$changes_ar['time_start'],
                                    'time_stop'         =>$changes_ar['time_stop'],
                                    'date'              =>$changes_ar['new_date'],
                                    'cancel'            =>$changes_ar['cancel'],
                                );
        }
        
        //<занесение записей в таблицу>
        $sql_values = '';
        foreach($result_ar as $key => $less_ar){
            if( $key != 0)
                $sql_values .= ",\n";
            $sql_values .= "(   '',
                                '{$less_ar['id']}', 
                                '{$less_ar['classroom_id']}', 
                                '{$less_ar['school_groups_id']}', 
                                '{$less_ar['user_id']}',
                                '{$less_ar['day']}', 
                                '{$less_ar['time_start']}', 
                                '{$less_ar['time_stop']}', 
                                '{$less_ar['date']}', 
                                '{$less_ar['cancel']}'
                            )";
        }
        
        $this->db->query("  INSERT INTO `{$table_name}`
                            (`id`, `lesson_id`, `classroom_id`, `school_groups_id`, `user_id`,  `day`, `time_start`, `time_stop`, `date`, `cancel` )
                            VALUES
                            {$sql_values}
                        ");
        //</занесение записей в таблицу>
        
        //</обход дат и занесение записей в БД>
        
        return $table_name;
    }
}