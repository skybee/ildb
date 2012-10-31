<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div id="right_content">
    <div id="content_top_block">
        <div id="group_top_block">
            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"         style="left:20px;"><div></div></a>
            <a href="#" class="top_left_btn top_left_btn_center top_left_btn_catalog"   style="left:60px;"><div></div></a>
            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_pause"      style="left:100px;"><div></div></a>

            <a href="#" class="top_left_btn top_left_btn_list" style="left:150px; width: 115px;">
                <div>Скопировать</div>
            </a>

            <!--                            <div class="student_copy_top_btn"></div>-->
            <div class="student_del_top_btn" onclick="window.location.href='/teachers/'"></div>
        </div>
    </div>

    <div class="student_cart_block" id="page_tabs">

        <div class="student_cart_left_block">
            <ul id="tab_links_list">
            <li><a href="#st_tbs1">Информация</a></li>
            <li><a href="#st_tbs2">Часы работы</a></li>
            <li><a href="#st_tbs3">Группы <span>(1)</span></a></li>
            <li><a href="#st_tbs4">Общий доступ</a></li>
            <li><a href="#st_tbs5">Замены и отмены</a></li>
            <li style="display:none"><a href="#st_tbs6">tmp</a></li>
            </ul>
        </div>

        <div class="student_cart_right_block">


            <!--== block ==-->
            <div id="st_tbs1" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        Информация о преподавателе 
                        <span style=" display: inline-block; width: 20px;"></span>
                    </h1>

                    <table class="student_cart_info_tbl group_cart_info_tbl">
                        <tr>
                            <td style="width: 130px;">ФИО</td>
                            <td><?=$teacher_info['fio']?></td>
                        </tr>
                        <tr>
                            <td>Адрес</td>
                            <td><?=$teacher_info['address']?></td>
                        </tr>
                        <tr>
                            <td>Телефон</td>
                            <td><?=$teacher_info['phone']?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><a href="mailto:<?=$teacher_info['email']?>"><?=$teacher_info['email']?></a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td>Язык</td>
                            <td>
                                <?
                                    foreach( $teacher_lang_list as $teacher_lang_ar )
                                        echo $teacher_lang_ar['short_name'].'&nbsp; ';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Статус</td>
                            <td>распределен</td>
                        </tr>
                        <tr>
                            <td>Пробное занятие</td>
                            <td>05.06.11</td>
                        </tr>
                        <tr>
                            <td>Начало работы</td>
                            <td>07.06.12</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td>Доп. информация</td>
                            <td style="padding-right: 40px;">
                                <?=$teacher_info['comment']?>
                            </td>
                        </tr>
                    </table>

                    <div class="confirm_block">
                        <a href="#" class="confirm_button" style="width: 76px;" onclick="$('#page_tabs').tabs('select',5)" >Изменить</a>
                    </div>
                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs2" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        Студент обучается в группе
                    </h1>


                    <table class="student_cart_group_upd_tbl">
                        <tr>
                            <td>
                                <a href="#">Crazy Star Pearls</a> En A1 (5)
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить из группы</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 10px; vertical-align: top;" colspan="2">
                                <p>Пробное занятие</p>
                                <span>28.05.2011</span>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="st_cart_upd_group_border"><!--линия--></div>




                <div class="studen_cart_info studen_group_block_nofirst">   
                    <table class="student_cart_group_upd_tbl">
                        <tr>
                            <td>
                                <a href="#">Crazy Star Pearls</a> En A1 (5)
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить из группы</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 10px; vertical-align: top;" olspan="2">
                                <p>Пробное занятие</p>
                                <span>28.05.2011</span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="st_cart_upd_group_border"><!--линия--></div>


                <div class="studen_cart_info studen_group_block_nofirst">   
                    <table class="student_cart_group_upd_tbl">
                        <tr>
                            <td>
                                <a href="#">Crazy Star Pearls</a> En A1 (5)
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить из группы</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 10px; vertical-align: top;" olspan="2">
                                <p>Пробное занятие</p>
                                <span>28.05.2011</span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="st_cart_upd_group_border"><!--линия--></div>







                <div class="confirm_block" style="margin-left: 40px;">
                    <a href="#" class="confirm_button" > Добавить группу </a>
                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs3" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        Студент обучается в группе
                    </h1>


                    <table class="student_cart_group_upd_tbl">
                        <tr>
                            <td>
                                <a href="#">Crazy Star Pearls</a> En A1 (5)
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить из группы</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 10px; vertical-align: top;" colspan="2">
                                <p>Пробное занятие</p>
                                <span>28.05.2011</span>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="st_cart_upd_group_border"><!--линия--></div>




                <div class="studen_cart_info studen_group_block_nofirst">   
                    <table class="student_cart_group_upd_tbl">
                        <tr>
                            <td>
                                <a href="#">Crazy Star Pearls</a> En A1 (5)
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить из группы</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 10px; vertical-align: top;" olspan="2">
                                <p>Пробное занятие</p>
                                <span>28.05.2011</span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="st_cart_upd_group_border"><!--линия--></div>



                <div class="studen_cart_info studen_cart_add_to_group_block">
                    <h1>
                        Добавление в группу
                    </h1>

                    <div style="margin-top: 17px;">
                        <select name="new_group" class="greyselect" style="width: 330px;">
                            <? foreach( $other_groups_list as $other_groups_ar): ?>
                            <option value="1"><?=$other_groups_ar['name']." ({$other_groups_ar['lang']}) "?></option>
                            <? endforeach; ?>
                        </select>
                    </div>


                    <div class="confirm_block">
                        <a href="#" class="confirm_button" > Сохранить </a>
                        <a href="#">Отмена</a>
                    </div>

                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs4" class="student_tabs_block">
                <div class="studen_cart_info studen_cart_info_upd">
                    <h1>
                        Общий доступ
                    </h1>

                    <div class="techer_option_list_block">
                        <ul>
                            <li>
                                <input type="checkbox" name="access" onchange="alert(123)" />
                                Разрешить доступ в систему
                            </li>
                            <li>
                                <input type="checkbox" name="manager" />
                                Добавить права менеджера
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="st_cart_upd_group_border"><!--линия--></div>


                <div class="studen_cart_info studen_cart_info_upd" style="margin-top: 10px;">
                    <table class="student_cart_info_tbl group_cart_info_tbl teacher_options_tbl">
                        <tr>
                            <td style="width: 120px"><span>Логин</span></td>
                            <td>
                                <input type="text" name="tmp[]" class="greyinput" style="width: 170px" />
                            </td>
                        </tr>
                        <tr>
                            <td><span>Пароль</span></td>
                            <td>
                                <input type="password" name="tmp[]" class="greyinput" style="width: 170px" />
                            </td>
                        </tr>
                        <tr>
                            <td><span>Пароль повторно</span></td>
                            <td>
                                <input type="password" name="tmp[]" class="greyinput" style="width: 170px" />
                            </td>
                        </tr>
                    </table>

                    <div class="confirm_block">
                        <a href="#" class="confirm_button" > Сохранить </a>
                    </div>
                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs5" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        Студент обучается в группе
                    </h1>


                    <table class="student_cart_group_upd_tbl">
                        <tr>
                            <td colspan="4">
                                <a href="#">Crazy Star Pearls</a> En A1 (5)
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px;"><span>24.03.2012</span></td>
                            <td style="width: 120px;"><span>18:30 - 20:00</span></td>
                            <td style="text-align: right; padding-right: 40px;">
                                <a href="#">Показать в расписании</a>
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить замену</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px;"><span>12.04.2012</span></td>
                            <td style="width: 120px;"><span>15:00 - 17:30</span></td>
                            <td style="text-align: right; padding-right: 40px;">
                                <a href="#">Показать в расписании</a>
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить замену</a>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="st_cart_upd_group_border"><!--линия--></div>




                <div class="studen_cart_info studen_group_block_nofirst">   

                    <table class="student_cart_group_upd_tbl">
                        <tr>
                            <td colspan="4">
                                <a href="#">Crazy Star Pearls</a> En A1 (5)
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px;"><span>24.03.2012</span></td>
                            <td style="width: 120px;"><span>18:30 - 20:00</span></td>
                            <td style="text-align: right; padding-right: 40px;">
                                <a href="#">Показать в расписании</a>
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить замену</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px;"><span>12.04.2012</span></td>
                            <td style="width: 120px;"><span>15:00 - 17:30</span></td>
                            <td style="text-align: right; padding-right: 40px;">
                                <a href="#">Показать в расписании</a>
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить замену</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px;"><span>12.04.2012</span></td>
                            <td style="width: 120px;"><span>15:00 - 17:30</span></td>
                            <td style="text-align: right; padding-right: 40px;">
                                <a href="#">Показать в расписании</a>
                            </td>
                            <td style="width: 210px;">
                                <a href="#" class="st_cart_del_group_btn">Удалить замену</a>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="st_cart_upd_group_border"><!--линия--></div>








                <div class="confirm_block" style="margin-left: 40px;">
                    <a href="#" class="confirm_button" > Добавить замену </a>
                </div>
            </div>
            <!--== /block ==-->

            <!--== block ==-->
            <div id="st_tbs6" class="student_tabs_block">
                <div class="studen_cart_info studen_cart_info_upd">
                    <h1>
                        Информация о преподавателе 
                        <span style=" display: inline-block; width: 20px;"></span>
                    </h1>
                    
                    <form id="teacher_info_upd_form" action="/action/teacher/update_teacher/" >
                        <input type="hidden" name="user_id" value="<?=$teacher_info['id']?>" />
                    <table class="student_cart_info_tbl group_cart_info_tbl">
                        <tr>
                            <td style="width: 130px;">Фамилия</td>
                            <td>
                                <input type="text" name="fio_sname" value="<?=$teacher_info['fio_sname']?>" class="greyinput" style="width: 210px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">Имя</td>
                            <td>
                                <input type="text" name="fio_name" value="<?=$teacher_info['fio_name']?>" class="greyinput" style="width: 210px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">Отчество</td>
                            <td>
                                <input type="text" name="fio_mname" value="<?=$teacher_info['fio_mname']?>" class="greyinput" style="width: 210px;" />
                            </td>
                        </tr>
                        <tr>
                            <td>Адрес</td>
                            <td>
                                <input type="text" name="address" value="<?=$teacher_info['address']?>" class="greyinput" style="width: 210px;" />
                            </td>
                        </tr>
                        <tr>
                            <td>Телефон</td>
                            <td>
                                <input type="text" name="phone" value="<?=$teacher_info['phone']?>" class="greyinput" style="width: 210px;" />
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>
                                <input type="text" name="email" value="<?=$teacher_info['email']?>" class="greyinput" style="width: 210px;" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;" >Язык</td>
                            <td>
                                <select name="lang[]" class="greyselect" style="width:170px" multiple="multiple">
                                    <? foreach($lang_list as $lang_ar): ?>
                                    <option value="<?=$lang_ar['id']?>" <? if( isset($teacher_lang_list[ $lang_ar['id'] ]) ) echo 'selected="selected"'; ?> >
                                        <?=$lang_ar['short_name']?>
                                    </option>
                                    <? endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;" >Статус</td>
                            <td>
                                <select name="status" class="greyselect" style="width:170px">
                                    <option value="1">Распределен</option>
                                    <option value="1">Уволен</option>
                                    <option value="1">В отпуске</option>
                                    <option value="1">Распределен</option>
                                    <option value="1">Расстрелян</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Пробное занятие</td>
                            <td><input type="text" name="test_lesson" value="10.06.2011" class="greyinput date_input_all" style="width:75px" /></td>
                        </tr>
                        <tr>
                            <td>Начало работы</td>
                            <td><input type="text" name="work_start" value="14.08.2011" class="greyinput date_input_all" style="width:75px" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td  style="vertical-align: top;"  >Доп. информация</td>
                            <td style="padding-right: 40px;">
                                <textarea name="comment" style="width: 400px; height: 80px;"><?=$teacher_info['comment']?></textarea>    
                            </td>
                        </tr>
                    </table>
                    </form>

                    <div class="confirm_block">
                        <a href="javascript:void(0)" class="confirm_button" style="width: 76px;"
                           onclick="send_form('#teacher_info_upd_form', {title:'Выполняется обновление информации', content:'loader'} )">
                            Сохранить</a>
                        <a href="#" onclick="$('#page_tabs').tabs('select',0)">Отмена</a>
                    </div>
                </div>
            </div>
            <!--== /block ==-->

        </div>
    </div>


</div>