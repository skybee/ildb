<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>



<div id="right_content">
    <div id="content_top_block">
        <div id="group_top_block">
            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"         style="left:20px;"><div></div></a>
            <a href="#" class="top_left_btn top_left_btn_center top_left_btn_catalog"   style="left:60px;"><div></div></a>
            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_pause"      style="left:100px;"><div></div></a>

            <div class="student_copy_top_btn"></div>
            <div class="student_del_top_btn" onclick="window.location.href='/groups/'"></div>
        </div>
    </div>

    <div class="student_cart_block" id="page_tabs">


        <div class="student_cart_left_block">
            <ul id="tab_links_list">
                <li><a href="#st_tbs1">Информация</a></li>
                <li><a href="#st_tbs2">Студенты</a></li>
                <li><a href="#st_tbs3">Тариф</a></li>
                <li><a href="#st_tbs4">График работы</a></li>
                <li><a href="#st_tbs5">Выходные дни <span>(2)</span></a></li>
                <li><a href="#st_tbs8" style="display:none;">Редактирование</a></li>
                <li><a href="#st_tbs9">tmp3</a></li>
            </ul>
        </div>

        <div class="student_cart_right_block">


            <!--== block ==-->
            <div id="st_tbs1" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        Информация о группе 
                        <span style=" display: inline-block; width: 20px;"></span>
                        <a href="#">Архив</a>
                    </h1>

                    <table class="student_cart_info_tbl group_cart_info_tbl">
                        <tr>
                            <td style="width: 130px;">Название</td>
                            <td><?= $group_info_ar['name'] ?></td>
                        </tr>
                        <tr>
                            <td>Язык</td>
                            <td><?= $group_info_ar['short_lang'] ?></td>
                        </tr>
                        <tr>
                            <td>Начальный уровень</td>
                            <td><?= $group_info_ar['level'] ?></td>
                        </tr>
                        <tr>
                            <td>Текущий уровень</td>
                            <td><?= $group_info_ar['level'] ?></td>
                        </tr>
                        <tr>
                            <td>Учашихся</td>
                            <td><?= $group_info_ar['cnt_student'] ?></td>
                        </tr>
                        <tr>
                            <td>Формат</td>
                            <td><?= $group_info_ar['group_format'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td>Начало занятий</td>
                            <td>05.06.11</td>
                        </tr>
                        <tr>
                            <td>Окончание занятий</td>
                            <td>07.06.12</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td>Аудитория</td>
                            <td style="padding-top: 0">
                                <table class="student_cart_info_tbl width_auto" style="margin-top: 0">
                                    <?
                                    if ($group_classroom_list != NULL):
                                    foreach ($group_classroom_list as $group_classroom_ar):
                                    ?>
                                    <tr>
                                        <td style="width: 210px" ><?= $group_classroom_ar['name'] ?></td>
                                    </tr>
                                    <?
                                    endforeach;
                                    else:
                                    ?>
                                    <tr>
                                        <td style="width: 210px" >Группа не связанна ни с одной аудиторией</td>
                                    </tr>
                                    <? endif; ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Преподаватель</td>
                            <td style="padding-top: 0">
                                <table class="student_cart_info_tbl width_auto" style="margin-top: 0">
                                    <?
                                    if ($group_teachers_list != NULL):
                                    foreach ($group_teachers_list as $group_teachers_ar):
                                    ?>
                                    <tr>
                                        <td style="width: 210px" ><a href="/teacher_cart/<?= $group_teachers_ar['id'] ?>/"><?= $group_teachers_ar['fio'] ?></a></td>
                                    </tr>
                                    <?
                                    endforeach;
                                    else:
                                    ?>
                                    <tr>
                                        <td style="width: 210px" >Для группы не назначен препадаватель</td>
                                    </tr>
                                    <? endif; ?>
                                </table>
                            </td>
                        </tr>

                    </table>

                    <div class="confirm_block">
                        <a href="javascript:void(0)" class="confirm_button" onclick="$('#page_tabs').tabs('select',5)" >Изменить</a>
                    </div>
                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs2" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        Студенты
                    </h1>

                    <ul class="studen_cart_studen_list">
                        <?
                        if ($group_students_list != NULL):
                        foreach ($group_students_list as $group_students_ar):
                        ?>
                        <li>
                            <a href="/student_cart/<?= $group_students_ar['id'] ?>/"><?= $group_students_ar['fio'] ?></a>      
                            <a href="javascript:void(0)" class="del_payment"
                               onclick="send_post(  { id: <?= $group_students_ar['id'] ?>}, 
                                           '/', 
                                           {title:'Выполняется удаление студента из группы', content:'loader'} )">
                                Удалить
                            </a>
                        </li>
                        <?
                        endforeach;
                        else:
                        ?>
                        <li>В группе нет студентов</li>
                        <? endif; ?>
                    </ul>
                </div>
                <div class="hide_form">

                    <div class="add_students_scroll_block">
                        <form id="add_students_in_group_form" action="/action/group/add_students/" >
                            <ul>
                                <?
                                if ($notin_group_student_list != NULL):
                                foreach ($notin_group_student_list as $notin_group_student_ar):
                                ?>
                                <li> 
                                    <input type="checkbox" name="new_student[]" value="<?= $notin_group_student_ar['id'] ?>" /> 
                                    <a target="_blank" href="/student_cart/<?= $notin_group_student_ar['id'] ?>/"><?= $notin_group_student_ar['fio'] ?></a> 
                                </li>
                                <?
                                endforeach;
                                else:
                                ?>
                                <li>Нет студентов для добавления</li>
                                <? endif; ?>
                            </ul>
                        </form>
                    </div>



                    <div class="studen_cart_info" style="margin-top: 0px;">
                        <div class="confirm_block">
                            <a href="javascript:void(0)" class="confirm_button" 
                               onclick="send_form('#add_students_in_group_form', {title:'Выполняется добавление студентов', content:'loader'} )">
                                Добавить студентов
                            </a>
                            <a href="javascript:void(0)" class="hide_form_btn" >Отмена</a>
                        </div>
                    </div>
                </div>


                <div class="confirm_block show_form_btn">
                    <a href="javascript:void(0)" class="confirm_button" style="width: 110px; margin-left: 40px;" >
                        Добавить студентов
                    </a>
                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs3" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>Тариф</h1>

                    <div class="group_cart_rate_block">
                        <p><b>Общяя группа</b></p>
                        <p>Длительность: <b>2,5 ч.</b></p>
                        <p>Кол-во студентов: <b>4-7 человек</b></p>
                        <p>Стоимость занятия: <b>65 грн</b></p>
                    </div>

                    <div class="confirm_block">
                        <a href="#" class="confirm_button" >Изменить тариф</a>
                    </div>

                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs4" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        График работы
                    </h1>
                    <form id="group_schedule_form" action="/action/group/upd_schedule/">
                        <input type="hidden" name="group_id" value="<?= $group_info_ar['id']?>">
                    <table class="group_schedule_tbl">
                        <tr class="group_schedule_first_str">
                            <td style="width:70px;">Дни</td>
                            <td style="width:195px">Аудитория</td>
                            <td style="width:120px">Начало занятия</td>
                            <td style="width:105px">Длительность</td>
                            <td>Преподаватель</td>
                        </tr>
                        <?
                            $day_ar = array(1 => 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.', 'Вс.');
                            for ($i = 1; $i <= 7; $i++):
                        ?>
                        <tr>
                            <td>
                                <? if( isset($timetable_list[$i]) ): ?>
                                <input type="hidden" name="day_id[<?=$i?>]" value="<?=$timetable_list[$i]['id']?>">
                                <? endif; ?>
                                <input type="checkbox" name="day[<?=$i?>]" <? if( isset($timetable_list[$i]) ) echo ' checked="checked" ' ?>/>
                                <?=$day_ar[$i]?>
                            </td>
                            <td>
                                <select name="class[<?=$i?>]" class="greyselect" style="width: 170px" disabled="disabled">
                                    <? foreach($classroom_list as $classroom_ar ): 
                                        if( $timetable_list[$i] ){
                                            if( $timetable_list[$i]['classroom_id'] == $classroom_ar['id'] )
                                                $class_selected = ' selected="selected" ';
                                            else
                                                $class_selected = '';
                                        }
                                        else
                                            $class_selected = '';
                                    ?>
                                    <option value="<?= $classroom_ar['id'] ?>" <?=$class_selected?> >   
                                        <?= $classroom_ar['name'] ?>  
                                    </option>
                                    <? endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select name="start_lesson[<?=$i?>]" class="greyselect" style="width: 95px">
                                <? if($timetable_list[$i]) 
                                       echo set_select_value($timeselect_opt, $timetable_list[$i]['time_start']);
                                   else
                                       echo $timeselect_opt;
                                ?>
                                </select>
                            </td>
                            <td>
                                <? if( isset($timetable_list[$i]) ){
                                        $less_long = summ_time($timetable_list[$i]['time_stop'], '-', $timetable_list[$i]['time_start']);
                                   } 
                                   else
                                       $less_long = '00:00:00';
                                ?>
                                <select name="lesson_long[<?=$i?>]" class="greyselect" style="width: 80px">
                                    <option value="01:00:00" <? if('01:00:00' == $less_long) echo 'selected="selected"'?> >1:00</option>
                                    <option value="01:30:00" <? if('01:30:00' == $less_long) echo 'selected="selected"'?> >1:30</option>
                                    <option value="02:00:00" <? if('02:00:00' == $less_long) echo 'selected="selected"'?> >2:00</option>
                                    <option value="02:30:00" <? if('02:30:00' == $less_long) echo 'selected="selected"'?> >2:30</option>
                                    <option value="03:00:00" <? if('03:00:00' == $less_long) echo 'selected="selected"'?> >3:00</option>
                                </select>
                             </td>
                            <td>
                                <select name="teacher[<?=$i?>]" class="greyselect" style="width: 170px">
                                <?  foreach($teachers_list as $teacher_ar ): 
                                    if( $timetable_list[$i] ){
                                            if( $timetable_list[$i]['user_id'] == $teacher_ar['id'] )
                                                $teacher_selected = ' selected="selected" ';
                                            else
                                                $teacher_selected = '';
                                    }
                                    else
                                        $teacher_selected = '';
                                ?>
                                    <option value="<?= $teacher_ar['id'] ?>" <?=$teacher_selected?> >   
                                        <?= $teacher_ar['fio_sname']." ".$teacher_ar['fio_name'] ?>  
                                    </option>
                                <? endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <? endfor; ?>
                    </table>
                    </form>

<!--                    <table class="group_schedule_tbl">
                        <tr class="group_schedule_first_str">
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="tmp[]" class="greyselect" style="width: 90px">
                                    <option value="1"></option>
                                    <option value="1"> sdfdsafsfsa </option>
                                    <option value="1"> sdfdsafsfsa </option>
                                    <option value="1"> sdfdsafsfsa </option>
                                </select>
                            </td>
                        </tr>
                    </table>-->

                    <div class="confirm_block">
                        <a href="javascript:void(0)" class="confirm_button" style="width: 68px"
                           onclick="send_form('#group_schedule_form', {title:'Выполняется изменение расписания', content:'loader'} )">
                            Сохранить</a>
                    </div>
                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs5" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>Выходные дни</h1>

                    <div class="group_cart_rate_block" style="padding-right: 200px;">
                        <p><b>12.03.12 &mdash; 18.03.12</b> <a href="#" style="float: right;">Редактировать</a></p>
                    </div>

                    <div class="confirm_block">
                        <a href="#" class="confirm_button" >Добавить выходные дни</a>
                    </div>

                </div>
            </div>
            <!--== /block ==-->




            <!--== block ==-->
            <div id="st_tbs8" class="student_tabs_block">
                <div class="studen_cart_info studen_cart_info_upd">
                    <h1>
                        Информация о группе 
                        <span style=" display: inline-block; width: 20px;"></span>
                        <a href="#">Архив</a>
                    </h1>

                    <form id="upd_group_form" action="/action/group/upd_group/">
                        <table class="student_cart_info_tbl group_cart_info_tbl" style="width: 100%" >
                            <tr>
                                <td style="width: 130px;">Названи</td>
                                <td><input type="text" name="tmp[]" value="<?= $group_info_ar['name'] ?>" class="greyinput" style="width: 220px;" /></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Язык</td>
                                <td>
                                    <select name="lang" class="greyselect" style="width: 190px" >
                                            <? foreach ($lang_list as $lang_ar): ?>
                                        <option <? if ($lang_ar['id'] == $group_info_ar['lang_id']) echo ' selected="selected" '; ?> value="<?= $lang_ar['id'] ?>">
                                        <?= $lang_ar['name'] . ', ' . $lang_ar['short_name'] ?>
                                        </option>
<? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Начальный уровень</td>
                                <td>
                                    <select name="level_start" class="greyselect" style="width: 55px" >
                                            <? foreach ($level_list as $level_ar): ?>
                                        <option <? if ($level_ar['id'] == $group_info_ar['level_id']) echo ' selected="selected" '; ?> value="<?= $level_ar['id'] ?>">
                                        <?= $level_ar['name'] ?>
                                        </option>
<? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Текущий уровень</td>
                                <td>
                                    <select name="level_now" class="greyselect" style="width: 55px" >
                                            <? foreach ($level_list as $level_ar): ?>
                                        <option <? if ($level_ar['id'] == $group_info_ar['level_id']) echo ' selected="selected" '; ?> value="<?= $level_ar['id'] ?>">
                                        <?= $level_ar['name'] ?>
                                        </option>
<? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Учашихся</td>
                                <td><input type="text" name="" value="<?= $group_info_ar['cnt_student'] ?>" class="greyinput" style="width: 45px;" /></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;">Формат</td>
                                <td>
                                    <select name="roup_format" class="greyselect" style="width: 190px" >
                                            <? foreach ($group_format_list as $group_format_ar): ?>
                                        <option <? if ($group_format_ar['id'] == $group_info_ar['group_format_id']) echo ' selected="selected" '; ?> value="<?= $group_format_ar['id'] ?>">
                                        <?= $group_format_ar['name'] ?>
                                        </option>
<? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                            <tr>
                                <td>Начало занятий</td>
                                <td><input type="text" name="tmp[]" class="greyinput date_input_all" style="width: 70px;" /></td>
                            </tr>
                            <tr>
                                <td>Окончание занятий</td>
                                <td><input type="text" name="tmp[]" class="greyinput date_input_all" style="width: 70px;" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>

                            <tr>
                                <td>Аудитория</td>
                                <td>
                                    <table class="student_cart_info_tbl width_auto" style="width: 100%" >
                                        <?
                                        if ($group_classroom_list != NULL):
                                        foreach ($group_classroom_list as $group_classroom_ar):
                                        ?>
                                        <tr>
                                            <td style="width: 210px" ><?= $group_classroom_ar['name'] ?></td>
                                            <td>
                                                <a class="del_payment" href="javascript:void(0)" 
                                                   onclick="send_post(  { id: <?= $group_students_ar['id'] ?>}, 
                                                               '/', 
                                                               {title:'Выполняется удаление студента из группы', content:'loader'} )">
                                                    Удалить
                                                </a>
                                            </td>
                                        </tr>
                                        <?
                                        endforeach;
                                        else:
                                        ?>
                                        <tr>
                                            <td colspan="2" >Группа не связанна ни с одной аудиторией</td>
                                        </tr>
