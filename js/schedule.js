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

function del_check_lesson_group(){
    $('.visual_drag').closest('.sch_time_td').removeClass('lesson_data');
    $('.visual_drag').css({'box-shadow':'none'});
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
    
    $.cookie('empty_dot', 'hide', { expires: 7, path: '/' } );
}

function show_empty_dot(){ // показывает скрытые пустые ячейки
    $('.sch_time_td').css({'display':'block'});
    $.cookie('empty_dot', 'show', { expires: 7, path: '/' } );
}

function set_drag_data( drag ){
    //<подсветка и добавление класса к драг блоку>
//    group_id = $(drag).attr('group_id');
//    $(drag).addClass('lesson_data');
//    $('.visual_drag').css({'box-shadow':'none'});
    //<подсветка и добавление класса к драг блоку>
    
//    alert($('.sch_drag',drag).attr('group_id'));
    
    starttime       = $(drag).attr('starttime');
    timesize        = $('.sch_drag',drag).attr('timesize');
    lesson_id       = $('.sch_drag',drag).attr('lesson_id');
    teacher_id      = $('.sch_drag_teachername',drag).attr('teacher_id');
    day_date        = $('.sch_drag',drag).attr('date');
    group_id        = $('.sch_drag',drag).attr('group_id');
    new_day_date    = $(drag).attr('date');
    day             = $(drag).attr('day_dot');
    classroom       = $(drag).attr('classroom');
    
    
    
    if( day_date != undefined ){
        action_url = '/action/schedule/realy_drag_change/';
    }
    else{
        action_url = '/action/schedule/drag_change/';
    }
    
        
    $.post(
        action_url,
        {starttime:starttime, 
          timesize:timesize, 
          day:day, 
          classroom:classroom, 
          teacher_id:teacher_id, 
          lesson_id:lesson_id,
          date:day_date,
          new_date:new_day_date,
          group_id:group_id
        }
    );    
}

function get_check_lesson_data(){
    drag = $('.lesson_data');
    
    starttime       = $(drag).attr('starttime');
    timesize        = $('.sch_drag',drag).attr('timesize');
    lesson_id       = $('.sch_drag',drag).attr('lesson_id');
    teacher_id      = $('.sch_drag_teachername',drag).attr('teacher_id');
    day_date        = $('.sch_drag',drag).attr('date');
    group_id        = $('.sch_drag',drag).attr('group_id');
    new_day_date    = $(drag).attr('date');
    day             = $(drag).attr('day_dot');
    classroom       = $(drag).attr('classroom');

    return {starttime:starttime, 
            timesize:timesize, 
            day:day, 
            classroom:classroom, 
            teacher_id:teacher_id, 
            lesson_id:lesson_id,
            date:day_date,
            new_date:new_day_date,
            group_id:group_id
            };
}



$(document).ready(function() {
    
    sch_set_empty_dot();
    
    //<show or hide empty dot on load>//
    empty_dot_cookie = $.cookie('empty_dot');
    if( empty_dot_cookie  == 'hide' )
        hide_empty_dot();
    //</show or hide empty dot on load>//
    
    // == MAIN SCHEDULE == //
    $('.sch_drag').draggable({
        helper : 'clone',
        opacity : function(){if( $.browser.msie ) return 1; else return 0.5;},
        start : function(){
                    sch_set_empty_dot( this );
                    del_street_light();
                    del_check_lesson_group();
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
        
        //добавление класса индифицирующего выбранный элемент
        $('.visual_drag').closest('.sch_time_td').removeClass('lesson_data');
        $(this).closest('.sch_time_td').addClass('lesson_data');
        
        $('.visual_drag').css({'box-shadow':'none'});
        $('.visual_drag[group_id="'+group_id+'"]').css({'box-shadow':'0px 0px 0px 3px rgb(25, 129, 184)'});
        $(this).css({'box-shadow':'0px 0px 0px 3px rgb(25, 183, 36)'});
    });
    // </подсветка выбранных групп>
    
    // показ/скрытие пустых ячеек
    $('#hide_empty_dot').toggle( function(){hide_empty_dot()}, function(){show_empty_dot()} );
    
    //убрать подсветку ячеек и блоков при клике по свободному полю
    $('.sch_time_td').click(function(){
        innerBlock = $(this).children('div');
        if( innerBlock.length < 1){
            del_street_light();
            del_check_lesson_group();
        }
    });
    
    // выключение подсветки ячеек по клику на пустом поле
//    $('.main_schadule_tbl div[starttime]').click(function(){ del_street_light() });

    //  <поиск в расписании>
    $('.jq_sch_search').keyup(function(){

        searchTxt = $(this).attr('value');
        StudentStrObj = $('.sch_drag');
        
        searchObj = RegExp(searchTxt, "i");
        
        if(searchTxt.length >= 2 ){ //ограничение ноличества символов поиска
            for(i=0; i<StudentStrObj.length; i++){
                    groupStr    = $('.sch_drag_groupname a',                    StudentStrObj[i]).text();
                    langStr     = $('.sch_drag_teachername span:nth-child(1)',  StudentStrObj[i]).text();
                    teachStr    = $('.sch_drag_teachername span:nth-child(2)',  StudentStrObj[i]).text();

                    if( groupStr.search(searchObj) != -1 || langStr.search(searchObj) != -1 || teachStr.search(searchObj) != -1 )
                        $( StudentStrObj[i] ).css({'opacity':'1'});
                    else
                        $( StudentStrObj[i] ).css({'opacity':'0.35'});  
            }
        }
        else
            $('.sch_drag').css({'opacity':'1'});
    });
//  </поиск в выдачи студентов>
    
});