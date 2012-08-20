function sch_set_empty_dot( drag_element ){ //== устанавливает закрытые и открытые ячейки для сброса drag-блока
    
    $('.sch_drop').removeClass('sch_dot_close');//.css({'background':'#0c0'});
    
    sch_drag_ar = $('.sch_drag')
    
    for( i=0; i<sch_drag_ar.length; i++ ){
        this_drag       = sch_drag_ar[i];
        this_drag_dot   = $(this_drag).closest('.sch_drop');
        timesize        = $(this_drag).attr('timesize');
        
        this_next_dot = $(this_drag_dot);
        for(ii=0; ii<timesize; ii++){
            $(this_next_dot).addClass('sch_dot_close');//.css({'background':'#c00'});
            this_next_dot = $(this_next_dot).next('.sch_drop');
        }
    }
    
    
    //== установка свободных ячеек под перетаскиваемым элементом ==//
    if( drag_element != 'undefined' ){
        this_drag_dot   = $(drag_element).closest('.sch_drop');
        timesize        = $(drag_element).attr('timesize');
        
        this_next_dot = $(this_drag_dot);
        for(ii=0; ii<timesize; ii++){
            $(this_next_dot).removeClass('sch_dot_close');//.css({'background':'#0c0'});
            this_next_dot = $(this_next_dot).next('.sch_drop');
        }
    }
    //== /установка свободных ячеек под перетаскиваемым элементом ==//
    
    
}

function del_street_light(){ //выключение подсветки ячеек
    $('.main_schadule_tbl div[starttime]').css({'box-shadow':'none'});
}

function hide_empty_dot(){ // скрывает пустые ячейки
    less_block_ar = $('.sch_drag'); //получениет всех блоков занятий
    
    $('.sch_time_td').css({'display':'none'}); //сокрытие всех блоков
    
    for(i=0; i<less_block_ar.length; i++){
        timesize = $(less_block_ar[i]).attr('timesize'); //получение длины занятия(кол-во ячеек)
        
        next_dot = $(less_block_ar[i]).closest('.sch_time_td'); //получение первой ячейки занятой уроком
        
        for(ii=1; ii<=timesize; ii++){
            day_dot     = $(next_dot).attr('day_dot');
            starttime   = $(next_dot).attr('starttime');
            
            $('.sch_time_td[starttime="'+starttime+'"][day_dot="'+day_dot+'"]').css({'display':'block'});
            next_dot = $(next_dot).next('div');
        }
    }
}

function show_empty_dot(){ // показывает скрытые пустые ячейки
    $('.sch_time_td').css({'display':'block'});
}

function set_drag_data( drag ){
    starttime   = $(drag).attr('starttime');
    timesize    = $('.sch_drag',drag).attr('timesize');
    day         = $(drag).attr('day_dot');
    classroom   = $(drag).attr('classroom');
    
//    alert( starttime+' - '+timesize+' - '+day+' - '+classroom );
    
//    send_post(
//        { starttime:starttime, timesize:timesize, day:day, classroom:classroom},
//        '/action/schedule/drag_change/',
//        {title:'Перенос занятия',content:'loader'}
//    );
        
    $.post(
        '/action/schedule/drag_change/',
        { starttime:starttime, timesize:timesize, day:day, classroom:classroom}
    );    
}


$(document).ready(function() {
    
    sch_set_empty_dot();
    
    // == MAIN SHEDULE == //
    $('.sch_drag').draggable({
        helper : 'clone',
        opacity : function(){if( $.browser.msie ) return 1; else return 0.5;},
        start : function(){
                    sch_set_empty_dot( this );
                    del_street_light();
                }
    });
    $('.sch_drop').droppable({
                    tolerance : 'intersect',
                    drop : function(event, ui) {

                            // == определение свободных ячеек для сброса ==//
                            if( $(this).nextUntil('div.sch_dot_close').length +1 >= $(ui.draggable).attr('timesize') && $(this).hasClass('sch_dot_close') == false ){
                                $(this).append(ui.draggable);
                                sch_set_empty_dot(); //== дективация/активация ячеек под drag элеметом 
                                set_drag_data(this);
                            }
                    },
                    accept : '.sch_drag'
            });
    // == /MAIN SHEDULE == //
    
    
    // <подсветка строки времени>
    $('.visual_drag').click(function(){
        timesize    = $(this).closest('.sch_drag').attr('timesize');
        starttime   = $(this).closest('.sch_time_td').attr('starttime');
        day         = $(this).closest('.sch_time_td').attr('day_dot');
        
        del_street_light();
        
        next_dot = $('div[starttime="'+starttime+'"][day_dot="'+day+'"]');
        for(i=1;i<=timesize;i++){
            $(next_dot).css({'box-shadow':'inset 0px 0px 10px 10px rgba(242,244,222,0.85)'});
            next_dot = $(next_dot).next('div');
        }
    });
    // </подсветка строки времени>
    
    // <подсветка выбранных групп>
    $('.visual_drag').click(function(){
        
        group_id = $(this).attr('group_id');
        
        $('.visual_drag').css({'box-shadow':'none'});
        $('.visual_drag[group_id="'+group_id+'"]').css({'box-shadow':'0px 0px 0px 3px rgb(25, 129, 184)'});
//        $(this).css({'box-shadow':'0px 0px 0px 3px rgb(25, 183, 36)'});
    });
    // </подсветка выбранных групп>
    
    // показ/скрытие пустых ячеек
    $('#hide_empty_dot').toggle( function(){hide_empty_dot()}, function(){show_empty_dot()} );
    
    // выключение подсветки ячеек по клику на пустом поле
//    $('.main_schadule_tbl div[starttime]').click(function(){ del_street_light() });
    
});