<? endif; ?>
                                        <tr>
                                            <td>
                                                <select name="classroom" class="greyselect" style="width: 190px" >
                                                    <option value="">Выбор аудитории</option>
                                                        <? foreach ($classroom_list as $classroom_ar): ?>
                                                    <option value="<?= $classroom_ar['id'] ?>">
                                                    <?= $classroom_ar['name'] ?>
                                                    </option>
<? endforeach; ?>
                                                </select>
                                            </td>
                                            <td style="vertical-align: top; line-height: 20px"> или &nbsp;&nbsp; <a href="#">добавьте новую аудиторию</a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>

                            <tr>
                                <td>Преподаватель</td>
                                <td>
                                    <table class="student_cart_info_tbl width_auto" style="width: 100%" >
                                        <?
                                        if ($group_teachers_list != NULL):
                                        foreach ($group_teachers_list as $group_teachers_ar):
                                        ?>
                                        <tr>
                                            <td style="width: 210px" >
                                                <a href="/teacher_cart/<?= $group_teachers_ar['id'] ?>/"><?= $group_teachers_ar['fio'] ?></a>
                                            </td>
                                            <td>
                                                <a class="del_payment" href="javascript:void(0)"
                                                   onclick="send_post(  { id: <?= $group_students_ar['id'] ?>}, 
                                                               '/', 
                                                               {title:'Выполняется удаление препадавателя из группы', content:'loader'} )">
                                                    Удалить
                                                </a>
                                            </td>
                                        </tr>
                                        <?
                                        endforeach;
                                        else:
                                        ?>
                                        <tr>
                                            <td colspan="2">Для группы не назначен препадаватель</td>
                                        </tr>
