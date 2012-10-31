/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */





function change_payment_type(){ //== переключение типов платежа
    payment_type = $('.payment_type_tbl input:checked').attr('value');
    
    if( payment_type == 'cnt_lesson' ){
        $('.paymant_add_tbl .peyment_cnt_lesson_tr')    .css({display:'table-row'});
        $('.paymant_add_tbl .peyment_period_start_tr')  .css({display:'table-row'});
        $('.paymant_add_tbl .peyment_period_tr')        .css({display:'none'});
        $('.paymant_add_tbl .peyment_other_tr')         .css({display:'none'});
    }
    if( payment_type == 'period' ){
        $('.paymant_add_tbl .peyment_cnt_lesson_tr')    .css({display:'none'});
        $('.paymant_add_tbl .peyment_period_start_tr')  .css({display:'table-row'});
        $('.paymant_add_tbl .peyment_period_tr')        .css({display:'table-row'});
        $('.paymant_add_tbl .peyment_other_tr')         .css({display:'none'});
    }
    if( payment_type == 'other' ){
        $('.paymant_add_tbl .peyment_cnt_lesson_tr')    .css({display:'none'});
        $('.paymant_add_tbl .peyment_period_start_tr')  .css({display:'none'});
        $('.paymant_add_tbl .peyment_period_tr')        .css({display:'none'});
        $('.paymant_add_tbl .peyment_other_tr')         .css({display:'table-row'});
    }
}

