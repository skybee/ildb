/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



function send_form( formId, modalTxtObj  ){
    $( formId ).ajaxSubmit({
        type:           'post',
        dataType:       'json',
        beforeSubmit:   function(){
            show_modal( modalTxtObj.title, modalTxtObj.content );
        },
        success:        function( anserAr ){
            show_modal( anserAr['title'], anserAr['content'], anserAr['close_link'] );
            
            if( anserAr['script'] )
                eval(anserAr['script']);
        }
    });
}

function send_post(dataObj, url, modalTxtObj ){
    show_modal( modalTxtObj.title, modalTxtObj.content);
    
    $.post(
            url, 
            dataObj,
            function(anserAr){
                show_modal( anserAr['title'], anserAr['content'], anserAr['close_link']);
        
            if( anserAr['script'] )
                eval(anserAr['script']);
            },
            'json'
     )
    .error(function() {show_modal( 'Произошла ошибка', 'Попробуйте повторить действие еще раз, либо перегрузить страницу')})
}


function ajax_show_modal( url, dataObj ){
   $.post(
            url, 
            dataObj,
            function(anserAr){
                show_modal( anserAr['title'], anserAr['content'], anserAr['close_link']);
        
            if( anserAr['script'] )
                eval(anserAr['script']);
            },
            'json'
     )
    .error(function() {show_modal( 'Произошла ошибка', 'Попробуйте повторить действие еще раз, либо перегрузить страницу')}) 
}


function show_modal( title, content, close_link){
    
    
    if( content == 'loader' ) content = '<div id="modal_loader"></div>';
    if( close_link ){
        $('#modal_bg').attr('reload', close_link);
    }
    
    
    $('#modal_dialog_title')    .html(title);
    $('#modal_dialog_content')  .html(content);
    
    $('#modal_bg').css({'display':'block'})
    
    window_h        = $('#modal_bg').innerHeight();
    modal_block_h   = $('#modal_dialog_block').innerHeight();
    modal_margin_top = ( window_h - modal_block_h ) / 2; 
    
    $('#modal_bg').animate({opacity: 1}, 100, function(){
        $('#modal_dialog_block').animate({'opacity': '1', 'margin-top':modal_margin_top+'px'}, 200);
    });
    
}


function close_modal(){
    $('#modal_bg').animate({opacity: 0}, 100, function(){
        $('#modal_bg').css({'display':'none'});
        $('#modal_dialog_block').css({'opacity':'0', 'margin-top':'0px'});
        $('#modal_dialog_title, #modal_dialog_content').empty();
    });
    
    //== перенаправление на другой URL ==//
    r_link = $('#modal_bg').attr('reload');
    if( r_link ){window.location.href = r_link;}
}


function ajax_update( update_block_selector, url){
    $.get(url)
    .success(function(data){
        $(update_block_selector).html(data);
        set_jq_style();
        set_jq_action();
    })
    .error(function() {show_modal( 'Ошибка обновления страницы', 'Попробуйте перегрузить страницу')})
}


function check_important( st_id ){ //включение/выключение звездочки в БД
    div_class = $('input[name=star_'+st_id+']').closest('div').attr('class');
    
    if( div_class == 'star_checkboxCls')
        status = 'on';
    else
        status = 'off';
    
    $.post( '/action/student/change_star/', {st_id: st_id, st_star: status} );
}


function del_students( actionStr ){
    if( actionStr == 'arhive' )
        modalStr = 'Выполняется перемещение студентов в архив'
    else if( actionStr == 'delete' )
        modalStr = 'Выполняется удаление студентов'
    else
        return false;
    
    data_obj = $('.checkline:checked');
    
    if( data_obj.length < 1){
        show_modal( 'Ошибка выполнения', 'Нет выбранных студентов');
        return false;
    }
    
    idAr = [];
    for(i=0; i<data_obj.length; i++){
        idAr[i] = $(data_obj[i]).attr('student_id');
    }
    
    send_post({'id_ar':idAr, 'action':actionStr}, '/action/student/del_student/', {title:modalStr, content:'loader'} )
    
    $('.checkline:checked').closest('tr').css({'display':'none'});
}

