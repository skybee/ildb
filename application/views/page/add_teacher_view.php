<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>



<div id="right_content">
    <div id="content_top_block">
        <div id="group_top_block">
            <div class="student_del_top_btn" onclick="window.location.href='/students/1/'"></div>
        </div>
    </div>

    <div class="student_cart_block" id="page_tabs">


        <div class="student_cart_left_block">
            <ul id="tab_links_list">
                <li><a href="#st_tbs1">Информация</a></li>
                <li><a href="#st_tbs2">Группы</a></li>
            </ul>
        </div>

        <div class="student_cart_right_block">

            <form action="/action/teacher/add_teacher/" id="add_teacher_form">

                <!-- TAB_1 -->    
                <div id="st_tbs1" class="student_tabs_block">
                    <div class="studen_cart_info studen_cart_info_upd">
                        <h1>
                            Информация о преподавателе 
                            <span style=" display: inline-block; width: 20px;"></span>
                        </h1>

                        <table class="student_cart_info_tbl group_cart_info_tbl">
                            <tr>
                                <td style="width: 130px;">Фамилия</td>
                                <td>
                                    <input type="text" name="fio_sname" class="greyinput" style="width: 210px;" />
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 130px;">Имя</td>
                                <td>
                                    <input type="text" name="fio_name" class="greyinput" style="width: 210px;" />
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 130px;">Отчество</td>
                                <td>
                                    <input type="text" name="fio_mname" class="greyinput" style="width: 210px;" />
                                </td>
                            </tr>
                            <tr>
                                <td>Адрес</td>
                                <td>
                                    <input type="text" name="address" class="greyinput" style="width: 210px;" />
                                </td>
                            </tr>
                            <tr>
                                <td>Телефон</td>
                                <td>
                                    <input type="text" name="phone" class="greyinput" style="width: 210px;" />
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>
                                    <input type="text" name="email" class="greyinput" style="width: 210px;" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Язык</td>
                                <td>
                                    <select name="lang[]" class="greyselect" style="width:220px" multiple="multiple">
                                        <? foreach($lang_list as $lang_ar): ?>
                                        <option value="<?=$lang_ar['id']?>" ><?=$lang_ar['short_name']?></option>
                                        <? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Статус</td>
                                <td>
                                    <select name="status" class="greyselect" style="width:220px">
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
                                <td><input type="text" name="test_lesson" class="greyinput date_input_all" style="width:180px" /></td>
                            </tr>
                            <tr>
                                <td>Начало работы</td>
                                <td><input type="text" name="work_start" class="greyinput date_input_all" style="width:180px" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                            <tr>
                                <td>Вторая работа</td>
                                <td><input type="text" name="second_work" class="greyinput" style="width:180px" /></td>
                            </tr>
                            <tr>
                                <td  style="vertical-align: top;"  >Доп. информация</td>
                                <td style="padding-right: 40px;">
                                    <textarea name="comment" style="width: 400px; height: 80px;"></textarea>    
                                </td>
                            </tr>
                        </table>

                        <div class="confirm_block">
                            <a href="#" onclick="$('#page_tabs').tabs('select',1)" class="confirm_button" style="width: 76px;" >Далее</a>
                            <a href="/teachers/">Отмена</a>
                        </div>

                    </div> 
                </div>
                <!-- /TAB_1 -->


                <!-- TAB_2 -->    
                <div id="st_tbs2" class="student_tabs_block">
                    <div class="studen_cart_info">
                        <h1>
                            Добавьте преподователя в группу
                        </h1>

                        <div style="margin-top: 15px;">
                            <select class="greyselect" name="group" style="width: 320px;">
                                <option value="0" ></option>
                                <? foreach($group_list as $group_ar): ?>
                                    <option value="<?=$group_ar['id']?>" ><?=$group_ar['name']." ({$group_ar['lang']})"?></option>
                                <? endforeach; ?>
                            </select>
                        </div>

                        <div class="confirm_block">
                            <a href="javascript:void(0)" class="confirm_button" 
                               onclick="send_form('#add_teacher_form', {title:'Выполняется добавление преподавателя', content:'loader'} )">
                                Добавить преподавателя</a>
                            <a href="/teachers/">Отмена</a>
                        </div>
                    </div>
                </div>
                <!-- /TAB_2 -->

            </form>
        </div>
    </div>
</div>