function set_jq_action(){
    //== пауза занятий в группе ==//
    $('.st_cart_pause_group_btn').click(function(){
        pause_block = $(this).closest(".st_cart_paus_in_group_block");
        if( pause_block.height() <= 10 )
        {
            class_name = $(this).attr("class");
            if( class_name == 'st_cart_pause_group_btn st_cart_pauset')
                pause_block.animate({height:'107px'}, 400, function(){
                    pause_block.css({'height':'auto'});
                }).css({'background':'#fff0f0'});
            else
                pause_block.animate({height:'122px'}, 400).css({'background':'#f6f8f9'});
            
            pause_block.toggleClass('st_cart_paus_in_group_block_show');
        }
    });
    
    $('.hide_st_cart_pause').click(function(){
        pause_block = $(this).closest(".st_cart_paus_in_group_block");
        pause_block.css({'background':'#fff'}).animate({height:'10px'}, 200);
        pause_block.toggleClass('st_cart_paus_in_group_block_show');
    });

    //=======//
    $('.renew_show_btn').click(function(){
        $('.st_cart_pauset_renew_block', $(this).closest('td') ).animate({height: "28px", marginTop:'10px'}, 200);
    });
    //== пауза занятий в группе ==//  
    
    // == календарь == //
         $.datepicker.setDefaults( $.extend($.datepicker.regional["ru"]) );
         
         $(".date_input, .date_input_all").datepicker({
            beforeShow: function(){
                $(this).addClass('calendar_tmp');
            },
            onClose: function(){
                $(this).removeClass('calendar_tmp');
            },
	    altField : '.calendar_tmp',
            altFormat: 'dd.mm.yy',
            showOtherMonths:true,
            firstDay : 1,
            showOn: 'both',
            buttonText: '',
            showAnim: 'fadeIn',
            duration: 300,
            changeYear: true,
            changeMonth: true
	  });
    // == .календарь == // 
    
    
    //<предпочтительный график студента без группы>
    if( typeof(st_info_obj) != 'undefined' ){
        $('select[name=count_lesson]    option[value='+st_info_obj.count_lesson+']')    .attr('selected', 'selected');
        $('select[name=lesson_form]     option[value='+st_info_obj.lesson_form+']')     .attr('selected', 'selected');
        $('select[name=lesson_length]   option[value='+st_info_obj.lesson_length+']')   .attr('selected', 'selected');
        
        for(i=0; i<st_info_obj.schedule_ar.length; i++ ){
            day_obj = st_info_obj.schedule_ar[i];
            day_obj.day++; //увеличение значения дня из-за tr заголовка
            $('.group_schedule_tbl tr:nth-child('+(day_obj.day)+') input')                              .attr('checked', 'checked');
            $('.group_schedule_tbl tr:nth-child('+(day_obj.day)+') .st_cart_schedule_checkboxCls')      .addClass('st_cart_schedule_checkedCls');
            $('.group_schedule_tbl tr:nth-child('+(day_obj.day)+') option[value="'+(day_obj.time)+'"]') .attr('selected', 'selected');
        }
    }
    //</предпочтительный график студента без группы>
    
    
    //== раскрытие/закрытие формы приема платежа
    $('#show_add_payment_form').click(function(){
        $(this).hide(0);
        $('#add_payment_form_block').show(200);
        $('.st_cart_payment_scroll_block').animate({'max-height':'200px'},200);
    });
    
    $('#close_payment_form').click(function(){
        $('#add_payment_form_block').hide(200, function(){
            $('#show_add_payment_form').show(0);
        });
        $('.st_cart_payment_scroll_block').animate({'max-height':'300px'},200);
        //очистка данных
        form = $('#add_payment_form');
        $('input[name=payment_id], input[name=summ], input[name=cnt_lessons]', form).attr('value','');
        dateObj = new Date()
        $('input[name=date]', form).attr('value', dateObj.getDate()+'.'+dateObj.getMonth()+'.'+dateObj.getFullYear());
        
        $('.jq_payment_btn').text('Добавить платеж');
    });
    
    $('#payment_add_btn').click(function(){
        $('#add_payment_form_block').hide(200, function(){
            $('#show_add_payment_form').show(0);
        });
        $('.st_cart_payment_scroll_block').animate({'max-height':'300px'},200);
    });
    
    $('.ui-state-default a').click(function(){ //установка id группы в форме оплаты
        group_id = $('.st_cart_payment_scroll_block:visible').attr('groupid');
        $('#add_payment_form input[name=group_id]').attr('value', group_id);
        // <сертификаты>
            cert_group_id = $('.certificate_tab_block:visible').attr('groupid');
            $('form[name=certificate] input[name=group_id]').attr('value', cert_group_id);
        // </сертификаты>
    });
    //== /раскрытие/закрытие формы приема платежа
    
    
    
    // <раскрытие/закрытие формы> 
    $('.show_form_btn').click(function(){
        $(this).hide(0);
        $('.hide_form').slideDown(100);
    }); 
    $('.hide_form_btn').click(function(){
        $('.hide_form').slideUp(100, function(){
            $('.show_form_btn').show(0);
        });
    });
    // </раскрытие/закрытие формы>
}

