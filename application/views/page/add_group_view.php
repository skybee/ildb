<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>



<div id="right_content">
    
        <div id="content_top_block">
            <div id="group_top_block">
                <!--            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"         style="left:20px;"><div></div></a>
                            <a href="#" class="top_left_btn top_left_btn_center top_left_btn_catalog"   style="left:60px;"><div></div></a>
                            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_pause"      style="left:100px;"><div></div></a>

                            <a href="#" class="top_left_btn top_left_btn_list" style="left:150px; width: 115px;">
                                <div>Скопировать</div>
                            </a>-->

                <!--                            <div class="student_copy_top_btn"></div>-->
                <div class="student_del_top_btn" onclick="window.location.href='/groups/'"></div>
            </div>
        </div>

    <div class="student_cart_block" id="page_tabs">


        <div class="student_cart_left_block">
            <ul id="tab_links_list">
                <li><a href="#st_tbs1">Информация о группе</a></li>
                <li><a href="#st_tbs2">Студенты</a></li>
                <li><a href="#st_tbs3">График занятий</a></li>
            </ul>
        </div>

        <div class="student_cart_right_block">

            <form action="/action/group/add_group/" id="add_group_form">

                <!-- TAB_1 -->    
                <div id="st_tbs1" class="student_tabs_block">
                    <div class="studen_cart_info studen_cart_info_upd">
                        <h1>Информация о группе</h1>

                        <table class="student_cart_info_tbl group_cart_info_tbl" style="width: 100%" >
                            <tr>
                                <td style="width: 130px;">Названи</td>
                                <td><input type="text" name="group_name" class="greyinput" style="width: 220px;" /></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Язык</td>
                                <td>
                                    <select name="lang" class="greyselect" style="width: 190px" >
                                        <option value="0"></option>
                                        <? foreach ($lang_list as $lang_ar): ?>
                                            <option value="<?= $lang_ar['id'] ?>"><?= "({$lang_ar['short_name']}) {$lang_ar['name']}" ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Начальный уровень</td>
                                <td>
                                    <select name="level" class="greyselect" style="width: 55px" >
                                        <? foreach($level_list as $level_ar): ?>
                                        <option value="<?=$level_ar['id']?>"><?=$level_ar['name']?></option>
                                        <? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <!--
                            <tr>
                                <td style="vertical-align: middle;">Формат</td>
                                <td>
                                    <select name="tmp[]" class="greyselect" style="width: 190px" >
                                        <option value="1">Индивидуальная</option>
                                        <option value="1">Малая</option>
                                        <option value="1">Средняяя</option>
                                        <option value="1">Большая</option>
                                        <option value="1">Общяя</option>
                                    </select>
                                </td>
                            </tr>
                            -->
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                            <tr>
                                <td>Начало занятий</td>
                                <td><input type="text" name="start_group_lesson" class="greyinput date_input_all" style="width: 70px;" /></td>
                            </tr>

<!--                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>

                            <tr>
                                <td>Преподаватель</td>
                                <td>
                                    <table class="student_cart_info_tbl width_auto" style="width: 100%; margin-top: 0" id="teacher_tbl" >

                                        <tr>
                                            <td>
                                                <select name="group_teacher" id="group_teacher" class="greyselect" style="width: 190px" onchange="add_teacher_to_group()" >
                                                    <option value="0"></option>
                                                    <?# foreach ($teachers_list as $teacher_ar): ?>
                                                        <option value="<?#= $teacher_ar['id'] ?>">   
                                                            <?#= $teacher_ar['fio_sname'] . " " . $teacher_ar['fio_name'] ?>
                                                        </option>
                                                    <?# endforeach; ?>
                                                </select>
                                            </td>
                                            <td style="vertical-align: top; line-height: 20px"> или или &nbsp;&nbsp; <a href="#">добавьте нового преподавателя</a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>-->
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                        </table>

                        <div class="confirm_block">
                            <a href="javascript:void(0)" onclick="$('#page_tabs').tabs('select',1)" class="confirm_button" style="width: 68px">Далее</a>
                            <a href="/groups/" >Отмена</a>
                        </div>


                    </div>
                </div>
                <!-- /TAB_1 -->


                <!-- TAB_2 -->    
                <div id="st_tbs2" class="student_tabs_block">
                    <div class="studen_cart_info">
                        <h1> Студенты </h1>

                        <ul class="studen_cart_studen_list">
                            <!--students list-->
                            <li class="studen_list_position_li">
                                <select name="student_tmp" class="greyselect" style="width: 300px;" onchange="add_student_to_group()" >
                                    <option value="0"></option>
                                    <? foreach ($students_list as $students_ar): ?>
                                        <option value="<?= $students_ar['id'] ?>">   <?= $students_ar['fio'] ?>  </option>
                                    <? endforeach; ?>
                                </select>

                                <a href="#">Добавть несколько студентов</a>
                            </li>
                        </ul>

                        <div class="confirm_block">
                            <a href="javascript:void(0)" onclick="$('#page_tabs').tabs('select',2)" class="confirm_button" style="width: 60px;">Далее</a>
                            <a href="javascript:void(0)" onclick="$('#page_tabs').tabs('select',2)" >Пропустить</a>
                        </div>

                    </div>
                </div>
                <!-- /TAB_2 -->


                <!-- TAB_3 -->    
                <div id="st_tbs3" class="student_tabs_block">
                    <div class="studen_cart_info">
                        <h1> График работы </h1>

                        <div class="studen_cart_info_after_h1_txt">
                            Для начала работы достаточно указать дни и время занятий. Всю информацию можно будет отредактировать в дальнейшем в карточке группы.
                        </div>

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
                                        <input type="checkbox" name="day[<?=$i?>]" />
                                        <?=$day_ar[$i]?>
                                    </td>
                                    <td>
                                        <select name="class[<?=$i?>]" class="greyselect" style="width: 170px" disabled="disabled">
                                            <option value="0"></option>
                                            <? foreach ($classroom_list as $classroom_ar): ?>
                                                <option value="<?= $classroom_ar['id'] ?>">   <?= $classroom_ar['name'] ?>  </option>
                                            <? endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="start_lesson[<?=$i?>]" class="greyselect" style="width: 95px">
                                            <?= $timeselect_opt ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="lesson_long[<?=$i?>]" class="greyselect" style="width: 80px">
                                            <option value="01:00:00">1:00</option>
                                            <option value="01:30:00">1:30</option>
                                            <option value="02:00:00">2:00</option>
                                            <option value="02:30:00">2:30</option>
                                            <option value="03:00:00">3:00</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="teacher[<?=$i?>]" class="greyselect" style="width: 170px">
                                            <? foreach ($teachers_list as $teacher_ar): ?>
                                                        <option value="<?= $teacher_ar['id'] ?>">   
                                                            <?= $teacher_ar['fio_sname'] . " " . $teacher_ar['fio_name'] ?>
                                                        </option>
                                            <? endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            <? endfor; ?>    
                        </table>

                        <div class="confirm_block">
                            <a href="javascript:void(0)" class="confirm_button"
                               onclick="send_form('#add_group_form', {title:'Выполняется создание группы', content:'loader'} )">
                                Добавить группу
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /TAB_3 -->


            </form>
        </div>
    </div>
</div>