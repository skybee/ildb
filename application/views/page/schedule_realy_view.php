<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div id="right_content">
    <div id="fix_space">
                    <div id="fix_top_menu">
                        <div id="content_top_block">
                            <div id="group_top_block">

                                <a href="#" class="top_left_btn_action" style="left:10px;">Добавить</a>

                                <a href="#" class="top_left_btn top_left_btn_left top_left_btn_movement"         style="left:120px;"><div></div></a>
                                <a href="javascript:void(0)" onclick="ajax_show_modal('/ajax/show_modal/schedule_teacher/', get_check_lesson_data())" class="top_left_btn top_left_btn_center top_left_btn_movement2"         style="left:160px;"><div></div></a>
                                <a href="javascript:void(0)" onclick="ajax_show_modal('/ajax/show_modal/schedule_cancel/', get_check_lesson_data())" class="top_left_btn top_left_btn_center top_left_btn_close"         style="left:200px;"><div></div></a>
                                <a href="javascript:void(0)" onclick="ajax_show_modal('/ajax/show_modal/schedule_time/', get_check_lesson_data())" class="top_left_btn top_left_btn_right top_left_btn_timer"         style="left:240px;"><div></div></a>

                                <a href="javascript:void(0)" id="hide_empty_dot" class="top_left_btn top_left_btn_left top_left_btn_sort"          style="left:300px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_center top_left_btn_x0"         style="left:340px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_center top_left_btn_x1"         style="left:380px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_right top_left_btn_x2"         style="left:420px;"><div></div></a>
                                
                                <div class="change_schedule_block">
                                    Отображать<br /> 
                                    изменения
                                    <a href="/schedule/"></a>
                                </div>

                                <div class="filter_group_top">
                                    <input type="text" name="group_filter" id="group_filter" />
                                </div>
                            </div>
                        </div>
                    </div>
    </div>


                        <div id="main_schadule">
                            <div class="main_schadule_tbl">
                                <div class="main_sch_vline main_sch_time_vline">
                                    <div class="sch_class_name"></div>
                                    
                                    <div class="sch_day_name">Пн</div>
                                    <?=$this->schedule_lib->get_time_column(1)?>
                                    <!-- Day -->
                                    <div class="sch_day_name">Вт</div>
                                    <?=$this->schedule_lib->get_time_column(2)?>
                                    <!-- Day -->
                                    <div class="sch_day_name">Ср</div>
                                    <?=$this->schedule_lib->get_time_column(3)?>
                                    <!-- Day -->
                                    <div class="sch_day_name">Чт</div>
                                    <?=$this->schedule_lib->get_time_column(4)?>
                                    <!-- Day -->
                                    <div class="sch_day_name">Пт</div>
                                    <?=$this->schedule_lib->get_time_column(5)?>
                                    <!-- Day -->
                                    <div class="sch_day_name">Сб</div>
                                    <?=$this->schedule_lib->get_time_column(6)?>
                                    <!-- Day -->
                                    <div class="sch_day_name">Вс</div>
                                    <?=$this->schedule_lib->get_time_column(7)?>
                                </div>                        

                                <!--CLASSROOM Column-->
                                <? foreach($classroom_list as $classroom_ar): ?>
                                <div class="main_sch_vline">
                                    <div class="sch_class_name"><?=$classroom_ar['name']?></div>
                                    <?  for($i=1;$i<=7;$i++):?>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">

                                        <? foreach( $time_ar as $time ): ?>
                                        
                                        <div class="sch_time_td sch_drop" starttime="<?=$time?>" day_dot="<?=$i?>" classroom="<?=$classroom_ar['id']?>" date="<?=$week_date[$i]?>" >
                                            <? if( isset($timetable_list[$classroom_ar['id']][$i][$time]) ):  // если совпадает группа день и время
                                                    
                                                        $lesson_ar      = $timetable_list[$classroom_ar['id']][$i][$time]; 
                                                        $group_ar       = $group_list[$lesson_ar['school_groups_id']];
                                                        $teacher_ar     = $teacher_list[$lesson_ar['user_id']];
                                                        $timesize       = get_timesize($lesson_ar['time_start'], $lesson_ar['time_stop']);

                                                        $block_h        = 29 + ($timesize-2)*18; //дефолт 2 ячейки(29px)
                                                        $block_h        .= 'px';
                                                 if( !isset($lesson_ar['cancel'] ) ) $lesson_ar['cancel'] = 'no'; 
                                                 if( $lesson_ar['cancel'] != 'yes'): // если не установленна отмена
                                            ?>
                                            
                                            <div class="sch_drag"  timesize="<?=$timesize?>" lesson_id="<?=$lesson_ar['id']?>" date="<?=$week_date[$i]?>" group_id="<?=$group_ar['id']?>">
                                                <div class="visual_drag" style="height: <?=$block_h?>" group_id="<?=$group_ar['id']?>" day="<?=$i?>" >
                                                    <div class="shc_vertical_line" style="background-color: <?=$group_ar['lang_color']?>"></div>
                                                    <div class="sch_drag_groupname">
                                                        <? if(isset($group_ar['fio_name'])): ?>
                                                            <a href="/student_cart/<?=$group_ar['link_id']?>/"><?= $group_ar['name'] ?></a>
                                                        <? else: ?>
                                                            <a href="/group_cart/<?=$group_ar['link_id']?>/"><?= $group_ar['name'] ?></a>
                                                        <? endif; ?>    
                                                    </div>
                                                    <div class="sch_drag_teachername" teacher_id="<?=$teacher_ar['id']?>">
                                                        <span style="color:<?=$group_ar['lang_color']?>"><?= $group_ar['lang'] ?></span>
                                                        &nbsp;
                                                        <?= $teacher_ar['fio_name'].' '.$teacher_ar['fio_sname'] ?>
                                                    </div>
                                                    <div class="sch_drag_langname"></div>
                                                </div>
                                            </div>
                                            
                                            <? 
                                                endif; // если не установленна отмена
                                                endif; // если совпадает группа день и время 
                                            ?>
                                        </div>
                                        
                                        <? endforeach; ?>
                                    </div>
                                    <? endfor; ?>
                                </div>
                                <? endforeach; ?>
                                <!--CLASSROOM Column-->
                                
                            </div>
                            
                        </div>  
                    </div>