$(document).ready(function() {


set_jq_action();


         
    
    
 


//== checkbox в графике занятий студента (schedule) ==//
    function checkbox_schedule(){
        checkbox = $('.st_cart_schedule_tbl input[type=checkbox]');
        
        for( i=0; i<=checkbox.length; i++ ){
            this_checkbox = checkbox[i];
            this_tr = $( this_checkbox ).closest('tr');
            
            if( $( this_checkbox ).attr('checked') == 'checked'){
                $( 'td', this_tr ).css( {'color':'#111111'} );
                $( 'td:nth-child(2)', this_tr ).css({'opacity':'1'});
                $( 'input[type=text]', this_tr ).attr('disabled', false);
            }
            else{
                $( 'td', this_tr ).css( {'color':'#898989'} );
                $( 'td:nth-child(2)', this_tr ).css({'opacity':'0.5'});
                $( 'input[type=text]', this_tr ).attr({'disabled':'disabled', 'value':''});
            }
        }
    }
    checkbox_schedule();
    
    $('.st_cart_schedule_tbl input[type=checkbox]').change(function(){checkbox_schedule()});
//== /checkbox в графике занятий студента (schedule) ==//



//== checkbox в графике занятий группы (schedule) ==//
    function checkbox_schedule_group(){
        checkbox = $('.group_schedule_tbl input[type=checkbox]');
        
        for( i=0; i<=checkbox.length; i++ ){
            this_checkbox = checkbox[i];
            this_tr = $( this_checkbox ).closest('tr');
            
            if( $( this_checkbox ).attr('checked') == 'checked'){
                $( 'td', this_tr ).css( {'color':'#111111'} );
                $( 'select', this_tr ).attr('disabled', false);
            }
            else{
                $( 'td', this_tr ).css( {'color':'#898989'} );
                $( 'select', this_tr ).attr({'disabled':'disabled', 'value':''});
            }
        }
        $(".greyselect").trigger("liszt:updated");
    }
    checkbox_schedule_group();
    
    $('.group_schedule_tbl input[type=checkbox]').change(function(){checkbox_schedule_group()});
//== /checkbox в графике занятий группы (schedule) ==//



//== checkbox - выбор студентов в карточке группы ==//
    $('.add_students_scroll_block input[type=checkbox]').change(function(){
        this_li = $(this).closest('li');
        if( $('input', this_li).attr('checked') == 'checked' )
            $( this_li ).addClass('selected_student');
        else
            $( this_li ).removeClass('selected_student') ;
    });  
//== /checkbox - выбор студентов в карточке группы ==//


//== сворачивание и разворачивание левой панели меню ==//
    function left_menu_hide(){
        $('.left_menu_width').animate({'width':'38px', 'opacity':'0'}, 200, function(){
            $('.left_menu_width').css({'visibility':'hidden'}); //== для блядского IE
            $('#left_menu_small').css({'display':'block'}).animate({'opacity':'1'}, 200);
            $('#top_back_btn').css({'background-position':'left -39px'});
            width_main_schedule();
        });
    }
    
    function left_menu_show(){
        $('#left_menu_small').animate({'opacity':'0'}, 200, function(){
            $('#left_menu_small').css({'display':'none'});
            $('.left_menu_width').css({'visibility':'visible'}); //== для блядского IE
            $('.left_menu_width').animate({'width':'170px', 'opacity':'1'}, 200);
            $('#top_back_btn').css({'background-position':'left top'});
            width_main_schedule('set_default');
        });
    }

    $('#top_back_btn').toggle( left_menu_hide, left_menu_show );
    $('.small_menu_search_btn').click(function(){left_menu_show()});
//== /сворачивание и разворачивание левой панели меню ==//




//== отметить/снять все чекбоксы ==//
    $('#check_all').change(function(){
        checked = $(this).attr('checked');
        checkbox = $('.group_tbl tr td:nth-child(1) input:visible');
        
        for(i=0; i<checkbox.length; i++ ){
            
            if( checked == 'checked' ){
                $( checkbox[i] ).attr('checked', 'checked');
                $( checkbox[i] ).closest('div.ez-checkbox').addClass('ez-checked');
            }
            else{
                $( checkbox[i] ).attr('checked', false);
                $( checkbox[i] ).closest('div.ez-checkbox').removeClass('ez-checked');
            }
        }
            
    });
//== /отметить/снять все чекбоксы ==//

//== отметить/снять все чекбоксы (звездочки) ==//
    $('#check_all_star').change(function(){
        checked = $(this).attr('checked');
        checkbox = $('.memo_tbl tr td:nth-child(1) input');
        
        for(i=0; i<checkbox.length; i++ ){
            
            if( checked == 'checked' ){
                $( checkbox[i] ).attr('checked', 'checked');
                $( checkbox[i] ).closest('div.star_checkboxCls').addClass('star_checkedCls');
            }
            else{
                $( checkbox[i] ).attr('checked', false);
                $( checkbox[i] ).closest('div.star_checkboxCls').removeClass('star_checkedCls');
            }
        }
            
    });
//== /отметить/снять все чекбоксы (звездочки) ==//
 

//== выпадающий список ==//
    $('.show_slide_list').click(function(){
        $('.slide_list_block', this).slideDown(10);
    });
    $('body').click(function(){
        if( $('.slide_list_block').is(":animated") == false )
            $('.slide_list_block').slideUp(10);
    });
    $('.slide_list_block').click(function(event){
        event.stopPropagation();
    });

//== /выпадающий список ==//


// копирование данных студентов //
    $('.student_copy_ul li.copy_info').click(function(){
        copyname = $(this).attr('copyname');
        data_obj = $('.checkline:checked');
        data = '';
        for(i=0; i<data_obj.length; i++){
            data_str = $(data_obj[i]).attr(copyname);
            if( data_str.length > 2)
                data = data+'\n'+data_str;
        }
        
        alert(data);
        
        $('.slide_list_block').slideUp(10);
    });
// /копирование данных студентов //

// <фильтр языков>
    $('.jq_lang_filter li').click(function(){
        lang = $(this).attr('lang');
        if( lang == 'all'){
            $('.jq_lang_filter_title').text('Все языки');
            $('.jq_student_str').css({display:'table-row'});
        }
        else{
            $('.jq_lang_filter_title').text(lang);
            StudentStrObj = $('tr.jq_student_str');
            for(i=0; i<StudentStrObj.length; i++){
                shortLangStr = $('td:nth-child(5)', StudentStrObj[i]).text();
                if( shortLangStr.search(lang) == -1 )
                    $( StudentStrObj[i] ).css({'display':'none'});
                else
                    $( StudentStrObj[i] ).css({'display':'table-row'});
            }
        }
        $('.slide_list_block').slideUp(100);
//        set_jq_style();
    });
// </фильтр языков>

//  <поиск в выдачи студентов>
    $('.jq_st_search').keyup(function(){
        $('.jq_lang_filter_title').text('Все языки');

        searchTxt = $(this).attr('value');
        StudentStrObj = $('tr.jq_student_str');
        
        searchObj = RegExp(searchTxt, "i");
        
        if(searchTxt.length >= 3 ){ //ограничение ноличества символов поиска
            for(i=0; i<StudentStrObj.length; i++){
                    nameStr     = $('td:nth-child(3) a',StudentStrObj[i]).text();
                    phoneStr    = $('td:nth-child(4)',  StudentStrObj[i]).text();
                    groupAr     = $('td:nth-child(6) a',StudentStrObj[i]);
                    groupStr    = '';
                    for(ii=0; ii<groupAr.length; ii++)
                        groupStr += $(groupAr[ii]).text();

                    if( nameStr.search(searchObj) != -1 || phoneStr.search(searchObj) != -1 || groupStr.search(searchObj) != -1 )
                        $( StudentStrObj[i] ).css({'display':'table-row'});
                    else
                        $( StudentStrObj[i] ).css({'display':'none'});  
            }
        }
        else
            $('tr.jq_student_str').css({'display':'table-row'});
    });
//  </поиск в выдачи студентов>

//== подсветка input блока ==//
    $('.add_st_input_block_left input[type=radio]').change(function(){
        $('.add_student_input_block').css({'background':'#fff'});
        $(this).closest('.add_student_input_block').css({'background':'#deeaf5'});
        
        $('.add_student_input_option_block').css({'display':'none'});
        $('.add_student_input_option_block', $(this).closest('.add_student_input_block_parent') ).css({'display':'block'});;
    });
//== подсветка /input блока ==//


    width_main_schedule( 'get_default' ); //установка ширины расписания
//    width_main_schedule( 'set_default' ); //установка ширины расписания

});


