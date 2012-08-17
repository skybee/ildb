<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function set_select_value( $option_list, $value ){ //добавляет selected в список <option/>
    $option_list = str_ireplace('value="'.$value.'"', 'value="'.$value.'" selected="selected" ', $option_list);
    return $option_list;
}


