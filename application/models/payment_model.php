<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment_model extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('schedule_model', 'schedule');
        $this->load->model('group_model', 'group');
        $this->load->helper('date_convert');
    }
    
    
    function add_payment( $dataAr ){
       if( !isset($dataAr['not_full']) )
           $dataAr['not_full'] = 0;
       if( $dataAr['payment_id'] > 1 ){
           $sql_do      = ' UPDATE ';
           $sql_where   = ' WHERE `id`= '.mysql_real_escape_string( $dataAr['payment_id'] );
       }
       else{
           $sql_do      = ' INSERT INTO ';
           $sql_where   = '';
       }    
//       print_r($_POST);
       $_POST['cnt_lessons']    = (int) $_POST['cnt_lessons'];
       $_POST['group_id']       = (int) $_POST['group_id'];
       $_POST['payment_period'] = (int) $_POST['payment_period'];
           
       //== создание временной таблицы занятий ==//
       $date_start  = date_to_timestamp( $_POST['start_period'] );
       $date_stop   = date("Y-m-d", strtotime("+ 1 year", strtotime( $date_start ) ) );
       $tmp_tbl_name = $this->schedule->create_changes_tmp_tbl( $date_start, $date_stop );
       //== /создание временной таблицы занятий ==//
       
       if( $_POST['payment_type'] ==  'cnt_lesson' ){
           
           $period_start    = $date_start;
           $query = $this->db->query("  SELECT `date` FROM `{$tmp_tbl_name}` 
                                        WHERE 
                                            `cancel` = 'no' 
                                            AND 
                                            `date` >= '{$period_start}' 
                                            AND
                                            `school_groups_id` = '{$_POST['group_id']}'
                                            ORDER BY `date`
                                            LIMIT {$_POST['cnt_lessons']}
                                     ");
           if( $query->num_rows() < 1 ) return FALSE;
           
            foreach ( $query->result_array() as $row ){ //создание временного массива с датами занятий
                $less_date_ar[] = $row['date'];
            }
            
            $start_period   = $less_date_ar[0];
            $stop_period    = $less_date_ar[ count($less_date_ar)-1 ];
            $cnt_lesson     = count($less_date_ar);
       }
       if( $_POST['payment_type'] ==  'period' ){
           
           $period_start    = $date_start;
           $period_stop     = date("Y-m-d", strtotime("- 1 day", strtotime("+ {$_POST['payment_period']} month", strtotime( $date_start ) ) ) );
           $query = $this->db->query("  SELECT `date` FROM `{$tmp_tbl_name}` 
                                        WHERE 
                                            `cancel` = 'no' 
                                            AND 
                                            `date` >= '{$period_start}' 
                                            AND 
                                            `date` <= '{$period_stop}' 
                                            AND
                                            `school_groups_id` = '{$_POST['group_id']}'
                                            ORDER BY `date`
                                     ");
           if( $query->num_rows() < 1 ) return FALSE;
           
            foreach ( $query->result_array() as $row ){ //создание временного массива с датами занятий
                $less_date_ar[] = $row['date'];
            }
            
            $start_period   = $less_date_ar[0];
            $stop_period    = $less_date_ar[ count($less_date_ar)-1 ];  
            $cnt_lesson     = count($less_date_ar);
       }
       if( $_POST['payment_type'] ==  'other' ){
            $start_period   = '0000-00-00';
            $stop_period    = '0000-00-00';
            $cnt_lesson     = '0';
       }
            return $this->db->query("  
                                    {$sql_do} `payment`
                                    SET
                                        `student_id`        ='{$dataAr['student_id']}',
                                        `users_id`          ='{$dataAr['manager_id']}',
                                        `school_groups_id`  ='{$dataAr['group_id']}', 
                                        `summ`              ='{$dataAr['summ']}',
                                        `date`              ='".date_to_timestamp($dataAr['date'])."',
                                        `comment`           ='{$dataAr['comment']}',    
                                        `cnt_lessons`       ='{$cnt_lesson}',
                                        `payment_to`        ='{$dataAr['payment_to']}',
                                        `not_full`          ='{$dataAr['not_full']}',
                                        `period_date_start` ='{$start_period}',
                                        `period_date_stop`  ='{$stop_period}'
                                     {$sql_where}   
                                     ");
    }
    
    function del_payment( $pay_id ){
        return $this->db->query("DELETE FROM `payment` WHERE `id`='{$pay_id}' ");
    }
    
    function get_payment_for_student_cart( $student_id ){
        $query = $this->db->query(" SELECT 
                                        payment.*, users.name AS 'user_name', users.id AS 'user_id' 
                                    FROM 
                                        `payment`, `users` 
                                    WHERE
                                        payment.student_id = '{$student_id}'
                                        AND
                                        payment.users_id = users.id
                                        AND
                                        payment.school_groups_id != false
                                    ORDER BY payment.date DESC, payment.id DESC      
                                ");                                
        $return_ar = null;                                
        foreach ( $query->result_array() as $row )
            $return_ar[ $row['school_groups_id'] ][] = $row;
        
        return $return_ar;                                 
    }
    
    function get_last_payment_for_student( $student_id ){
        $student_id = (int) $student_id;
        $query = $this->db->query(" SELECT * FROM `payment` 
                                    WHERE `student_id`='{$student_id}' 
                                    ORDER BY `date` DESC, `id` DESC
                                    LIMIT 1");
        
        return $query->row_array();
    }
    
    function get_peyment( $period_ar ){
            
        $query = $this->db->query(" SELECT payment.*, users.name AS `manager_name`, student.fio AS `student_fio`  
                                    FROM 
                                        `payment`, `users`, `student`
                                    WHERE 
                                        ( payment.date >= '{$period_ar['start']}' AND payment.date < '{$period_ar['stop']}' )
                                        AND
                                        payment.student_id = student.id
                                        AND
                                        payment.users_id = users.id
                                    ");
        $return_ar = null;                                
        foreach ( $query->result_array() as $row ){
            $date_key = timestamp_to_date($row['date']);
            
            if( !isset($return_ar[$date_key]['day_summ']) )
                $return_ar[$date_key]['day_summ'] = 0;
            
            $return_ar[$date_key]['day_summ'] = $return_ar[$date_key]['day_summ'] + $row['summ'];
            
            $return_ar[$date_key][] = $row;
        }
        return $return_ar;                                 
        
    }
    
    function update_group_payment( $group_id, $date ){ //осуществляет пересчет оплат для студентов группы
        
        
        //== создание временной таблицы занятий ==//
        $date_start  = date("Y-m-d", strtotime("- 2 month", strtotime( date("Y-m-d") ) ) );
        $date_stop   = date("Y-m-d", strtotime("+ 1 year", strtotime( $date_start ) ) );
        $tmp_tbl_name = $this->schedule->create_changes_tmp_tbl( $date_start, $date_stop );
        //== /создание временной таблицы занятий ==//
        
        //== выборка оплат группы попадающих в период $date ==//
        $query = $this->db->query(" SELECT * FROM `payment` 
                                    WHERE 
                                        `period_date_start` <= '{$date}'
                                        AND
                                        `period_date_stop`  >= '{$date}'
                                        AND 
                                        `school_groups_id`  = '{$group_id}'
                                 ");      
        //== /выборка оплат группы попадающих в период $date ==//                                                               
                                        
        //== обработка выбранных оплат ==//                                
        foreach( $query->result_array() as $row ){
//            print_r($row); echo "\n";
            $period_start   = $row['period_date_start'];
            $cnt_less       = $row['cnt_lessons'];
            $pay_id         = $row['id'];
            
            $query = $this->db->query("  SELECT `date` FROM `{$tmp_tbl_name}` 
                                         WHERE 
                                                `cancel` = 'no' 
                                                AND 
                                                `date` >= '{$period_start}' 
                                                AND
                                                `school_groups_id` = '{$group_id}'
                                                ORDER BY `date`
                                                LIMIT {$cnt_less}
                                        ");
            if( $query->num_rows() < 1 ) return FALSE;
           
            foreach ( $query->result_array() as $row ){ //создание временного массива с датами занятий
                $less_date_ar[] = $row['date'];
            }
            $start_period   = $less_date_ar[0];
            $stop_period    = $less_date_ar[ count($less_date_ar)-1 ];
            $cnt_lesson     = count($less_date_ar);
            //== обновление оплаты ==//

            return $this->db->query("   UPDATE `payment`
                                        SET
                                            `cnt_lessons`       ='{$cnt_lesson}',
                                            `period_date_start` ='{$start_period}',
                                            `period_date_stop`  ='{$stop_period}'   
                                        WHERE
                                            `id` = '{$pay_id}'
                                     ");
         //== /обновление оплаты ==//
        } 
        //== /обработка выбранных оплат ==//
        
                                      
    }
}