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
            <div class="student_del_top_btn" onclick="window.location.href='/students/'"></div>
        </div>
    </div>

    <div class="student_cart_block" id="page_tabs">


        <div class="student_cart_left_block">
            <ul id="tab_links_list">
                <li><a href="#st_tbs1">Информация о студенте</a></li>
                <li><a href="#st_tbs2">Группы и график занятий</a></li>
            </ul>
        </div>

        <div class="student_cart_right_block">
            
            <form action="/action/student/add_student/" id="add_student_form">

            <div id="st_tbs1" class="student_tabs_block">

                <div class="studen_cart_info studen_cart_info_upd">
                    <h1>
                        Информация о студенте
                    </h1>

                    <table class="student_cart_info_tbl">
                        <tr>
                            <td style="width: 110px;">Фамилия</td>
                            <td> 
                                <input type="text" name="fio_sname" value="" class="greyinput" style="width: 350px" /> 
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 110px;">Имя</td>
                            <td> 
                                <input type="text" name="fio_name" value="" class="greyinput" style="width: 350px" /> 
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 110px;">Отчество</td>
                            <td> 
                                <input type="text" name="fio_mname" value="" class="greyinput" style="width: 350px" /> 
                            </td>
                        </tr>
                        <tr>
                            <td>Адрес</td>
                            <td><input type="text" name="address" value="" class="greyinput" style="width: 350px" /></td>
                        </tr>
                        <tr>
                            <td>Телефон</td>
                            <td><input type="text" name="phone" value="" class="greyinput" style="width: 120px" /></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input type="text" name="email" value="" class="greyinput" style="width: 180px" /></td>
                        </tr>

                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>

                        <tr>
                            <td>Дата записи</td>
                            <td>
                                <div class="payment_add_date_block student_upd_date_block" >
                                    <input type="text" name="today_date" value="<?=date("d.m.Y")?>" class="greyinput date_input" style="width: 105px"  />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Скидка</td>
                            <td><input type="text" name="sale" value="" class="greyinput" style="width: 50px" /> %</td>
                        </tr>

                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>

                        <tr>
                            <td>Дата рождения</td>
                            <td>
                                <div class="payment_add_date_block student_upd_date_block">
                                    <input type="text" name="birthday_date" value="" class="greyinput date_input" style="width: 105px"  />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: middle;" >Откуда узнал</td>
                            <td>
                                <select class="greyselect" name="from_know" >
                                    <option value="метро" >метро</option>
                                    <option value="интернет" >интернет</option>
                                    <option value="уличная реклама" >уличная реклама</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 14px;">
                                Комментарий
                            </td>
                            <td><textarea name="comment"></textarea></td>
                        </tr>
                    </table>

                    <div class="confirm_block">
                        <a href="#" class="confirm_button" style="width: 65px;" onclick="$('#page_tabs').tabs('select',1)" >Далее</a>
                        <a href="/students/">Отмена</a>
                    </div>
                </div>

            </div><!-- tab-1 -->

            <div id="st_tbs2" class="student_tabs_block">

                <div class="studen_cart_info studen_cart_info_upd">
                    <h1>
                        Группы и график занятий
                    </h1>
                </div>


                <div class="add_student_input_block_parent">
                    <div class="add_student_input_block">
                        <div class="add_st_input_block_tbl">
                            <div class="add_st_input_block_left">
                                <input type="radio" name="option" value="1" class="radio_1" />
                            </div>
                            <div class="add_st_input_block_right">
                                <p>Добавить в группу</p>
                                Опция актуаль, если студент согласен на суловия и график работы одной из ныне существующих групп.
                            </div>
                        </div>
                    </div>

                    <div class="add_student_input_option_block">
                        <div class="add_student_txt_block">
                            <select class="greyselect" style="width: 320px" name="group">
                                <? foreach($groups_list as $group_ar ): ?>
                                    <option value="<?=$group_ar['id']?>"><?= "({$group_ar['lang']}, {$group_ar['level']}) {$group_ar['name']}" ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>

                        <div class="add_student_txt_block" id="add_st_test_lesson_block">
                            пробное занятие 
                            <input type="text" name="test_lesson_date" class="greyinput date_input_all" style="width: 70px;" />
                        </div>

                        <div class="add_student_txt_block">
                            <div class="confirm_block">
                                <a href="#" class="confirm_button" style="margin-top: 0" 
                                   onclick="send_form('#add_student_form', {title:'Выполняется добавление студента', content:'loader'} )" >
                                    Добавить студента
                                </a>
                                <a href="/students/">Отмена</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="add_student_input_block_parent">
                    <div class="add_student_input_block">
                        <div class="add_st_input_block_tbl">
                            <div class="add_st_input_block_left">
                                <input type="radio" name="option" value="2" class="radio_1" />
                            </div>
                            <div class="add_st_input_block_right">
                                <p>Студент обучается индивидуально</p>
                                Если студенту не подходит ни одна из существующих групп, укажите дни и время занятий удобное для студента для дальнешейго формирования в группу.
                            </div>
                        </div>
                    </div>

                    <div class="add_student_input_option_block">
                        <div class="add_student_txt_block">

                            <table class="group_schedule_tbl" id="group_schedule_tbl_info3">
                                <tr class="group_schedule_first_str">
                                    <td style="width:70px;">Дни</td>
                                    <td style="width:195px">Аудитория</td>
                                    <td style="width:120px">Начало занятия</td>
                                    <td style="width:110px">Длительность</td>
                                    <td>Преподаватель</td>
                                </tr>
                                <?
                                    $day_ar = array(1=>'Пн.','Вт.','Ср.','Чт.','Пт.','Сб.','Вс.' );
                                    for($i=1; $i<=7; $i++):
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="day[<?=$i?>]" />
                                        <?=$day_ar[$i]?>
                                    </td>
                                    <td>
                                        <select name="class[<?=$i?>]" class="greyselect" style="width: 170px" disabled="disabled">
                                            <? foreach($classroom_list as $classroom_ar ): ?>
                                                <option value="<?=$classroom_ar['id']?>">   <?=$classroom_ar['name']?>  </option>
                                            <? endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="start_lesson[<?=$i?>]" class="greyselect" style="width: 95px">
                                            <?=$timeselect_opt?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="lesson_long[<?=$i?>]" class="greyselect" style="width: 75px">
                                            <option value="01:00:00">1:00</option>
                                            <option value="01:30:00">1:30</option>
                                            <option value="02:00:00">2:00</option>
                                            <option value="02:30:00">2:30</option>
                                            <option value="03:00:00">3:00</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="teacher[<?=$i?>]" class="greyselect" style="width: 170px">
                                            <? foreach($teachers_list as $teacher_ar ): ?>
                                                <option value="<?=$teacher_ar['id']?>">   
                                                    <?=$teacher_ar['fio_sname']." ".$teacher_ar['fio_name']?>
                                                </option>
                                            <? endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <? endfor; ?>
                                <tr class="group_schedule_first_str">
                                    <td colspan="4" style="text-align: right; padding-right: 32px;">Язык:</td>
                                    <td>
                                        <select name="individ_lang" class="greyselect" style="width: 170px">
                                            <? foreach( $lang_list as $lang_ar ): ?>
                                                <option value="<?= $lang_ar['id'] ?>"><?= "({$lang_ar['short_name']}) ".$lang_ar['name'] ?></option>
                                            <? endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="add_student_txt_block">
                            <div class="confirm_block">
                                <a href="#" class="confirm_button" style="margin-top: 0" 
                                   onclick="send_form('#add_student_form', {title:'Выполняется добавление студента', content:'loader'} )" >
                                    Добавить студента
                                </a>
                                <a href="/students/">Отмена</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="add_student_input_block_parent">
                    <div class="add_student_input_block">
                        <div class="add_st_input_block_tbl">
                            <div class="add_st_input_block_left">
                                <input type="radio" name="option" value="3" class="radio_1" />
                            </div>
                            <div class="add_st_input_block_right">
                                <p>Указать предпочитаемый график работы группы</p>
                                Если студенту не подходит ни одна из существующих групп, укажите дни и время занятий удобное для студента для дальнешейго формирования в группу.
                            </div>
                        </div>
                    </div>

                    <div class="add_student_input_option_block">
                        <div class="add_student_txt_block">
                            <div class="add_st_info4_schedule_tbl_block">
                                <div class="add_st_info4_schedule_left">
                                    <table class="group_schedule_tbl">
                                        <tr class="group_schedule_first_str">
                                            <td style="width:70px;">Дни</td>
                                            <td style="width:115px">Начало занятия</td>
                                        </tr>
                                        <?
                                            $day_ar = array(1=>'Пн.','Вт.','Ср.','Чт.','Пт.','Сб.','Вс.' );
                                            for($i=1; $i<=7; $i++):
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="op3_day[<?=$i?>]" />
                                                <?=$day_ar[$i]?>
                                            </td>
                                            <td>
                                                <select name="op3_start_lesson[<?=$i?>]" class="greyselect" style="width: 95px">
                                                    <option value="00:00:00">Любое</option>
                                                    <?=$timeselect_opt?>
                                                </select>
                                            </td>
                                        </tr>
                                        <? endfor; ?>
                                    </table>
                                </div>
                                <div class="add_st_info4_schedule_right">
                                    <table class="group_schedule_tbl">
                                        <tr class="group_schedule_first_str">
                                            <td style="width:150px;">Кол-во занятий в неделю</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="count_lesson" class="greyselect" style="width: 95px">
                                                    <option value="1"> 1 занятие</option>
                                                    <option value="2"> 2 занятия</option>
                                                    <option value="3"> 3 занятия</option>
                                                    <option value="4"> 4 занятия</option>
                                                    <option value="5"> 5 занятий</option>
                                                    <option value="6"> 6 занятий</option>
                                                    <option value="7"> 7 занятий</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td style="padding-top: 0px;"></td></tr>
                                        <tr class="group_schedule_first_str">
                                            <td style="width:150px;">Форма занятий</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="lesson_form" class="greyselect" style="width: 170px">
                                                    <option value="2"> В группе</option>
                                                    <option value="1"> Индивидуальная</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td style="padding-top: 0px;"></td></tr>
                                        <tr class="group_schedule_first_str">
                                            <td style="width:150px;">Длительность занятия</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="lesson_length" class="greyselect" style="width: 95px">
                                                    <option value="1">1:00</option>
                                                    <option value="2:30">1:30</option>
                                                    <option value="2">2:00</option>
                                                    <option value="2:30">2:30</option>
                                                    <option value="3">3:00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td style="padding-top: 0px;"></td></tr>
                                        <tr class="group_schedule_first_str">
                                            <td style="width:150px;">Изучаемый язык</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="prefer_lang" class="greyselect" style="width: 95px">
                                                    <? foreach( $lang_list as $lang_ar ): ?>
                                                        <option value="<?= $lang_ar['short_name'] ?>"><?= $lang_ar['short_name'] ?></option>
                                                    <? endforeach; ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="add_student_txt_block">
                            <div class="confirm_block">
                                <a href="#" class="confirm_button" style="margin-top: 0" 
                                   onclick="send_form('#add_student_form', {title:'Выполняется добавление студента', content:'loader'} )" >
                                    Добавить студента
                                </a>
                                <a href="/students/">Отмена</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- tab-2 -->

            </form>

        </div>

    </div>


</div>