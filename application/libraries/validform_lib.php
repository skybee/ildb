<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class validform_lib{

    function __construct( ) {
        
        $CI =& get_instance();
        
        $CI->load->helper('email');
    }
    
    
    
    function add_student( $post ){
        
        $anser = '';
        
        if( strlen( $post['fio_name'] ) < 4 ){
            $anser .= ' Имя,';
        }
        if( strlen( $post['fio_sname'] ) < 4 ){
            $anser .= ' Фамилия,';
        }
//        if( strlen( $post['fio_mname'] ) < 4 ){
//            $anser .= ' Отчество,';
//        }
        if( !$this->valid_phone( $post['phone'] ) ){
            $anser .= ' Телефон,';
        }
        
        if( $anser != false ) 
            return $anser;
        else 
            return false;
    }
    
    function add_teacher( $post ){
        
        $anser = '';
        
        if( strlen( $post['fio_name'] ) < 4 ){
            $anser .= ' Имя,';
        }
        if( strlen( $post['fio_sname'] ) < 4 ){
            $anser .= ' Фамилия,';
        }
//        if( strlen( $post['fio_mname'] ) < 4 ){
//            $anser .= ' Отчество,';
//        }
        if( !$this->valid_phone( $post['phone'] ) ){
            $anser .= ' Телефон,';
        }
        if( !isset( $post['lang'] ) ){
            $anser .= ' Язык ';
        }
        
        if( $anser != false ) 
            return $anser;
        else 
            return false;
    }
    
    function add_payment( $post ){
        $anser = '';
        if( $post['summ'] < 1 ){
            $anser .= ' Сумма ';
        }
        
        if( $anser != false ) 
            return $anser;
        else 
            return false;
        
    }
    
    function add_group( $post ){
        $anser = '';
        
        if( strlen($post['group_name']) < 4 )
            $anser .= ' Название, ';
        if( $post['lang'] < 1 )
            $anser .= ' Язык, ';
        if( $post['level'] < 1 )
            $anser .= ' Уровень, ';
        if( $post['start_group_lesson'] == false )
            $anser .= ' Начало занятий, ';
        
        if( $anser != false ) 
            return $anser;
        else 
            return false;
    }
    
    
    
    static function valid_phone( $phone ){
        preg_match_all("#(\d)#", $phone, $matches);
        if( count($matches[1]) >= 7 ) return TRUE;
        else return FALSE;
    }
    
    
}