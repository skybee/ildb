<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment_model extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
        
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
            return $this->db->query("  
                                    {$sql_do} `payment`
                                    SET
                                        `student_id`        ='{$dataAr['student_id']}',
                                        `users_id`          ='{$dataAr['manager_id']}',
                                        `school_groups_id`  ='{$dataAr['group_id']}', 
                                        `summ`              ='{$dataAr['summ']}',
                                        `date`              ='".date_to_timestamp($dataAr['date'])."',
                                        `comment`           ='{$dataAr['comment']}',    
                                        `cnt_lessons`       ='{$dataAr['cnt_lessons']}',
                                        `payment_to`        ='{$dataAr['payment_to']}',
                                        `not_full`          ='{$dataAr['not_full']}'
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
}