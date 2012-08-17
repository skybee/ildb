/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    
function set_jq_style(){
    
   //== таблица группы ==//
//   $('.group_tbl td:nth-child(1)').css({'width':'35px'});
//   $('.group_tbl td:nth-child(2)').css({'width':'30px','text-align':'center'});
   $('.group_tbl td:nth-child(2)').css({'text-align':'center'});
//   $('.group_tbl td:nth-child(4)').css({'width':'50px'});
//   $('.group_tbl td:nth-child(5)').css({'width':'70px'});
//   $('.group_tbl td:nth-child(6)').css({'width':'70px'});
   $('.group_tbl tr:odd, .memo_tbl tr:odd').css({'background-color':'#deeaf5'});
   
   
   //== таблица студенты ==//
//   $('.student_tdl td:nth-child(4)').css({'width':'110px'});
//   $('.student_tdl td:nth-child(5)').css({'width':'50px'});
//   $('.student_tdl td:nth-child(6)').css({'width':'auto'});
//   $('.student_tdl td:nth-child(7)').css({'width':'110px'});
   
   
   //== таблица оплаты ==//
   $('.payment_tbl td:nth-child(4)').css({'width':'100px'});
   $('.payment_tbl td:nth-child(5)').css({'width':'100px'});
   $('.payment_tbl td:nth-child(6)').css({'width':'60px', 'padding-right':'20px'});
   $('.payment_tbl td:nth-child(8)').css({'width':'110px'});
   
   
   //== таблица карта студента( инфо ) ==//
   $('.studen_cart_info table.student_cart_info_tbl tr td:nth-child(1)').css({'color':'#898989'});
   
   //== таблица в карте студента(оплаты) ==//
   $('.student_cart_payment_tab_tbl  td:nth-child(1)').css({'width':'70px', 'padding-left':'40px'});
   $('.student_cart_payment_tab_tbl  td:nth-child(2)').css({'width':'100px'});
   $('.student_cart_payment_tab_tbl  td:nth-child(3)').css({'width':'90px'});
   $('.student_cart_payment_tab_tbl  td:nth-child(4)').css({'width':'90px'});
   $('.student_cart_payment_tab_tbl  td:nth-child(5)').css({'width':'auto'});
   $('.student_cart_payment_tab_tbl  td:nth-child(6)').css({'width':'90px'});
   $('table.student_cart_payment_tab_tbl tr:odd').css({'background-color':'#f6f8f9'});
   
   $('.paymant_add_tbl  td:nth-child(1)').css({'width':'130px'});
   
   //== таблица в карте студента(добавление группы) ==//
   $('.studen_cart_add_to_group_block .paymant_add_tbl  td:nth-child(1)').css({'width':'112px'});
   
   
   //== таблица карта студента( сертификаты ) ==//
   $('.certificates_list_tbl tr td:nth-child(1)').css({'width':'80px'});
   $('.certificates_list_tbl tr td:nth-child(3)').css({'width':'100px'});
   
   //== таблица карта группы (инфо) ==//
   $('.studen_cart_info table.group_cart_info_tbl tr td:nth-child(2)').css({'color':'#111'});
   $('.studen_cart_info table.group_cart_info_tbl tr td:nth-child(2) table tr td:nth-child(1)').css({'color':'#111'});
   
   //== отвязка jquery ширины ==//
   $('.css_tbl_auto tr:nth-child(2) td').width('auto');
   
   
   //== input[type=checkbox] (звездочки) ==//
   $('.group_tbl tr td:nth-child(1) input').ezMark();
   $('#check_all').ezMark();
   
   $('.st_cart_schedule_tbl input[type=checkbox], .add_students_scroll_block li input, .group_schedule_tbl input[type=checkbox], .techer_option_list_block input[type=checkbox], .payment_comment_tbl input[type=checkbox]')
    .ezMark({checkboxCls:'st_cart_schedule_checkboxCls', checkedCls:'st_cart_schedule_checkedCls'});
   
   $('.star_checkbox, .memo_tbl input, #check_all_star').ezMark({checkboxCls:'star_checkboxCls', checkedCls:'star_checkedCls'});
   $('.radio_1, .payment_type_tbl input').ezMark({radioCls:'input_radio_1_default', selectedCls:'input_radio_1_checked'});
   
   
   
   
   
   // == select == //
   $(".greyselect").chosen({no_results_text: "Нет совпадений"});
   
   
   // == scroll panell == //add_students_scroll_block
//    $('.add_students_scroll_block').jScrollPane({showArrows:true});
//    $('.st_cart_payment_scroll_block').jScrollPane({showArrows:true});
   
   // == табы в карточке студента == //
   $( "#tabs" ).tabs();
   $( "#tabs2" ).tabs();
   $('.student_cart_tabs .ui-tabs-nav li:nth-child(1)').css({'z-index':'10'});
   $('.student_cart_tabs .ui-tabs-nav li:nth-child(2)').css({'z-index':'9'});
   $('.student_cart_tabs .ui-tabs-nav li:nth-child(3)').css({'z-index':'8'});
   $('.student_cart_tabs .ui-tabs-nav li:nth-child(4)').css({'z-index':'7'});
   $('.student_cart_tabs .ui-tabs-nav li:nth-child(5)').css({'z-index':'6'});
   
   
   // == табы страницы == //
   $( "#page_tabs" ).tabs();
   
   
   // == main schedule == //
   $('.main_sch_vline .sch_time_td:nth-child(odd)').css({'background':'#deeaf5'});
   

}
   
$(document).ready(function() {   
    set_jq_style();
    
    //== оборачивание input календаря ==// 
   $('.date_input_all').wrap('<div class="date_input_all_block" ></div>');
   //== input[type=text] (серые текстовые инпуты) ==//
   $('.greyinput').wrap('<div class="greyinput_block"><div></div></div>');
});
   