// <добавление студентов в группу>
    function add_students_to_group(){
        data_obj = $('.checkline:checked');
        idAr = new Array;
        for(i=0; i<data_obj.length; i++){
            idAr[i] = $(data_obj[i]).attr('student_id');
        }
//        console.log(idAr);
        ajax_show_modal('/ajax/show_modal/add_student_to_group/', {id_ar: idAr} );
    }
// </добавление студентов в группу>

//== установка ширины таблицы ==//
var default_sch_w;
function width_main_schedule( param ){

    if( param == 'get_default' ){
        default_sch_w = $('#right_content').width();
//        default_sch_w = $('#main').width() - $('#left_menu').width();
        shc_w = default_sch_w;
    }
    else if( param == 'set_default' ){
        shc_w = default_sch_w;
    }
    else{
        shc_w = $('#right_content').width();
//        shc_w = $('#main').width() - $('#left_menu').width();
    }
    
//    alert( shc_w + ' - ' + param);
    $('#main_schadule').css({'width':shc_w+'px'});
}
//== //установка ширины таблицы ==//


//== функции добавления группы ==//
function add_teacher_to_group(){
    teacher_id  = $('#group_teacher').attr('value');
    teacher_fio = $('#group_teacher option:selected').text();
    
    teacher_str = '<tr id="teacher_tr_'+teacher_id+'"><td style="width: 210px" >\n\
<a href="/teacher_cart/'+teacher_id+'/">'+teacher_fio+'</a>\n\
</td><td><a class="del_payment" href="javascript:void(0)" onclick="del_teacher_from_group('+teacher_id+')">Удалить</a>\n\
<input type="hidden" name="teacher_for_group[]" value="'+teacher_id+'"></td></tr>';
    
    teacher_option_str = '<option value="'+teacher_id+'">'+teacher_fio+'</option>';
    
    $('#teacher_tbl').prepend(teacher_str);
    $('.group_schedule_tbl tr td:nth-child(5) select').prepend(teacher_option_str);
//    $('#group_teacher option[value='+teacher_id+']').remove();
}

