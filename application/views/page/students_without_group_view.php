<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div id="right_content">
    <div id="fix_space">
        <div id="fix_top_menu">
            <div id="content_top_block">
                <div id="group_top_block">
                    <div id="check_all_block">
                        <input type="checkbox" name="check_all" id="check_all" />
                    </div>
                    <a href="/add_student/" class="top_left_btn_action" style="left:50px;">Добавить</a>

                    <a href="javascript:void(0)" class="top_left_btn top_left_btn_left top_left_btn_del"        style="left:160px;"
                       onclick="del_stud_teach('delete', 'students')">
                        <div></div>
                    </a>
                    <a href="javascript:void(0)" class="top_left_btn top_left_btn_right top_left_btn_catalog"   style="left:200px;"
                       onclick="del_stud_teach('arhive', 'students')">
                        <div></div>
                    </a>

                    <a href="javascript:void(0)" class="top_left_btn top_left_btn_list show_slide_list" style="left:250px; width: 80px; position:absolute;">
                        <div>Функции</div>
                        <div class="slide_list_block" style="width: 170px; top: 27px; right:0; height: 105px !important;">
                            <ul class="student_copy_ul">
                                <li onclick="add_students_to_group()">Добавить в группу</li>
                                <li copyname="copyphone" class="copy_info">Скопировать телефоны</li>
                                <li copyname="copymail" class="copy_info">Скопировать e-mail</li>
                                <!--
                                <li copyname="copyname" class="copy_info">ФИО</li>
                                -->
                            </ul>
                        </div>
                    </a>

                    <!-- фильтр по языкам -->
                    <a href="javascript:void(0)" class="top_left_btn top_left_btn_list show_slide_list lang_filter" style="right:250px; width: 90px; position:absolute;">
                        <div class="jq_lang_filter_title">Все языки</div>
                        <div class="slide_list_block" style="width: 170px; top: 27px; right:0; height: 0px !important;">
                            <ul class="student_copy_ul jq_lang_filter">
                                <li lang="all">Все языки</li>
                                <? foreach ($lang_list as $lang_ar): ?>
                                    <li lang="<?= $lang_ar['short_name'] ?>"><?= "({$lang_ar['short_name']}) " . $lang_ar['name'] ?></li>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </a>
                    <!-- /фильтр по языкам -->

                    <div class="filter_group_top">
                        <input type="text" name="group_filter" id="group_filter" class="jq_st_search" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="group_tbl ">
        <tr class="group_first_tr">
            <td style="width: 35px;"></td>
            <td style="width: 30px;"></td>
            <td>Студент</td>
            <td style="width: 50px;">Телефон</td>
            <td style="width: 70px;">Язык</td>
            <td style="width: 70px;">Уровень</td>
            <td>Предпочтительный график занятий</td>
        </tr>

        <?
        if ($students_list != NULL):
            foreach ($students_list as $student_ar):
                $info_obj = unserialize($student_ar['info_obj']);

//            echo '<pre>';
//            print_r($info_obj);
//            echo '</pre>';
                ?>

                <tr  class="jq_student_str">
                    <td>
                        <input type="checkbox" name="tmp[]" class="checkline" 
                               copymail=    "<?= $student_ar['mail'] ?>" 
                               copyphone=   "<?= $student_ar['phone'] ?>" 
                               copyname=    "<?= $student_ar['fio'] ?>"
                               student_id=  "<?= $student_ar['id'] ?>"/>
                    </td>
                    <td class="group_tbl_star">
                        <input type="checkbox" class="star_checkbox" name="star_<?= $student_ar['id'] ?>" 
                               onchange="check_important(<?= $student_ar['id'] ?>)" 
                               <? if ($student_ar['star'] == 'on') echo 'checked="checked"' ?> />
                    </td>
                    <td><a href="/student_cart/<?= $student_ar['id'] ?>/"><?= $student_ar['fio'] ?></a></td>
                    <td><?= $student_ar['phone'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><? if (is_object($info_obj)) echo $info_obj->prefer_lang ?></td>
                    <td>A1</td>
                    <td><? if (is_object($info_obj)) echo get_schedule_str($info_obj->schedule_ar) ?></td>

                </tr>

                <?
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="8" style="text-align: center;"> В данной категории нет записей </td>
            </tr>
        <? endif; ?>
    </table>
</div>