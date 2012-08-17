<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class main extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('list_model',    'list');
        $this->load->model('student_model', 'student');
        $this->load->model('group_model',   'group');
        $this->load->model('payment_model', 'payment');
        $this->load->model('teacher_model', 'teacher');
        $this->load->model('schedule_model','schedule');
        $this->load->helper('valid_data');
        $this->load->helper('date_convert');
        $this->load->helper('student');
        $this->load->helper('other');
        
        $_GET = post_valid( $_GET );
    }
    
    
    function index(){ $this->students(); }
    
    
    
    function tmp_tpl( $page, $student_block = false )
    {
        
        $data = array();
        
        if( $page == 'student_cart' ){
            $data['student_right_block'] = $this->load->view('tmp_tpl/student_cart/'.$student_block.'_view', '', TRUE);
        }
        elseif( $page == 'group_cart' ){
            $data['group_right_block'] = $this->load->view('tmp_tpl/group_cart/'.$student_block.'_view', '', TRUE);
        }
        elseif( $page == 'teacher_cart' ){
            $data['teacher_right_block'] = $this->load->view('tmp_tpl/teacher_cart/'.$student_block.'_view', '', TRUE);
        }
        elseif( $page == 'add_student' ){
            $data['student_right_block'] = $this->load->view('tmp_tpl/add/student/'.$student_block.'_view', '', TRUE);
        }
        elseif( $page == 'add_teacher' ){
            $data['student_right_block'] = $this->load->view('tmp_tpl/add/teacher/'.$student_block.'_view', '', TRUE);
        }
        elseif( $page == 'add_group' ){
            $data['student_right_block'] = $this->load->view('tmp_tpl/add/group/'.$student_block.'_view', '', TRUE);
        }
        
        $this->load->view('tmp_tpl/'.$page.'_view', $data);
    }
    
    
    function add_student(){
        $st_data['groups_list']     = $this->list->get_groups(); 
        $st_data['classroom_list']  = $this->list->get_classroom();
        $st_data['teachers_list']   = $this->list->get_teacher_lang();
        $st_data['lang_list']       = $this->list->get_lang();
        $st_data['timeselect_opt']  = $this->load->view('component/timeselect_opt_view','',TRUE);
        
        $menu_data['student_status']    = $this->list->get_student_status();
        $menu_data['is_students']       = TRUE;
        
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', $menu_data, TRUE);
        $main_data_ar['right_content']  = $this->load->view('page/add_student_view', $st_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    function student_cart( $st_id ){
        $menu_data['student_status']    = $this->list->get_student_status();
        
        $st_data['is_students']         = TRUE;
        
        $st_data['status_list']         = $menu_data['student_status'];
        $st_data['student_info_ar']     = $this->student->  get_student_info( $st_id );
        $st_data['certificate_list']    = $this->student->  get_certificate( $st_id );
        $st_data['individual']          = $this->student->  is_individual( $st_id );
        $st_data['individ_group_id_ar'] = $this->student->  get_individual_group_id($st_id);
        $st_data['student_groups_list'] = $this->group->    get_groups_for_student( $st_id );
        $st_data['paused_group_list']   = $this->group->    get_paused_group_for_student( $st_id );
        $st_data['timetable_list']      = $this->group->    get_timetable( $st_data['individ_group_id_ar'][0] );
        $st_data['payment_list']        = $this->payment->  get_payment_for_student_cart( $st_id );
        $st_data['last_payment']        = $this->payment->  get_last_payment_for_student( $st_id );
        $st_data['group_list']          = $this->list->     get_groups();
        $st_data['classroom_list']      = $this->list->     get_classroom();
        $st_data['teachers_list']       = $this->list->     get_teacher_lang();
        $st_data['timeselect_opt']      = $this->load->     view('component/timeselect_opt_view','',TRUE);
        
        $st_data['info_obj']            = unserialize( $st_data['student_info_ar']['info_obj'] );
        
//        echo '<pre>';
//        print_r( $st_data );
//        echo '</pre>';
        
        if( $st_data['student_info_ar']['status_id'] == 3 ){ // студент без группы
            $st_data['group_tab']       = $this->load->view('ajax/student/none_groups_page_view', $st_data, TRUE);;
        }
        else
            $st_data['group_tab']       = $this->load->view('ajax/student/groups_page_view', $st_data, TRUE);

        $main_data_ar['title']          = 'Студенты &rarr; '.$st_data['student_info_ar']['fio'];
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', $menu_data, TRUE);
        $main_data_ar['right_content']  = $this->load->view('page/student_cart_view', $st_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
 
    function students( $param = 'live', $status = 1 ){
        
        $menu_data['student_status']    = $this->list->get_student_status();
        $st_data['status_list']         = $menu_data['student_status'];
        $st_data['lang_list']           = $this->list->get_lang();
        
        
        if( $param == 'status' ){
            $st_data['students_list']       = $this->student->get_students_for_status($status);
            $main_data_ar['right_content']  = $this->load->view('page/students_without_group_view', $st_data, TRUE);
        }
        elseif( $param == 'without_group'){
            $st_data['students_list']       = $this->student->get_students_without_group();
            $main_data_ar['right_content']  = $this->load->view('page/students_without_group_view', $st_data, TRUE);
        }
        elseif( $param == 'delete' ){
            $st_data['students_list']       = $this->student->get_del_student();
            $main_data_ar['right_content']  = $this->load->view('page/students_without_group_view', $st_data, TRUE);
        }
        else{
            $st_data['students_list']       = $this->student->get_students_with_lang_group( $param );
            $main_data_ar['right_content']  = $this->load->view('page/students_view', $st_data, TRUE);
        }
        
//        echo '<pre>';
//        print_r($st_data);
//        echo '</pre>';        
        
        $main_data_ar['title']          = 'Студенты';
        $menu_data['is_students']       = TRUE;
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', $menu_data, TRUE);
        
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    
    function groups(){
        
        $gp_data['groups_list']     = $this->group->get_groups();
        
        $main_data_ar['title']          = 'Группы';
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']  = $this->load->view('page/groups_view', $gp_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    function group_cart( $group_id = FALSE ){
        $group_id = (int) $group_id;
        if( $group_id == false ) show_404 ();
        
        $gp_data['group_info_ar']               = $this->group->get_group_info( $group_id );
        $gp_data['group_teachers_list']         = $this->group->get_teachers_for_group( $group_id);
        $gp_data['group_classroom_list']        = $this->group->get_classroom_for_group( $group_id);
        $gp_data['group_students_list']         = $this->group->get_students_for_group( $group_id);
        $gp_data['notin_group_student_list']    = $this->group->get_student_notin_group( $group_id );
        $gp_data['timetable_list']              = $this->group->get_timetable( $group_id );
        $gp_data['lang_list']                   = $this->list->get_lang();
        $gp_data['level_list']                  = $this->list->get_level();
        $gp_data['group_format_list']           = $this->list->get_group_format();
        $gp_data['classroom_list']              = $this->list->get_classroom();
        $gp_data['teachers_list']               = $this->list->get_teacher_lang();
        $gp_data['timeselect_opt']              = $this->load->view('component/timeselect_opt_view','',TRUE);
        
//        echo '<pre>';
//        print_r( $gp_data );
//        echo '</pre>';
        
        $main_data_ar['title']                  = 'Группы &rarr; '.$gp_data['group_info_ar']['name'];
        $main_data_ar['left_menu']              = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']          = $this->load->view('page/group_cart_view', $gp_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    
    function add_group(){
        $gp_data['classroom_list']  = $this->list->get_classroom();
        $gp_data['teachers_list']   = $this->list->get_teacher_lang();
        $gp_data['lang_list']       = $this->list->get_lang();
        $gp_data['timeselect_opt']  = $this->load->view('component/timeselect_opt_view','',TRUE);
        $gp_data['students_list']   = $this->student->get_students();
        
//        echo '<pre>';
//        print_r($gp_data);
//        echo '</pre>';          
        
        $main_data_ar['left_menu']              = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']          = $this->load->view('page/add_group_view', $gp_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    function teacher_cart( $teacher_id = FALSE ){
        $teacher_id = (int) $teacher_id;
        if( $teacher_id == false ) show_404 ();
        $tch_data['teacher_info']       = $this->teacher->get_teacher_info($teacher_id);
        $tch_data['teacher_lang_list']  = $this->teacher->get_lang_for_teacher($teacher_id);
        $tch_data['other_groups_list']  = $this->teacher->get_oter_group_for_teacher($teacher_id);
        $tch_data['lang_list']          = $this->list->get_lang();
        
//        echo '<pre>';
//        print_r($tch_data);
//        echo '</pre>';        
        
        $main_data_ar['title']          = 'Преподаватели &rarr; '.$tch_data['teacher_info']['fio'];
        $main_data_ar['left_menu']              = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']          = $this->load->view('page/teacher_cart_view', $tch_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    function teachers(){
        $tch_data['teachers_list'] = $this->teacher->get_teachers();

//        echo '<pre>';
//        print_r($tch_data);
//        echo '</pre>';
        
        $main_data_ar['title']          = 'Преподаватели';
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']  = $this->load->view('page/teachers_view', $tch_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    
    function add_teacher(){
        $tch_data['lang_list']  = $this->list->get_lang();
        $tch_data['group_list'] = $this->list->get_groups();
        
        $main_data_ar['title']          = 'Преподаватели &rarr; добавление';
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']  = $this->load->view('page/add_teacher_view', $tch_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    function payment( $period = false, $date = false ){

        if( !$date )    $date   = date("Y-m-d");
        if( !$period )  $period = 'week';
        
        $period_ar = get_month_or_week_period($period, $date );
        $top_btn['next_prev_date']  = get_next_prev_date_for_payment( $period, $period_ar );
        $top_btn['month_week']      = $period;
        
        if( $period == 'week' ){
            $date_str_ar['start']   = get_date_str_ar( $period_ar['start'] ); 
            $date_str_ar['stop']    = get_date_str_ar( $period_ar['stop'] );
            $top_btn['title_str']   = $date_str_ar['start']['month_str'].' ('.$date_str_ar['start']['month_nmbr'].'.'.$date_str_ar['start']['day_nmbr'].' - '.$date_str_ar['stop']['month_nmbr'].'.'.$date_str_ar['stop']['day_nmbr'].')';
        }
        elseif( $period == 'month' ){
            $date_str_ar            = get_date_str_ar( $period_ar['start'] ); 
            $top_btn['title_str']   = $date_str_ar['month_str'].' '.$date_str_ar['year_nmbr'];
        }
        
        $pay_data['payment_list']       = $this->payment->get_peyment( $period_ar );
        
//        echo '<pre>';
//        print_r($pay_data);
//        echo '</pre>';

        $main_data_ar['title']          = $this->load->view('component/payment_top_view', $top_btn, TRUE);;
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']  = $this->load->view('page/payment_view', $pay_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
    
    function schedule(){
        $this->load->library('schedule_lib');
        
        $sch_data['time_column']        = $this->load->view('component/schedule/time_column_view','',TRUE);
        $sch_data['classroom_list']     = $this->list->get_classroom();
        $sch_data['group_list']         = $this->list->get_groups();
        $tmp_group_ar                   = $this->group->get_individ_groups();
        $sch_data['teacher_list']       = $this->list->get_teacher_lang();
        $sch_data['timetable_list']     = $this->schedule->get_timetable();
        $sch_data['time_ar']            = $this->schedule_lib->get_time_ar();
        
        foreach( $tmp_group_ar as $key => $val) // дополнение массива групп индивидуальными группами
            $sch_data['group_list'][$key] = $val;
        
//        echo '<pre>';
//        print_r($sch_data['group_list']);
//        echo '</pre>';
        
        $main_data_ar['title']          = 'Расписание';
        $main_data_ar['left_menu']      = $this->load->view('component/left_menu_view', '', TRUE);
        $main_data_ar['right_content']  = $this->load->view('page/schedule_view', $sch_data, TRUE);
        
        $this->load->view('main_view', $main_data_ar );
    }
}