function del_teacher_from_group( id ){
    $('#teacher_tr_'+id).remove();
    $('.group_schedule_tbl tr td:nth-child(4) select option[value='+id+']').remove(); 
}

//== /функции добавления группы ==//




//== функции добавления студентов в группу ==//
function add_student_to_group(){
    student_id  = $('select[name=student_tmp]').attr('value');
    student_fio = $('select[name=student_tmp] option:selected').text();
    
    student_str = '<li id="student_li_'+student_id+'"><a href="/student/'+student_id+'/">'+student_fio+'</a>\n\
<a href="javascript:void(0)" class="del_payment" onclick="del_st_from_group('+student_id+')">Удалить</a>\n\
<input type="hidden" name="students_in_group[]" value="'+student_id+'"></li>';
    
    $('.studen_cart_studen_list li.studen_list_position_li:last-child').before(student_str);
}

function del_st_from_group(id){
    $('#student_li_'+id).remove();
}

function upd_payment(data){
    $('#show_add_payment_form').hide(0);
    $('#add_payment_form_block').show(200);
    $('.st_cart_payment_scroll_block').animate({'max-height':'200px'},200);
    
    $('input[name=payment_id]')                     .attr('value', data.id);
    $('.paymant_add_tbl input[name=summ]')          .attr('value', data.summ);
    $('.paymant_add_tbl input[name=cnt_lessons]')   .attr('value', data.cnt_lesson);
    $('.paymant_add_tbl input[name=date]')          .attr('value', data.date);
    $('.paymant_add_tbl textarea[name=comment]')    .attr('value', data.comment);
    
    $('.jq_payment_btn').text('Изменить платеж');
    
    if( data.not_full == 1){ //частичная оплата
        $('.paymant_add_tbl input[name=not_full]')  .attr('checked', 'checked');
        $('.paymant_add_tbl .st_cart_schedule_checkboxCls').addClass('st_cart_schedule_checkedCls');
    }
    else
        $('.paymant_add_tbl .st_cart_schedule_checkboxCls').removeClass('st_cart_schedule_checkedCls');
}
//== /функции добавления студентов в группу ==//