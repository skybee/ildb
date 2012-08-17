<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function id_in_groups( $group_id, $groups_ar ){ //ищет id в массиве групп
    foreach( $groups_ar as $grp_ar ){
        if( $group_id == $grp_ar['id'] ) return TRUE;
    }
    
    return FALSE;
}


function get_schedule_str( $schadule_ar ){ // принимает массив с предпочтительным графиком. Возвращает строку для списка студентов без группы
    $day_ar = array('Пн.','Вт.','Ср.','Чт.','Пт.','Сб.','Вс.');
    $str = '';
    if( $schadule_ar != NULL ){
        foreach ( $schadule_ar as $day => $time ){
            $time = preg_replace("#(\d{2}:\d{2}):\d{2}#i", "$1", $time);
            $str .= $day_ar[ $day-1 ].'('.$time.')&nbsp;&nbsp;';
        }
    }
    
    return $str;
}