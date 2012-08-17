<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class schedule_lib{
    
    function __construct() {
        $this->ci =& get_instance();
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
}