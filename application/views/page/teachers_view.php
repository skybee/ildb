<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div id="right_content">
    <div id="content_top_block">
        <div id="group_top_block">
            <div id="check_all_block">
                <input type="checkbox" name="check_all" id="check_all" />
            </div>
            <a href="/add_teacher/" class="top_left_btn_action" style="left:50px;">Добавить</a>

            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"        style="left:160px;"
               onclick="del_stud_teach('delete', 'teachers')">
                <div></div>
            </a>
            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_catalog"   style="left:200px;"
               onclick="del_stud_teach('arhive', 'teachers')">
                <div></div>
            </a>

            <a href="javascript:void(0)" class="top_left_btn top_left_btn_list show_slide_list" style="left:250px; width: 95px; position:relative;">
                <div>Копировать</div>
                <div class="slide_list_block" style="width: 140px; top: 27px; right:0; height: 105px !important;">
                    <ul class="student_copy_ul">
                        <li copyname="copyphone">Телефон</li>
                        <li copyname="copymail">E-mail</li>
                        <li copyname="copyname">ФИО</li>
                    </ul>
                </div>
            </a>

            <div class="filter_group_top">
                <input type="text" name="group_filter" id="group_filter" class="jq_tch_search"/>
            </div>
        </div>
    </div>

    <table class="group_tbl student_tdl">
        <tr class="group_first_tr">
            <td style="width: 35px;"></td>
            <td style="width: 30px;"></td>
            <td>Преподаватель</td>
            <td style="width: 100px;">Телефон</td>
            <td style="width: 100px;">E-mail</td>
            <td style="width: 70px;">Язык</td>
            <td>Группа</td>
        </tr>

        <?
        if ($teachers_list != NULL):
            foreach ($teachers_list as $teacher_ar):
                ?>

        <tr class="jq_teacher_str">
                    <td>
                        <input type="checkbox" name="tmp[]" class="checkline" 
                               copymail=    "<?= $teacher_ar['email'] ?>" 
                               copyphone=   "<?= $teacher_ar['phone'] ?>" 
                               copyname=    "<?= $teacher_ar['fio'] ?>"
                               teacher_id=  "<?= $teacher_ar['id'] ?>"/>
                               
                    </td>
                    <td></td>
                    <td><a href="/teacher_cart/<?= $teacher_ar['id'] ?>/"><?= $teacher_ar['fio'] ?></a></td>
                    <td><?= $teacher_ar['phone'] ?></td>
                    <td><?= $teacher_ar['email'] ?></td>
                    <td>
                        <?
                            if (isset($teacher_ar['lang_name'])) {
                                foreach ($teacher_ar['lang_name'] as $lang_name) {
                                    echo $lang_name . '&nbsp;&nbsp;&nbsp;';
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?
                            if (isset($teacher_ar['group_name'])):
                                foreach ($teacher_ar['group_name'] as $key => $group_name):
                                    if($group_name != 'Индивидуал'):
                        ?>
                        <a href="/group_cart/<?=$key?>/" title="<?=$group_name?>"><?=$group_name?></a>&nbsp;&nbsp;
                        <?
                                    endif;
                                endforeach;
                            endif;
                        ?>
                    </td>                    
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