<? endif; ?>
                                        <tr>
                                            <td>
                                                <select name="teacher" class="greyselect" style="width: 190px" >
                                                        <? foreach ($teachers_list as $teacher_ar): ?>
                                                    <option value="<?= $teacher_ar['id'] ?>">
                                                    <?= $teacher_ar['fio_sname']." ".$teacher_ar['fio_name'] ?>
                                                    </option>
<? endforeach; ?>
                                                </select>
                                            </td>
                                            <td style="vertical-align: top; line-height: 20px"> или или &nbsp;&nbsp; <a href="#">добавьте нового преподавателя</a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                        </table>
                    </form>

                    <div class="confirm_block">
                        <a href="javascript:void(0)" class="confirm_button" style="width: 68px" 
                           onclick="send_form('#upd_group_form', {title:'Выполняется обновление группы', content:'loader'} )" >
                            Сохранить
                        </a>
                        <a href="javascript:void(0)" onclick="$('#page_tabs').tabs('select',0)" >Отмена</a>
                    </div>


                </div>

            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs9" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>Выходные дни</h1>

                    <div class="upd_dayoff_addblock">
                        <input type="text" class="greyinput date_input_all" name="tmp[]"  />
                        &nbsp;&mdash;&nbsp;
                        <input type="text" class="greyinput date_input_all" name="tmp[]"  />

                        <div class="upd_dayoff_addblock_right">
                            <a class="del_payment" href="#">Удалить</a>
                            <a href="#">Отменить выходные дни</a>
                        </div>
                    </div>

                    <div class="confirm_block">
                        <a href="#" class="confirm_button" style="width: 68px">Сохранить</a>
                        <a href="#" >Отмена</a>
                    </div>

                </div>


                <div class="st_cart_upd_group_border"><!--линия--></div>


                <div class="studen_cart_info">
                    <h1>Добавление выходных дней</h1>

                    <table class="add_dayoff_tbl">
                        <tr>
                            <td>Выходные с</td>
                            <td><input type="text" class="greyinput date_input_all" name="tmp[]"  /></td>
                        </tr>
                        <tr>
                            <td>по</td>
                            <td><input type="text" class="greyinput date_input_all" name="tmp[]"  /></td>
                        </tr>
                    </table>

                    <div class="confirm_block">
                        <a href="#" class="confirm_button" style="width: 68px">Сохранить</a>
                        <a href="#" >Отмена</a>
                    </div>

                </div>
            </div>
            <!--== /block ==-->



        </div>
    </div>

</div>